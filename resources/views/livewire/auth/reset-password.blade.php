<div>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}
@keyframes fadeUp{from{opacity:0;transform:translateY(12px)}to{opacity:1;transform:translateY(0)}}
@keyframes spin{to{transform:rotate(360deg)}}

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

.lcard-back{position:absolute;top:-8px;left:-8px;}
.lcard-back a{
    display:flex;align-items:center;justify-content:center;
    width:32px;height:32px;border-radius:8px;
    border:1px solid #e2e8f0;color:#64748b;text-decoration:none;
    font-size:14px;transition:.15s;background:#fff;
}
.lcard-back a:hover{background:#f8fafc;color:#0f172a;}
.lcard-head{position:relative;text-align:center;margin-bottom:24px;}

.lcard-title{font-size:17px;font-weight:800;text-transform:uppercase;letter-spacing:.5px;color:#0f172a;line-height:1.25;margin-bottom:4px;}
.lcard-sub{font-size:13px;font-weight:500;color:#64748b;}

.lerr{
    background:#fef2f2;border:1px solid #fecaca;color:#b91c1c;
    border-radius:10px;padding:10px 14px;font-size:13px;margin-bottom:16px;
    display:flex;align-items:center;gap:8px;
}

.lform{display:flex;flex-direction:column;gap:16px;}
.lfield label{display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;}
.linput{
    width:100%;padding:11px 14px;border:1.5px solid #e2e8f0;border-radius:10px;
    background:#fff;font-size:14px;color:#0f172a;outline:none;
    transition:border-color .15s,box-shadow .15s;
}
.linput:focus{border-color:#16a34a;box-shadow:0 0 0 3px rgba(9,97,170,.1);}
.linput::placeholder{color:#94a3b8;}
.linput[readonly]{background:#f8fafc;color:#64748b;}
.lfield-err{font-size:12px;color:#dc2626;margin-top:4px;display:block;}

.linput-wrap{position:relative;}
.linput-wrap .linput{padding-right:44px;}
.ltoggle{
    position:absolute;right:12px;top:50%;transform:translateY(-50%);
    background:none;border:none;cursor:pointer;padding:0;color:#94a3b8;font-size:15px;transition:.15s;
}
.ltoggle:hover{color:#16a34a;}

.lbtn-submit{
    width:100%;padding:13px;background:#16a34a;color:#fff;border:none;
    border-radius:10px;font-size:15px;font-weight:700;letter-spacing:.3px;
    cursor:pointer;transition:.18s;box-shadow:0 2px 12px rgba(9,97,170,.25);
    display:flex;align-items:center;justify-content:center;gap:8px;
}
.lbtn-submit:hover:not(:disabled){background:#22c55e;transform:translateY(-1px);}
.lbtn-submit:disabled{opacity:.7;cursor:not-allowed;}

.lspinner{width:18px;height:18px;border:2px solid rgba(255,255,255,.3);border-top-color:#fff;border-radius:50%;animation:spin .7s linear infinite;}

.lregister{text-align:center;margin-top:16px;font-size:13.5px;color:#64748b;}
.lregister a{color:#16a34a;font-weight:600;text-decoration:none;}
.lregister a:hover{text-decoration:underline;}
</style>

<div class="lp">
  <div class="lcard">

    <div class="lcard-head">
      <div class="lcard-back">
        <a href="{{ route('login') }}" wire:navigate title="Đăng nhập">
          <i class="fa-solid fa-arrow-left"></i>
        </a>
      </div>
      <div class="lcard-title">Đặt lại mật khẩu</div>
      <div class="lcard-sub">Nhập mật khẩu mới cho tài khoản của bạn</div>
    </div>

    @error('email')
      <div class="lerr"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
    @enderror

    <form wire:submit="resetPassword" class="lform">

      <div class="lfield">
        <label for="rpemail">Email</label>
        <input
          id="rpemail"
          wire:model="email"
          class="linput"
          type="email"
          placeholder="ten@gmail.com"
          autocomplete="email"
        >
      </div>

      <div class="lfield">
        <label for="rppassword">Mật khẩu mới</label>
        <div class="linput-wrap">
          <input
            id="rppassword"
            wire:model="password"
            class="linput"
            type="password"
            placeholder="••••••••"
            autocomplete="new-password"
          >
          <button type="button" class="ltoggle" onclick="
            const i=document.getElementById('rppassword');
            const ico=this.querySelector('i');
            if(i.type==='password'){i.type='text';ico.className='fa-solid fa-eye-slash';}
            else{i.type='password';ico.className='fa-solid fa-eye';}
          ">
            <i class="fa-solid fa-eye"></i>
          </button>
        </div>
        @error('password') <span class="lfield-err">{{ $message }}</span> @enderror
      </div>

      <div class="lfield">
        <label for="rppassword_confirmation">Xác nhận mật khẩu mới</label>
        <input
          id="rppassword_confirmation"
          wire:model="password_confirmation"
          class="linput"
          type="password"
          placeholder="••••••••"
          autocomplete="new-password"
        >
      </div>

      <button type="submit" class="lbtn-submit" wire:loading.attr="disabled">
        <span wire:loading.remove>Đặt lại mật khẩu</span>
        <span wire:loading><div class="lspinner"></div></span>
      </button>

    </form>

    <div class="lregister">
      Đã nhớ mật khẩu? <a href="{{ route('login') }}" wire:navigate>Đăng nhập</a>
    </div>

  </div>
</div>
</div>
