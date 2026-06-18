<div>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}

.pf-page{
  min-height:100vh;
  background:#f0f4f8;
  font-family:'Barlow',system-ui,sans-serif;
  padding:2rem 1.5rem;
}
.pf-inner{
  max-width:820px;
  margin:0 auto;
  display:flex;
  flex-direction:column;
  gap:1.25rem;
}

.pf-hero{
  background:#fff;
  border-radius:16px;
  border:1px solid #e2e8f0;
  box-shadow:0 2px 12px rgba(0,0,0,.06);
  padding:2rem 2rem 1.5rem;
  display:flex;
  align-items:center;
  gap:1.75rem;
  position:relative;
}
.pf-ava-wrap{position:relative;flex-shrink:0}
.pf-ava{
  width:90px;height:90px;border-radius:50%;
  background:linear-gradient(135deg,var(--blue,#16a34a),#22c55e);
  color:#fff;font-size:32px;font-weight:700;
  display:flex;align-items:center;justify-content:center;
  border:3px solid #e2e8f0;
  overflow:hidden;
}
.pf-ava img{width:100%;height:100%;object-fit:cover}
.pf-ava-upload{
  position:absolute;bottom:0;right:0;
  width:28px;height:28px;border-radius:50%;
  background:var(--blue,#16a34a);color:#fff;
  border:2px solid #fff;
  display:flex;align-items:center;justify-content:center;
  cursor:pointer;font-size:12px;
  transition:background .15s;
}
.pf-ava-upload:hover{background:#22c55e}
.pf-ava-upload input{display:none}
.pf-info{flex:1;min-width:0}
.pf-name{font-size:20px;font-weight:700;color:#111827;margin-bottom:4px}
.pf-meta{font-size:13px;color:#6b7280;margin-bottom:10px;display:flex;flex-wrap:wrap;gap:8px;align-items:center}
.pf-meta span{display:flex;align-items:center;gap:5px}
.pf-badges{display:flex;gap:8px;flex-wrap:wrap}
.badge{
  display:inline-flex;align-items:center;gap:4px;
  font-size:11px;font-weight:700;padding:4px 12px;border-radius:20px;
  letter-spacing:.03em;
}
.badge-green{background:#dcfce7;color:#15803d;border:1px solid #bbf7d0}
.badge-amber{background:#fef9c3;color:#854d0e;border:1px solid #fde68a}
.badge-blue {background:#dbeafe;color:#15803d;border:1px solid #dcfce7}
.badge-gray {background:#f3f4f6;color:#4b5563;border:1px solid #e5e7eb}
.pf-prog-wrap{margin-top:14px}
.pf-prog-lbl{display:flex;justify-content:space-between;font-size:11px;color:#9ca3af;margin-bottom:5px;font-weight:600;letter-spacing:.04em;text-transform:uppercase}
.pf-prog-pct{color:var(--blue,#16a34a);font-weight:700}
.pf-prog-bg{height:5px;background:#e5e7eb;border-radius:99px;overflow:hidden}
.pf-prog-fill{height:100%;border-radius:99px;background:linear-gradient(90deg,var(--blue,#16a34a),#22c55e);transition:width .4s ease}

.pf-card{
  background:#fff;
  border-radius:16px;
  border:1px solid #e2e8f0;
  box-shadow:0 2px 12px rgba(0,0,0,.05);
  overflow:hidden;
}
.pf-card-hd{
  display:flex;align-items:center;justify-content:space-between;
  padding:1rem 1.5rem;
  border-bottom:1px solid #f0f4f8;
  gap:12px;
}
.pf-card-hd-left{display:flex;align-items:center;gap:10px;min-width:0}
.pf-card-icon{
  width:34px;height:34px;border-radius:9px;
  display:flex;align-items:center;justify-content:center;
  font-size:15px;flex-shrink:0;
}
.icon-blue{background:#dbeafe;color:var(--blue,#16a34a)}
.icon-purple{background:#ede9fe;color:#7c3aed}
.icon-green{background:#dcfce7;color:#15803d}
.icon-amber{background:#fef9c3;color:#b45309}
.pf-card-title{font-size:14px;font-weight:700;color:#111827;letter-spacing:.01em}
.pf-card-sub{font-size:12px;color:#9ca3af;margin-top:1px}
.pf-card-body{padding:1.5rem}

.btn-edit{
  display:inline-flex;align-items:center;gap:5px;
  padding:6px 14px;border-radius:8px;
  font-size:12px;font-weight:600;cursor:pointer;
  border:1px solid #d1d5db;background:#fff;color:#374151;
  transition:all .15s;font-family:inherit;
}
.btn-edit:hover{background:#f9fafb;border-color:#9ca3af}
.btn-prim{
  display:inline-flex;align-items:center;gap:5px;
  padding:8px 20px;border-radius:9px;
  font-size:13px;font-weight:600;cursor:pointer;
  border:1px solid var(--blue,#16a34a);
  background:var(--blue,#16a34a);color:#fff;
  transition:all .15s;font-family:inherit;
  white-space:nowrap;flex-shrink:0;
}
.btn-prim:hover{background:#22c55e;box-shadow:0 2px 10px rgba(22,163,74,.25)}
.btn-ghost{
  display:inline-flex;align-items:center;gap:5px;
  padding:8px 16px;border-radius:9px;
  font-size:13px;font-weight:600;cursor:pointer;
  border:1px solid transparent;background:transparent;color:#6b7280;
  transition:all .15s;font-family:inherit;
}
.btn-ghost:hover{background:#f3f4f6;color:#111}
.btn-danger{
  display:inline-flex;align-items:center;gap:4px;
  padding:5px 10px;border-radius:7px;
  font-size:11px;font-weight:600;cursor:pointer;
  border:1px solid #fecaca;background:#fff;color:#dc2626;
  transition:all .15s;font-family:inherit;
}
.btn-danger:hover{background:#fef2f2}
.btn-sm-out{
  display:inline-flex;align-items:center;gap:4px;
  padding:5px 12px;border-radius:7px;
  font-size:11px;font-weight:600;cursor:pointer;
  border:1px solid #d1d5db;background:#fff;color:#374151;
  transition:all .15s;font-family:inherit;
}
.btn-sm-out:hover{background:#f9fafb}
.btn-sm-blue{
  display:inline-flex;align-items:center;gap:4px;
  padding:5px 12px;border-radius:7px;
  font-size:11px;font-weight:600;cursor:pointer;
  border:1px solid #dcfce7;background:#f0fdf4;color:#15803d;
  transition:all .15s;font-family:inherit;
}
.btn-sm-blue:hover{background:#dbeafe}
.form-actions{display:flex;justify-content:flex-end;gap:8px;margin-top:1.25rem}

.info-grid{display:grid;grid-template-columns:1fr 1fr;gap:.85rem 2.5rem}
.info-item label{
  display:block;font-size:10px;font-weight:700;
  letter-spacing:.07em;text-transform:uppercase;
  color:#9ca3af;margin-bottom:4px;
}
.info-item p{font-size:14px;color:#111827;font-weight:500;line-height:1.5}
.info-item p.muted{color:#d1d5db;font-style:italic;font-weight:400;font-size:13px}
.info-item.full{grid-column:1/-1}

/* ── FORM GRID ── */
.form-grid{display:grid;grid-template-columns:1fr 1fr;gap:10px 1.5rem}
.fi{display:flex;flex-direction:column;gap:4px}
.fi label{font-size:12px;font-weight:600;color:#6b7280}
.fi input,.fi textarea,.fi select{
  padding:9px 12px;border:1px solid #d1d5db;border-radius:9px;
  font-size:13px;color:#111827;font-family:inherit;
  transition:border-color .15s;background:#fff;
}
.fi input:focus,.fi textarea:focus,.fi select:focus{
  outline:none;border-color:var(--blue,#16a34a);
  box-shadow:0 0 0 3px rgba(9,97,170,.1);
}
.fi input:disabled{background:#f9fafb;color:#9ca3af;cursor:not-allowed}
.fi textarea{resize:vertical;min-height:80px}
.fi .err{font-size:11px;color:#dc2626;margin-top:2px}
.fi.full{grid-column:1/-1}

.soc-list{display:flex;flex-direction:column;gap:8px}
.soc-item{
  display:flex;align-items:center;gap:12px;
  padding:10px 14px;background:#f0faf5;
  border:1px solid #e8ecf5;border-radius:10px;
}
.soc-ico{width:32px;height:32px;border-radius:8px;
  display:flex;align-items:center;justify-content:center;font-size:15px;flex-shrink:0}
.soc-ico.gh{background:#24292e;color:#fff}
.soc-ico.li{background:#0077b5;color:#fff}
.soc-ico.wb{background:#6d28d9;color:#fff}
.soc-text{flex:1;min-width:0}
.soc-lbl{font-size:10px;font-weight:700;color:#9ca3af;text-transform:uppercase;letter-spacing:.06em;margin-bottom:2px}
.soc-url{font-size:13px;color:var(--blue,#16a34a);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;display:block;text-decoration:none}
.soc-url:hover{text-decoration:underline}
.soc-url.muted{color:#d1d5db;font-style:italic;font-size:12px}

.sf-list{display:flex;flex-direction:column;gap:8px}
.sf-row{display:flex;align-items:center;gap:10px}
.sf-ico{width:32px;height:32px;border-radius:8px;
  display:flex;align-items:center;justify-content:center;font-size:14px;flex-shrink:0}
.sf-row input{
  flex:1;padding:9px 12px;border:1px solid #d1d5db;
  border-radius:9px;font-size:13px;color:#111827;font-family:inherit;
}
.sf-row input:focus{outline:none;border-color:var(--blue,#16a34a);box-shadow:0 0 0 3px rgba(9,97,170,.1)}

.cv-list{display:flex;flex-direction:column;gap:8px;margin-bottom:1rem}
.cv-item{
  display:flex;align-items:center;gap:12px;
  padding:12px 14px;background:#f0faf5;
  border:1px solid #e8ecf5;border-radius:10px;
}
.cv-ico{
  width:38px;height:38px;border-radius:9px;
  background:#fee2e2;color:#dc2626;
  display:flex;align-items:center;justify-content:center;
  font-size:14px;flex-shrink:0;
}
.cv-ico.doc{background:#dbeafe;color:#15803d}
.cv-inf{flex:1;min-width:0}
.cv-name{
  font-size:13px;font-weight:600;color:#111827;
  display:flex;align-items:center;gap:6px;
  white-space:nowrap;overflow:hidden;text-overflow:ellipsis;
}
.cv-prim-badge{font-size:10px;font-weight:700;padding:2px 8px;border-radius:20px;background:#dcfce7;color:#166534;flex-shrink:0}
.cv-meta{font-size:11px;color:#9ca3af;margin-top:2px}
.cv-acts{display:flex;gap:6px;flex-shrink:0}

.dropzone{
  border:2px dashed #cbd5e1;border-radius:12px;
  padding:1.5rem 1rem;text-align:center;cursor:pointer;
  transition:all .2s;background:#fafbfe;
  display:flex;flex-direction:column;align-items:center;justify-content:center;
  width:100%;
}
.dropzone:hover{border-color:var(--blue,#16a34a);background:#f0fdf4}
.dropzone input[type=file]{display:none}
.dz-icon{font-size:28px;color:#94a3b8;margin-bottom:8px}
.dz-title{font-size:13px;font-weight:600;color:#374151;margin-bottom:4px}
.dz-sub{font-size:11px;color:#9ca3af;margin-bottom:12px}
.cv-preview{
  display:flex;align-items:center;gap:8px;
  padding:10px 13px;background:#f0fdf4;
  border:1px solid #dcfce7;border-radius:9px;margin-top:10px;
}
.cv-preview p{font-size:13px;color:#15803d;font-weight:500;flex:1;min-width:0;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.empty-cv{text-align:center;padding:1.5rem;color:#94a3b8;font-size:13px}

.flash{
  background:#f0fdf4;border:1px solid #86efac;
  color:#166534;padding:10px 16px;border-radius:10px;
  font-size:13px;font-weight:500;
  display:flex;align-items:center;gap:8px;
}

/* ── MENTOR CTA CARD ── */
.mentor-cta-btn{
  display:inline-flex;align-items:center;gap:6px;
  padding:8px 18px;border-radius:9px;
  font-size:13px;font-weight:600;cursor:pointer;
  border:1px solid var(--blue,#16a34a);
  background:var(--blue,#16a34a);color:#fff;
  transition:all .15s;font-family:inherit;
  white-space:nowrap;flex-shrink:0;
}
.mentor-cta-btn:hover{background:#22c55e;box-shadow:0 2px 10px rgba(22,163,74,.25)}
.mentor-cta-btn.is-pending{
  border-color:#fde68a;background:#fffbeb;color:#92400e;
}
.mentor-cta-btn.is-pending:hover{background:#fef3c7;box-shadow:none}
.mentor-cta-btn.is-approved{
  border-color:#bbf7d0;background:#f0fdf4;color:#15803d;
}
.mentor-cta-btn.is-approved:hover{background:#dcfce7;box-shadow:none}
.mentor-cta-btn.is-rejected{
  border-color:#fecaca;background:#fff;color:#dc2626;
}
.mentor-cta-btn.is-rejected:hover{background:#fef2f2;box-shadow:none}

/* ── SKILLS ── */
.skill-tags{
  display:flex;flex-wrap:wrap;gap:8px;
  margin-bottom: 1rem;
}
.skill-chip{
  display:inline-flex;align-items:center;gap:8px;
  padding:6px 14px;border-radius:20px;
  font-size:13px;font-weight:600;
  color: var(--chip-c);
  background: var(--chip-bg);
  border:1px solid var(--chip-b);
  transition:all .15s;
}
.skill-chip i{
  font-size:11px;color:var(--chip-c);opacity:.5;cursor:pointer;
  transition:opacity .15s;
}
.skill-chip i:hover{opacity:1;color:#dc2626}
.skill-empty{
  font-size:13px;color:#9ca3af;font-style:italic;
}

.skill-input-wrap{position:relative;margin-bottom:6px}
.skill-input-wrap input{
  width:100%;padding:9px 12px;border:1px solid #d1d5db;
  border-radius:9px;font-size:13px;color:#111827;
  font-family:inherit;transition:border-color .15s;background:#fff;
}
.skill-input-wrap input:focus{
  outline:none;border-color:var(--blue,#16a34a);
  box-shadow:0 0 0 3px rgba(22,163,74,.1);
}
.skill-suggest{
  position:absolute;top:calc(100% + 4px);left:0;right:0;
  background:#fff;border:1px solid #e2e8f0;border-radius:10px;
  box-shadow:0 4px 16px rgba(0,0,0,.08);
  max-height:180px;
  overflow-y:auto;
  z-index:10;
}
.skill-suggest::-webkit-scrollbar{
  width:6px;
}
.skill-suggest::-webkit-scrollbar-track{
  background:transparent;
}
.skill-suggest::-webkit-scrollbar-thumb{
  background:#cbd5e1;
  border-radius:99px;
}
.skill-suggest::-webkit-scrollbar-thumb:hover{
  background:#9ca3af;
}
.skill-suggest-item{
  padding:9px 14px;font-size:13px;color:#374151;
  cursor:pointer;transition:background .15s;
}
.skill-suggest-item:hover{background:#f0fdf4;color:#15803d}
.skill-hint{
  font-size:11px;color:#9ca3af;margin-bottom:4px;
}

[x-cloak]{display:none!important}

@media(max-width:640px){
  .pf-page{padding:1rem}
  .pf-hero{flex-direction:column;align-items:flex-start;gap:1rem;padding:1.5rem}
  .info-grid,.form-grid{grid-template-columns:1fr}
  .pf-card-body{padding:1rem}
  .pf-card-hd{flex-direction:column;align-items:flex-start;gap:10px}
  .pf-card-hd .mentor-cta-btn,.pf-card-hd .btn-edit{align-self:flex-start}
}
</style>
<div class="pf-page">
<div class="pf-inner">
  @if(session('success'))
    <div class="flash">
      <i class="fa-solid fa-circle-check"></i>
      {{ session('success') }}
    </div>
  @endif
  <div class="pf-hero">
    {{-- Avatar --}}
    <div class="pf-ava-wrap">
      <div class="pf-ava">
        @if($user->profile?->avatar)
          <img src="{{ asset('storage/'.$user->profile->avatar) }}" alt="avatar">
        @else
          {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
        @endif
      </div>
      <label class="pf-ava-upload" title="Đổi ảnh">
        <input type="file" wire:model="avatarFile" accept="image/*">
        <i class="fa-solid fa-camera"></i>
      </label>
    </div>

    <div class="pf-info">
      <div class="pf-name">{{ $user->name ?? 'Chưa đặt tên' }}</div>
      <div class="pf-meta">
        @if($user->profile?->msv)
          <span><i class="fa-solid fa-id-card" style="color:#9ca3af"></i> {{ $user->profile->msv }}</span>
        @endif
        @if($user->profile?->lop)
          <span><i class="fa-solid fa-users" style="color:#9ca3af"></i> {{ $user->profile->lop }}</span>
        @endif
        @if($user->email)
          <span><i class="fa-solid fa-envelope" style="color:#9ca3af"></i> {{ $user->email }}</span>
        @endif
      </div>

      <div class="pf-badges">
        @php
          $st = $user->status ?? 'pending';
          $bc = match($st) { 'active' => 'badge-green', 'pending' => 'badge-amber', default => 'badge-gray' };
          $bl = match($st) { 'active' => 'Đang hoạt động', 'pending' => 'Chờ duyệt', default => 'Không hoạt động' };
          $role = $user->role ?? '';
          $rc = match($role) { 'alumni' => 'badge-blue', 'student' => 'badge-green', 'lecturer' => 'badge-purple', 'admin' => 'badge-gray', default => 'badge-gray' };
          $rl = match($role) { 'alumni' => 'Cựu SV', 'student' => 'Sinh viên', 'lecturer' => 'Giảng viên', 'admin' => 'Quản trị viên', default => '' };
        @endphp
        <span class="badge {{ $bc }}">{{ $bl }}</span>
        @if($rl)
          <span class="badge {{ $rc }}">{{ $rl }}</span>
        @endif
        @if($user->profile?->khoa)
          <span class="badge badge-gray"><i class="fa-solid fa-building-columns"></i> {{ $user->profile->khoa }}</span>
        @endif
      </div>

      <div class="pf-prog-wrap">
        <div class="pf-prog-lbl">
          <span>Hoàn thiện hồ sơ</span>
          <span class="pf-prog-pct">{{ $pct }}%</span>
        </div>
        <div class="pf-prog-bg">
          <div class="pf-prog-fill" style="width:{{ $pct }}%"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="pf-card">
    <div class="pf-card-hd">
      <div class="pf-card-hd-left">
        <div class="pf-card-icon icon-blue"><i class="fa-solid fa-user"></i></div>
        <span class="pf-card-title">Thông tin cơ bản</span>
      </div>
      @if(!$edit)
        <button wire:click="$set('edit',true)" class="btn-edit">
          <i class="fa-solid fa-pen-to-square"></i> Chỉnh sửa
        </button>
      @endif
    </div>
    <div class="pf-card-body">

      @if($edit)
        <div class="form-grid">
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
            <label>Tỉnh / Thành phố hiện tại</label>
            <input wire:model="tinh_thanh" type="text" placeholder="VD: Hà Nội">
          </div>
          <div class="fi">
            <label>Năm tốt nghiệp</label>
            <input type="text" value="{{ $user->profile?->nam_tot_nghiep ?? '' }}" disabled placeholder="—">
          </div>
          <div class="fi full">
            <label>Giới thiệu bản thân</label>
            <textarea wire:model="bio" placeholder="Một vài dòng giới thiệu về bản thân bạn..."></textarea>
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
        <div class="info-grid">
          <div class="info-item">
            <label>Họ và Tên</label>
            <p>{{ $user->name }}</p>
          </div>
          <div class="info-item">
            <label>Mã SV/GV</label>
            <p>{{ $user->profile?->msv ?? '—' }}</p>
          </div>
          <div class="info-item">
            <label>Lớp</label>
            <p>{{ $user->profile?->lop ?? '—' }}</p>
          </div>
          <div class="info-item">
            <label>Số điện thoại</label>
            <p class="{{ $user->profile?->phone ? '' : 'muted' }}">{{ $user->profile?->phone ?: 'Chưa cập nhật' }}</p>
          </div>
          <div class="info-item">
            <label>Quê quán</label>
            <p class="{{ $user->profile?->que_quan ? '' : 'muted' }}">{{ $user->profile?->que_quan ?: 'Chưa cập nhật' }}</p>
          </div>
          <div class="info-item">
            <label>Địa chỉ hiện tại</label>
            <p class="{{ $user->profile?->tinh_thanh ? '' : 'muted' }}">{{ $user->profile?->tinh_thanh ?: 'Chưa cập nhật' }}</p>
          </div>
          <div class="info-item">
            <label>Năm tốt nghiệp</label>
            <p>{{ $user->profile?->nam_tot_nghiep ?? '—' }}</p>
          </div>
          <div class="info-item">
            <label>Email</label>
            <p>{{ $user->email }}</p>
          </div>
          @if($user->profile?->bio)
          <div class="info-item full">
            <label>Giới thiệu</label>
            <p style="font-weight:400;color:#374151;line-height:1.65">{{ $user->profile->bio }}</p>
          </div>
          @endif
        </div>
      @endif

    </div>
  </div>

  {{-- ═══ ĐĂNG KÝ MENTOR ═══ --}}
  @if(in_array($user->role ?? '', ['alumni','admin']))
    @php
      $mStatus = $mentorProfile->status ?? null;
      $mBtnClass = match($mStatus) {
        'approved' => 'is-approved',
        'rejected' => 'is-rejected',
        'pending'  => 'is-pending',
        default    => '',
      };
      $mBtnIcon = match($mStatus) {
        'approved' => 'fa-circle-check',
        'rejected' => 'fa-rotate-right',
        'pending'  => 'fa-hourglass-half',
        default    => 'fa-user-tie',
      };
      $mBtnLabel = match($mStatus) {
        'approved' => 'Đã là Mentor',
        'rejected' => 'Đăng ký lại',
        'pending'  => 'Đang chờ duyệt',
        default    => 'Đăng ký làm Mentor',
      };
      $mCardIcon = match($mStatus) {
        'approved' => 'icon-green',
        'pending'  => 'icon-amber',
        default    => 'icon-blue',
      };
      $mSub = match($mStatus) {
        'approved' => 'Bạn đang là Mentor được duyệt. Bấm để xem hoặc cập nhật thông tin.',
        'pending'  => 'Hồ sơ của bạn đang chờ quản trị viên duyệt.',
        'rejected' => 'Đăng ký trước đó đã bị từ chối'.($mentorProfile->admin_note ? ': '.$mentorProfile->admin_note : '.').' Bấm để gửi lại.',
        default    => 'Chia sẻ kinh nghiệm, hỗ trợ sinh viên và cựu sinh viên khác.',
      };
    @endphp
    <div class="pf-card">
      <div class="pf-card-hd">
        <div class="pf-card-hd-left">
          <div class="pf-card-icon {{ $mCardIcon }}"><i class="fa-solid fa-user-tie"></i></div>
          <div>
            <div class="pf-card-title">Chương trình Mentor</div>
            <div class="pf-card-sub">{{ $mSub }}</div>
          </div>
        </div>
        <button wire:click="$dispatch('open-mentor-register')" class="mentor-cta-btn {{ $mBtnClass }}">
          <i class="fa-solid {{ $mBtnIcon }}"></i> {{ $mBtnLabel }}
        </button>
      </div>
    </div>
  @endif

  {{-- ═══ KỸ NĂNG ═══ --}}
<div class="pf-card">
  <div class="pf-card-hd">
    <div class="pf-card-hd-left">
      <div class="pf-card-icon icon-amber"><i class="fa-solid fa-star"></i></div>
      <span class="pf-card-title">Kỹ năng</span>
    </div>
    @if(!$editingSkills)
      <button wire:click="$set('editingSkills',true)" class="btn-edit">
        <i class="fa-solid fa-pen-to-square"></i> Chỉnh sửa
      </button>
    @endif
  </div>
  <div class="pf-card-body">

    @php
      if (!function_exists('skillColor')) {
          function skillColor($name) {
              $hash = 0;
              foreach (str_split($name) as $ch) {
                  $hash = ord($ch) + (($hash << 5) - $hash);
              }
              $hue = abs($hash) % 360;
              return [
                  'bg'     => "hsl($hue, 75%, 95%)",
                  'border' => "hsl($hue, 70%, 85%)",
                  'color'  => "hsl($hue, 60%, 35%)",
              ];
          }
      }
    @endphp

    @if($editingSkills)
      <div class="skill-tags">
        @forelse($selectedSkills as $skill)
          @php $c = skillColor($skill); @endphp
          <span class="skill-chip" style="--chip-bg:{{ $c['bg'] }};--chip-b:{{ $c['border'] }};--chip-c:{{ $c['color'] }}">
            {{ $skill }}
            <i class="fa-solid fa-xmark" wire:click="removeSkill('{{ $skill }}')"></i>
          </span>
        @empty
          <span class="skill-empty">Chưa có kỹ năng nào, thêm bên dưới.</span>
        @endforelse
      </div>

      <div class="skill-input-wrap" x-data="{ open: false }">
        <input
          type="text"
          wire:model.live.debounce.250ms="skillInput"
          wire:keydown.enter.prevent="addSkill"
          x-on:focus="open = true"
          x-on:blur="setTimeout(() => open = false, 150)"
          placeholder="Nhập tên kỹ năng rồi Enter để thêm..."
        >
        <div class="skill-suggest" x-show="open" x-cloak
             @if($this->skillSuggestions->isEmpty()) style="display:none" @endif>
          @foreach($this->skillSuggestions as $s)
            <div class="skill-suggest-item" wire:click="addSkill('{{ $s->name }}')">{{ $s->name }}</div>
          @endforeach
        </div>
      </div>
      <div class="skill-hint">Gõ tên kỹ năng và nhấn Enter để thêm (có thể thêm kỹ năng chưa có trong danh sách).</div>

      <div class="form-actions">
        <button wire:click="cancelSkills" class="btn-ghost">Huỷ</button>
        <button wire:click="saveSkills" class="btn-prim">
          <span wire:loading.remove wire:target="saveSkills"><i class="fa-solid fa-floppy-disk"></i> Lưu</span>
          <span wire:loading wire:target="saveSkills">Đang lưu...</span>
        </button>
      </div>

    @else
      <div class="skill-tags">
        @forelse($user->profile?->skills ?? [] as $skill)
          @php $c = skillColor($skill->name); @endphp
          <span class="skill-chip" style="cursor:default;--chip-bg:{{ $c['bg'] }};--chip-b:{{ $c['border'] }};--chip-c:{{ $c['color'] }}">{{ $skill->name }}</span>
        @empty
          <span class="skill-empty">Chưa cập nhật kỹ năng</span>
        @endforelse
      </div>
    @endif
    <livewire:user.job-recommendation />
  </div>
</div>

  <div class="pf-card">
    <div class="pf-card-hd">
      <div class="pf-card-hd-left">
        <div class="pf-card-icon icon-purple"><i class="fa-solid fa-link"></i></div>
        <span class="pf-card-title">Mạng xã hội &amp; Liên kết</span>
      </div>
      @if(!$editingSocial)
        <button wire:click="$set('editingSocial',true)" class="btn-edit">
          <i class="fa-solid fa-pen-to-square"></i> Chỉnh sửa
        </button>
      @endif
    </div>
    <div class="pf-card-body">

      @if($editingSocial)
        <div class="sf-list">
          <div class="sf-row">
            <div class="sf-ico gh"><i class="fa-brands fa-github"></i></div>
            <input wire:model="github" type="url" placeholder="https://github.com/username">
          </div>
          @error('github')<div class="err" style="margin-left:42px">{{ $message }}</div>@enderror
          <div class="sf-row">
            <div class="sf-ico li"><i class="fa-brands fa-linkedin"></i></div>
            <input wire:model="linkedin" type="url" placeholder="https://linkedin.com/in/username">
          </div>
          @error('linkedin')<div class="err" style="margin-left:42px">{{ $message }}</div>@enderror
          <div class="sf-row">
            <div class="sf-ico wb"><i class="fa-solid fa-globe"></i></div>
            <input wire:model="website" type="url" placeholder="https://yourwebsite.com">
          </div>
          @error('website')<div class="err" style="margin-left:42px">{{ $message }}</div>@enderror
        </div>
        <div class="form-actions">
          <button wire:click="cancelSocial" class="btn-ghost">Huỷ</button>
          <button wire:click="saveSocial" class="btn-prim">
            <span wire:loading.remove wire:target="saveSocial"><i class="fa-solid fa-floppy-disk"></i> Lưu</span>
            <span wire:loading wire:target="saveSocial">Đang lưu...</span>
          </button>
        </div>

      @else
        <div class="soc-list">
          <div class="soc-item">
            <div class="soc-ico gh"><i class="fa-brands fa-github"></i></div>
            <div class="soc-text">
              <div class="soc-lbl">GitHub</div>
              @if($user->profile?->github)
                <a href="{{ $user->profile->github }}" target="_blank" class="soc-url">{{ $user->profile->github }}</a>
              @else
                <span class="soc-url muted">Chưa cập nhật</span>
              @endif
            </div>
          </div>
          <div class="soc-item">
            <div class="soc-ico li"><i class="fa-brands fa-linkedin"></i></div>
            <div class="soc-text">
              <div class="soc-lbl">LinkedIn</div>
              @if($user->profile?->linkedin)
                <a href="{{ $user->profile->linkedin }}" target="_blank" class="soc-url">{{ $user->profile->linkedin }}</a>
              @else
                <span class="soc-url muted">Chưa cập nhật</span>
              @endif
            </div>
          </div>
          <div class="soc-item">
            <div class="soc-ico wb"><i class="fa-solid fa-globe"></i></div>
            <div class="soc-text">
              <div class="soc-lbl">Website</div>
              @if($user->profile?->website)
                <a href="{{ $user->profile->website }}" target="_blank" class="soc-url">{{ $user->profile->website }}</a>
              @else
                <span class="soc-url muted">Chưa cập nhật</span>
              @endif
            </div>
          </div>
        </div>
      @endif

    </div>
  </div>

  {{-- ═══ CV ═══ --}}
  <div class="pf-card">
    <div class="pf-card-hd">
      <div class="pf-card-hd-left">
        <div class="pf-card-icon icon-green"><i class="fa-solid fa-file-lines"></i></div>
        <span class="pf-card-title">CV / Hồ sơ đính kèm</span>
      </div>
    </div>
    <div class="pf-card-body">

      @php $cvs = $user->cv ?? collect(); @endphp

      @if($cvs->count())
        <div class="cv-list">
          @foreach($cvs as $cv)
            <div class="cv-item">
              @php $isDoc = in_array(pathinfo($cv->file_name, PATHINFO_EXTENSION), ['doc','docx']); @endphp
              <div class="cv-ico {{ $isDoc ? 'doc' : '' }}">
                <i class="fa-solid {{ $isDoc ? 'fa-file-word' : 'fa-file-pdf' }}"></i>
              </div>
              <div class="cv-inf">
                <div class="cv-name">
                  {{ $cv->file_name }}
                  @if($cv->is_primary)<span class="cv-prim-badge">Chính</span>@endif
                </div>
                <div class="cv-meta">
                  {{ number_format($cv->file_size / 1024, 0) }} KB
                  &middot; {{ $cv->created_at->format('d/m/Y') }}
                </div>
              </div>
              <div class="cv-acts">
                <a href="{{ $cv->url }}" download class="btn-sm-out"><i class="fa-solid fa-download"></i> Tải</a>
                @if(!$cv->is_primary)
                  <button wire:click="setPrimary({{ $cv->id }})" class="btn-sm-blue">Đặt chính</button>
                @endif
                <button wire:click="deleteCv({{ $cv->id }})" wire:confirm="Xoá CV này?" class="btn-danger"><i class="fa-solid fa-trash"></i></button>
              </div>
            </div>
          @endforeach
        </div>
      @else
        <div class="empty-cv">
          <i class="fa-solid fa-folder-open" style="font-size:24px;display:block;margin-bottom:6px"></i>
          Chưa có CV nào. Tải lên bên dưới.
        </div>
      @endif

      {{-- Upload drop zone --}}
      <label class="dropzone">
        <input wire:model="cvFile" type="file" accept=".pdf,.doc,.docx">
        <div class="dz-icon"><i class="fa-solid fa-cloud-arrow-up"></i></div>
        <div class="dz-title">Tải lên CV</div>
        <div class="dz-sub">PDF, DOC, DOCX · Tối đa 5MB</div>
        <span class="btn-sm-out" style="pointer-events:none">Chọn file</span>
      </label>

      @if($cvFile)
        <div class="cv-preview">
          <i class="fa-solid fa-paperclip" style="color:#6ee7a0"></i>
          <p>{{ is_object($cvFile) ? $cvFile->getClientOriginalName() : 'File đã chọn' }}</p>
        </div>
        @error('cvFile')
          <div class="err" style="margin-top:5px">{{ $message }}</div>
        @else
          <div style="text-align:right;margin-top:10px">
            <button wire:click="uploadCv" class="btn-prim">
              <span wire:loading wire:target="uploadCv">Đang tải lên...</span>
              <span wire:loading.remove wire:target="uploadCv"><i class="fa-solid fa-upload"></i> Xác nhận tải lên</span>
            </button>
          </div>
        @enderror
      @endif

    </div>
</div>
</div>
</div>

@livewire('user.mentor-form')
</div>