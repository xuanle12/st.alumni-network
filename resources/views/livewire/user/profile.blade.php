<div>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}

.pf-page{
  font-family:var(--font);
  padding:1.5rem 1.25rem;
  background:#f5f6f8;
  min-height:100vh;
}
.pf-wrap{
  max-width:1240px;
  margin:0 auto;
  display:grid;
  grid-template-columns:250px 1fr;
  gap:1rem;
  align-items:start;
}

/* ── FLASH ── */
/* ── LEFT PANEL ── */
.pf-left{
  display:flex;flex-direction:column;gap:.75rem;
}
.pf-id-card{
  background:#fff;border-radius:12px;border:1px solid #e5e7eb;
  padding:1.25rem 1rem 1rem;
  display:flex;flex-direction:column;align-items:center;gap:.65rem;
  text-align:center;
}
.pf-ava-wrap{position:relative;display:inline-block}
.pf-ava{
  width:72px;height:72px;border-radius:50%;
  background:linear-gradient(135deg,#16a34a,#22c55e);
  color:#fff;font-size:26px;font-weight:700;
  display:flex;align-items:center;justify-content:center;
  border:3px solid #fff;box-shadow:0 2px 10px rgba(0,0,0,.1);
  overflow:hidden;
}
.pf-ava img{width:100%;height:100%;object-fit:cover}
.pf-ava-btn{
  position:absolute;bottom:0;right:0;
  width:22px;height:22px;border-radius:50%;
  background:#16a34a;color:#fff;border:2px solid #fff;
  display:flex;align-items:center;justify-content:center;
  cursor:pointer;font-size:9px;transition:.15s;
}
.pf-ava-btn:hover{background:#15803d}
.pf-ava-btn input{display:none}

.pf-name{font-size:17px;font-weight:700;color:#111827;line-height:1.3}
.pf-email{font-size:12.5px;color:#9ca3af}

.pf-badges{display:flex;flex-wrap:wrap;gap:4px;justify-content:center}
.bdg{
  font-size:10px;font-weight:700;padding:2px 9px;border-radius:20px;
  letter-spacing:.03em;
}
.bdg-green{background:#dcfce7;color:#15803d;border:1px solid #bbf7d0}
.bdg-amber{background:#fef9c3;color:#854d0e;border:1px solid #fde68a}
.bdg-blue {background:#dbeafe;color:#1d4ed8;border:1px solid #bfdbfe}
.bdg-gray {background:#f3f4f6;color:#4b5563;border:1px solid #e5e7eb}

/* progress */
.pf-prog{width:100%;padding-top:.1rem}
.pf-prog-row{display:flex;justify-content:space-between;font-size:10px;color:#9ca3af;margin-bottom:4px;font-weight:600;letter-spacing:.04em;text-transform:uppercase}
.pf-prog-val{color:#16a34a;font-weight:700}
.pf-prog-bg{height:3px;background:#e5e7eb;border-radius:99px;overflow:hidden}
.pf-prog-fill{height:100%;border-radius:99px;background:linear-gradient(90deg,#16a34a,#22c55e);transition:width .4s}

/* meta rows */
.pf-meta-list{width:100%;text-align:left;display:flex;flex-direction:column;gap:3px}
.pf-meta-row{
  display:flex;align-items:center;gap:7px;
  font-size:13px;color:#4b5563;padding:3px 0;
}
.pf-meta-row i{width:13px;text-align:center;color:#94a3b8;flex-shrink:0;font-size:11px}

/* social in left */
.pf-soc-list{width:100%;border-top:1px solid #f0f2f5;padding-top:.65rem;display:flex;flex-direction:column;gap:3px}
.pf-soc-item{
  display:flex;align-items:center;gap:7px;
  padding:6px 8px;border-radius:7px;
  font-size:13px;color:#374151;
  background:#f8fafc;text-decoration:none;transition:.12s;
}
a.pf-soc-item:hover{background:#f0fdf4;color:#16a34a}
.pf-soc-item i{font-size:12px;width:14px;text-align:center;flex-shrink:0}
.soc-gh{color:#24292e}.soc-li{color:#0077b5}.soc-wb{color:#7c3aed}
.pf-soc-item span{overflow:hidden;text-overflow:ellipsis;white-space:nowrap;flex:1;min-width:0}
.pf-soc-muted{color:#d1d5db!important;font-style:italic;font-size:11px}

/* ── RIGHT PANEL ── masonry cards */
.pf-right{
  column-count:2;
  column-gap:1rem;
}

/* section = card */
.pf-section{
  background:#fff;border:1px solid #e5e7eb;border-radius:12px;
  padding:1rem 1.25rem;
  margin-bottom:1rem;
  break-inside:avoid;
}
.pf-section.full{column-span:all}
.pf-section-hd{
  display:flex;align-items:center;justify-content:space-between;
  margin-bottom:.75rem;
}
.pf-section-title{
  font-size:13px;font-weight:700;color:#6b7280;
  text-transform:uppercase;letter-spacing:.07em;
}
.btn-edit{
  display:inline-flex;align-items:center;gap:4px;
  padding:4px 10px;border-radius:6px;
  font-size:11px;font-weight:600;cursor:pointer;
  border:1px solid #e5e7eb;background:#fff;color:#6b7280;
  transition:.12s;font-family:inherit;
}
.btn-edit:hover{background:#f9fafb;border-color:#9ca3af;color:#374151}
.btn-prim{
  display:inline-flex;align-items:center;gap:4px;
  padding:6px 14px;border-radius:7px;
  font-size:12px;font-weight:600;cursor:pointer;
  border:1px solid #16a34a;background:#16a34a;color:#fff;
  transition:.12s;font-family:inherit;white-space:nowrap;
}
.btn-prim:hover{background:#15803d;box-shadow:0 2px 6px rgba(22,163,74,.25)}
.btn-ghost{
  display:inline-flex;align-items:center;gap:4px;
  padding:6px 12px;border-radius:7px;
  font-size:12px;font-weight:600;cursor:pointer;
  border:1px solid transparent;background:transparent;color:#6b7280;
  transition:.12s;font-family:inherit;
}
.btn-ghost:hover{background:#f3f4f6;color:#111}

/* info rows — Label: Value on same line */
.pf-info-rows{display:flex;flex-direction:column;gap:0}
.pf-info-row{
  display:flex;align-items:baseline;gap:0;
  padding:7px 0;border-bottom:1px solid #f8fafc;
  font-size:14px;
}
.pf-info-row:last-child{border-bottom:none}
.pf-info-lbl{
  width:140px;flex-shrink:0;
  font-size:13px;color:#9ca3af;font-weight:500;
}
.pf-info-val{color:#111827;font-weight:500;flex:1;min-width:0}
.pf-info-val.muted{color:#d1d5db;font-style:italic;font-weight:400;font-size:13px}
.pf-info-val.bio{color:#374151;font-weight:400;line-height:1.6;font-size:13.5px}

/* form */
.pf-form-rows{display:flex;flex-direction:column;gap:8px}
.fi{display:flex;flex-direction:column;gap:3px}
.fi label{font-size:12.5px;font-weight:600;color:#6b7280}
.fi input,.fi textarea,.fi select{
  padding:8px 11px;border:1px solid #e2e8f0;border-radius:7px;
  font-size:14px;color:#111827;font-family:inherit;background:#fff;transition:.12s;
}
.fi input:focus,.fi textarea:focus{outline:none;border-color:#16a34a;box-shadow:0 0 0 2px rgba(22,163,74,.1)}
.fi input:disabled{background:#f9fafb;color:#9ca3af;cursor:not-allowed}
.fi textarea{resize:vertical;min-height:70px}
.fi .err{font-size:11px;color:#dc2626;margin-top:1px}
.pf-form-grid{display:grid;grid-template-columns:1fr 1fr;gap:8px 12px}
.fi.full{grid-column:1/-1}
.form-actions{display:flex;justify-content:flex-end;gap:6px;margin-top:.75rem}

/* mentor */
.mentor-cta-btn{
  display:inline-flex;align-items:center;gap:4px;
  padding:5px 12px;border-radius:7px;
  font-size:12px;font-weight:600;cursor:pointer;
  border:1px solid #16a34a;background:#16a34a;color:#fff;
  transition:.12s;font-family:inherit;white-space:nowrap;
}
.mentor-cta-btn:hover{background:#15803d}
.mentor-cta-btn.is-pending{border-color:#fde68a;background:#fffbeb;color:#92400e}
.mentor-cta-btn.is-approved{border-color:#bbf7d0;background:#f0fdf4;color:#15803d}
.mentor-cta-btn.is-rejected{border-color:#fecaca;background:#fff;color:#dc2626}
.mentor-desc{font-size:12px;color:#6b7280;margin-top:.25rem}

/* skills */
.skill-tags{display:flex;flex-wrap:wrap;gap:5px;margin-bottom:.65rem}
.skill-chip{
  display:inline-flex;align-items:center;gap:6px;
  padding:5px 12px;border-radius:20px;font-size:13px;font-weight:600;
  color:var(--cc);background:var(--cb);border:1px solid var(--ce);
}
.skill-chip i{font-size:10px;opacity:.4;cursor:pointer;transition:.12s}
.skill-chip i:hover{opacity:1;color:#dc2626}
.skill-empty{font-size:12.5px;color:#9ca3af;font-style:italic}
.skill-input-wrap{position:relative;margin-bottom:4px}
.skill-input-wrap input{
  width:100%;padding:7px 10px;border:1px solid #e2e8f0;
  border-radius:7px;font-size:13px;color:#111827;font-family:inherit;
}
.skill-input-wrap input:focus{outline:none;border-color:#16a34a;box-shadow:0 0 0 2px rgba(22,163,74,.1)}
.skill-suggest{
  position:absolute;top:calc(100% + 3px);left:0;right:0;
  background:#fff;border:1px solid #e2e8f0;border-radius:8px;
  box-shadow:0 4px 14px rgba(0,0,0,.08);max-height:160px;overflow-y:auto;z-index:10;
}
.skill-suggest-item{padding:7px 12px;font-size:12.5px;color:#374151;cursor:pointer;transition:.1s}
.skill-suggest-item:hover{background:#f0fdf4;color:#15803d}
.skill-hint{font-size:11px;color:#9ca3af;margin-bottom:2px}

/* CV */
.cv-list{display:flex;flex-direction:column;gap:6px;margin-bottom:.75rem}
.cv-item{
  display:flex;align-items:center;gap:10px;
  padding:8px 10px;background:#f8fafc;
  border:1px solid #e8ecf5;border-radius:8px;
}
.cv-ico{
  width:30px;height:30px;border-radius:7px;
  background:#fee2e2;color:#dc2626;
  display:flex;align-items:center;justify-content:center;font-size:12px;flex-shrink:0;
}
.cv-ico.doc{background:#dbeafe;color:#1d4ed8}
.cv-inf{flex:1;min-width:0}
.cv-name{font-size:13.5px;font-weight:600;color:#111827;display:flex;align-items:center;gap:5px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.cv-badge{font-size:10px;font-weight:700;padding:1px 6px;border-radius:20px;background:#dcfce7;color:#166534;flex-shrink:0}
.cv-meta{font-size:12px;color:#9ca3af;margin-top:1px}
.cv-acts{display:flex;gap:4px;flex-shrink:0}
.btn-xs{
  display:inline-flex;align-items:center;gap:3px;
  padding:3px 8px;border-radius:5px;font-size:11px;font-weight:600;cursor:pointer;
  border:1px solid #e2e8f0;background:#fff;color:#374151;transition:.12s;font-family:inherit;
}
.btn-xs:hover{background:#f9fafb}
.btn-xs-blue{border-color:#bbf7d0;background:#f0fdf4;color:#15803d}
.btn-xs-blue:hover{background:#dcfce7}
.btn-xs-red{border-color:#fecaca;background:#fff;color:#dc2626}
.btn-xs-red:hover{background:#fef2f2}
.dropzone{
  border:2px dashed #d1d5db;border-radius:9px;
  padding:1rem;text-align:center;cursor:pointer;transition:.15s;
  display:flex;flex-direction:column;align-items:center;gap:4px;
}
.dropzone:hover{border-color:#16a34a;background:#f0fdf4}
.dropzone input{display:none}
.dz-icon{font-size:20px;color:#94a3b8}
.dz-title{font-size:12px;font-weight:600;color:#374151}
.dz-sub{font-size:11px;color:#9ca3af}
.cv-preview{
  display:flex;align-items:center;gap:7px;padding:7px 10px;
  background:#f0fdf4;border:1px solid #dcfce7;border-radius:7px;margin-top:7px;
}
.cv-preview p{font-size:12px;color:#15803d;font-weight:500;flex:1;min-width:0;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.cv-empty{text-align:center;padding:1rem;color:#94a3b8;font-size:12.5px}

/* social edit */
.sf-list{display:flex;flex-direction:column;gap:6px}
.sf-row{display:flex;align-items:center;gap:7px}
.sf-ico{width:26px;height:26px;border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:12px;flex-shrink:0}
.sf-ico.gh{background:#24292e;color:#fff}
.sf-ico.li{background:#0077b5;color:#fff}
.sf-ico.wb{background:#7c3aed;color:#fff}
.sf-row input{flex:1;padding:6px 10px;border:1px solid #e2e8f0;border-radius:7px;font-size:12.5px;color:#111827;font-family:inherit}
.sf-row input:focus{outline:none;border-color:#16a34a;box-shadow:0 0 0 2px rgba(22,163,74,.1)}

[x-cloak]{display:none!important}

@media(max-width:1024px){
  .pf-right{column-count:1}
}
@media(max-width:640px){
  .pf-wrap{grid-template-columns:1fr}
  .pf-form-grid{grid-template-columns:1fr}
  .pf-info-lbl{width:110px}
}
</style>

<div class="pf-page">
<div class="pf-wrap">

  {{-- ══ LEFT ══ --}}
  <aside class="pf-left">
    <div class="pf-id-card">
      <div class="pf-ava-wrap">
        <div class="pf-ava">
          @if($user->profile?->avatar)
            <img src="{{ asset('storage/'.$user->profile->avatar) }}" alt="avatar">
          @else
            {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
          @endif
        </div>
        <label class="pf-ava-btn" title="Đổi ảnh">
          <input type="file" wire:model="avatarFile" accept="image/*">
          <i class="fa-solid fa-camera"></i>
        </label>
      </div>

      <div>
        <div class="pf-name">{{ $user->name ?? 'Chưa đặt tên' }}</div>
        <div class="pf-email">{{ $user->email }}</div>
      </div>

      @php
        $st = $user->status ?? 'pending';
        $bc = match($st) { 'active'=>'bdg-green','pending'=>'bdg-amber',default=>'bdg-gray' };
        $bl = match($st) { 'active'=>'Đang hoạt động','pending'=>'Chờ duyệt',default=>'Không hoạt động' };
        $role = $user->role ?? '';
        $rc = match($role) { 'alumni'=>'bdg-blue','student'=>'bdg-green','lecturer'=>'bdg-blue','admin'=>'bdg-gray',default=>'bdg-gray' };
        $rl = match($role) { 'alumni'=>'Cựu SV','student'=>'Sinh viên','lecturer'=>'Giảng viên','admin'=>'Admin',default=>'' };
      @endphp
      <div class="pf-badges">
        <span class="bdg {{ $bc }}">{{ $bl }}</span>
        @if($rl)<span class="bdg {{ $rc }}">{{ $rl }}</span>@endif
      </div>

      @if($user->profile?->msv || $user->profile?->lop || $user->profile?->khoa)
        <div class="pf-meta-list">
          @if($user->profile?->msv)
            <div class="pf-meta-row"><i class="fa-solid fa-id-card"></i> {{ $user->profile->msv }}</div>
          @endif
          @if($user->profile?->lop)
            <div class="pf-meta-row"><i class="fa-solid fa-users"></i> {{ $user->profile->lop }}</div>
          @endif
          @if($user->profile?->khoa)
            <div class="pf-meta-row"><i class="fa-solid fa-building-columns"></i> {{ $user->profile->khoa }}</div>
          @endif
        </div>
      @endif

      <div class="pf-prog">
        <div class="pf-prog-row">
          <span>Hồ sơ</span>
          <span class="pf-prog-val">{{ $pct }}%</span>
        </div>
        <div class="pf-prog-bg"><div class="pf-prog-fill" style="width:{{ $pct }}%"></div></div>
      </div>

    </div>
  </aside>

  {{-- ══ RIGHT ══ --}}
  <div class="pf-right">

    {{-- Thông tin cơ bản --}}
    <div class="pf-section">
      <div class="pf-section-hd">
        <span class="pf-section-title">Thông tin cơ bản</span>
        @if(!$edit)
          <button wire:click="$set('edit',true)" class="btn-edit"><i class="fa-solid fa-pen-to-square"></i> Sửa</button>
        @endif
      </div>

      @if($edit)
        <div class="pf-form-grid">
          <div class="fi">
            <label>Họ và Tên *</label>
            <input wire:model="name" type="text" placeholder="Nhập họ tên">
            @error('name')<div class="err">{{ $message }}</div>@enderror
          </div>
          <div class="fi">
            <label>Mã SV/GV</label>
            <input type="text" value="{{ $user->profile?->msv ?? '—' }}" disabled>
          </div>
          <div class="fi">
            <label>Số điện thoại</label>
            <input wire:model="phone" type="text" placeholder="0912 345 678">
            @error('phone')<div class="err">{{ $message }}</div>@enderror
          </div>
          <div class="fi">
            <label>Quê quán</label>
            <input wire:model="que_quan" type="text" placeholder="VD: Hưng Yên">
          </div>
          <div class="fi">
            <label>Tỉnh / Thành phố</label>
            <input wire:model="tinh_thanh" type="text" placeholder="VD: Hà Nội">
          </div>
          <div class="fi">
            <label>Năm tốt nghiệp</label>
            <input type="text" value="{{ $user->profile?->nam_tot_nghiep ?? '' }}" disabled placeholder="—">
          </div>
          <div class="fi full">
            <label>Giới thiệu bản thân</label>
            <textarea wire:model="bio" placeholder="Một vài dòng giới thiệu..."></textarea>
          </div>
        </div>
        <div class="form-actions">
          <button wire:click="cancelInfo" class="btn-ghost">Huỷ</button>
          <button wire:click="saveInfo" class="btn-prim">
            <span wire:loading.remove wire:target="saveInfo"><i class="fa-solid fa-floppy-disk"></i> Lưu</span>
            <span wire:loading wire:target="saveInfo">Đang lưu...</span>
          </button>
        </div>

      @else
        <div class="pf-info-rows">
          <div class="pf-info-row">
            <span class="pf-info-lbl">Họ và tên</span>
            <span class="pf-info-val">{{ $user->name }}</span>
          </div>
          <div class="pf-info-row">
            <span class="pf-info-lbl">Mã SV/GV</span>
            <span class="pf-info-val">{{ $user->profile?->msv ?? '—' }}</span>
          </div>
          <div class="pf-info-row">
            <span class="pf-info-lbl">Lớp</span>
            <span class="pf-info-val">{{ $user->profile?->lop ?? '—' }}</span>
          </div>
          <div class="pf-info-row">
            <span class="pf-info-lbl">Email</span>
            <span class="pf-info-val">{{ $user->email }}</span>
          </div>
          <div class="pf-info-row">
            <span class="pf-info-lbl">Điện thoại</span>
            <span class="pf-info-val {{ $user->profile?->phone ? '' : 'muted' }}">{{ $user->profile?->phone ?: 'Chưa cập nhật' }}</span>
          </div>
          <div class="pf-info-row">
            <span class="pf-info-lbl">Quê quán</span>
            <span class="pf-info-val {{ $user->profile?->que_quan ? '' : 'muted' }}">{{ $user->profile?->que_quan ?: 'Chưa cập nhật' }}</span>
          </div>
          <div class="pf-info-row">
            <span class="pf-info-lbl">Địa chỉ hiện tại</span>
            <span class="pf-info-val {{ $user->profile?->tinh_thanh ? '' : 'muted' }}">{{ $user->profile?->tinh_thanh ?: 'Chưa cập nhật' }}</span>
          </div>
          <div class="pf-info-row">
            <span class="pf-info-lbl">Năm tốt nghiệp</span>
            <span class="pf-info-val">{{ $user->profile?->nam_tot_nghiep ?? '—' }}</span>
          </div>
          @if($user->profile?->bio)
          <div class="pf-info-row" style="align-items:flex-start">
            <span class="pf-info-lbl">Giới thiệu</span>
            <span class="pf-info-val bio">{{ $user->profile->bio }}</span>
          </div>
          @endif
        </div>
      @endif
    </div>

    {{-- Liên kết mạng xã hội --}}
    <div class="pf-section">
      <div class="pf-section-hd">
        <span class="pf-section-title">Mạng xã hội</span>
        @if(!$editingSocial)
          <button wire:click="$set('editingSocial',true)" class="btn-edit"><i class="fa-solid fa-pen-to-square"></i> Sửa</button>
        @endif
      </div>

      @if($editingSocial)
        <div class="sf-list">
          <div class="sf-row">
            <div class="sf-ico gh"><i class="fa-brands fa-github"></i></div>
            <input wire:model="github" type="url" placeholder="https://github.com/username">
          </div>
          @error('github')<div style="margin-left:33px;font-size:11px;color:#dc2626">{{ $message }}</div>@enderror
          <div class="sf-row">
            <div class="sf-ico li"><i class="fa-brands fa-linkedin"></i></div>
            <input wire:model="linkedin" type="url" placeholder="https://linkedin.com/in/username">
          </div>
          @error('linkedin')<div style="margin-left:33px;font-size:11px;color:#dc2626">{{ $message }}</div>@enderror
          <div class="sf-row">
            <div class="sf-ico wb"><i class="fa-solid fa-globe"></i></div>
            <input wire:model="website" type="url" placeholder="https://yourwebsite.com">
          </div>
          @error('website')<div style="margin-left:33px;font-size:11px;color:#dc2626">{{ $message }}</div>@enderror
        </div>
        <div class="form-actions">
          <button wire:click="cancelSocial" class="btn-ghost">Huỷ</button>
          <button wire:click="saveSocial" class="btn-prim">
            <span wire:loading.remove wire:target="saveSocial"><i class="fa-solid fa-floppy-disk"></i> Lưu</span>
            <span wire:loading wire:target="saveSocial">Đang lưu...</span>
          </button>
        </div>

      @else
        <div class="pf-info-rows">
          <div class="pf-info-row">
            <span class="pf-info-lbl"><i class="fa-brands fa-github" style="margin-right:5px;color:#24292e"></i> GitHub</span>
            @if($user->profile?->github)
              <a href="{{ $user->profile->github }}" target="_blank" class="pf-info-val" style="color:#16a34a;text-decoration:none;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">{{ $user->profile->github }}</a>
            @else
              <span class="pf-info-val muted">Chưa cập nhật</span>
            @endif
          </div>
          <div class="pf-info-row">
            <span class="pf-info-lbl"><i class="fa-brands fa-linkedin" style="margin-right:5px;color:#0077b5"></i> LinkedIn</span>
            @if($user->profile?->linkedin)
              <a href="{{ $user->profile->linkedin }}" target="_blank" class="pf-info-val" style="color:#16a34a;text-decoration:none;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">{{ $user->profile->linkedin }}</a>
            @else
              <span class="pf-info-val muted">Chưa cập nhật</span>
            @endif
          </div>
          <div class="pf-info-row">
            <span class="pf-info-lbl"><i class="fa-solid fa-globe" style="margin-right:5px;color:#7c3aed"></i> Website</span>
            @if($user->profile?->website)
              <a href="{{ $user->profile->website }}" target="_blank" class="pf-info-val" style="color:#16a34a;text-decoration:none;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">{{ $user->profile->website }}</a>
            @else
              <span class="pf-info-val muted">Chưa cập nhật</span>
            @endif
          </div>
        </div>
      @endif
    </div>

    {{-- Mentor --}}
    @if(in_array($user->role ?? '', ['alumni','admin']))
      @php
        $mStatus   = $mentorProfile->status ?? null;
        $mBtnClass = match($mStatus) { 'approved'=>'is-approved','rejected'=>'is-rejected','pending'=>'is-pending',default=>'' };
        $mBtnIcon  = match($mStatus) { 'approved'=>'fa-circle-check','rejected'=>'fa-rotate-right','pending'=>'fa-hourglass-half',default=>'fa-user-tie' };
        $mBtnLabel = match($mStatus) { 'approved'=>'Đã là Mentor','rejected'=>'Đăng ký lại','pending'=>'Chờ duyệt',default=>'Đăng ký Mentor' };
        $mDesc     = match($mStatus) { 'approved'=>'Bạn đang là Mentor.','pending'=>'Đang chờ duyệt.','rejected'=>'Đã bị từ chối'.($mentorProfile->admin_note?': '.$mentorProfile->admin_note:'.'),default=>'Chia sẻ kinh nghiệm, hỗ trợ sinh viên.' };
      @endphp
      <div class="pf-section">
        <div class="pf-section-hd" style="margin-bottom:.4rem">
          <span class="pf-section-title">Chương trình Mentor</span>
          <button wire:click="$dispatch('open-mentor-register')" class="mentor-cta-btn {{ $mBtnClass }}">
            <i class="fa-solid {{ $mBtnIcon }}"></i> {{ $mBtnLabel }}
          </button>
        </div>
        <div class="mentor-desc">{{ $mDesc }}</div>
      </div>
    @endif

    {{-- Kỹ năng --}}
    <div class="pf-section">
      <div class="pf-section-hd">
        <span class="pf-section-title">Kỹ năng</span>
        @if(!$editingSkills)
          <button wire:click="$set('editingSkills',true)" class="btn-edit"><i class="fa-solid fa-pen-to-square"></i> Sửa</button>
        @endif
      </div>

      @php
        if (!function_exists('skillColor')) {
          function skillColor($n) {
            $h=0; foreach(str_split($n) as $c){$h=ord($c)+(($h<<5)-$h);} $hue=abs($h)%360;
            return ['bg'=>"hsl($hue,75%,95%)",'b'=>"hsl($hue,70%,85%)",'c'=>"hsl($hue,55%,35%)"];
          }
        }
      @endphp

      @if($editingSkills)
        <div class="skill-tags">
          @forelse($selectedSkills as $sk)
            @php $c=skillColor($sk); @endphp
            <span class="skill-chip" style="--cb:{{ $c['bg'] }};--ce:{{ $c['b'] }};--cc:{{ $c['c'] }}">
              {{ $sk }} <i class="fa-solid fa-xmark" wire:click="removeSkill('{{ $sk }}')"></i>
            </span>
          @empty
            <span class="skill-empty">Chưa có kỹ năng nào.</span>
          @endforelse
        </div>
        <div class="skill-input-wrap" x-data="{open:false}">
          <input type="text" wire:model.live.debounce.250ms="skillInput" wire:keydown.enter.prevent="addSkill"
            x-on:focus="open=true" x-on:blur="setTimeout(()=>open=false,150)"
            placeholder="Nhập kỹ năng rồi Enter...">
          <div class="skill-suggest" x-show="open" x-cloak
               @if($this->skillSuggestions->isEmpty()) style="display:none" @endif>
            @foreach($this->skillSuggestions as $s)
              <div class="skill-suggest-item" wire:click="addSkill('{{ $s->name }}')">{{ $s->name }}</div>
            @endforeach
          </div>
        </div>
        <div class="skill-hint">Nhấn Enter để thêm.</div>
        <div class="form-actions">
          <button wire:click="cancelSkills" class="btn-ghost">Huỷ</button>
          <button wire:click="saveSkills" class="btn-prim">
            <span wire:loading.remove wire:target="saveSkills"><i class="fa-solid fa-floppy-disk"></i> Lưu</span>
            <span wire:loading wire:target="saveSkills">Đang lưu...</span>
          </button>
        </div>

      @else
        <div class="skill-tags">
          @forelse($user->profile?->skills ?? [] as $sk)
            @php $c=skillColor($sk->name); @endphp
            <span class="skill-chip" style="cursor:default;--cb:{{ $c['bg'] }};--ce:{{ $c['b'] }};--cc:{{ $c['c'] }}">{{ $sk->name }}</span>
          @empty
            <span class="skill-empty">Chưa cập nhật kỹ năng</span>
          @endforelse
        </div>
      @endif

      <livewire:user.job-recommendation />
    </div>

    {{-- CV --}}
    <div class="pf-section">
      <div class="pf-section-hd">
        <span class="pf-section-title">CV / Hồ sơ</span>
      </div>

      @php $cvs = $user->cv ?? collect(); @endphp

      @if($cvs->count())
        <div class="cv-list">
          @foreach($cvs as $cv)
            <div class="cv-item">
              @php $isDoc = in_array(pathinfo($cv->file_name, PATHINFO_EXTENSION), ['doc','docx']); @endphp
              <div class="cv-ico {{ $isDoc?'doc':'' }}">
                <i class="fa-solid {{ $isDoc?'fa-file-word':'fa-file-pdf' }}"></i>
              </div>
              <div class="cv-inf">
                <div class="cv-name">
                  {{ $cv->file_name }}
                  @if($cv->is_primary)<span class="cv-badge">Chính</span>@endif
                </div>
                <div class="cv-meta">{{ number_format($cv->file_size/1024,0) }} KB · {{ $cv->created_at->format('d/m/Y') }}</div>
              </div>
              <div class="cv-acts">
                <a href="{{ $cv->url }}" download class="btn-xs"><i class="fa-solid fa-download"></i></a>
                @if(!$cv->is_primary)
                  <button wire:click="setPrimary({{ $cv->id }})" class="btn-xs btn-xs-blue">Đặt chính</button>
                @endif
                <button wire:click="deleteCv({{ $cv->id }})" wire:confirm="Xoá CV này?" class="btn-xs btn-xs-red"><i class="fa-solid fa-trash"></i></button>
              </div>
            </div>
          @endforeach
        </div>
      @else
        <div class="cv-empty">
          <i class="fa-solid fa-folder-open" style="display:block;font-size:20px;margin-bottom:4px"></i>
          Chưa có CV. Tải lên bên dưới.
        </div>
      @endif

      <label class="dropzone">
        <input wire:model="cvFile" type="file" accept=".pdf,.doc,.docx">
        <div class="dz-icon"><i class="fa-solid fa-cloud-arrow-up"></i></div>
        <div class="dz-title">Tải lên CV</div>
        <div class="dz-sub">PDF, DOC, DOCX · Tối đa 5MB</div>
      </label>

      @if($cvFile)
        <div class="cv-preview">
          <i class="fa-solid fa-paperclip" style="color:#6ee7a0"></i>
          <p>{{ is_object($cvFile) ? $cvFile->getClientOriginalName() : 'File đã chọn' }}</p>
        </div>
        @error('cvFile')
          <div style="font-size:11px;color:#dc2626;margin-top:4px">{{ $message }}</div>
        @else
          <div style="text-align:right;margin-top:8px">
            <button wire:click="uploadCv" class="btn-prim">
              <span wire:loading wire:target="uploadCv">Đang tải...</span>
              <span wire:loading.remove wire:target="uploadCv"><i class="fa-solid fa-upload"></i> Xác nhận</span>
            </button>
          </div>
        @enderror
      @endif
    </div>

  </div>{{-- end pf-right --}}

</div>
</div>

@livewire('user.mentor-form')
</div>
