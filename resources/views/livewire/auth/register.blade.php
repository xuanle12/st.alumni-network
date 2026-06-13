<div>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}
@keyframes reg-fadeUp{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:translateY(0)}}
@keyframes reg-spin{to{transform:rotate(360deg)}}

:root{
  --primary:#16a34a;
  --primary-hover:#22c55e;
  --primary-soft:#e8f0fe;
  --bg:#f1f5f9;
  --card:#ffffff;
  --border:#e2e8f0;
  --border-focus:#16a34a;
  --text:#0f172a;
  --muted:#64748b;
  --danger:#dc2626;
  --danger-bg:#fef2f2;
  --success:#16a34a;
  --success-bg:#f0fdf4;
  --shadow:0 10px 40px rgba(15,23,42,.08);
}

body{font-family:'Barlow',system-ui,sans-serif;}

.register-page{
  min-height:100vh;
  background:var(--bg);
  display:flex;
  align-items:center;
  justify-content:center;
  padding:32px 16px;
  animation:reg-fadeUp .4s ease both;
}

 .reg-card{
  width:100%;max-width:460px;
  background:var(--card);
  border-radius:16px;
  border:1px solid var(--border);
  padding:40px 36px;
  box-shadow:var(--shadow);
  position:relative;
}

/* ── HEADER ── */
.reg-back{position:absolute;top:16px;left:16px;}
.reg-back a{
  display:flex;align-items:center;justify-content:center;
  width:32px;height:32px;
  border-radius:8px;border:1px solid var(--border);
  color:#64748b;text-decoration:none;
  font-size:14px;transition:.15s;background:#fff;
}
.reg-back a:hover{background:#f8fafc;color:#0f172a;}

.reg-head{text-align:center;margin-bottom:24px;}
.reg-logos{
  display:flex;align-items:center;justify-content:center;
  gap:20px;margin-bottom:14px;
}
.reg-logos img{width:60px;height:60px;object-fit:contain;border-radius:8px;}
.reg-head-title{
  font-size:16px;font-weight:800;
  text-transform:uppercase;letter-spacing:.5px;
  color:#0f172a;line-height:1.25;margin-bottom:3px;
}
.reg-head-sub{
  font-size:12.5px;font-weight:500;
  color:#64748b;text-transform:uppercase;letter-spacing:.3px;
}

 .reg-title{font-size:18px;font-weight:700;color:var(--text);margin-bottom:4px;}
.reg-desc{font-size:13px;color:var(--muted);margin-bottom:20px;line-height:1.6;}

 .reg-row{display:grid;grid-template-columns:1fr 1fr;gap:12px;}

 .reg-field{margin-bottom:14px;}
.reg-label{
  display:block;font-size:12.5px;font-weight:600;
  color:#374151;margin-bottom:6px;letter-spacing:.2px;
}

 .reg-input{
  width:100%;padding:11px 14px;
  border:1.5px solid var(--border);border-radius:10px;
  font-family:'Barlow',system-ui,sans-serif;
  font-size:14px;color:var(--text);
  outline:none;transition:.15s;background:#fff;
}
.reg-input:focus{
  border-color:var(--primary);
  box-shadow:0 0 0 3px rgba(9,97,170,.1);
}
.reg-input::placeholder{color:#94a3b8;}
.reg-input.is-ok{border-color:#16a34a;background:var(--success-bg);}
.reg-input.is-error{border-color:var(--danger);background:var(--danger-bg);}

 .reg-select{
  appearance:none;
  background-image:url("data:image/svg+xml,%3Csvg width='10' height='6' viewBox='0 0 10 6' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1l4 4 4-4' stroke='%2364748b' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
  background-repeat:no-repeat;background-position:right 12px center;
}

.reg-field-err{display:block;font-size:11.5px;color:var(--danger);margin-top:4px;}


.reg-verify-box{
  background:#f0faf5;
  border:1.5px dashed #abc5ea;
  border-radius:12px;padding:16px;margin-bottom:14px;
}
.reg-verify-title{
  font-size:12.5px;font-weight:700;color:var(--primary);
  letter-spacing:.3px;margin-bottom:6px;
  display:flex;align-items:center;gap:6px;flex-wrap:wrap;
}
.reg-verify-hint{font-size:11px;color:var(--muted);font-weight:400;}
.reg-verify-desc{font-size:11.5px;color:var(--muted);margin-bottom:14px;line-height:1.55;}

 .reg-badge{
  display:inline-flex;align-items:center;
  padding:2px 8px;border-radius:999px;
  font-size:10px;font-weight:700;transition:.2s;
}
.reg-badge.ok{background:#dbeffe;color:var(--primary);}
.reg-badge.no{background:#fee2e2;color:var(--danger);}

 .reg-err-box{
  font-size:12.5px;color:var(--danger);
  background:#fef2f2;border-left:3px solid var(--danger);
  border-radius:6px;padding:10px 12px;margin-bottom:14px;
}

 .reg-submit{
  width:100%;padding:13px;
  background:var(--primary);color:#fff;
  border:none;border-radius:10px;
  font-family:'Barlow',system-ui,sans-serif;
  font-size:15px;font-weight:700;
  cursor:pointer;transition:.18s;
  display:flex;align-items:center;justify-content:center;
  min-height:48px;gap:8px;
  box-shadow:0 2px 12px rgba(9,97,170,.25);
}
.reg-submit:hover:not(:disabled){
  background:var(--primary-hover);
  transform:translateY(-1px);
  box-shadow:0 6px 18px rgba(9,97,170,.35);
}
.reg-submit:disabled{opacity:.65;cursor:default;}

.reg-spinner{
  width:16px;height:16px;
  border:2px solid rgba(255,255,255,.3);
  border-top-color:#fff;border-radius:50%;
  animation:reg-spin .6s linear infinite;display:inline-block;
}

 .reg-or{display:flex;align-items:center;gap:10px;margin:16px 0;}
.reg-or::before,.reg-or::after{content:'';flex:1;height:1px;background:#e2e8f0;}
.reg-or span{font-size:12px;color:#94a3b8;white-space:nowrap;font-weight:500;}

 .reg-sso{
  width:100%;padding:12px;
  border:1.5px solid var(--primary);
  border-radius:10px;background:var(--primary-soft);
  font-family:'Barlow',system-ui,sans-serif;
  font-size:14px;font-weight:700;color:var(--primary);
  cursor:pointer;transition:.18s;
  display:flex;align-items:center;justify-content:center;gap:8px;
  text-decoration:none;
}
.reg-sso:hover{background:#d1e3f8;transform:translateY(-1px);}

 .reg-login-text{text-align:center;margin-top:16px;font-size:13px;color:var(--muted);}
.reg-login-text a{color:var(--primary);font-weight:700;text-decoration:none;}
.reg-login-text a:hover{text-decoration:underline;}

 @media(max-width:600px){
  .register-page{padding:0;background:#fff;align-items:stretch;justify-content:flex-start;}
  .reg-card{border-radius:0;border:none;min-height:100vh;max-width:100%;padding:28px 20px;box-shadow:none;}
  .reg-row{grid-template-columns:1fr;gap:0;}
}
@media(max-width:400px){
  .reg-card{padding:24px 16px;}
  .reg-logos img{width:48px;height:48px;}
}
</style>

<div class="register-page">
  <div class="reg-card">

     <div class="reg-back">
      <a href="{{ route('home') }}" wire:navigate title="Trang chủ">
        <i class="fa-solid fa-arrow-left"></i>
      </a>
    </div>

    <div class="reg-head">
      <div class="reg-logos">
        <img src="{{ asset('img/fita-logo.png') }}" alt="Logo VNUA">
        <img src="{{ asset('img/logoST.jpg') }}"   alt="Logo ST">
      </div>
      <div class="reg-head-title">Khoa Công nghệ Thông tin</div>
      <div class="reg-head-sub">Học viện Nông nghiệp Việt Nam</div>
    </div>

    <h2 class="reg-title">Tạo tài khoản</h2>
    <p class="reg-desc">Điền thông tin bên dưới để đăng ký.</p>

    <div class="reg-row">
      <div class="reg-field">
        <label class="reg-label">Họ và tên đệm</label>
        <input class="reg-input @error('ho') is-error @enderror"
          wire:model.live="ho" type="text" placeholder="Nguyễn Văn">
        @error('ho')<span class="reg-field-err">{{ $message }}</span>@enderror
      </div>
      <div class="reg-field">
        <label class="reg-label">Tên</label>
        <input class="reg-input @error('ten') is-error @enderror"
          wire:model.live="ten" type="text" placeholder="An">
        @error('ten')<span class="reg-field-err">{{ $message }}</span>@enderror
      </div>
    </div>

    <div class="reg-field">
      <label class="reg-label">Email</label>
      <input class="reg-input @error('email') is-error @enderror"
        wire:model.live="email" type="email" placeholder="ten@gmail.com">
      @error('email')<span class="reg-field-err">{{ $message }}</span>@enderror
    </div>

    <div class="reg-row">
      <div class="reg-field">
        <label class="reg-label">Mật khẩu</label>
        <input class="reg-input @error('password') is-error @enderror"
          wire:model.live="password" type="password" placeholder="••••••••">
        @error('password')<span class="reg-field-err">{{ $message }}</span>@enderror
      </div>
      <div class="reg-field">
        <label class="reg-label">Xác nhận mật khẩu</label>
        <input class="reg-input"
          wire:model.live="password_confirmation" type="password" placeholder="••••••••">
      </div>
    </div>
<div class="reg-verify-box" x-data="{ open: false }">

    <div
        class="reg-verify-title"
        @click="open = !open"
        style="cursor:pointer;"
    >
        <i class="fa-solid fa-shield-halved" style="color:#16a34a"></i>

        <span>Xác minh cựu sinh viên</span>

        <span class="reg-verify-hint">
            — cần ít nhất 2 thông tin
        </span>

        <i
            class="fa-solid"
            :class="open ? 'fa-chevron-up' : 'fa-chevron-down'"
            style="margin-left:auto"
        ></i>
    </div>

    <div x-show="open" x-transition>

        <p class="reg-verify-desc">
            Điền ít nhất 2 trong 5 thông tin để xác minh bạn là cựu sinh viên HVNNA.
        </p>

        <div class="reg-row">
            <div class="reg-field">
                <label class="reg-label">Họ tên đầy đủ</label>
                <input
                    type="text"
                    class="reg-input"
                    wire:model.live="full_name"
                    placeholder="Nguyễn Văn A"
                >
            </div>

            <div class="reg-field">
                <label class="reg-label">Mã sinh viên</label>
                <input
                    type="text"
                    class="reg-input"
                    wire:model.live="student_code"
                    placeholder="641234"
                >
            </div>
        </div>

        <div class="reg-row">
            <div class="reg-field">
                <label class="reg-label">Lớp</label>
                <input
                    type="text"
                    class="reg-input"
                    wire:model.live="class_name"
                    placeholder="K64CNTTA"
                >
            </div>

            <div class="reg-field">
                <label class="reg-label">Năm tốt nghiệp</label>
                <input
                    type="number"
                    class="reg-input"
                    wire:model.live="graduation_year"
                    placeholder="2024"
                >
            </div>
        </div>

        <div class="reg-field">
            <label class="reg-label">Ngành học</label>
            <input
                type="text"
                class="reg-input"
                wire:model.live="major"
                placeholder="Công nghệ thông tin"
            >
        </div>

    </div>

</div>

    @error('verify')
      <div class="reg-err-box">{{ $message }}</div>
    @enderror

    <button class="reg-submit"
      wire:click="register"
      wire:loading.attr="disabled"
      wire:target="register">
      <span wire:loading.remove wire:target="register">Đăng ký</span>
      <span wire:loading wire:target="register" class="reg-spinner"></span>
    </button>

    <div class="reg-or"><span>hoặc</span></div>

    <a href="#" class="reg-sso">
      <i class="fa-solid fa-lock"></i> Đăng nhập bằng SSO
    </a>

    <p class="reg-login-text">
      Đã có tài khoản?
      <a href="{{ route('login') }}" wire:navigate>Đăng nhập</a>
    </p>

  </div>    
</div>
</div>