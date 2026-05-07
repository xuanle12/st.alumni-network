<div>
<div>
    <div class="login-page">
        <div class="login-bg"></div>
        <div class="corner corner-tl"></div>
        <div class="corner corner-tr"></div>
        <div class="corner corner-bl"></div>
        <div class="corner corner-br"></div>

        
        <div class="login-left">
            <div class="fade1" style="margin-bottom:40px">
                <div class="login-seal">
                    <i data-lucide="graduation-cap"></i>
                </div>
                <div class="login-school-name">Học viện Nông nghiệp Việt Nam</div>
                <h1 class="login-title">Mạng lưới<br><span>Cựu Sinh viên</span></h1>
            </div>
            <div class="login-divider-accent fade2"></div>
            <p class="login-quote fade2">"Kết nối tri thức — Vun đắp tương lai. Nền tảng hỗ trợ cựu sinh viên"</p>
            <div class="login-footer-rule">
                <div class="rule-line"></div>
                <span class="rule-text">HVNNA · 2026</span>
                <div class="rule-line"></div>
            </div>
        </div>

        
        <div class="login-right">
            <div class="login-card">
                <div class="fade1" style="margin-bottom:28px">
                    <h2>Đăng nhập</h2>
                    <p class="login-subtitle">Chào mừng trở lại, nhập thông tin để tiếp tục</p>
                </div>

                <form wire:submit="loginWithEmail">
                    <div class="form-group fade4">
                        
                        <div>
                            <label class="field-label">EMAIL</label>
                            <input
                                wire:model="email"
                                class="input-field"
                                type="email"
                                placeholder="ten@gmail.com"
                                autocomplete="email"
                            />
                            @error('email')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>

                        
                        <div>
                            <div class="field-row">
                                <label class="field-label" style="margin-bottom:0">MẬT KHẨU</label>
                                <a href="#" class="forgot-link" onclick="event.preventDefault()">Quên mật khẩu?</a>
                            </div>
                            <div class="input-wrap">
                                <input
                                    wire:model="password"
                                    class="input-field has-icon"
                                    id="passwordInput"
                                    type="password"
                                    placeholder="••••••••"
                                    autocomplete="current-password"
                                />
                                <button 
    type="button"
    class="toggle-pass-btn"
    onclick="
        const input = document.getElementById('passwordInput');
        const eye = this.querySelector('.icon-eye');
        const eyeOff = this.querySelector('.icon-eye-off');

        if(input.type === 'password'){
            input.type = 'text';
            eye.style.display='none';
            eyeOff.style.display='inline';
        }else{
            input.type = 'password';
            eye.style.display='inline';
            eyeOff.style.display='none';
        }
    "
>

<i data-lucide="eye" class="icon-eye"></i>
<i data-lucide="eye-off" class="icon-eye-off" style="display:none"></i>

</button>
                            </div>
                            @error('password')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Remember Me --}}
                        <div style="margin-top: 10px;">
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                <input type="checkbox" wire:model="remember" style="width: 16px; height: 16px;">
                                <span style="font-family: 'Courier Prime', monospace; font-size: 12px; color: #4a6e50;">Ghi nhớ đăng nhập</span>
                            </label>
                        </div>
                    </div>

                    {{-- Submit button --}}
                    <div class="fade5">
                        <button type="submit" class="submit-btn" wire:loading.attr="disabled">
                            <span wire:loading.remove>ĐĂNG NHẬP</span>
                            <span wire:loading>
                                <div class="spinner-white"></div>
                            </span>
                        </button>
                    </div>
                </form>

                <p class="register-text">
                    Chưa có tài khoản? <a href="{{ route('register') }}" wire:navigate>Đăng ký ngay</a>
                </p>

                <div class="divider">
                    <div class="divider-line"></div>
                    <span class="divider-text">hoặc</span>
                    <div class="divider-line"></div>
                </div>

                <button
                    type="button"
                    class="sso-btn"
                    onclick="window.location.href='#'"
                >
                    <i data-lucide="lock"></i>
                    Đăng nhập bằng SSO
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Crimson+Pro:ital,wght@0,300;0,400;0,600;1,300;1,400&family=IM+Fell+English:ital@0;1&family=Courier+Prime:wght@400;700&display=swap');
    
    * { box-sizing: border-box; margin: 0; padding: 0; }
    
    @keyframes fadeUp { 
        from { opacity: 0; transform: translateY(18px); } 
        to { opacity: 1; transform: translateY(0); } 
    }
    
    @keyframes spin { 
        to { transform: rotate(360deg); } 
    }
    
    .fade1 { animation: fadeUp .5s ease both; }
    .fade2 { animation: fadeUp .5s .1s ease both; }
    .fade3 { animation: fadeUp .5s .2s ease both; }
    .fade4 { animation: fadeUp .5s .3s ease both; }
    .fade5 { animation: fadeUp .5s .4s ease both; }
    
    .login-page { 
        min-height: 100vh; 
        background: #f0f5ee; 
        display: flex; 
        font-family: 'Crimson Pro', Georgia, serif; 
        position: relative; 
        overflow: hidden; 
    }
    
    .login-bg { 
        position: absolute; 
        inset: 0; 
        z-index: 0; 
        background-image: radial-gradient(circle at 20% 50%, rgba(58,125,68,.08) 0%, transparent 50%), 
                          radial-gradient(circle at 80% 20%, rgba(45,106,53,.06) 0%, transparent 40%); 
    }
    
    .corner { 
        position: absolute; 
        width: 80px; 
        height: 80px; 
        border-color: #a8c4a2; 
        border-style: solid; 
        opacity: .5; 
    }
    
    .corner-tl { top: 20px; left: 20px; border-width: 2px 0 0 2px; border-radius: 4px 0 0 0; }
    .corner-tr { top: 20px; right: 20px; border-width: 2px 2px 0 0; border-radius: 0 4px 0 0; }
    .corner-bl { bottom: 20px; left: 20px; border-width: 0 0 2px 2px; border-radius: 0 0 0 4px; }
    .corner-br { bottom: 20px; right: 20px; border-width: 0 2px 2px 0; border-radius: 0 0 4px 0; }
    
    .login-left { 
        flex: 0 0 42%; 
        display: flex; 
        flex-direction: column; 
        justify-content: center; 
        padding: 60px 56px; 
        position: relative; 
        z-index: 1; 
    }
    
    .login-seal { 
        width: 80px; 
        height: 80px; 
        border: 2.5px solid #3a7d44; 
        border-radius: 50%; 
        display: flex; 
        align-items: center; 
        justify-content: center; 
        margin-bottom: 24px; 
        background: rgba(255,255,255,.5); 
        font-size: 40px;
    }
    
    .login-school-name { 
        font-family: 'IM Fell English', Georgia, serif; 
        font-size: 11px; 
        letter-spacing: 4px; 
        color: #3a7d44; 
        text-transform: uppercase; 
        margin-bottom: 8px; 
    }
    
    .login-title { 
        font-family: 'IM Fell English', Georgia, serif; 
        font-size: 38px; 
        font-weight: 400; 
        color: #1a3d22; 
        line-height: 1.15; 
    }
    
    .login-title span { font-style: italic; color: #2d6a35; }
    
    .login-divider-accent { 
        width: 48px; 
        height: 2px; 
        background: linear-gradient(to right, #3a7d44, transparent); 
        margin-bottom: 28px; 
    }
    
    .login-quote { 
        font-size: 16px; 
        color: #4a6e50; 
        line-height: 1.7; 
        max-width: 320px; 
        font-style: italic; 
    }
    
    .login-footer-rule { 
        position: absolute; 
        bottom: 60px; 
        left: 56px; 
        right: 56px; 
        display: flex; 
        align-items: center; 
        gap: 12px; 
        opacity: .4; 
    }
    
    .login-footer-rule .rule-line { 
        flex: 1; 
        height: 1px; 
        background: #a8c4a2; 
    }
    
    .login-footer-rule .rule-text { 
        font-size: 10px; 
        color: #3a7d44; 
        font-family: 'Courier Prime', monospace; 
        letter-spacing: 2px; 
    }
    
    .login-right { 
        flex: 1; 
        display: flex; 
        align-items: center; 
        justify-content: center; 
        padding: 40px 48px; 
        position: relative; 
        z-index: 1; 
    }
    
    .login-card { 
        width: 100%; 
        max-width: 400px; 
        background: rgba(255,255,255,.85); 
        backdrop-filter: blur(12px); 
        border-radius: 12px; 
        border: 1.5px solid #b8d4b2; 
        padding: 40px 36px; 
        box-shadow: 0 8px 40px rgba(30,92,42,.1); 
    }
    
    .login-card h2 { 
        font-family: 'IM Fell English', Georgia, serif; 
        font-size: 24px; 
        font-weight: 400; 
        color: #1a3d22; 
        margin-bottom: 6px; 
    }
    
    .login-subtitle { 
        font-size: 14px; 
        color: #6a8c6e; 
        font-style: italic; 
    }
    
    .form-group { 
        display: flex; 
        flex-direction: column; 
        gap: 14px; 
        margin-bottom: 20px; 
    }
    
    .field-label { 
        display: block; 
        font-family: 'Courier Prime', monospace; 
        font-size: 11px; 
        color: #4a6e50; 
        letter-spacing: .5px; 
        margin-bottom: 6px; 
    }
    
    .field-row { 
        display: flex; 
        justify-content: space-between; 
        align-items: center; 
        margin-bottom: 6px; 
    }
    
    .forgot-link { 
        font-size: 12px; 
        color: #3a7d44; 
        text-decoration: none; 
        font-style: italic; 
    }
    
    .input-wrap { position: relative; }
    
    .input-field { 
        width: 100%; 
        padding: 11px 14px; 
        border: 1.5px solid #a8c4a2; 
        border-radius: 6px; 
        background: #fff; 
        font-family: 'Courier Prime', monospace; 
        font-size: 13px; 
        color: #243d28; 
        outline: none; 
        transition: border-color .18s, box-shadow .18s; 
    }
    
    .input-field:focus { 
        border-color: #2d6a35; 
        box-shadow: 0 0 0 3px rgba(45,106,53,.1); 
    }
    
    .input-field::placeholder { color: #8ab58e; }
    
    .input-field.has-icon { padding-right: 42px; }
    
    .toggle-pass-btn { 
        position: absolute; 
        right: 12px; 
        top: 50%; 
        transform: translateY(-50%); 
        background: none; 
        border: none; 
        cursor: pointer; 
        font-size: 14px; 
        padding: 0; 
    }
    
    .field-error { 
        font-size: 12px; 
        color: #c0392b; 
        margin-top: 4px; 
        display: block; 
    }
    
    .submit-btn { 
        width: 100%; 
        padding: 12px; 
        background: #1e5c2a; 
        color: #f0f5ee; 
        border: none; 
        border-radius: 6px; 
        font-family: 'IM Fell English', Georgia, serif; 
        font-size: 15px; 
        letter-spacing: .8px; 
        cursor: pointer; 
        transition: all .18s ease; 
    }
    
    .submit-btn:hover:not(:disabled) { 
        background: #2d7a38; 
        transform: translateY(-1px); 
    }
    
    .submit-btn:active:not(:disabled) { transform: translateY(0); }
    
    .submit-btn:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }
    
    .register-text { 
        text-align: center; 
        margin-top: 20px; 
        font-size: 13px; 
        color: #6a8c6e; 
        font-style: italic; 
    }
    
    .register-text a { 
        color: #2d6a35; 
        text-decoration: none; 
        font-style: normal; 
        font-weight: 600; 
    }
    
    .divider { 
        display: flex; 
        align-items: center; 
        gap: 12px; 
        margin: 24px 0; 
    }
    
    .divider-line { 
        flex: 1; 
        height: 1px; 
        background: linear-gradient(to right, transparent, #a8c4a2, transparent); 
    }
    
    .divider-text { 
        font-family: 'Courier Prime', monospace; 
        font-size: 11px; 
        color: #8ab58e; 
        letter-spacing: 1px; 
    }
    
    .sso-btn { 
        width: 100%; 
        padding: 13px 16px; 
        border-radius: 6px; 
        border: 1.5px solid #2d6a35; 
        background: #f2faf3; 
        cursor: pointer; 
        display: flex; 
        align-items: center; 
        justify-content: center; 
        gap: 12px; 
        font-family: 'Courier Prime', monospace; 
        font-size: 14px; 
        color: #1e5c2a; 
        font-weight: 700; 
        transition: all .18s ease; 
    }
    
    .sso-btn:hover { 
        background: #e6f5e8; 
        transform: translateY(-1px); 
    }
    
    .spinner-white { 
        width: 18px; 
        height: 18px; 
        border: 2px solid rgba(240,245,238,.3); 
        border-top-color: #f0f5ee; 
        border-radius: 50%; 
        animation: spin .7s linear infinite; 
        margin: 0 auto; 
        display: block; 
    }
    
    @media (max-width: 768px) { 
        .login-left { display: none; } 
        .login-right { width: 100%; padding: 40px 20px; } 
        .corner { display: none; } 
    }
</style>
</div>