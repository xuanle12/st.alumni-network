<div>
<style>
.mc-wrap{padding:1.75rem;max-width:760px;}
.mc-head{margin-bottom:1.25rem;}
.mc-head h1{font-size:20px;font-weight:700;color:#0f172a;letter-spacing:-.4px;margin:0;}
.mc-head p{font-size:13px;color:#64748b;margin-top:3px;}

.mc-note{display:flex;align-items:flex-start;gap:9px;background:#eff6ff;border:1px solid #bfdbfe;color:#075490;
  font-size:12.5px;line-height:1.55;padding:11px 14px;border-radius:10px;margin-bottom:18px;}

.mc-card{background:#fff;border:1px solid #eaecf0;border-radius:12px;padding:20px;margin-bottom:16px;}
.mc-card-title{font-size:13px;font-weight:800;color:#0f172a;text-transform:uppercase;letter-spacing:.4px;
  margin-bottom:16px;}
.mc-grid{display:grid;grid-template-columns:1fr 1fr;gap:14px;}
.mc-fi{display:flex;flex-direction:column;gap:6px;}
.mc-fi.full{grid-column:1/-1;}
.mc-fi label{font-size:11px;font-weight:700;color:#6b7280;text-transform:uppercase;letter-spacing:.4px;}
.mc-fi input,.mc-fi select{padding:9px 12px;border:1px solid #d1d5db;border-radius:8px;font-size:13px;color:#111;
  font-family:inherit;transition:border-color .15s,box-shadow .15s;background:#fff;}
.mc-fi input:focus,.mc-fi select:focus{outline:none;border-color:#0961aa;box-shadow:0 0 0 3px rgba(9,97,170,.1);}
.mc-err{font-size:11px;color:#dc2626;}

.mc-test{display:flex;gap:10px;align-items:flex-end;flex-wrap:wrap;}
.mc-test .mc-fi{flex:1;min-width:220px;}

.mc-foot{display:flex;justify-content:space-between;gap:10px;align-items:center;margin-top:8px;flex-wrap:wrap;}
.mc-btn{padding:9px 18px;border-radius:9px;font-size:13px;font-weight:600;cursor:pointer;font-family:inherit;
  border:1px solid #d1d5db;background:#fff;color:#374151;transition:.15s;display:inline-flex;align-items:center;gap:7px;}
.mc-btn:hover{background:#f9fafb;}
.mc-btn-prim{background:#0961aa;color:#fff;border-color:#0961aa;}
.mc-btn-prim:hover{background:#075490;}

@media(max-width:600px){.mc-grid{grid-template-columns:1fr;}}
</style>

<div class="mc-wrap">

  <div class="mc-head">
    <h1>Cấu hình Email</h1>
    <p>Thiết lập máy chủ SMTP để hệ thống gửi email (xác nhận ứng tuyển, thông báo...).</p>
  </div>

  <div class="mc-note">
    <i class="fa-solid fa-circle-info" style="margin-top:1px"></i>
    <span>Với Gmail: dùng <b>smtp.gmail.com</b>, cổng <b>587</b> (TLS), và <b>Mật khẩu ứng dụng</b> (App Password) thay cho mật khẩu tài khoản. Cấu hình lưu tại đây sẽ đè lên file .env.</span>
  </div>

  {{-- Máy chủ SMTP --}}
  <div class="mc-card">
    <div class="mc-card-title">Máy chủ SMTP</div>
    <div class="mc-grid">
      <div class="mc-fi full">
        <label>Máy chủ (Host)</label>
        <input type="text" wire:model="host" placeholder="smtp.gmail.com">
        @error('host')<div class="mc-err">{{ $message }}</div>@enderror
      </div>
      <div class="mc-fi">
        <label>Cổng (Port)</label>
        <input type="number" wire:model="port" placeholder="587">
        @error('port')<div class="mc-err">{{ $message }}</div>@enderror
      </div>
      <div class="mc-fi">
        <label>Bảo mật</label>
        <select wire:model="encryption">
          <option value="tls">TLS (587)</option>
          <option value="ssl">SSL (465)</option>
          <option value="none">Không</option>
        </select>
        @error('encryption')<div class="mc-err">{{ $message }}</div>@enderror
      </div>
      <div class="mc-fi">
        <label>Tài khoản (Username)</label>
        <input type="text" wire:model="username" placeholder="email@gmail.com" autocomplete="off">
        @error('username')<div class="mc-err">{{ $message }}</div>@enderror
      </div>
      <div class="mc-fi">
        <label>Mật khẩu / App Password</label>
        <input type="password" wire:model="password" placeholder="••••••••••••" autocomplete="new-password">
        @error('password')<div class="mc-err">{{ $message }}</div>@enderror
      </div>
    </div>
  </div>

  {{-- Người gửi --}}
  <div class="mc-card">
    <div class="mc-card-title">Thông tin người gửi</div>
    <div class="mc-grid">
      <div class="mc-fi">
        <label>Email gửi (From address)</label>
        <input type="email" wire:model="from_address" placeholder="no-reply@fita-vnua.edu.vn">
        @error('from_address')<div class="mc-err">{{ $message }}</div>@enderror
      </div>
      <div class="mc-fi">
        <label>Tên hiển thị (From name)</label>
        <input type="text" wire:model="from_name" placeholder="Alumni Network FITA-VNUA">
        @error('from_name')<div class="mc-err">{{ $message }}</div>@enderror
      </div>
    </div>
  </div>

  {{-- Gửi thử --}}
  <div class="mc-card">
    <div class="mc-card-title">Gửi email kiểm tra</div>
    <div class="mc-test">
      <div class="mc-fi">
        <label>Gửi tới email</label>
        <input type="email" wire:model="test_email" placeholder="ban@gmail.com">
        @error('test_email')<div class="mc-err">{{ $message }}</div>@enderror
      </div>
      <button class="mc-btn" wire:click="sendTest" wire:loading.attr="disabled" wire:target="sendTest">
        <span wire:loading.remove wire:target="sendTest"><i class="fa-solid fa-paper-plane"></i> Gửi thử</span>
        <span wire:loading wire:target="sendTest">Đang gửi...</span>
      </button>
    </div>
  </div>

  <div class="mc-foot">
    <span style="font-size:12px;color:#94a3b8">Nên bấm "Gửi thử" để kiểm tra trước khi lưu.</span>
    <button class="mc-btn mc-btn-prim" wire:click="save" wire:loading.attr="disabled" wire:target="save">
      <span wire:loading.remove wire:target="save"><i class="fa-solid fa-floppy-disk"></i> Lưu cấu hình</span>
      <span wire:loading wire:target="save">Đang lưu...</span>
    </button>
  </div>

</div>
</div>
