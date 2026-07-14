<div>
<style>
.mc-wrap{padding:1.75rem;max-width:1140px;}
.mc-cols{display:grid;grid-template-columns:1fr 1fr;gap:22px;align-items:start;}
.mc-col{display:flex;flex-direction:column;}
.mc-sec-head{font-size:15px;font-weight:800;color:#0f172a;margin:0 0 4px;}
.mc-sec-sub{font-size:12.5px;color:#64748b;margin:0 0 14px;}
.mc-head{margin-bottom:1.25rem;}
.mc-head h1{font-size:20px;font-weight:700;color:#0f172a;letter-spacing:-.4px;margin:0;}
.mc-head p{font-size:13px;color:#64748b;margin-top:3px;}

.mc-note{background:#eff6ff;border:1px solid #bfdbfe;color:#075490;font-size:12.5px;line-height:1.55;
  border-radius:10px;margin-bottom:18px;}
.mc-note-head{display:flex;align-items:center;gap:9px;padding:10px 14px;cursor:pointer;user-select:none;font-weight:600;}
.mc-note-chev{width:15px;height:15px;margin-left:auto;transition:transform .2s;flex-shrink:0;}
.mc-note-chev.open{transform:rotate(180deg);}
.mc-note-body{padding:0 14px 12px 34px;}

.mc-card{background:#fff;border:1px solid #eaecf0;border-radius:12px;padding:20px;margin-bottom:16px;}
.mc-card-title{font-size:13px;font-weight:800;color:#0f172a;text-transform:uppercase;letter-spacing:.4px;
  margin-bottom:16px;}
.mc-grid{display:grid;grid-template-columns:1fr 1fr;gap:14px;}
.mc-fi{display:flex;flex-direction:column;gap:6px;}
.mc-fi.full{grid-column:1/-1;}
.mc-fi label{font-size:11px;font-weight:700;color:#6b7280;text-transform:uppercase;letter-spacing:.4px;}
.mc-fi input,.mc-fi select,.mc-fi textarea{padding:9px 12px;border:1px solid #d1d5db;border-radius:8px;font-size:13px;color:#111;
  font-family:inherit;transition:border-color .15s,box-shadow .15s;background:#fff;}
.mc-fi input:focus,.mc-fi select:focus,.mc-fi textarea:focus{outline:none;border-color:#0961aa;box-shadow:0 0 0 3px rgba(9,97,170,.1);}
.mc-fi textarea{resize:vertical;min-height:120px;line-height:1.6;}
.mc-var{background:#eff6ff;color:#0961aa;padding:1px 6px;border-radius:5px;font-size:11px;font-family:monospace;}
[x-cloak]{display:none!important;}
.mc-acc{padding:15px 20px;}
.mc-acc-head{display:flex;align-items:center;justify-content:space-between;gap:10px;cursor:pointer;user-select:none;
  font-size:13px;font-weight:800;color:#0f172a;text-transform:uppercase;letter-spacing:.4px;}
.mc-acc-head:hover{color:#0961aa;}
.mc-acc-chev{width:16px;height:16px;color:#94a3b8;transition:transform .2s;flex-shrink:0;}
.mc-acc-chev.open{transform:rotate(180deg);}
.mc-acc-body{padding-top:15px;margin-top:15px;border-top:1px solid #f1f5f9;}
.mc-err{font-size:11px;color:#dc2626;}

.mc-test{display:flex;gap:10px;align-items:flex-end;flex-wrap:wrap;}
.mc-test .mc-fi{flex:1;min-width:220px;}

.mc-foot{display:flex;justify-content:space-between;gap:10px;align-items:center;margin-top:8px;flex-wrap:wrap;}
.mc-btn{padding:9px 18px;border-radius:9px;font-size:13px;font-weight:600;cursor:pointer;font-family:inherit;
  border:1px solid #d1d5db;background:#fff;color:#374151;transition:.15s;display:inline-flex;align-items:center;gap:7px;}
.mc-btn:hover{background:#f9fafb;}
.mc-btn-prim{background:#0961aa;color:#fff;border-color:#0961aa;}
.mc-btn-prim:hover{background:#075490;}

@media(max-width:900px){.mc-cols{grid-template-columns:1fr;}}
@media(max-width:600px){.mc-grid{grid-template-columns:1fr;}}
</style>

<div class="mc-wrap">

  <div class="mc-head">
    <h1>Cấu hình Email</h1>
    <p>Thiết lập máy chủ SMTP để hệ thống gửi email (xác nhận ứng tuyển, thông báo...).</p>
  </div>

  <div class="mc-note" x-data="{ open: false }">
    <div class="mc-note-head" @click="open = !open">
      <i class="fa-solid fa-circle-info"></i>
      <span>Hướng dẫn cấu hình Gmail</span>
      <svg class="mc-note-chev" :class="{ 'open': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
    </div>
    <div class="mc-note-body" x-show="open" x-collapse x-cloak>
      Với Gmail: dùng <b>smtp.gmail.com</b>, cổng <b>587</b> (TLS), và <b>Mật khẩu ứng dụng</b> (App Password) thay cho mật khẩu tài khoản. Cấu hình lưu tại đây sẽ đè lên file .env.
    </div>
  </div>

  <div class="mc-cols">

  {{-- ══ CỘT TRÁI: Cấu hình SMTP ══ --}}
  <div class="mc-col">

  <div style="margin-bottom:14px">
    <p class="mc-sec-head">Cấu hình gửi email</p>
    <p class="mc-sec-sub">Máy chủ SMTP và thông tin người gửi email hệ thống.</p>
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

  </div>{{-- /cột trái --}}

  {{-- ══ CỘT PHẢI: Nội dung email tự động ══ --}}
  <div class="mc-col">

  <div style="margin-bottom:14px">
    <p class="mc-sec-head">Nội dung email tự động</p>
    <p class="mc-sec-sub">Chỉnh tiêu đề &amp; nội dung các thư gửi tự động (dùng biến trong dấu ngoặc nhọn).</p>
  </div>

  @foreach($tplMeta as $key => $meta)
    <div class="mc-card mc-acc" x-data="{ open: false }">
      <div class="mc-acc-head" @click="open = !open">
        <span>{{ $meta['label'] }}</span>
        <svg class="mc-acc-chev" :class="{ 'open': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
      </div>

      <div class="mc-acc-body" x-show="open" x-collapse x-cloak>
        <div style="display:flex;justify-content:flex-end;margin-bottom:10px">
          <button type="button" wire:click="resetTemplate('{{ $key }}')"
                  style="background:none;border:none;color:#0961aa;font-size:11.5px;font-weight:600;cursor:pointer;font-family:inherit;white-space:nowrap">
            <i class="fa-solid fa-rotate-left"></i> Khôi phục mặc định
          </button>
        </div>
        <div class="mc-fi" style="margin-bottom:12px">
          <label>Tiêu đề</label>
          <input type="text" wire:model="tpl.{{ $key }}.subject">
        </div>
        <div class="mc-fi">
          <label>Nội dung</label>
          <textarea wire:model="tpl.{{ $key }}.body"></textarea>
        </div>
        <div style="font-size:11.5px;color:#94a3b8;margin-top:8px">
          Biến khả dụng: <span class="mc-var">{{ $meta['vars'] }}</span>
        </div>
      </div>
    </div>
  @endforeach

  <div class="mc-foot">
    <span style="font-size:12px;color:#94a3b8">Phần bảng thông tin & CV đính kèm trong email vẫn giữ nguyên tự động.</span>
    <button class="mc-btn mc-btn-prim" wire:click="saveTemplates" wire:loading.attr="disabled" wire:target="saveTemplates">
      <span wire:loading.remove wire:target="saveTemplates"><i class="fa-solid fa-floppy-disk"></i> Lưu nội dung email</span>
      <span wire:loading wire:target="saveTemplates">Đang lưu...</span>
    </button>
  </div>

  </div>{{-- /cột phải --}}

  </div>{{-- /mc-cols --}}

</div>
</div>
