<div>
<div>
     <div class="login-page">
        <div class="login-bg"></div>
        <div class="corner corner-tl"></div>
        <div class="corner corner-tr"></div>
        <div class="corner corner-bl"></div>
        <div class="corner corner-br"></div>
        <div class="login-right">
            <div class="login-card">
                <div class="logo-row fade1">
                <div class="logo-slot" id="slot1" title="Nhấn để chèn logo 1">
                    <span class="plus">+</span>
                    <img id="img1" alt="Logo 1">
                    <input type="file" accept="image/*" onchange="loadLogo(event,'img1','slot1')">
                </div>
                <div class="logo-slot" id="slot2" title="Nhấn để chèn logo 2">
                    <span class="plus">+</span>
                    <img id="img2" alt="Logo 2">
                    <input type="file" accept="image/*" onchange="loadLogo(event,'img2','slot2')">
                </div>
            </div>
 
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
    to   { opacity: 1; transform: translateY(0); }
}
@keyframes spin { to { transform: rotate(360deg); } }
 
.fade1 { animation: fadeUp .5s ease both; }
.fade4 { animation: fadeUp .5s .3s ease both; }
.fade5 { animation: fadeUp .5s .4s ease both; }
 
.login-page {
    min-height: 100vh;
    background: #f5f7fa;
    display: flex;
    font-family: 'Crimson Pro', Georgia, serif;
    position: relative;
    overflow: hidden;
    justify-content: center;
    align-items: center;
}
 
.login-bg {
    position: absolute;
    inset: 0;
    z-index: 0;
    background-image:
        radial-gradient(circle at 20% 50%, rgba(23,92,186,.06) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(37,99,235,.05) 0%, transparent 40%);
}
 
.corner {
    position: absolute;
    width: 80px;
    height: 80px;
    border-color: #93c5fd;
    border-style: solid;
    opacity: .5;
}
.corner-tl { top: 20px; left: 20px;   border-width: 2px 0 0 2px; border-radius: 4px 0 0 0; }
.corner-tr { top: 20px; right: 20px;  border-width: 2px 2px 0 0; border-radius: 0 4px 0 0; }
.corner-bl { bottom: 20px; left: 20px;  border-width: 0 0 2px 2px; border-radius: 0 0 0 4px; }
.corner-br { bottom: 20px; right: 20px; border-width: 0 2px 2px 0; border-radius: 0 0 4px 0; }
 
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
    max-width: 420px;
    background: rgba(255,255,255,.92);
    backdrop-filter: blur(12px);
    border-radius: 12px;
    border: 1.5px solid #bfdbfe;
    padding: 40px 36px;
    box-shadow: 0 8px 40px rgba(37,99,235,.08);
}
 
/* ── Logo tròn ── */
.logo-row {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 24px;
    margin-bottom: 28px;
}
 
.logo-slot {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    border: 2px dashed #93c5fd;
    background: #eff6ff;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    overflow: hidden;
    position: relative;
    transition: border-color .2s, box-shadow .2s;
}
.logo-slot:hover {
    border-color: #3b82f6;
    box-shadow: 0 0 0 4px rgba(59,130,246,.1);
}
.logo-slot img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: none;
}
.logo-slot .plus {
    font-size: 24px;
    color: #93c5fd;
    line-height: 1;
    user-select: none;
}
.logo-slot input[type="file"] {
    position: absolute;
    inset: 0;
    opacity: 0;
    cursor: pointer;
    width: 100%;
    height: 100%;
}
 
/* ── Tiêu đề ── */
.login-card h2 {
    font-family: 'IM Fell English', Georgia, serif;
    font-size: 24px;
    font-weight: 400;
    color: #1e3a5f;
    margin-bottom: 6px;
}
.login-subtitle {
    font-size: 14px;
    color: #6b8ec4;
    font-style: italic;
}
 
/* ── Form ── */
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
    color: #2563eb;
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
    color: #2563eb;
    text-decoration: none;
    font-style: italic;
}
 
.input-wrap { position: relative; }
 
.input-field {
    width: 100%;
    padding: 11px 14px;
    border: 1.5px solid #bfdbfe;
    border-radius: 6px;
    background: #fff;
    font-family: 'Courier Prime', monospace;
    font-size: 13px;
    color: #1e3a5f;
    outline: none;
    transition: border-color .18s, box-shadow .18s;
}
.input-field:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37,99,235,.1);
}
.input-field::placeholder { color: #93c5fd; }
.input-field.has-icon { padding-right: 42px; }
 
.toggle-pass-btn {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    cursor: pointer;
    padding: 0;
    color: #6b8ec4;
}
 
.field-error {
    font-size: 12px;
    color: #c0392b;
    margin-top: 4px;
    display: block;
}
 
/* ── Remember me ── */
.remember-label {
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
}
.remember-label input {
    width: 16px;
    height: 16px;
    accent-color: #2563eb;
}
.remember-label span {
    font-family: 'Courier Prime', monospace;
    font-size: 12px;
    color: #2563eb;
}
 
/* ── Nút đăng nhập ── */
.submit-btn {
    width: 100%;
    padding: 12px;
    background: linear-gradient(135deg, #1d4ed8, #2563eb);
    color: #fff;
    border: none;
    border-radius: 6px;
    font-family: 'IM Fell English', Georgia, serif;
    font-size: 15px;
    letter-spacing: .8px;
    cursor: pointer;
    transition: all .18s ease;
    box-shadow: 0 2px 12px rgba(37,99,235,.3);
}
.submit-btn:hover:not(:disabled) {
    background: linear-gradient(135deg, #1e40af, #1d4ed8);
    transform: translateY(-1px);
    box-shadow: 0 4px 16px rgba(37,99,235,.4);
}
.submit-btn:active:not(:disabled) { transform: translateY(0); }
.submit-btn:disabled { opacity: .7; cursor: not-allowed; }
 
.spinner-white {
    width: 18px; height: 18px;
    border: 2px solid rgba(255,255,255,.3);
    border-top-color: #fff;
    border-radius: 50%;
    animation: spin .7s linear infinite;
    margin: 0 auto;
    display: block;
}
 
/* ── Đăng ký ── */
.register-text {
    text-align: center;
    margin-top: 20px;
    font-size: 13px;
    color: #6b8ec4;
    font-style: italic;
}
.register-text a {
    color: #2563eb;
    text-decoration: none;
    font-style: normal;
    font-weight: 600;
}
 
/* ── Divider ── */
.divider {
    display: flex;
    align-items: center;
    gap: 12px;
    margin: 24px 0;
}
.divider-line {
    flex: 1;
    height: 1px;
    background: linear-gradient(to right, transparent, #bfdbfe, transparent);
}
.divider-text {
    font-family: 'Courier Prime', monospace;
    font-size: 11px;
    color: #93c5fd;
    letter-spacing: 1px;
}
 
/* ── Nút SSO ── */
.sso-btn {
    width: 100%;
    padding: 13px 16px;
    border-radius: 6px;
    border: 1.5px solid #2563eb;
    background: #eff6ff;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    font-family: 'Courier Prime', monospace;
    font-size: 14px;
    color: #1d4ed8;
    font-weight: 700;
    transition: all .18s ease;
}
.sso-btn:hover {
    background: #dbeafe;
    transform: translateY(-1px);
}
 
@media (max-width: 768px) {
    .login-right { padding: 40px 20px; }
    .corner { display: none; }
}
</style>
</div>