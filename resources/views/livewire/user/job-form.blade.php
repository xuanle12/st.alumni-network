<div>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}

.jf-wrap{
  max-width:700px;margin:40px auto;padding:0 20px 60px;
  font-family:'Barlow',system-ui,sans-serif;
}

.jf-header{margin-bottom:28px}
.jf-title{font-size:22px;font-weight:800;color:#0f172a;letter-spacing:-.4px}
.jf-sub{font-size:13.5px;color:#64748b;margin-top:5px;line-height:1.5}

.jf-card{
  background:#fff;border:1px solid #e2e8f0;border-radius:14px;
  padding:28px;box-shadow:0 2px 12px rgba(0,0,0,.05);
}

.jf-section{
  font-size:11px;font-weight:700;color:#94a3b8;
  text-transform:uppercase;letter-spacing:.6px;
  margin:20px 0 12px;padding-bottom:6px;
  border-bottom:1px solid #f1f5f9;
}
.jf-section:first-child{margin-top:0}

.fg{display:grid;grid-template-columns:1fr 1fr;gap:14px}
.fi{display:flex;flex-direction:column;gap:5px}
.fi.full{grid-column:1/-1}

.fi label{font-size:11.5px;font-weight:700;color:#475569;letter-spacing:.3px}
.fi label span{color:#ef4444;margin-left:2px}

.fi input,.fi select,.fi textarea{
  padding:9px 12px;
  border:1.5px solid #e2e8f0;border-radius:9px;
  font-size:13.5px;color:#0f172a;
  font-family:inherit;width:100%;
  transition:border-color .15s,box-shadow .15s;
  background:#fff;
}
.fi input:focus,.fi select:focus,.fi textarea:focus{
  outline:none;border-color:#16a34a;
  box-shadow:0 0 0 3px rgba(22,163,74,.1);
}
.fi textarea{resize:vertical;min-height:100px;line-height:1.6}

.fi .err{font-size:11.5px;color:#dc2626;margin-top:3px;display:flex;align-items:center;gap:4px}

.jf-note{
  background:#f0fdf4;border:1px solid #bbf7d0;border-radius:9px;
  padding:10px 14px;font-size:12.5px;color:#166534;
  display:flex;gap:8px;align-items:flex-start;margin-top:6px;
}

.btn-submit{
  width:100%;padding:12px;margin-top:20px;
  background:#16a34a;color:#fff;border:none;
  border-radius:10px;font-size:14px;font-weight:700;
  cursor:pointer;font-family:inherit;
  transition:background .15s,transform .1s;
  display:flex;align-items:center;justify-content:center;gap:8px;
}
.btn-submit:hover{background:#15803d}
.btn-submit:active{transform:scale(.99)}
.btn-submit:disabled{background:#86efac;cursor:not-allowed}

/* success state */
.jf-success{
  text-align:center;padding:50px 20px;
}
.jf-success-icon{
  font-size:52px;color:#16a34a;margin-bottom:16px;
}
.jf-success h2{font-size:20px;font-weight:800;color:#0f172a;margin-bottom:8px}
.jf-success p{font-size:13.5px;color:#64748b;line-height:1.6;max-width:360px;margin:0 auto 20px}
.btn-back{
  display:inline-flex;align-items:center;gap:6px;
  padding:10px 22px;border-radius:10px;
  background:#f1f5f9;color:#374151;border:none;
  font-size:13.5px;font-weight:600;cursor:pointer;
  font-family:inherit;text-decoration:none;
  transition:background .15s;
}
.btn-back:hover{background:#e2e8f0}

@media(max-width:600px){
  .fg{grid-template-columns:1fr}
  .fi.full{grid-column:1}
  .jf-card{padding:20px}
}
</style>

<div class="jf-wrap">
  <div class="jf-header">
    <div class="jf-title">Đăng tin tuyển dụng</div>
    <div class="jf-sub">Điền thông tin bên dưới. Admin sẽ xem xét và duyệt tin trong thời gian sớm nhất.</div>
  </div>

  @if($submitted)
    <div class="jf-card">
      <div class="jf-success">
        <div class="jf-success-icon"><i class="fa-solid fa-circle-check"></i></div>
        <h2>Gửi tin thành công!</h2>
        <p>Tin tuyển dụng đã được gửi đến admin để xét duyệt. Sau khi được duyệt, tin sẽ tự động hiển thị trên trang tuyển dụng và mạng lưới cựu sinh viên.</p>
        <a href="{{ route('job') }}" class="btn-back">
          <i class="fa-solid fa-arrow-left"></i> Về trang tuyển dụng
        </a>
      </div>
    </div>
  @else
    <div class="jf-card">
      <div class="jf-note">
        <i class="fa-solid fa-circle-info" style="margin-top:1px;flex-shrink:0"></i>
        <span>Tin tuyển dụng sẽ ở trạng thái <strong>chờ duyệt</strong> cho đến khi admin phê duyệt. Bạn sẽ được thông báo qua email khi tin được duyệt.</span>
      </div>

      <div class="jf-section">Thông tin vị trí</div>
      <div class="fg">
        <div class="fi full">
          <label>Tiêu đề vị trí<span>*</span></label>
          <input wire:model="title" type="text" placeholder="VD: Lập trình viên Backend PHP, Kế toán trưởng...">
          @error('title')<div class="err"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>@enderror
        </div>
        <div class="fi">
          <label>Tên công ty<span>*</span></label>
          <input wire:model="company" type="text" placeholder="Tên doanh nghiệp của bạn">
          @error('company')<div class="err"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>@enderror
        </div>
        <div class="fi">
          <label>Email liên hệ<span>*</span></label>
          <input wire:model="contact_email" type="email" placeholder="hr@congty.com">
          @error('contact_email')<div class="err"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>@enderror
        </div>
        <div class="fi">
          <label>Địa điểm làm việc</label>
          <input wire:model="location" type="text" placeholder="VD: Hà Nội, TP.HCM, Remote...">
        </div>
        <div class="fi">
          <label>Hình thức làm việc</label>
          <select wire:model="f_type">
            <option value="full-time">Toàn thời gian (Full-time)</option>
            <option value="part-time">Bán thời gian (Part-time)</option>
            <option value="internship">Thực tập</option>
            <option value="remote">Remote</option>
          </select>
        </div>
        <div class="fi">
          <label>Ngành nghề / Lĩnh vực</label>
          <input wire:model="field" type="text" placeholder="VD: Công nghệ thông tin, Tài chính...">
        </div>
      </div>

      <div class="jf-section">Mức lương & Yêu cầu</div>
      <div class="fg">
        <div class="fi">
          <label>Lương tối thiểu (triệu VND)</label>
          <input wire:model="min_salary" type="number" min="0" placeholder="VD: 10">
          @error('min_salary')<div class="err"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>@enderror
        </div>
        <div class="fi">
          <label>Lương tối đa (triệu VND)</label>
          <input wire:model="max_salary" type="number" min="0" placeholder="VD: 25">
          @error('max_salary')<div class="err"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>@enderror
        </div>
        <div class="fi">
          <label>Kinh nghiệm yêu cầu (năm)</label>
          <input wire:model="experience_required" type="number" min="0" placeholder="0 = không yêu cầu">
          @error('experience_required')<div class="err"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>@enderror
        </div>
        <div class="fi">
          <label>Hạn nộp hồ sơ</label>
          <input wire:model="deadline" type="date" min="{{ date('Y-m-d', strtotime('+1 day')) }}">
          @error('deadline')<div class="err"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>@enderror
        </div>
      </div>

      <div class="jf-section">Mô tả công việc</div>
      <div class="fg">
        <div class="fi full">
          <label>Mô tả chi tiết</label>
          <textarea wire:model="description" placeholder="Mô tả công việc, yêu cầu ứng viên, quyền lợi được hưởng..."></textarea>
          @error('description')<div class="err"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>@enderror
        </div>
      </div>

      <button class="btn-submit" wire:click="submit" wire:loading.attr="disabled">
        <span wire:loading wire:target="submit"><i class="fa-solid fa-spinner fa-spin"></i> Đang gửi...</span>
        <span wire:loading.remove wire:target="submit"><i class="fa-solid fa-paper-plane"></i> Gửi tin tuyển dụng</span>
      </button>
    </div>
  @endif
</div>
</div>
