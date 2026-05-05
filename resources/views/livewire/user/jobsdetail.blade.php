<div>
   <style>
.jd-wrap{max-width:920px;margin:0 auto;padding:2rem 1.5rem}
.back-btn{display:inline-flex;align-items:center;gap:6px;font-size:13px;color:#6b7280;text-decoration:none;margin-bottom:1.25rem}
.back-btn:hover{color:#111}
.flash-ok{background:#f0fdf4;border:1px solid #86efac;color:#166534;padding:9px 14px;border-radius:8px;font-size:13px;margin-bottom:1rem}
.jd-layout{display:grid;grid-template-columns:1fr 280px;gap:1.25rem}
.main-card{background:#fff;border:1px solid #e2e8f0;border-radius:10px;padding:1.5rem;margin-bottom:10px}
.job-hero{display:flex;align-items:flex-start;gap:14px;margin-bottom:1.25rem}
.job-logo{width:64px;height:64px;border-radius:12px;background:#f8fafc;border:1px solid #e2e8f0;display:flex;align-items:center;justify-content:center;font-size:30px;flex-shrink:0}
.job-title{font-size:20px;font-weight:700;color:#111;margin-bottom:4px;line-height:1.3}
.job-co{font-size:14px;color:#6b7280;margin-bottom:8px}
.tag-row{display:flex;gap:6px;flex-wrap:wrap}
.tag{font-size:11px;font-weight:500;padding:3px 10px;border-radius:20px}
.tg{background:#f0fdf4;color:#166534}.ty{background:#fef9c3;color:#92400e}
.tb{background:#eff6ff;color:#1e40af}.tgr{background:#f3f4f6;color:#6b7280}
.divider{height:1px;background:#f3f4f6;margin:1.25rem 0}
.info-grid{display:grid;grid-template-columns:1fr 1fr;gap:.75rem;margin-bottom:1.5rem}
.ig{display:flex;align-items:flex-start;gap:10px;padding:.875rem;background:#f8fafc;border-radius:8px}
.ig-ico{width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.ig-label{font-size:10px;color:#9ca3af;margin-bottom:2px}
.ig-val{font-size:13px;font-weight:600;color:#111}
.sec-title{font-size:14px;font-weight:600;color:#111;margin-bottom:.75rem}
.content{font-size:13px;color:#374151;line-height:1.8}
.content p{margin-bottom:.875rem}
.content ul{padding-left:1.25rem;margin-bottom:.875rem}
.content li{margin-bottom:4px}
.content strong{color:#111;font-weight:600}
/* Sidebar */
.side-card{background:#fff;border:1px solid #e2e8f0;border-radius:10px;padding:1.1rem;margin-bottom:10px}
.side-title{font-size:12px;font-weight:600;color:#374151;margin-bottom:.875rem}
.apply-btn{width:100%;padding:11px;background:#111;color:#fff;border:none;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;font-family:inherit;margin-bottom:8px;transition:background .15s}
.apply-btn:hover{background:#333}
.save-btn{width:100%;padding:9px;background:#fff;color:#374151;border:1px solid #e2e8f0;border-radius:8px;font-size:13px;cursor:pointer;font-family:inherit;display:flex;align-items:center;justify-content:center;gap:6px;transition:all .15s}
.save-btn:hover{background:#f9fafb}
.save-btn.saved{border-color:#fca5a5;color:#dc2626;background:#fef2f2}
.meta-row{display:flex;justify-content:space-between;padding:7px 0;border-bottom:1px solid #f3f4f6;font-size:12px}
.meta-row:last-child{border-bottom:none}
.meta-key{color:#6b7280}.meta-val{color:#111;font-weight:500}
.co-card{text-align:center;padding:.5rem 0}
.co-logo{width:52px;height:52px;border-radius:10px;background:#f8fafc;border:1px solid #e2e8f0;display:flex;align-items:center;justify-content:center;font-size:24px;margin:0 auto .75rem}
.co-name{font-size:14px;font-weight:600;color:#111;margin-bottom:3px}
.co-field{font-size:12px;color:#6b7280;margin-bottom:.875rem}
.rel-item{display:flex;gap:10px;padding:.75rem 0;border-bottom:1px solid #f3f4f6;text-decoration:none}
.rel-item:last-child{border-bottom:none}
.rel-item:hover{opacity:.75}
.rel-logo{width:36px;height:36px;border-radius:8px;background:#f8fafc;border:1px solid #e2e8f0;display:flex;align-items:center;justify-content:center;font-size:16px;flex-shrink:0}
.rel-title{font-size:12px;font-weight:500;color:#111;line-height:1.3}
.rel-meta{font-size:11px;color:#9ca3af;margin-top:2px}
.rel-salary{font-size:11px;font-weight:600;color:#111;margin-left:auto;flex-shrink:0}

@media(max-width:768px){
  .jd-layout{grid-template-columns:1fr}
  .info-grid{grid-template-columns:1fr 1fr}
  .jd-wrap{padding:1rem}
  .job-logo{width:52px;height:52px;font-size:24px}
  .job-title{font-size:17px}
}
@media(max-width:480px){
  .info-grid{grid-template-columns:1fr}
  .job-hero{gap:10px}
}
</style>

<div class="jd-wrap">

  <a href="{{ route('job') }}" class="back-btn">
    <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M10 4L6 8l4 4" stroke="#6b7280" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
    Quay lại tuyển dụng
  </a>

  @if(session('success'))
    <div class="flash-ok">✓ {{ session('success') }}</div>
  @endif

  <div class="jd-layout">

    {{-- ═══ MAIN ═══ --}}
    <div>
      <div class="main-card">
        <div class="job-hero">
          <div class="job-logo">{{ $job->logo_emoji }}</div>
          <div style="flex:1;min-width:0">
            <div class="job-title">{{ $job->title }}</div>
            <div class="job-co">
              <strong style="color:#111">{{ $job->company }}</strong>
              @if($job->location) · {{ $job->location }} @endif
            </div>
            <div class="tag-row">
              <span class="tag {{ $job->type==='internship'?'ty':($job->type==='part-time'?'tb':'tg') }}">
                {{ $job->type_label }}
              </span>
              @if($job->khoa)
                <span class="tag tb">{{ $job->khoa_label }}</span>
              @endif
              @if($job->field)
                <span class="tag tgr">{{ $job->field }}</span>
              @endif
            </div>
          </div>
        </div>

        {{-- Info grid --}}
        <div class="info-grid">
          <div class="ig">
            <div class="ig-ico" style="background:#eff6ff">
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="2" y="3" width="12" height="10" rx="1.5" stroke="#3b82f6" stroke-width="1.5"/><path d="M5 7h6M5 10h4" stroke="#3b82f6" stroke-width="1.5" stroke-linecap="round"/></svg>
            </div>
            <div>
              <div class="ig-label">Loại công việc</div>
              <div class="ig-val">{{ $job->type_label }}</div>
            </div>
          </div>
          <div class="ig">
            <div class="ig-ico" style="background:#f0fdf4">
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="6" stroke="#16a34a" stroke-width="1.5"/><path d="M8 5v3l2 2" stroke="#16a34a" stroke-width="1.5" stroke-linecap="round"/></svg>
            </div>
            <div>
              <div class="ig-label">Mức lương</div>
              <div class="ig-val" style="color:#16a34a">{{ $job->salary ?? 'Thỏa thuận' }}</div>
            </div>
          </div>
          <div class="ig">
            <div class="ig-ico" style="background:#fef9c3">
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M8 1C5.24 1 3 3.24 3 6c0 4.25 5 9 5 9s5-4.75 5-9c0-2.76-2.24-5-5-5z" stroke="#d97706" stroke-width="1.5"/><circle cx="8" cy="6" r="1.5" stroke="#d97706" stroke-width="1.5"/></svg>
            </div>
            <div>
              <div class="ig-label">Địa điểm</div>
              <div class="ig-val">{{ $job->location ?? 'Chưa cập nhật' }}</div>
            </div>
          </div>
          <div class="ig">
            <div class="ig-ico" style="background:#faf5ff">
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="5" r="3" stroke="#9333ea" stroke-width="1.5"/><path d="M2 13c0-3 2.7-5 6-5s6 2 6 5" stroke="#9333ea" stroke-width="1.5" stroke-linecap="round"/></svg>
            </div>
            <div>
              <div class="ig-label">Khoa phù hợp</div>
              <div class="ig-val">{{ $job->khoa ? $job->khoa_label : 'Tất cả khoa' }}</div>
            </div>
          </div>
        </div>

        
        <div class="sec-title">Mô tả công việc</div>
        @if($job->description)
          <div class="content">{!! nl2br(e($job->description)) !!}</div>
        @else
          <div class="content" style="color:#9ca3af;font-style:italic">
            Vui lòng liên hệ nhà tuyển dụng để biết thêm chi tiết về vị trí này.
          </div>
        @endif

        @if($job->contact_email)
          <div class="divider"></div>
          <div class="sec-title">Thông tin liên hệ</div>
          <div class="content">
            <p>📧 Gửi CV tới: <a href="mailto:{{ $job->contact_email }}" style="color:#3b82f6;font-weight:500">{{ $job->contact_email }}</a></p>
          </div>
        @endif

      </div>
    </div>
    <div>

      
      <div class="side-card">
        @if($applied)
          <div style="text-align:center;padding:.75rem 0;margin-bottom:.875rem">
            <div style="font-size:28px;margin-bottom:6px">✅</div>
            <div style="font-size:13px;font-weight:600;color:#166534">Đã ứng tuyển thành công!</div>
            <div style="font-size:11px;color:#9ca3af;margin-top:3px">Nhà tuyển dụng sẽ liên hệ sớm</div>
          </div>
        @else
          <button wire:click="apply" class="apply-btn">
            <span wire:loading wire:target="apply">Đang gửi...</span>
            <span wire:loading.remove wire:target="apply">✉ Ứng tuyển ngay</span>
          </button>
        @endif
        <button wire:click="toggleSave" class="save-btn {{ $saved ? 'saved' : '' }}">
          <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M8 13l-6-6a3 3 0 014-4l2 2 2-2a3 3 0 014 4l-6 6z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/></svg>
          {{ $saved ? 'Đã lưu' : 'Lưu việc làm' }}
        </button>
      </div>

      <div class="side-card">
        <div class="side-title">Thông tin chi tiết</div>
        <div class="meta-row">
          <span class="meta-key">Loại hình</span>
          <span class="meta-val">{{ $job->type_label }}</span>
        </div>
        <div class="meta-row">
          <span class="meta-key">Ngành nghề</span>
          <span class="meta-val">{{ $job->field ?? '—' }}</span>
        </div>
        <div class="meta-row">
          <span class="meta-key">Ngày đăng</span>
          <span class="meta-val">{{ $job->created_at->format('d/m/Y') }}</span>
        </div>
        @if($job->contact_email)
        <div class="meta-row">
          <span class="meta-key">Email</span>
          <span class="meta-val" style="color:#3b82f6;font-size:11px">{{ $job->contact_email }}</span>
        </div>
        @endif
      </div>

     
      <div class="side-card">
        <div class="side-title">Về công ty</div>
        <div class="co-card">
          <div class="co-logo">{{ $job->logo_emoji }}</div>
          <div class="co-name">{{ $job->company }}</div>
          <div class="co-field">{{ $job->field ?? 'Doanh nghiệp' }}</div>
        </div>
      </div>


      @if($related->count() > 0)
      <div class="side-card">
        <div class="side-title">Việc làm tương tự</div>
        @foreach($related as $r)
          <a href="{{ route('job.show', $r->id) }}" class="rel-item" style="display:flex">
            <div class="rel-logo">{{ $r->logo_emoji }}</div>
            <div style="flex:1;min-width:0">
              <div class="rel-title">{{ Str::limit($r->title, 38) }}</div>
              <div class="rel-meta">{{ $r->company }} · {{ $r->location ?? '—' }}</div>
            </div>
            <div class="rel-salary">{{ $r->salary ?? '—' }}</div>
          </a>
        @endforeach
      </div>
      @endif

    </div>
  </div>
</div>
</div>
</div>
