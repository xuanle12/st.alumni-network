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
        // Lấy skill IDs của ứng viên
        $candidateSkillIds = $profile->skills()->pluck('skills.id')->toArray();

        // Lấy tất cả job active kèm skills
        $jobs = Job::active()->with('skills')->get();

        $scored = $jobs->map(function ($job) use ($profile, $candidateSkillIds) {
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
        return self::W_SKILL    * $this->calcSkillScore($job, $candidateSkillIds)
             + self::W_EXP      * $this->calcExpScore($job, $profile)
             + self::W_MAJOR    * $this->calcMajorScore($job, $profile)
             + self::W_LOCATION * $this->calcLocationScore($job, $profile);
    }

    // S_skill: (skill trùng / tổng skill yêu cầu) × 40 — max 40đ
    private function calcSkillScore(Job $job, array $candidateSkillIds): float
    {
        $jobSkillIds = $job->skills->pluck('id')->toArray();

        if (empty($jobSkillIds)) return 0;

        $matched = count(array_intersect($candidateSkillIds, $jobSkillIds));
        return ($matched / count($jobSkillIds)) * 40;
    }

    // S_exp: tỉ lệ năm kinh nghiệm — max 30đ
    private function calcExpScore(Job $job, Profile $profile): float
    {
        $required = $job->experience_required ?? 0;
        $has      = $profile->experience_years ?? 0;

        if ($required === 0) return 30; // job không yêu cầu KN → full điểm

        if ($has >= $required) return 30;

        return ($has / $required) * 30;
    }

    // S_major: ngành/khoa khớp — max 20đ
    private function calcMajorScore(Job $job, Profile $profile): float
    {
        $nganh = mb_strtolower(trim($profile->nganh ?? ''));
        $field  = mb_strtolower(trim($job->field ?? ''));
        $khoa   = mb_strtolower(trim($job->khoa  ?? ''));

        if (!$nganh) return 0;

        if ($field && str_contains($field, $nganh)) return 20;
        if ($khoa  && str_contains($khoa,  $nganh)) return 20;

        return 0;
    }

    // S_location: địa điểm khớp — max 10đ
    private function calcLocationScore(Job $job, Profile $profile): float
    {
        $userCity = mb_strtolower(trim($profile->tinh_thanh ?? ''));
        $jobCity  = mb_strtolower(trim($job->location ?? ''));

        if (!$userCity || !$jobCity) return 0;

        return str_contains($jobCity, $userCity) ? 10 : 0;
    }
}