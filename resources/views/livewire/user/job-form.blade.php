<div>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}

.jf-wrap{
  max-width:700px;margin:40px auto;padding:0 20px 60px;
  font-family:var(--font);
}

.jf-header{margin-bottom:28px}
.jf-title{font-size:22px;font-weight:800;color:#0f172a;letter-spacing:-.4px}
.jf-sub{font-size:13.5px;color:#64748b;margin-top:5px;line-height:1.5}

.jf-card{
  background:#fff;border:1px solid #e2e8f0;border-radius:14px;
  padding:28px;box-shadow:0 2px 12px rgba(0,0,0,.05);
}

/* Steps indicator */
.steps{display:flex;align-items:center;gap:0;margin-bottom:28px}
.step-item{display:flex;align-items:center;gap:8px;font-size:12.5px;font-weight:600}
.step-dot{width:26px;height:26px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;flex-shrink:0}
.step-dot.done{background:#16a34a;color:#fff}
.step-dot.active{background:#0f172a;color:#fff}
.step-dot.idle{background:#f1f5f9;color:#94a3b8;border:1.5px solid #e2e8f0}
.step-label.active{color:#0f172a}
.step-label.done{color:#16a34a}
.step-label.idle{color:#94a3b8}
.step-line{flex:1;height:2px;background:#e2e8f0;margin:0 8px;min-width:20px}
.step-line.done{background:#16a34a}

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
  display:flex;gap:8px;align-items:flex-start;margin-bottom:20px;
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

/* OTP verify step */
.otp-hero{text-align:center;padding:20px 0 28px}
.otp-icon{width:64px;height:64px;background:#f0fdf4;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:26px;color:#16a34a}
.otp-title{font-size:18px;font-weight:800;color:#0f172a;margin-bottom:6px}
.otp-desc{font-size:13px;color:#64748b;line-height:1.6;max-width:340px;margin:0 auto}
.otp-email-tag{display:inline-block;background:#f0fdf4;color:#16a34a;border:1px solid #bbf7d0;border-radius:6px;padding:2px 10px;font-weight:700;font-size:13px;margin-top:4px}

.otp-input-wrap{margin:24px 0 0}
.otp-input-wrap label{display:block;font-size:11.5px;font-weight:700;color:#475569;margin-bottom:6px;letter-spacing:.3px}
.otp-input{
  width:100%;padding:14px;
  border:2px solid #e2e8f0;border-radius:10px;
  font-size:22px;font-weight:800;letter-spacing:8px;
  text-align:center;font-family:'Courier New',monospace;
  color:#0f172a;outline:none;
  transition:border-color .15s,box-shadow .15s;
}
.otp-input:focus{border-color:#16a34a;box-shadow:0 0 0 3px rgba(22,163,74,.1)}
.otp-input.error{border-color:#dc2626;box-shadow:0 0 0 3px rgba(220,38,38,.08)}

.otp-error{
  background:#fef2f2;border:1px solid #fca5a5;border-radius:8px;
  padding:10px 14px;font-size:13px;color:#dc2626;
  display:flex;gap:8px;align-items:center;margin-top:12px;
}

.otp-actions{margin-top:10px;text-align:center}
.otp-actions a{font-size:12.5px;color:#16a34a;cursor:pointer;text-decoration:underline;background:none;border:none;font-family:inherit}
.otp-actions a:hover{color:#15803d}
.otp-actions .sep{color:#d1d5db;margin:0 6px}

.btn-back-link{
  display:inline-flex;align-items:center;gap:5px;
  font-size:12.5px;color:#64748b;background:none;border:none;
  cursor:pointer;font-family:inherit;padding:0;margin-bottom:16px;
}
.btn-back-link:hover{color:#374151}

/* success state */
.jf-success{text-align:center;padding:40px 16px}
.jf-success-icon{font-size:52px;color:#16a34a;margin-bottom:16px}
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
  .step-label{display:none}
}
</style>

<div class="jf-wrap">
  <div class="jf-header">
    <div class="jf-title">Đăng tin tuyển dụng</div>
    <div class="jf-sub">Điền thông tin và xác thực email — tin sẽ được admin duyệt trước khi hiển thị.</div>
  </div>

  {{-- Steps indicator --}}
  @if($step !== 'success')
  <div class="steps">
    <div class="step-item">
      <div class="step-dot {{ $step === 'form' ? 'active' : 'done' }}">
        @if($step === 'form') 1 @else <i class="fa-solid fa-check" style="font-size:10px"></i> @endif
      </div>
      <span class="step-label {{ $step === 'form' ? 'active' : 'done' }}">Thông tin</span>
    </div>
    <div class="step-line {{ $step !== 'form' ? 'done' : '' }}"></div>
    <div class="step-item">
      <div class="step-dot {{ $step === 'verify' ? 'active' : 'idle' }}">2</div>
      <span class="step-label {{ $step === 'verify' ? 'active' : 'idle' }}">Xác thực OTP</span>
    </div>
  </div>
  @endif

  {{-- ===== STEP: FORM ===== --}}
  @if($step === 'form')
  <div class="jf-card">
    <div class="jf-note">
      <i class="fa-solid fa-circle-info" style="margin-top:1px;flex-shrink:0"></i>
      <span>Tin sẽ ở trạng thái <strong>chờ duyệt</strong> cho đến khi admin phê duyệt. Sau khi gửi, hệ thống sẽ gửi mã OTP đến email liên hệ để xác thực.</span>
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
        <textarea wire:model="description" placeholder="Mô tả công việc, yêu cầu ứng viên, quyền lợi được hưởng..."></textarea>
        @error('description')<div class="err"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>@enderror
      </div>
    </div>

    <button class="btn-submit" wire:click="sendOtp" wire:loading.attr="disabled">
      <span wire:loading wire:target="sendOtp"><i class="fa-solid fa-spinner fa-spin"></i> Đang gửi OTP...</span>
      <span wire:loading.remove wire:target="sendOtp"><i class="fa-solid fa-envelope"></i> Tiếp theo — Xác thực email</span>
    </button>
  </div>
  @endif

  {{-- ===== STEP: VERIFY OTP ===== --}}
  @if($step === 'verify')
  <div class="jf-card">
    <button class="btn-back-link" wire:click="backToForm">
      <i class="fa-solid fa-arrow-left"></i> Quay lại chỉnh sửa
    </button>

    <div class="otp-hero">
      <div class="otp-icon"><i class="fa-solid fa-envelope-open-text"></i></div>
      <div class="otp-title">Kiểm tra hộp thư của bạn</div>
      <div class="otp-desc">
        Chúng tôi đã gửi mã OTP 6 chữ số đến
        <br><span class="otp-email-tag">{{ $contact_email }}</span>
      </div>
    </div>

    <div class="otp-input-wrap">
      <label>Nhập mã OTP</label>
      <input
        wire:model="otp_input"
        type="text"
        inputmode="numeric"
        maxlength="6"
        placeholder="• • • • • •"
        class="otp-input {{ $otp_error ? 'error' : '' }}"
        autocomplete="one-time-code"
        wire:keydown.enter="verifyOtp"
      >
    </div>

    @if($otp_error)
      <div class="otp-error">
        <i class="fa-solid fa-circle-xmark"></i>
        {{ $otp_error }}
      </div>
    @endif

    <button class="btn-submit" wire:click="verifyOtp" wire:loading.attr="disabled">
      <span wire:loading wire:target="verifyOtp"><i class="fa-solid fa-spinner fa-spin"></i> Đang xác thực...</span>
      <span wire:loading.remove wire:target="verifyOtp"><i class="fa-solid fa-check"></i> Xác nhận & Gửi tin</span>
    </button>

    <div class="otp-actions" style="margin-top:16px">
      <span style="font-size:12.5px;color:#94a3b8">Không nhận được mã?</span>
      <span class="sep">·</span>
      <button wire:click="resendOtp" wire:loading.attr="disabled" class="otp-actions a" style="font-size:12.5px;color:#16a34a;cursor:pointer;text-decoration:underline;background:none;border:none;font-family:inherit">
        <span wire:loading wire:target="resendOtp">Đang gửi lại...</span>
        <span wire:loading.remove wire:target="resendOtp">Gửi lại OTP</span>
      </button>
    </div>
    <div style="text-align:center;font-size:11.5px;color:#d1d5db;margin-top:8px">
      Mã hết hạn sau 10 phút
    </div>
  </div>
  @endif

  {{-- ===== STEP: SUCCESS ===== --}}
  @if($step === 'success')
  <div class="jf-card">
    <div class="jf-success">
      <div class="jf-success-icon"><i class="fa-solid fa-circle-check"></i></div>
      <h2>Gửi tin thành công!</h2>
      <p>Tin tuyển dụng đã được xác thực và gửi đến admin để xét duyệt. Sau khi được duyệt, tin sẽ tự động hiển thị trên trang tuyển dụng và mạng lưới cựu sinh viên.</p>
      <a href="{{ route('job') }}" class="btn-back">
        <i class="fa-solid fa-arrow-left"></i> Về trang tuyển dụng
      </a>
    </div>
  </div>
  @endif

</div>
</div>
