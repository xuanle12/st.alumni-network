<div>
<style>
.cp-wrap{max-width:860px;margin:0 auto;padding:24px 16px 48px;font-family:'Be Vietnam Pro',system-ui,sans-serif;}

.cp-head{background:#fff;border:1px solid #e5e7eb;border-radius:16px;padding:22px;margin-bottom:18px;
  display:flex;align-items:center;gap:18px;box-shadow:0 1px 3px rgba(0,0,0,.04);}
.cp-logo-wrap{position:relative;flex-shrink:0;}
.cp-logo{width:82px;height:82px;border-radius:16px;object-fit:cover;background:#f1f5f9;}
.cp-logo-df{width:82px;height:82px;border-radius:16px;background:#eff6ff;color:#0961aa;font-weight:800;font-size:26px;
  display:flex;align-items:center;justify-content:center;}
.cp-logo-btn{position:absolute;right:-4px;bottom:-4px;width:28px;height:28px;border-radius:50%;
  background:#0961aa;color:#fff;border:2px solid #fff;display:flex;align-items:center;justify-content:center;
  cursor:pointer;font-size:11px;}
.cp-head-info{flex:1;min-width:0;}
.cp-head-name{font-size:20px;font-weight:800;color:#0f172a;letter-spacing:-.3px;}
.cp-head-field{font-size:13px;color:#64748b;margin-top:2px;}
.cp-head-meta{display:flex;align-items:center;gap:10px;margin-top:8px;flex-wrap:wrap;}
.cp-badge{font-size:11px;font-weight:700;padding:2px 10px;border-radius:20px;}
.cp-badge.active{background:#dbeafe;color:#075490;}
.cp-badge.pending{background:#fef9c3;color:#854d0e;}
.cp-badge.inactive{background:#fee2e2;color:#dc2626;}
.cp-jobs-link{font-size:12.5px;color:#0961aa;text-decoration:none;font-weight:600;}
.cp-jobs-link:hover{text-decoration:underline;}

.cp-note{display:flex;align-items:center;gap:8px;background:#eff6ff;border:1px solid #bfdbfe;color:#075490;
  font-size:12.5px;padding:10px 14px;border-radius:10px;margin-bottom:18px;}

.cp-card{background:#fff;border:1px solid #e5e7eb;border-radius:16px;padding:22px;margin-bottom:16px;
  box-shadow:0 1px 3px rgba(0,0,0,.04);}
.cp-card-title{font-size:14px;font-weight:800;color:#0f172a;margin-bottom:16px;
  padding-bottom:10px;border-bottom:1px solid #f1f5f9;}
.cp-grid{display:grid;grid-template-columns:1fr 1fr;gap:14px;}
.cp-fi{display:flex;flex-direction:column;gap:6px;}
.cp-fi.full{grid-column:1/-1;}
.cp-fi label{font-size:12px;font-weight:600;color:#374151;}
.cp-fi label .req{color:#dc2626;}
.cp-fi input,.cp-fi textarea{padding:10px 13px;border:1.5px solid #e2e8f0;border-radius:9px;
  font-size:13.5px;color:#0f172a;font-family:inherit;transition:border-color .15s,box-shadow .15s;background:#fff;}
.cp-fi input:focus,.cp-fi textarea:focus{outline:none;border-color:#0961aa;box-shadow:0 0 0 3px rgba(9,97,170,.1);}
.cp-fi textarea{resize:vertical;min-height:100px;}
.cp-err{font-size:11.5px;color:#dc2626;}

.cp-foot{display:flex;justify-content:flex-end;gap:10px;margin-top:6px;}
.cp-btn{padding:10px 22px;border-radius:10px;font-size:13.5px;font-weight:700;cursor:pointer;
  font-family:inherit;border:1px solid #0961aa;background:#0961aa;color:#fff;transition:.15s;
  display:inline-flex;align-items:center;gap:7px;}
.cp-btn:hover{background:#075490;}

@media(max-width:600px){
  .cp-grid{grid-template-columns:1fr;}
  .cp-head{flex-direction:column;text-align:center;}
}
</style>

<div class="cp-wrap">

  {{-- Header --}}
  <div class="cp-head">
    <div class="cp-logo-wrap">
      @if($company->logo)
        <img src="{{ asset('storage/'.$company->logo) }}" class="cp-logo" alt="{{ $company->name }}">
      @else
        <div class="cp-logo cp-logo-df">{{ $company->initials ?: 'CT' }}</div>
      @endif
      <label class="cp-logo-btn" title="Đổi logo">
        <i class="fa-solid fa-camera"></i>
        <input type="file" wire:model="logoFile" accept="image/*" style="display:none">
      </label>
    </div>
    <div class="cp-head-info">
      <div class="cp-head-name">{{ $company->name }}</div>
      @if($company->field)<div class="cp-head-field">{{ $company->field }}</div>@endif
      <div class="cp-head-meta">
        <span class="cp-badge {{ $company->status }}">{{ $company->status_label }}</span>
        <a href="{{ route('job') }}" wire:navigate class="cp-jobs-link">
          <i class="fa-solid fa-briefcase"></i> {{ $jobCount }} tin đang đăng
        </a>
      </div>
    </div>
  </div>

  <div wire:loading wire:target="logoFile" style="font-size:12px;color:#64748b;margin:-8px 0 12px;">Đang tải logo lên...</div>
  @error('logoFile')<div class="cp-note" style="background:#fef2f2;border-color:#fecaca;color:#dc2626">{{ $message }}</div>@enderror

  <div class="cp-note">
    <i class="fa-solid fa-circle-info"></i>
    Khi bạn lưu, thông tin công ty ở tất cả tin tuyển dụng do bạn đăng sẽ tự động cập nhật theo.
  </div>

  {{-- Thông tin công ty --}}
  <div class="cp-card">
    <div class="cp-card-title">Thông tin công ty</div>
    <div class="cp-grid">
      <div class="cp-fi full">
        <label>Tên công ty <span class="req">*</span></label>
        <input type="text" wire:model="name" placeholder="VD: Công ty TNHH ABC">
        @error('name')<div class="cp-err">{{ $message }}</div>@enderror
      </div>
      <div class="cp-fi">
        <label>Lĩnh vực</label>
        <input type="text" wire:model="field" placeholder="VD: Công nghệ thông tin">
        @error('field')<div class="cp-err">{{ $message }}</div>@enderror
      </div>
      <div class="cp-fi">
        <label>Quy mô</label>
        <input type="text" wire:model="size" placeholder="VD: 50-100 nhân viên">
        @error('size')<div class="cp-err">{{ $message }}</div>@enderror
      </div>
      <div class="cp-fi">
        <label>Website</label>
        <input type="text" wire:model="website" placeholder="https://congty.com">
        @error('website')<div class="cp-err">{{ $message }}</div>@enderror
      </div>
      <div class="cp-fi">
        <label>Địa chỉ</label>
        <input type="text" wire:model="address" placeholder="Số nhà, đường, quận, thành phố">
        @error('address')<div class="cp-err">{{ $message }}</div>@enderror
      </div>
      <div class="cp-fi full">
        <label>Giới thiệu công ty</label>
        <textarea wire:model="description" placeholder="Mô tả về công ty, lĩnh vực hoạt động, văn hoá..."></textarea>
        @error('description')<div class="cp-err">{{ $message }}</div>@enderror
      </div>
    </div>
  </div>

  {{-- Thông tin liên hệ --}}
  <div class="cp-card">
    <div class="cp-card-title">Thông tin liên hệ</div>
    <div class="cp-grid">
      <div class="cp-fi">
        <label>Người liên hệ</label>
        <input type="text" wire:model="contact_name" placeholder="VD: Nguyễn Văn A">
        @error('contact_name')<div class="cp-err">{{ $message }}</div>@enderror
      </div>
      <div class="cp-fi">
        <label>Chức vụ</label>
        <input type="text" wire:model="contact_position" placeholder="VD: Trưởng phòng nhân sự">
        @error('contact_position')<div class="cp-err">{{ $message }}</div>@enderror
      </div>
      <div class="cp-fi">
        <label>Email liên hệ (nhận CV)</label>
        <input type="email" wire:model="contact_email" placeholder="hr@congty.com">
        @error('contact_email')<div class="cp-err">{{ $message }}</div>@enderror
      </div>
      <div class="cp-fi">
        <label>Điện thoại</label>
        <input type="text" wire:model="contact_phone" placeholder="0912xxxxxx">
        @error('contact_phone')<div class="cp-err">{{ $message }}</div>@enderror
      </div>
    </div>
  </div>

  <div class="cp-foot">
    <button class="cp-btn" wire:click="save">
      <span wire:loading.remove wire:target="save"><i class="fa-solid fa-floppy-disk"></i> Lưu hồ sơ</span>
      <span wire:loading wire:target="save">Đang lưu...</span>
    </button>
  </div>

</div>
</div>
