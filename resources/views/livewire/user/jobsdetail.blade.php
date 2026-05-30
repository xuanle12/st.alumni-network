<div>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
.jd-page{
  min-height:100vh;
  background:#f1f5f9;
  font-family:'Barlow',system-ui,sans-serif;
  padding:1.75rem 1rem;
}
.jd-inner{ max-width:960px; margin:0 auto; }

.jd-back{
  display:inline-flex;align-items:center;gap:7px;
  font-size:14px;font-weight:600;color:#64748b;
  text-decoration:none;margin-bottom:1.25rem;
  transition:color .15s;
}
.jd-back:hover{color:#0961AA}

.jd-flash{
  background:#f0fdf4;border:1px solid #86efac;color:#166534;
  padding:10px 16px;border-radius:12px;font-size:13px;font-weight:500;
  display:flex;align-items:center;gap:8px;margin-bottom:1.25rem;
}

.jd-layout{
  display:grid;
  grid-template-columns:1fr 288px;
  gap:1.25rem;
  align-items:start;
}

.jd-card{
  background:#fff;
  border:1px solid #cbd5e1;
  border-radius:16px;
  overflow:hidden;
  margin-bottom:1.25rem;
}
.jd-card:last-child{margin-bottom:0}

.jd-hero-body{ padding:1.5rem 1.5rem 0; }
.jd-hero-top{
  display:flex;align-items:flex-start;gap:16px;
  padding-bottom:1.25rem;
}
.jd-logo{
  width:64px;height:64px;border-radius:12px;
  background:#f1f5f9;border:1px solid #e2e8f0;
  display:flex;align-items:center;justify-content:center;
  font-size:30px;flex-shrink:0;
}
.jd-title{font-size:22px;font-weight:800;color:#0f172a;line-height:1.3;margin-bottom:5px}
.jd-company-row{
  font-size:14px;color:#64748b;
  display:flex;align-items:center;gap:6px;flex-wrap:wrap;
  margin-bottom:10px;
}
.jd-company-row strong{color:#0f172a;font-weight:700}

.tag-row{display:flex;gap:6px;flex-wrap:wrap}
.tag{
  font-size:11px;font-weight:700;padding:3px 11px;border-radius:20px;
  display:inline-flex;align-items:center;gap:4px;
}
.tag-green {background:#dcfce7;color:#15803d}
.tag-yellow{background:#fef9c3;color:#854d0e}
.tag-blue  {background:#dbeafe;color:#1e40af}
.tag-gray  {background:#f1f5f9;color:#475569}
.tag-purple{background:#ede9fe;color:#6d28d9}

.jd-info-grid{
  display:grid;grid-template-columns:repeat(4,1fr);
  gap:0;
  border-top:1px solid #f1f5f9;
  border-bottom:1px solid #f1f5f9;
}
.ig{
  display:flex;align-items:center;gap:10px;
  padding:.875rem 1.25rem;
  border-right:1px solid #f1f5f9;
}
.ig:last-child{border-right:none}
.ig-icon{
  width:34px;height:34px;border-radius:9px;
  display:flex;align-items:center;justify-content:center;
  font-size:14px;flex-shrink:0;
}
.ig-lbl{font-size:10px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:#94a3b8;margin-bottom:2px}
.ig-val{font-size:13px;font-weight:700;color:#0f172a}
.ig-val.green{color:#15803d}

.jd-section{ padding:1.25rem 1.5rem; }
.jd-section + .jd-section{ border-top:1px solid #f1f5f9; padding-top:1.25rem; }
.jd-sec-title{
  font-size:11px;font-weight:800;letter-spacing:.08em;text-transform:uppercase;
  color:#94a3b8;margin-bottom:.875rem;
}
.jd-content{font-size:14px;color:#374151;line-height:1.85}
.jd-content p{margin-bottom:.875rem}
.jd-content ul{padding-left:1.25rem;margin-bottom:.875rem}
.jd-content li{margin-bottom:5px}
.jd-content strong{color:#0f172a;font-weight:700}

.jd-contact-link{
  display:inline-flex;align-items:center;gap:8px;
  padding:9px 16px;border-radius:9px;
  background:#eff6ff;border:1px solid #bfdbfe;
  color:#1e40af;font-size:13px;font-weight:600;
  text-decoration:none;transition:background .15s;
}
.jd-contact-link:hover{background:#dbeafe}

.side-body{ padding:1.25rem; }

.btn-apply{
  width:100%;padding:12px;
  background:#0961AA;color:#fff;
  border:none;border-radius:10px;
  font-family:inherit;font-size:14px;font-weight:700;
  cursor:pointer;transition:all .18s;
  display:flex;align-items:center;justify-content:center;gap:8px;
  box-shadow:0 2px 10px rgba(9,97,170,.22);
  margin-bottom:10px;
}
.btn-apply:hover{background:#0c83d8;transform:translateY(-1px)}
.applied-box{
  text-align:center;padding:.75rem;margin-bottom:10px;
  background:#f0fdf4;border:1px solid #86efac;border-radius:10px;
}
.applied-ico{font-size:26px;margin-bottom:4px}
.applied-title{font-size:13px;font-weight:700;color:#166534}
.applied-sub{font-size:11px;color:#94a3b8;margin-top:3px}
.btn-save{
  width:100%;padding:10px;
  background:#fff;color:#374151;
  border:1.5px solid #e2e8f0;border-radius:10px;
  font-family:inherit;font-size:13px;font-weight:600;
  cursor:pointer;transition:all .15s;
  display:flex;align-items:center;justify-content:center;gap:7px;
}
.btn-save:hover{background:#f8fafc;border-color:#94a3b8}
.btn-save.saved{border-color:#fca5a5;color:#dc2626;background:#fef2f2}

.side-sec-title{
  font-size:10px;font-weight:800;letter-spacing:.08em;text-transform:uppercase;
  color:#94a3b8;margin-bottom:.75rem;
}
.meta-row{
  display:flex;justify-content:space-between;align-items:center;
  padding:7px 0;border-bottom:1px solid #f1f5f9;font-size:12.5px;
}
.meta-row:last-child{border-bottom:none}
.meta-key{color:#64748b;font-weight:500}
.meta-val{color:#0f172a;font-weight:700;text-align:right}

.side-co{text-align:center;padding-top:.5rem}
.side-co-logo{
  width:52px;height:52px;border-radius:12px;
  background:#f1f5f9;border:1px solid #e2e8f0;
  display:flex;align-items:center;justify-content:center;
  font-size:24px;margin:0 auto .875rem;
}
.side-co-name{font-size:14px;font-weight:800;color:#0f172a;margin-bottom:3px}
.side-co-field{font-size:12px;color:#64748b}

.rel-item{
  display:flex;align-items:flex-start;gap:12px;
  padding:.75rem 0;border-bottom:1px solid #f1f5f9;
  text-decoration:none;transition:opacity .15s;
}
.rel-item:last-child{border-bottom:none}
.rel-item:hover{opacity:.7}
.rel-logo{
  width:40px;height:40px;border-radius:9px;
  background:#f1f5f9;border:1px solid #e2e8f0;
  display:flex;align-items:center;justify-content:center;
  font-size:18px;flex-shrink:0;
}
.rel-info{flex:1;min-width:0}
.rel-title{
  font-size:13px;font-weight:600;color:#0961AA;line-height:1.4;
  display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;
}
.rel-meta{font-size:11px;color:#94a3b8;margin-top:3px}
.rel-salary{font-size:11px;font-weight:700;color:#15803d;flex-shrink:0;margin-top:2px}

@media(max-width:768px){
  .jd-layout{grid-template-columns:1fr}
  .jd-info-grid{grid-template-columns:1fr 1fr}
  .ig{border-bottom:1px solid #f1f5f9}
  .jd-page{padding:1rem}
}
@media(max-width:480px){
  .jd-info-grid{grid-template-columns:1fr}
  .jd-hero-body,.jd-section{padding-left:1rem;padding-right:1rem}
}
</style>

<div class="jd-page">
<div class="jd-inner">

  <a href="{{ route('job') }}" class="jd-back">
    <i class="fa-solid fa-arrow-left"></i> Quay lại tuyển dụng
  </a>

  @if(session('success'))
    <div class="jd-flash"><i class="fa-solid fa-circle-check"></i> {{ session('success') }}</div>
  @endif

  <div class="jd-layout">

    <div>
      <div class="jd-card">

        <div class="jd-hero-body">
          <div class="jd-hero-top">
            <div class="jd-logo">{{ $job->logo_emoji }}</div>
            <div style="flex:1;min-width:0">
              <div class="jd-title">{{ $job->title }}</div>
              <div class="jd-company-row">
                <strong>{{ $job->company }}</strong>
                @if($job->location)
                  <span style="color:#cbd5e1">·</span>
                  <span><i class="fa-solid fa-location-dot" style="color:#94a3b8;font-size:11px"></i> {{ $job->location }}</span>
                @endif
              </div>
              <div class="tag-row">
                <span class="tag {{ $job->type==='internship' ? 'tag-yellow' : ($job->type==='part-time' ? 'tag-blue' : 'tag-green') }}">
                  <i class="fa-solid fa-briefcase" style="font-size:9px"></i> {{ $job->type_label }}
                </span>
                @if($job->khoa)
                  <span class="tag tag-purple"><i class="fa-solid fa-building-columns" style="font-size:9px"></i> {{ $job->khoa_label }}</span>
                @endif
                @if($job->field)
                  <span class="tag tag-gray">{{ $job->field }}</span>
                @endif
              </div>
            </div>
          </div>
        </div>

        <div class="jd-info-grid">
          <div class="ig">
            <div class="ig-icon" style="background:#dbeafe;color:#1e40af"><i class="fa-solid fa-file-lines"></i></div>
            <div>
              <div class="ig-lbl">Loại hình</div>
              <div class="ig-val">{{ $job->type_label }}</div>
            </div>
          </div>
          <div class="ig">
            <div class="ig-icon" style="background:#dcfce7;color:#15803d"><i class="fa-solid fa-money-bill-wave"></i></div>
            <div>
              <div class="ig-lbl">Mức lương</div>
              <div class="ig-val green">{{ $job->salary ?? 'Thỏa thuận' }}</div>
            </div>
          </div>
          <div class="ig">
            <div class="ig-icon" style="background:#fef9c3;color:#d97706"><i class="fa-solid fa-location-dot"></i></div>
            <div>
              <div class="ig-lbl">Địa điểm</div>
              <div class="ig-val">{{ $job->location ?? '—' }}</div>
            </div>
          </div>
          <div class="ig">
            <div class="ig-icon" style="background:#ede9fe;color:#7c3aed"><i class="fa-solid fa-graduation-cap"></i></div>
            <div>
              <div class="ig-lbl">Khoa</div>
              <div class="ig-val">{{ $job->khoa ? $job->khoa_label : 'Tất cả' }}</div>
            </div>
          </div>
        </div>

        <div class="jd-section">
          <div class="jd-sec-title">Mô tả công việc</div>
          @if($job->description)
            <div class="jd-content">{!! nl2br(e($job->description)) !!}</div>
          @else
            <div class="jd-content" style="color:#94a3b8;font-style:italic">
              Vui lòng liên hệ nhà tuyển dụng để biết thêm chi tiết về vị trí này.
            </div>
          @endif
        </div>

        @if($job->contact_email)
        <div class="jd-section">
          <div class="jd-sec-title">Liên hệ ứng tuyển</div>
          <a href="mailto:{{ $job->contact_email }}" class="jd-contact-link">
            <i class="fa-solid fa-envelope"></i> {{ $job->contact_email }}
          </a>
        </div>
        @endif

      </div>
    </div>

    <div>

      <div class="jd-card">
        <div class="side-body">
          @if($applied)
            <div class="applied-box">
              <div class="applied-ico">✅</div>
              <div class="applied-title">Đã ứng tuyển thành công!</div>
              <div class="applied-sub">Nhà tuyển dụng sẽ liên hệ sớm</div>
            </div>
          @else
            <button wire:click="apply" class="btn-apply">
              <span wire:loading wire:target="apply"><i class="fa-solid fa-spinner fa-spin"></i> Đang gửi...</span>
              <span wire:loading.remove wire:target="apply"><i class="fa-solid fa-paper-plane"></i> Ứng tuyển ngay</span>
            </button>
          @endif
          <button wire:click="toggleSave" class="btn-save {{ $saved ? 'saved' : '' }}">
            <i class="fa-{{ $saved ? 'solid' : 'regular' }} fa-heart"></i>
            {{ $saved ? 'Đã lưu' : 'Lưu việc làm' }}
          </button>
        </div>
      </div>

      <div class="jd-card">
        <div class="side-body">
          <div class="side-sec-title">Thông tin chi tiết</div>
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
            <span class="meta-key">Email liên hệ</span>
            <span class="meta-val" style="color:#0961AA;font-size:11.5px">{{ $job->contact_email }}</span>
          </div>
          @endif
        </div>
      </div>

      <div class="jd-card">
        <div class="side-body">
          <div class="side-sec-title">Về công ty</div>
          <div class="side-co">
            <div class="side-co-logo">{{ $job->logo_emoji }}</div>
            <div class="side-co-name">{{ $job->company }}</div>
            <div class="side-co-field">{{ $job->field ?? 'Doanh nghiệp' }}</div>
          </div>
        </div>
      </div>

      {{-- Related --}}
      @if($related->count() > 0)
      <div class="jd-card">
        <div class="side-body">
          <div class="side-sec-title">Việc làm tương tự</div>
          @foreach($related as $r)
            <a href="{{ route('job.show', $r->id) }}" class="rel-item">
              <div class="rel-logo">{{ $r->logo_emoji }}</div>
              <div class="rel-info">
                <div class="rel-title">{{ Str::limit($r->title, 42) }}</div>
                <div class="rel-meta">{{ $r->company }} · {{ $r->location ?? '—' }}</div>
              </div>
              <div class="rel-salary">{{ $r->salary ?? '' }}</div>
            </a>
          @endforeach
        </div>
      </div>
      @endif

    </div>
  </div>

</div>
</div>
</div>