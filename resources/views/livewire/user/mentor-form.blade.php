<div>
    <div>
<style>
.mr-overlay{
  position:fixed;inset:0;background:rgba(15,23,42,.55);
  display:flex;align-items:center;justify-content:center;
  z-index:300;padding:1rem;
}
.mr-modal{
  background:#fff;border-radius:16px;
  width:100%;max-width:560px;max-height:90vh;
  overflow-y:auto;
  box-shadow:0 12px 40px rgba(0,0,0,.18);
  font-family:'Barlow',system-ui,sans-serif;
}
.mr-hd{
  display:flex;align-items:center;justify-content:space-between;
  padding:1.25rem 1.5rem;border-bottom:1px solid #f0f4f8;
  position:sticky;top:0;background:#fff;border-radius:16px 16px 0 0;
}
.mr-hd-left{display:flex;align-items:center;gap:10px}
.mr-hd-icon{
  width:36px;height:36px;border-radius:10px;
  background:#dcfce7;color:#15803d;
  display:flex;align-items:center;justify-content:center;font-size:16px;
}
.mr-title{font-size:15px;font-weight:700;color:#111827}
.mr-sub{font-size:12px;color:#6b7280;margin-top:1px}
.mr-close{
  width:32px;height:32px;border-radius:8px;border:none;background:transparent;
  color:#9ca3af;font-size:15px;cursor:pointer;transition:.15s;
  display:flex;align-items:center;justify-content:center;
}
.mr-close:hover{background:#f3f4f6;color:#374151}

.mr-body{padding:1.5rem}
.mr-status{
  display:flex;align-items:center;gap:10px;
  padding:12px 14px;border-radius:10px;margin-bottom:1.25rem;
  font-size:13px;font-weight:500;
}
.mr-status.pending{background:#fef9c3;color:#854d0e;border:1px solid #fde68a}
.mr-status.approved{background:#dcfce7;color:#15803d;border:1px solid #bbf7d0}
.mr-status.rejected{background:#fee2e2;color:#dc2626;border:1px solid #fecaca}

.mr-form{display:flex;flex-direction:column;gap:14px}
.mr-fi{display:flex;flex-direction:column;gap:5px}
.mr-fi label{font-size:12px;font-weight:600;color:#374151}
.mr-fi label .req{color:#dc2626}
.mr-fi input,.mr-fi textarea{
  padding:10px 13px;border:1px solid #d1d5db;border-radius:9px;
  font-size:13px;color:#111827;font-family:inherit;
  transition:border-color .15s;
}
.mr-fi input:focus,.mr-fi textarea:focus{
  outline:none;border-color:#16a34a;
  box-shadow:0 0 0 3px rgba(22,163,74,.1);
}
.mr-fi textarea{resize:vertical;min-height:80px}
.mr-fi .hint{font-size:11px;color:#9ca3af}
.mr-fi .err{font-size:11px;color:#dc2626}

.mr-row2{display:grid;grid-template-columns:1fr 1fr;gap:14px}

.mr-foot{
  display:flex;justify-content:flex-end;gap:8px;
  margin-top:1.5rem;padding-top:1.25rem;border-top:1px solid #f0f4f8;
}
.mr-btn-ghost{
  display:inline-flex;align-items:center;gap:5px;
  padding:9px 18px;border-radius:9px;
  font-size:13px;font-weight:600;cursor:pointer;
  border:1px solid transparent;background:transparent;color:#6b7280;
  transition:all .15s;font-family:inherit;
}
.mr-btn-ghost:hover{background:#f3f4f6;color:#111}
.mr-btn-prim{
  display:inline-flex;align-items:center;gap:5px;
  padding:9px 22px;border-radius:9px;
  font-size:13px;font-weight:600;cursor:pointer;
  border:1px solid #16a34a;background:#16a34a;color:#fff;
  transition:all .15s;font-family:inherit;
}
.mr-btn-prim:hover{background:#22c55e}

@media(max-width:640px){
  .mr-row2{grid-template-columns:1fr}
}
</style>

@if($showModal)
  <div class="mr-overlay" wire:click.self="close">
    <div class="mr-modal">

      <div class="mr-hd">
        <div class="mr-hd-left">
          <div class="mr-hd-icon"><i class="fa-solid fa-user-tie"></i></div>
          <div>
            <div class="mr-title">Đăng ký làm Mentor</div>
            <div class="mr-sub">Chia sẻ kinh nghiệm, hỗ trợ sinh viên và cựu sinh viên khác</div>
          </div>
        </div>
        <button type="button" class="mr-close" wire:click="close">
          <i class="fa-solid fa-xmark"></i>
        </button>
      </div>

      <div class="mr-body">

        @if($mentorProfile)
          @php
            $sc = match($mentorProfile->status) {
              'approved' => 'approved',
              'rejected' => 'rejected',
              default => 'pending',
            };
            $si = match($mentorProfile->status) {
              'approved' => 'fa-circle-check',
              'rejected' => 'fa-circle-xmark',
              default => 'fa-clock',
            };
          @endphp
          <div class="mr-status {{ $sc }}">
            <i class="fa-solid {{ $si }}"></i>
            <span>
              Trạng thái hiện tại: <strong>{{ $mentorProfile->status_label }}</strong>
              @if($mentorProfile->status === 'rejected' && $mentorProfile->admin_note)
                — {{ $mentorProfile->admin_note }}
              @endif
              . Bạn có thể cập nhật và gửi lại thông tin bên dưới.
            </span>
          </div>
        @endif

        <form wire:submit.prevent="submit" class="mr-form">

          <div class="mr-fi">
            <label>Lĩnh vực chuyên môn <span class="req">*</span></label>
            <input type="text" wire:model="expertise" placeholder="VD: Lập trình Web, Backend Laravel, Data Analyst...">
            <div class="hint">Lĩnh vực bạn có thể tư vấn / hướng dẫn cho mentee</div>
            @error('expertise')<div class="err">{{ $message }}</div>@enderror
          </div>

          <div class="mr-fi">
            <label>Kỹ năng có thể hướng dẫn <span class="req">*</span></label>
            <textarea wire:model="skills" placeholder="VD: PHP, Laravel, MySQL, Git, Quản lý dự án..."></textarea>
            <div class="hint">Liệt kê các kỹ năng, ngăn cách bằng dấu phẩy</div>
            @error('skills')<div class="err">{{ $message }}</div>@enderror
          </div>

          <div class="mr-fi">
            <label>Giới thiệu bản thân</label>
            <textarea wire:model="bio" placeholder="Vài dòng giới thiệu về kinh nghiệm, quá trình làm việc của bạn..."></textarea>
            @error('bio')<div class="err">{{ $message }}</div>@enderror
          </div>

          <div class="mr-row2">
            <div class="mr-fi">
              <label>Thông tin liên hệ</label>
              <input type="text" wire:model="contact_info" placeholder="Email / SĐT / Zalo...">
              @error('contact_info')<div class="err">{{ $message }}</div>@enderror
            </div>
            <div class="mr-fi">
              <label>Số sinh viên tối đa <span class="req">*</span></label>
              <input type="number" wire:model="max_mentee" min="1" max="20">
              @error('max_mentee')<div class="err">{{ $message }}</div>@enderror
            </div>
          </div>

          <div class="mr-foot">
            <button type="button" wire:click="close" class="mr-btn-ghost">Huỷ</button>
            <button type="submit" class="mr-btn-prim">
              <span wire:loading.remove wire:target="submit"><i class="fa-solid fa-paper-plane"></i> Gửi đăng ký</span>
              <span wire:loading wire:target="submit">Đang gửi...</span>
            </button>
          </div>

        </form>

      </div>

    </div>
  </div>
@endif
</div>
</div>
