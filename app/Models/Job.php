<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
     protected $fillable =[
         'title', 'company', 'location', 'type',
        'field', 'min_salary', 'max_salary', 'is_active',
        'description', 'experience_required', 'deadline', 'created_by'
    ];

     // Label hiển thị cho loại công việc
    public function getTypeLabelAttribute(): string
    {
        return match($this->type) {
            'full-time'  => 'Full-time',
            'part-time'  => 'Part-time',
            'internship' => 'Thực tập',
            default      => $this->type,
        };
    }
    
 
    // CSS class cho badge
    public function getTypeClassAttribute(): string
    {
        return match($this->type) {
            'internship' => 'tag-gold',
            default      => 'tag-green',
        };
    }
 
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
    
    public function skills()
    {
    return $this->belongsToMany(Skill::class, 'job_skills');
    }

    /**
     * Lấy danh sách job gợi ý cho 1 profile, sắp xếp theo điểm phù hợp.
     * Điểm = (số skill trùng * 3) + (field khớp ? 1 : 0) + (khoa khớp ? 1 : 0)
     */
    public static function recommendedFor(?Profile $profile, int $limit = 5)
    {
        if (!$profile) {
            return self::active()->latest()->limit($limit)->get();
        }

        $skillIds = $profile->skills()->pluck('skills.id');

        $query = self::query()
            ->active()
            ->with('skills')
            ->withCount(['skills as matched_skills_count' => function ($q) use ($skillIds) {
                if ($skillIds->isNotEmpty()) {
                    $q->whereIn('skills.id', $skillIds);
                } else {
                    $q->whereRaw('1 = 0');
                }
            }]);

        $field = $profile->nganh;
        $khoa  = $profile->khoa;

        $jobs = $query->get()->map(function ($job) use ($field, $khoa) {
            $score = $job->matched_skills_count * 3;

            if ($field && $job->field && str_contains(mb_strtolower($job->field), mb_strtolower($field))) {
                $score += 1;
            }
            if ($khoa && $job->khoa && $job->khoa === $khoa) {
                $score += 1;
            }

            $job->match_score = $score;
            return $job;
        });

        return $jobs
            ->filter(fn ($job) => $job->match_score > 0)
            ->sortByDesc('match_score')
            ->take($limit)
            ->values();
    }
}