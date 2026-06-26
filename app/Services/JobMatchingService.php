<?php

namespace App\Services;

use App\Models\Job;
use App\Models\Profile;

class JobMatchingService
{
    // Trọng số theo báo cáo
    const W_SKILL    = 0.40;
    const W_EXP      = 0.30;
    const W_MAJOR    = 0.20;
    const W_LOCATION = 0.10;

    public function recommend(Profile $profile, int $limit = 10): \Illuminate\Support\Collection
    {
        // Lấy skill ID của ứng viên
        $candidateSkillIds = $profile->skills()->pluck('skills.id')->toArray();

        // Lấy tất cả job active kèm skills
        $jobs = Job::active()->with('skills')->get();

        $scored = $jobs->map(function ($job) use ($profile, $candidateSkillIds) {
            $skillScore = $this->calcSkillScore($job, $candidateSkillIds);
            // Bắt buộc phải có ít nhất 1 kỹ năng trùng
            if ($skillScore === 0.0) {
                $job->match_score = 0;
                return $job;
            }
            $score = $this->calcScore($job, $profile, $candidateSkillIds);
            $job->match_score = round($score, 2);
            return $job;
        });

        $result = $scored
            ->filter(fn($job) => $job->match_score > 0)
            ->sortByDesc('match_score')
            ->take($limit)
            ->values();

        // Fallback nếu không có kết quả
        if ($result->isEmpty()) {
            return Job::active()->latest()->limit($limit)->get()
                ->map(function ($job) {
                    $job->match_score = 0;
                    return $job;
                });
        }

        return $result;
    }

    private function calcScore(Job $job, Profile $profile, array $candidateSkillIds): float
    {
        // Mỗi hàm con trả về tỉ lệ 0.0–1.0, nhân trọng số rồi × 100 → điểm 0–100
        return (
            self::W_SKILL    * $this->calcSkillScore($job, $candidateSkillIds)
          + self::W_EXP      * $this->calcExpScore($job, $profile)
          + self::W_MAJOR    * $this->calcMajorScore($job, $profile)
          + self::W_LOCATION * $this->calcLocationScore($job, $profile)
        ) * 100;
    }

    // S_skill: (skill trùng / tổng skill yêu cầu) → 0.0–1.0
    public function calcSkillScore(Job $job, array $candidateSkillIds): float
    {
        $jobSkillIds = $job->skills->pluck('id')->toArray();

        if (empty($jobSkillIds)) return 0.0;

        $matched = count(array_intersect($candidateSkillIds, $jobSkillIds));
        return $matched / count($jobSkillIds);
    }

    // S_exp: tỉ lệ năm kinh nghiệm → 0.0–1.0
    private function calcExpScore(Job $job, Profile $profile): float
    {
        $required = $job->experience_required ?? 0;
        $has      = $profile->experience_years ?? 0;

        if ($required === 0) return 1.0; // job không yêu cầu KN → full điểm

        if ($has >= $required) return 1.0;

        return $has / $required;
    }

    // S_major: ngành/khoa khớp → 0.0 hoặc 1.0
    private function calcMajorScore(Job $job, Profile $profile): float
    {
        $nganh = mb_strtolower(trim($profile->nganh ?? ''));
        $field  = mb_strtolower(trim($job->field ?? ''));
        $khoa   = mb_strtolower(trim($job->khoa  ?? ''));

        if (!$nganh) return 0.0;

        if ($field && str_contains($field, $nganh)) return 1.0;
        if ($khoa  && str_contains($khoa,  $nganh)) return 1.0;

        return 0.0;
    }

    // S_location: địa điểm khớp → 0.0 hoặc 1.0
    private function calcLocationScore(Job $job, Profile $profile): float
    {
        $userCity = mb_strtolower(trim($profile->tinh_thanh ?? ''));
        $jobCity  = mb_strtolower(trim($job->location ?? ''));

        if (!$userCity || !$jobCity) return 0.0;

        return str_contains($jobCity, $userCity) ? 1.0 : 0.0;
    }
}