<div>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}
@keyframes fadeUp{from{opacity:0;transform:translateY(12px)}to{opacity:1;transform:translateY(0)}}
@keyframes spin{to{transform:rotate(360deg)}}

body{font-family:var(--font);}

.lp{
    min-height:100vh;
    background:#f1f5f9;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:24px 16px;
    animation:fadeUp .4s ease both;
}

.lcard{
    width:100%;
    max-width:448px;
    background:#fff;
    border-radius:16px;
    border:1px solid #e2e8f0;
    padding:40px 36px;
    box-shadow:0 10px 40px rgba(15,23,42,.08);
}

.lcard-back{
    position:absolute;
    top:-8px;left:-8px;
}
.lcard-back a{
    display:flex;align-items:center;justify-content:center;
    width:32px;height:32px;
    border-radius:8px;
    border:1px solid #e2e8f0;
    color:#64748b;
    text-decoration:none;
    font-size:14px;
    transition:.15s;
    background:#fff;
}
.lcard-back a:hover{background:#f8fafc;color:#0f172a;}
.lcard-head{position:relative;text-align:center;margin-bottom:24px;}

.llogos{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:20px;
    margin-bottom:18px;
}
.llogos img{
    width:64px;height:64px;
    object-fit:contain;
    border-radius:8px;
}
.lcard-title{
    font-size:17px;font-weight:800;
    text-transform:uppercase;
    letter-spacing:.5px;
    color:#0f172a;
    line-height:1.25;
    margin-bottom:4px;
}
.lcard-sub{
    font-size:13px;font-weight:500;
    color:#64748b;
    text-transform:uppercase;
    letter-spacing:.3px;
}

.lerr{
    background:#fef2f2;border:1px solid #fecaca;
    color:#b91c1c;
    border-radius:10px;padding:10px 14px;
    font-size:13px;margin-bottom:16px;
    display:flex;align-items:center;gap:8px;
}

.lform{display:flex;flex-direction:column;gap:16px;}

.lfield label{
    display:block;
    font-size:13px;font-weight:600;
    color:#374151;margin-bottom:6px;
}
.lfield-row{
    display:flex;justify-content:space-between;
    align-items:center;margin-bottom:6px;
}
.lfield-row label{margin-bottom:0;}
.lfield-row a{
    font-size:12.5px;color:#16a34a;
    text-decoration:none;transition:.15s;
}
.lfield-row a:hover{text-decoration:underline;}

.linput{
    width:100%;
    padding:11px 14px;
    border:1.5px solid #e2e8f0;
    border-radius:10px;
    background:#fff;
    font-family:var(--font);
    font-size:14px;color:#0f172a;
    outline:none;
    transition:border-color .15s,box-shadow .15s;
}
.linput:focus{
    border-color:#16a34a;
    box-shadow:0 0 0 3px rgba(9,97,170,.1);
}
.linput::placeholder{color:#94a3b8;}

.linput-wrap{position:relative;}
.linput-wrap .linput{padding-right:44px;}
.ltoggle{
    position:absolute;right:12px;top:50%;
    transform:translateY(-50%);
    background:none;border:none;cursor:pointer;
    padding:0;color:#94a3b8;font-size:15px;
    transition:.15s;
}
.ltoggle:hover{color:#16a34a;}

.lfield-err{font-size:12px;color:#dc2626;margin-top:4px;display:block;}

.lremember{
    display:flex;align-items:center;gap:8px;
    cursor:pointer;font-size:13.5px;color:#64748b;
}
.lremember input{
    width:16px;height:16px;
    accent-color:#16a34a;cursor:pointer;
}

.lbtn-submit{
    width:100%;
    padding:13px;
    background:#16a34a;
    color:#fff;border:none;
    border-radius:10px;
    font-family:var(--font);
    font-size:15px;font-weight:700;
    letter-spacing:.3px;
    cursor:pointer;
    transition:.18s;
    box-shadow:0 2px 12px rgba(9,97,170,.25);
    display:flex;align-items:center;justify-content:center;gap:8px;
}
.lbtn-submit:hover:not(:disabled){
    background:#22c55e;
    transform:translateY(-1px);
    box-shadow:0 4px 18px rgba(9,97,170,.35);
}
.lbtn-submit:disabled{opacity:.7;cursor:not-allowed;}

.lspinner{
    width:18px;height:18px;
    border:2px solid rgba(255,255,255,.3);
    border-top-color:#fff;
    border-radius:50%;
    animation:spin .7s linear infinite;
}

.lregister{
    text-align:center;margin-top:4px;
    font-size:13.5px;color:#64748b;
}
.lregister a{
    color:#16a34a;font-weight:600;
    text-decoration:none;transition:.15s;
}
.lregister a:hover{text-decoration:underline;}

.ldivider{
    display:flex;align-items:center;gap:12px;
    margin:20px 0;
}
.ldivider::before,.ldivider::after{
    content:'';flex:1;height:1px;background:#e2e8f0;
}
.ldivider span{
    font-size:12px;color:#94a3b8;
    white-space:nowrap;font-weight:500;
}

.lbtn-sso{
    width:100%;
    padding:13px 16px;
    border-radius:10px;
    border:1.5px solid #16a34a;
    background:#e8f0fe;
    cursor:pointer;
    display:flex;align-items:center;justify-content:center;gap:10px;
    font-family:var(--font);
    font-size:14px;font-weight:700;
    color:#16a34a;
    transition:.18s;
    text-decoration:none;
}
.lbtn-sso:hover{
    background:#d1e3f8;
    transform:translateY(-1px);
}

@media(max-width:480px){
    .lcard{padding:32px 22px;}
    .llogos img{width:52px;height:52px;}
}
</style>

<div class="lp">
  <div class="lcard">

    {{-- Header --}}
    <div class="lcard-head">
      <div class="lcard-back">
        <a href="{{ route('home') }}" wire:navigate title="Trang chủ">
          <i class="fa-solid fa-arrow-left"></i>
        </a>
      </div>

      <div class="llogos">
        <img src="{{ asset('img/fita-logo.png') }}" alt="Logo VNUA">
        <img src="{{ asset('img/logoST.jpg') }}"   alt="Logo ST">
      </div>

      <div class="lcard-title">Khoa Công nghệ Thông tin</div>
      <div class="lcard-sub">Học viện Nông nghiệp Việt Nam</div>
    </div>

    {{-- Errors --}}
    @if(session('register_success'))
      <div class="lerr" style="background:#f0fdf4;border-color:#86efac;color:#166534;padding:12px 14px;border-radius:10px;border:1px solid;margin-bottom:12px;font-size:13px;">
        <i class="fa-solid fa-circle-check"></i> {{ session('register_success') }}
      </div>
    @endif
    @if(session('status'))
      <div class="lerr" style="background:#f0fdf4;border-color:#86efac;color:#166534;">
        <i class="fa-solid fa-check"></i> {{ session('status') }}
      </div>
    @endif
    @error('email')
      <div class="lerr"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
    @enderror

     
    <form wire:submit="loginWithEmail" class="lform">

      <div class="lfield">
        <label for="lemail">Email</label>
        <input
          id="lemail"
          wire:model="email"
          class="linput"
          type="email"
          placeholder="ten@gmail.com"
          autocomplete="email"
        >
        @error('email') <span class="lfield-err">{{ $message }}</span> @enderror
      </div>

      <div class="lfield">
        <div class="lfield-row">
          <label for="lpassword">Mật khẩu</label>
          <a href="#" onclick="event.preventDefault()">Quên mật khẩu?</a>
        </div>
        <div class="linput-wrap">
          <input
            id="lpassword"
            wire:model="password"
            class="linput"
            type="password"
            placeholder="••••••••"
            autocomplete="current-password"
          >
          <button type="button" class="ltoggle" onclick="
            const i=document.getElementById('lpassword');
            const ico=this.querySelector('i');
            if(i.type==='password'){i.type='text';ico.className='fa-solid fa-eye-slash';}
            else{i.type='password';ico.className='fa-solid fa-eye';}
          ">
            <i class="fa-solid fa-eye"></i>
          </button>
        </div>
        @error('password') <span class="lfield-err">{{ $message }}</span> @enderror
      </div>

      <label class="lremember">
        <input type="checkbox" wire:model="remember">
        Ghi nhớ đăng nhập
      </label>

      <button type="submit" class="lbtn-submit" wire:loading.attr="disabled">
        <span wire:loading.remove>Đăng nhập</span>
        <span wire:loading><div class="lspinner"></div></span>
      </button>

    </form>

    <div class="lregister" style="margin-top:16px;">
      Chưa có tài khoản? <a href="{{ route('register') }}" wire:navigate>Đăng ký ngay</a>
    </div>

    <div class="ldivider"><span>hoặc đăng nhập bằng</span></div>

    <a href="{{ route('sso.login') }}" class="lbtn-sso">
      <i class="fa-solid fa-building-columns"></i>
      Đăng nhập bằng SSO
    </a>
  </div>
</div>
</div>