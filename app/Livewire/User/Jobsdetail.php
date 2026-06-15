<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class Jobsdetail extends Component
{
    public Job $job;
    public $related = [];

    public array $matchedSkills = [];
    public array $missingSkills = [];

    public int $companyOpenJobs = 0;

    public bool $saved = false;
    public bool $applied = false;

    public function mount($id)
    {
        $this->job = Job::with('skills')->findOrFail($id);
        $this->job->salary = $this->formatSalary($this->job->min_salary, $this->job->max_salary);
        $this->job->skill_names = $this->job->skills->pluck('name');

        $jobSkillNames = $this->job->skills->pluck('name')
            ->map(fn($name) => strtolower($name))
            ->toArray();

        if (Auth::check() && Auth::user()->profile) {
            $userSkillNames = Auth::user()->profile->skills->pluck('name')
                ->map(fn($name) => strtolower($name))
                ->toArray();

            $this->matchedSkills = array_values(array_intersect($jobSkillNames, $userSkillNames));
            $this->missingSkills = array_values(array_diff($jobSkillNames, $userSkillNames));
        } else {
            $this->matchedSkills = [];
            $this->missingSkills = $jobSkillNames;
        }

        $this->companyOpenJobs = Job::where('company', $this->job->company)
            ->where('id', '!=', $id)
            ->where('is_active', true)
            ->count();

        $this->related = Job::where('id', '!=', $id)
            ->where(function ($q) {
                $q->where('khoa', $this->job->khoa)
                  ->orWhere('field', $this->job->field);
            })
            ->take(3)
            ->get()
            ->map(function ($r) {
                $r->salary = $this->formatSalary($r->min_salary, $r->max_salary);
                return $r;
            });
    }

    protected function formatSalary($min, $max): string
    {
        if (!$min && !$max) {
            return 'Thỏa thuận';
        }

        if ($min && $max) {
            return number_format($min) . ' - ' . number_format($max) . ' triệu';
        }

        return number_format($min ?: $max) . ' triệu';
    }

    public function apply()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $this->applied = true;

        session()->flash('success', 'Đã gửi hồ sơ!');
    }

    public function toggleSave()
    {
        $this->saved = !$this->saved;
    }

    public function render()
    {
        return view('livewire.user.jobsdetail', [
            'job' => $this->job,
            'related' => $this->related,
            'matchedSkills' => $this->matchedSkills,
            'missingSkills' => $this->missingSkills,
            'companyOpenJobs' => $this->companyOpenJobs,
        ]);
    }
}