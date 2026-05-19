  <div>
    <style>
     @import url('https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;600&display=swap');

*,
*::before,
*::after{
  box-sizing:border-box;
  margin:0;
  padding:0;
}

/* ═══════════════════════════════════════
   COLOR SYSTEM - OCEAN BLUE
═══════════════════════════════════════ */
:root{
  --primary:#1a5c9a;
  --primary-hover:#2673bd;
  --primary-soft:#eef6ff;

  --bg:#f4f8fc;
  --card:#ffffff;

  --border:#cfe0f5;
  --border-focus:#7db3ea;

  --text:#18324d;
  --muted:#6f8aa6;

  --success:#4a90e2;
  --success-bg:#f5faff;

  --danger:#e74c3c;
  --danger-bg:#fff5f5;

  --shadow:0 10px 30px rgba(26,92,154,.08);
}

/* ═══════════════════════════════════════
   ANIMATION
═══════════════════════════════════════ */
@keyframes reg-fadeUp{
  from{
    opacity:0;
    transform:translateY(10px);
  }
  to{
    opacity:1;
    transform:translateY(0);
  }
}

@keyframes reg-spin{
  to{
    transform:rotate(360deg);
  }
}

/* ═══════════════════════════════════════
   PAGE
═══════════════════════════════════════ */
.register-page{
  min-height:100vh;
  background:var(--bg);
  display:flex;
  align-items:center;
  justify-content:center;
  padding:32px 16px;
  font-family:'Be Vietnam Pro',sans-serif;
  animation:reg-fadeUp .4s ease both;
}

/* ═══════════════════════════════════════
   CARD
═══════════════════════════════════════ */
.reg-card{
  width:100%;
  max-width:460px;
  background:var(--card);
  border-radius:18px;
  border:1px solid var(--border);
  padding:40px 36px;
  box-shadow:var(--shadow);
}

/* ═══════════════════════════════════════
   LOGO
═══════════════════════════════════════ */
.reg-logo{
  display:flex;
  align-items:center;
  gap:12px;
  margin-bottom:28px;
}

.reg-logo-icon{
  width:42px;
  height:42px;
  background:var(--primary-soft);
  border-radius:12px;
  display:flex;
  align-items:center;
  justify-content:center;
  font-size:18px;
  color:var(--primary);
  flex-shrink:0;
}

.reg-logo-text{
  font-size:15px;
  font-weight:700;
  color:var(--primary);
}

.reg-logo-sub{
  font-size:11px;
  color:var(--muted);
  margin-top:2px;
}

/* ═══════════════════════════════════════
   TITLE
═══════════════════════════════════════ */
.reg-title{
  font-size:24px;
  font-weight:700;
  color:var(--text);
  margin-bottom:6px;
}

.reg-desc{
  font-size:13px;
  color:var(--muted);
  margin-bottom:24px;
  line-height:1.6;
}

/* ═══════════════════════════════════════
   GRID ROW
═══════════════════════════════════════ */
.reg-row{
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:12px;
  margin-bottom:0;
}

/* ═══════════════════════════════════════
   FIELD
═══════════════════════════════════════ */
.reg-field{
  margin-bottom:14px;
}

.reg-label{
  display:block;
  font-size:12px;
  font-weight:600;
  color:#35506d;
  margin-bottom:6px;
  letter-spacing:.2px;
}

/* ═══════════════════════════════════════
   INPUT
═══════════════════════════════════════ */
.reg-input{
  width:100%;
  padding:11px 14px;
  border:1.5px solid var(--border);
  border-radius:10px;
  font-family:'Be Vietnam Pro',sans-serif;
  font-size:13px;
  color:var(--text);
  outline:none;
  transition:.18s ease;
  background:#fff;
}

.reg-input:focus{
  border-color:var(--primary);
  box-shadow:0 0 0 4px rgba(26,92,154,.10);
}

.reg-input::placeholder{
  color:#a8bfd8;
}

.reg-input.is-ok{
  border-color:var(--success);
  background:var(--success-bg);
}

.reg-input.is-error{
  border-color:var(--danger);
  background:var(--danger-bg);
}

/* ═══════════════════════════════════════
   SELECT
═══════════════════════════════════════ */
.reg-select{
  appearance:none;
  background-image:url("data:image/svg+xml,%3Csvg width='10' height='6' viewBox='0 0 10 6' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1l4 4 4-4' stroke='%236f8aa6' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
  background-repeat:no-repeat;
  background-position:right 12px center;
}

.reg-field-err{
  display:block;
  font-size:11px;
  color:var(--danger);
  margin-top:4px;
}

/* ═══════════════════════════════════════
   VERIFY BOX
═══════════════════════════════════════ */
.reg-verify-box{
  background:#f5faff;
  border:1.5px dashed #9ec3ea;
  border-radius:12px;
  padding:16px;
  margin-bottom:14px;
}

.reg-verify-title{
  font-size:12px;
  font-weight:700;
  color:var(--primary);
  letter-spacing:.3px;
  margin-bottom:6px;
  display:flex;
  align-items:center;
  gap:6px;
  flex-wrap:wrap;
}

.reg-verify-hint{
  font-size:11px;
  color:var(--muted);
  font-weight:400;
}

.reg-verify-desc{
  font-size:11px;
  color:var(--muted);
  margin-bottom:14px;
  line-height:1.55;
}

/* ═══════════════════════════════════════
   BADGE
═══════════════════════════════════════ */
.reg-badge{
  display:inline-flex;
  align-items:center;
  padding:2px 8px;
  border-radius:999px;
  font-size:10px;
  font-weight:700;
  transition:.2s;
}

.reg-badge.ok{
  background:#dbeeff;
  color:var(--primary);
}

.reg-badge.no{
  background:#fde8e8;
  color:var(--danger);
}

/* ═══════════════════════════════════════
   ERROR BOX
═══════════════════════════════════════ */
.reg-err-box{
  font-size:12px;
  color:var(--danger);
  background:#fff5f5;
  border-left:3px solid var(--danger);
  border-radius:6px;
  padding:10px 12px;
  margin-bottom:14px;
}

/* ═══════════════════════════════════════
   SUBMIT BUTTON
═══════════════════════════════════════ */
.reg-submit{
  width:100%;
  padding:12px;
  background:var(--primary);
  color:#fff;
  border:none;
  border-radius:10px;
  font-family:'Be Vietnam Pro',sans-serif;
  font-size:14px;
  font-weight:600;
  cursor:pointer;
  transition:.18s ease;
  display:flex;
  align-items:center;
  justify-content:center;
  min-height:46px;
}

.reg-submit:hover:not(:disabled){
  background:var(--primary-hover);
  transform:translateY(-1px);
  box-shadow:0 6px 16px rgba(26,92,154,.20);
}

.reg-submit:disabled{
  opacity:.65;
  cursor:default;
}

/* ═══════════════════════════════════════
   SPINNER
═══════════════════════════════════════ */
.reg-spinner{
  width:16px;
  height:16px;
  border:2px solid rgba(255,255,255,.3);
  border-top-color:#fff;
  border-radius:50%;
  animation:reg-spin .6s linear infinite;
  display:inline-block;
}

/* ═══════════════════════════════════════
   OR DIVIDER
═══════════════════════════════════════ */
.reg-or{
  display:flex;
  align-items:center;
  gap:10px;
  margin:16px 0;
}

.reg-or-line{
  flex:1;
  height:1px;
  background:#dbe7f3;
}

.reg-or-text{
  font-size:11px;
  color:#9bb3cc;
}

/* ═══════════════════════════════════════
   SSO BUTTON
═══════════════════════════════════════ */
.reg-sso{
  width:100%;
  padding:11px;
  border:1.5px solid var(--border);
  border-radius:10px;
  background:#f7fbff;
  font-family:'Be Vietnam Pro',sans-serif;
  font-size:13px;
  font-weight:600;
  color:var(--primary);
  cursor:pointer;
  transition:.18s ease;
  display:flex;
  align-items:center;
  justify-content:center;
  gap:8px;
  text-decoration:none;
}

.reg-sso:hover{
  border-color:var(--primary);
  background:var(--primary-soft);
}

/* ═══════════════════════════════════════
   LOGIN LINK
═══════════════════════════════════════ */
.reg-login-text{
  text-align:center;
  margin-top:16px;
  font-size:12px;
  color:var(--muted);
}

.reg-login-text a{
  color:var(--primary);
  font-weight:700;
  text-decoration:none;
}

.reg-login-text a:hover{
  text-decoration:underline;
}
@media (max-width:600px){

  .register-page{
    padding:20px 12px;
    align-items:flex-start;
  }

  .reg-card{
    padding:28px 20px;
    border-radius:14px;
  }

  .reg-row{
    grid-template-columns:1fr;
    gap:0;
  }

  .reg-title{
    font-size:21px;
  }

  .reg-verify-box{
    padding:14px 12px;
  }
}

/* SMALL MOBILE */
@media (max-width:400px){

  .reg-card{
    padding:24px 16px;
  }

  .reg-logo-text{
    font-size:13px;
  }

  .reg-submit,
  .reg-sso{
    font-size:13px;
  }
}

/* FULLSCREEN MOBILE */
@media (max-width:600px){

  .register-page{
    padding:0 !important;
    background:#fff !important;
    align-items:stretch !important;
    justify-content:flex-start !important;
  }

  .reg-card{
    border-radius:0 !important;
    border:none !important;
    min-height:100vh !important;
    max-width:100% !important;
    padding:28px 20px !important;
    box-shadow:none !important;
  }
}
  </style>
  <div>
      <div class="register-page">
      <div class="reg-card">
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
