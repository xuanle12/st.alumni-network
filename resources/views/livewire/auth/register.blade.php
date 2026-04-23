<div>
   <style>
    @import url('https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;600&display=swap');

/* ── Reset ───────────────────────────────────────────── */
*, *::before, *::after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

/* ── Animations ──────────────────────────────────────── */
@keyframes reg-fadeUp {
  from { opacity: 0; transform: translateY(10px); }
  to   { opacity: 1; transform: translateY(0); }
}

@keyframes reg-spin {
  to { transform: rotate(360deg); }
}

/* ── Page ─────────────────────────────────────────────── */
.register-page {
  min-height: 100vh;
  background: #f7faf7;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 32px 16px;
  font-family: 'Be Vietnam Pro', sans-serif;
  animation: reg-fadeUp .4s ease both;
}

/* ── Card ─────────────────────────────────────────────── */
.reg-card {
  width: 100%;
  max-width: 460px;
  background: #fff;
  border-radius: 16px;
  border: 1px solid #d4e8d4;
  padding: 40px 36px;
}

/* ── Logo ─────────────────────────────────────────────── */
.reg-logo {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 28px;
}

.reg-logo-icon {
  width: 36px;
  height: 36px;
  background: #e8f5e9;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 18px;
  flex-shrink: 0;
}

.reg-logo-text {
  font-size: 14px;
  font-weight: 600;
  color: #1e5c2a;
}

.reg-logo-sub {
  font-size: 11px;
  color: #7aaa7e;
  margin-top: 1px;
}

/* ── Heading ──────────────────────────────────────────── */
.reg-title {
  font-size: 22px;
  font-weight: 600;
  color: #1a2e1a;
  margin-bottom: 6px;
}

.reg-desc {
  font-size: 13px;
  color: #7a9c7e;
  margin-bottom: 24px;
  line-height: 1.6;
}

/* ── Grid row ─────────────────────────────────────────── */
.reg-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 12px;
  margin-bottom: 0;
}

/* ── Field ────────────────────────────────────────────── */
.reg-field {
  margin-bottom: 14px;
}

.reg-label {
  display: block;
  font-size: 12px;
  font-weight: 500;
  color: #3d5e3d;
  margin-bottom: 6px;
  letter-spacing: .2px;
}

/* ── Input ────────────────────────────────────────────── */
.reg-input {
  width: 100%;
  padding: 10px 14px;
  border: 1.5px solid #d4e8d4;
  border-radius: 8px;
  font-family: 'Be Vietnam Pro', sans-serif;
  font-size: 13px;
  color: #1a2e1a;
  outline: none;
  transition: border-color .15s, box-shadow .15s, background .15s;
  background: #fff;
}

.reg-input:focus {
  border-color: #2d6a35;
  box-shadow: 0 0 0 3px rgba(45,106,53,.08);
}

.reg-input::placeholder {
  color: #b8d4b8;
}

.reg-input.is-ok {
  border-color: #4caf50;
  background: #f7fff7;
}

.reg-input.is-error {
  border-color: #e74c3c;
  background: #fff5f5;
}

.reg-select {
  appearance: none;
  background-image: url("data:image/svg+xml,%3Csvg width='10' height='6' viewBox='0 0 10 6' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1l4 4 4-4' stroke='%237aaa7e' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 12px center;
}

.reg-field-err {
  display: block;
  font-size: 11px;
  color: #c0392b;
  margin-top: 4px;
}

/* ── Verify box ───────────────────────────────────────── */
.reg-verify-box {
  background: #f4fbf4;
  border: 1.5px dashed #a8d4a8;
  border-radius: 10px;
  padding: 16px;
  margin-bottom: 14px;
}

.reg-verify-title {
  font-size: 12px;
  font-weight: 600;
  color: #2d6a35;
  letter-spacing: .3px;
  margin-bottom: 6px;
  display: flex;
  align-items: center;
  gap: 6px;
  flex-wrap: wrap;
}

.reg-verify-hint {
  font-size: 11px;
  color: #7aaa7e;
  font-weight: 400;
}

.reg-verify-desc {
  font-size: 11px;
  color: #7aaa7e;
  margin-bottom: 14px;
  line-height: 1.55;
}

/* ── Badge ────────────────────────────────────────────── */
.reg-badge {
  display: inline-flex;
  align-items: center;
  padding: 2px 8px;
  border-radius: 99px;
  font-size: 10px;
  font-weight: 600;
  transition: .2s;
}

.reg-badge.ok {
  background: #d4edda;
  color: #1e5c2a;
}

.reg-badge.no {
  background: #fde8e8;
  color: #c0392b;
}

/* ── Error box ────────────────────────────────────────── */
.reg-err-box {
  font-size: 12px;
  color: #c0392b;
  background: #fff5f5;
  border-left: 3px solid #e74c3c;
  border-radius: 6px;
  padding: 10px 12px;
  margin-bottom: 14px;
}

/* ── Submit ───────────────────────────────────────────── */
.reg-submit {
  width: 100%;
  padding: 12px;
  background: #1e5c2a;
  color: #fff;
  border: none;
  border-radius: 8px;
  font-family: 'Be Vietnam Pro', sans-serif;
  font-size: 14px;
  font-weight: 500;
  cursor: pointer;
  transition: all .15s;
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 44px;
}

.reg-submit:hover:not(:disabled) {
  background: #2d7a38;
  transform: translateY(-1px);
  box-shadow: 0 4px 12px rgba(30,92,42,.2);
}

.reg-submit:disabled {
  opacity: .65;
  cursor: default;
}

/* ── Spinner ──────────────────────────────────────────── */
.reg-spinner {
  width: 16px;
  height: 16px;
  border: 2px solid rgba(255,255,255,.3);
  border-top-color: #fff;
  border-radius: 50%;
  animation: reg-spin .6s linear infinite;
  display: inline-block;
}

/* ── Or divider ───────────────────────────────────────── */
.reg-or {
  display: flex;
  align-items: center;
  gap: 10px;
  margin: 16px 0;
}

.reg-or-line {
  flex: 1;
  height: 1px;
  background: #e8f0e8;
}

.reg-or-text {
  font-size: 11px;
  color: #aac4aa;
}

/* ── SSO button ───────────────────────────────────────── */
.reg-sso {
  width: 100%;
  padding: 10px;
  border: 1.5px solid #d4e8d4;
  border-radius: 8px;
  background: #f7faf7;
  font-family: 'Be Vietnam Pro', sans-serif;
  font-size: 13px;
  font-weight: 500;
  color: #2d6a35;
  cursor: pointer;
  transition: all .15s;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  text-decoration: none;
}

.reg-sso:hover {
  border-color: #2d6a35;
  background: #f0f8f0;
}

/* ── Login link ───────────────────────────────────────── */
.reg-login-text {
  text-align: center;
  margin-top: 16px;
  font-size: 12px;
  color: #7a9c7e;
}

.reg-login-text a {
  color: #1e5c2a;
  font-weight: 600;
  text-decoration: none;
}

.reg-login-text a:hover {
  text-decoration: underline;
}

/* ══════════════════════════════════════════════════════
   RESPONSIVE
   ══════════════════════════════════════════════════════ */

/* ── Tablet (≤ 600px): stack 2-col rows thành 1 col ── */
@media (max-width: 600px) {
  .register-page {
    padding: 20px 12px;
    align-items: flex-start;
  }

  .reg-card {
    padding: 28px 20px;
    border-radius: 12px;
  }

  .reg-row {
    grid-template-columns: 1fr;
    gap: 0;
  }

  .reg-title {
    font-size: 20px;
  }

  .reg-verify-box {
    padding: 14px 12px;
  }
}

/* ── Mobile nhỏ (≤ 400px) ── */
@media (max-width: 400px) {
  .reg-card {
    padding: 24px 16px;
  }

  .reg-logo-text {
    font-size: 13px;
  }

  .reg-submit,
  .reg-sso {
    font-size: 13px;
  }
  @media (max-width: 600px) {
  .register-page {
    padding: 0 !important;
    background: #fff !important;
    align-items: stretch !important;
    justify-content: flex-start !important;
  }

  .reg-card {
    border-radius: 0 !important;
    border: none !important;
    min-height: 100vh !important;
    max-width: 100% !important;
    padding: 28px 20px !important;
  }
}
  }
</style>
<div>
    <div class="register-page">

    {{-- Card --}}
    <div class="reg-card">

        {{-- Logo --}}
        <div class="reg-logo">
            <div class="reg-logo-icon"><i class="fa-solid fa-graduation-cap"></i></div>
            <div>
                <div class="reg-logo-text">Alumni HVNNA</div>
                <div class="reg-logo-sub">Mạng lưới cựu sinh viên</div>
            </div>
        </div>

        <h2 class="reg-title">Tạo tài khoản</h2>
        <p class="reg-desc">Điền thông tin bên dưới để đăng ký.</p>

        
        <div class="reg-row">
            <div class="reg-field">
                <label class="reg-label">Họ và tên đệm</label>
                <input class="reg-input
                 @error('ho') is-error @enderror"
                    wire:model.live="ho" type="text" placeholder="Nguyễn Văn"/>
                @error('ho')<span class="reg-field-err">{{ $message }}</span>@enderror
            </div>
            <div class="reg-field">
                <label class="reg-label">Tên</label>
                <input class="reg-input @error('ten') is-error @enderror"
                    wire:model.live="ten" type="text" placeholder="An"/>
                @error('ten')<span class="reg-field-err">{{ $message }}</span>@enderror
            </div>
        </div>

        
        <div class="reg-field">
            <label class="reg-label">Email</label>
            <input class="reg-input @error('email') is-error @enderror"
                wire:model.live="email" type="email" placeholder="ten@gmail.com"/>
            @error('email')<span class="reg-field-err">{{ $message }}</span>@enderror
        </div>

       
        <div class="reg-row">
            <div class="reg-field">
                <label class="reg-label">Mật khẩu</label>
                <input class="reg-input @error('password') is-error @enderror"
                    wire:model.live="password" type="password" placeholder="••••••••"/>
                @error('password') <span class="reg-field-err">{{$message }}</span> @enderror
            </div>
            <div class="reg-field">
                <label class="reg-label">Xác nhận mật khẩu</label>
                <input class="reg-input"
                    wire:model.live="password_confirmation" type="password" placeholder="••••••••"/>
            </div>
        </div>

        
        <div class="reg-verify-box">
            <div class="reg-verify-title">
                Xác minh cựu sinh viên
                {{--<span class="reg-badge {{ $this->verifyCount() >= 2 ? 'ok' : 'no' }}">
                    {{ $this->verifyCount() }} / 5
                </span>--}}
                <span class="reg-verify-hint">— cần ít nhất 2</span>
            </div>
            <p class="reg-verify-desc">
                Điền ít nhất 2 trong 5 thông tin để xác minh bạn là cựu sinh viên HVNNA.
            </p>

            <div class="reg-row">
                <div class="reg-field">
                    <label class="reg-label">Họ tên đầy đủ</label>
                    {{--<input class="reg-input {{ trim() ? 'is-ok' : '' }}"
                        wire:model.live="v_hoten" type="text" placeholder="Nguyễn Văn An"/>--}}
                </div>
                <div class="reg-field">
                    <label class="reg-label">Mã sinh viên</label>
                    {{--<input class="reg-input {{ trim() ? 'is-ok' : '' }}"
                        wire:model.live="v_masv" type="text" placeholder="672064"/>--}}
                </div>
            </div>

            <div class="reg-row">
                <div class="reg-field">
                    <label class="reg-label">Lớp</label>
                   {{--<input class="reg-input {{ trim() ? 'is-ok' : '' }}"
                        wire:model.live="v_lop" type="text" placeholder="CNTT-K67"/>--}}
                </div>
                <div class="reg-field">
                    <label class="reg-label">Năm tốt nghiệp</label>
                    {{--<input class="reg-input {{ trim() ? 'is-ok' : '' }}"
                        wire:model.live="v_namtn" type="text" placeholder="2025"/>--}}
                </div>
            </div>

            <div class="reg-field">
                <label class="reg-label">Ngành học</label>
                {{--<select class="reg-input reg-select {{  ? 'is-ok' : '' }}"
                    wire:model.live="v_nganh">
                    <option value="">-- Chọn ngành --</option>
                    <option>Công nghệ Thông tin</option>
                    <option>Khoa học Máy tính</option>
                    <option>Quản trị Kinh doanh</option>
                    <option>Nông nghiệp</option>
                    <option>Kinh tế</option>
                </select>--}}
            </div>
        </div>

        
        @error('verify')
            <div class="reg-err-box">{{$message}}</div>
        @enderror

        
        <button class="reg-submit" wire:click="register" wire:loading.attr="disabled" wire:target="register">
          <span wire:loading.remove wire:target="register">Đăng ký</span>
          <span wire:loading wire:target="register" class="reg-spinner"></span>
        </button>
        
        <div class="reg-or">
            <div class="reg-or-line"></div>
            <span class="reg-or-text">hoặc</span>
            <div class="reg-or-line"></div>
        </div>

        
        <a href="#" class="reg-sso">
            <i class="fa-solid fa-lock"></i> Đăng ký bằng SSO
        </a>

        <p class="reg-login-text">
            Đã có tài khoản?
            <a href="{{route('login')  }}">Đăng nhập</a>
        </p>

    </div>

</div>
</div>
</div>
