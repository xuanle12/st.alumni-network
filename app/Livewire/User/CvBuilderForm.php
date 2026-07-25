<?php

namespace App\Livewire\User;

use App\Models\CvBuilder;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class CvBuilderForm extends Component
{
    /* Thông tin liên hệ */
    public string $full_name = '';
    public string $job_title = '';
    public string $email     = '';
    public string $phone     = '';
    public string $address   = '';
    public string $website   = '';
    public string $summary   = '';

    /* Các mục nhiều dòng */
    public array $education    = [];
    public array $experience   = [];
    public array $skills       = [];
    public array $projects     = [];
    public array $certificates = [];

    /** Khung rỗng cho từng loại mục. */
    private const BLANKS = [
        'education'    => ['school' => '', 'major' => '', 'from' => '', 'to' => '', 'note' => ''],
        'experience'   => ['company' => '', 'role' => '', 'from' => '', 'to' => '', 'note' => ''],
        'projects'     => ['name' => '', 'role' => '', 'link' => '', 'note' => ''],
        'certificates' => ['name' => '', 'issuer' => '', 'year' => ''],
        'skills'       => ['name' => ''],
    ];

    protected function rules(): array
    {
        return [
            'full_name' => 'required|string|max:120',
            'job_title' => 'nullable|string|max:120',
            'email'     => 'nullable|email|max:150',
            'phone'     => 'nullable|string|max:30',
            'address'   => 'nullable|string|max:200',
            'website'   => 'nullable|string|max:200',
            'summary'   => 'nullable|string|max:1500',
        ];
    }

    protected $messages = [
        'full_name.required' => 'Vui lòng nhập họ tên.',
        'email.email'        => 'Email không hợp lệ.',
    ];

    public function mount(): void
    {
        $user = Auth::user()->load('profile');
        $cv   = CvBuilder::where('user_id', $user->id)->first();

        if ($cv) {
            // Ép về chuỗi: cột trong DB có thể null, còn thuộc tính khai báo string
            foreach (['full_name', 'job_title', 'email', 'phone', 'address', 'website', 'summary'] as $f) {
                $this->$f = (string) ($cv->$f ?? '');
            }

            foreach (['education', 'experience', 'skills', 'projects', 'certificates'] as $part) {
                $this->$part = $cv->$part ?? [];
            }
        } else {
            // Lần đầu: điền sẵn từ hồ sơ cho khỏi gõ lại
            $p = $user->profile;

            $this->full_name = $user->name ?? '';
            $this->email     = $user->email ?? '';
            $this->job_title = $p?->position ?? '';
            $this->phone     = $p?->phone ?? '';
            $this->address   = $p?->tinh_thanh ?? '';
            $this->website   = $p?->website ?? $p?->linkedin ?? '';
            $this->summary   = $p?->bio ?? '';

            if ($p?->nganh || $p?->khoa) {
                $this->education[] = [
                    'school' => 'Học viện Nông nghiệp Việt Nam',
                    'major'  => trim(($p->nganh ?? '') . ($p->khoa ? ' — ' . $p->khoa : '')),
                    'from'   => '',
                    'to'     => (string) ($p->nam_tot_nghiep ?? ''),
                    'note'   => $p->lop ? 'Lớp ' . $p->lop : '',
                ];
            }
        }

        // Luôn để sẵn 1 dòng trống cho mỗi mục đang rỗng
        foreach (self::BLANKS as $part => $blank) {
            if (empty($this->$part)) {
                $this->$part = [$blank];
            }
        }
    }

    public function addRow(string $part): void
    {
        if (!isset(self::BLANKS[$part])) {
            return;
        }

        $rows   = $this->$part;
        $rows[] = self::BLANKS[$part];

        $this->$part = $rows;
    }

    public function removeRow(string $part, int $i): void
    {
        if (!isset(self::BLANKS[$part])) {
            return;
        }

        $rows = $this->$part;
        unset($rows[$i]);

        $this->$part = array_values($rows) ?: [self::BLANKS[$part]];
    }

    public function save(): void
    {
        $this->validate();

        CvBuilder::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'full_name'    => $this->full_name,
                'job_title'    => $this->job_title,
                'email'        => $this->email,
                'phone'        => $this->phone,
                'address'      => $this->address,
                'website'      => $this->website,
                'summary'      => $this->summary,
                'education'    => $this->cleanRows($this->education),
                'experience'   => $this->cleanRows($this->experience),
                'skills'       => $this->cleanRows($this->skills),
                'projects'     => $this->cleanRows($this->projects),
                'certificates' => $this->cleanRows($this->certificates),
            ]
        );

        $this->dispatch('toast', type: 'success', message: 'Đã lưu CV.');
    }

    /** Lưu rồi mở trang in ở tab mới (tab in chỉ chứa mỗi tờ CV). */
    public function saveAndPrint(): void
    {
        $this->save();
        $this->js("window.open('" . route('cv.print') . "?print=1', '_blank')");
    }

    /** Bỏ những dòng người dùng để trống hoàn toàn. */
    private function cleanRows(array $rows): array
    {
        return array_values(array_filter($rows, function ($row) {
            return implode('', array_map('trim', array_map('strval', $row))) !== '';
        }));
    }

    public function render()
    {
        return view('livewire.user.cv-builder-form');
    }
}
