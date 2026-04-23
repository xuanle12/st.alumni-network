<div>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
body{font-family:'Segoe UI',system-ui,sans-serif;background:#0f1117;min-height:100vh}
.fi input,
.fi textarea,
.sf-row input,
.btn{
    font-family: "Times New Roman", Times, serif;
}
/* ── LAYOUT ── */
.page{display:flex;min-height:100vh}

/* ══════════ SIDEBAR ══════════ */
.sb{
  width:240px;flex-shrink:0;
  background:#1a2332;
  border-right:1px solid #222d40;
  padding:1.75rem 1.25rem;
  display:flex;flex-direction:column;
  position:sticky;top:0;height:100vh;overflow-y:auto;
}
.sb-ava{
  width:72px;height:72px;border-radius:50%;
  background:linear-gradient(135deg,#1c6b3a,#28a35a);
  color:#fff;font-size:26px;font-weight:700;
  display:flex;align-items:center;justify-content:center;
  margin:0 auto 10px;border:3px solid #1f3d2a;
}
.sb-name{color:#e8eaf0;font-size:15px;font-weight:600;text-align:center;margin-bottom:3px}
.sb-meta{color:#4a5a6a;font-size:11px;text-align:center;line-height:1.7;margin-bottom:10px}
.sb-badge{
  display:block;width:fit-content;margin:0 auto 1.5rem;
  font-size:11px;font-weight:600;padding:4px 14px;border-radius:20px;
}
.badge-amber{background:#2a1a08;color:#f59e0b;border:1px solid #6b3d08}
.badge-green{background:#0c2e1a;color:#4ade80;border:1px solid #145a30}
.badge-gray {background:#1e2538;color:#9ca3af;border:1px solid #374151}

.sb-sec{margin-bottom:1.5rem}
.sb-sec-title{
  font-size:10px;font-weight:700;letter-spacing:.1em;
  color:#334155;text-transform:uppercase;margin-bottom:10px;
}
.sb-row{
  display:flex;justify-content:space-between;align-items:baseline;
  gap:6px;padding:6px 0;border-bottom:1px solid #1e2a38;
}
.sb-row:last-child{border-bottom:none}
.sb-lbl{color:#4a5a6a;font-size:12px;flex-shrink:0}
.sb-val{color:#b0bec8;font-size:12px;text-align:right;word-break:break-all;font-weight:500}
.sb-val-green{color:#4ade80;font-size:12px;font-weight:600}

.sb-plbl{display:flex;justify-content:space-between;font-size:12px;color:#4a5a6a;margin-bottom:6px}
.sb-ppct{color:#4ade80;font-weight:700}
.sb-pbg{height:5px;background:#1a2538;border-radius:3px;overflow:hidden}
.sb-pfill{height:100%;border-radius:3px;background:linear-gradient(90deg,#1c6b3a,#4ade80);transition:width .5s}

/* ══════════ MAIN ══════════ */
.main{
  flex:1;background:#eef0f5;
  padding:1.5rem 1.75rem;
  display:flex;flex-direction:column;gap:1rem;
  overflow-y:auto;min-width:0;
}

.flash{background:#f0fdf4;border:1px solid #86efac;color:#166534;padding:9px 14px;border-radius:8px;font-size:13px}


.card{background:#fff;border:1px solid #e0e4ee;border-radius:12px;padding:1.25rem 1.5rem}
.card-hd{display:flex;align-items:center;justify-content:space-between;margin-bottom:1rem}
.card-title{font-size:15px;font-weight:700;color:#111827}

.btn{
  display:inline-flex;
  align-items:center;
  justify-content:center;
  gap:5px;
  min-width:90px;
}
.btn span{
    display:flex;
    align-items:center;
    justify-content:center;
}
.btn-out{background:#fff;border-color:#d1d5db;color:#374151}
.btn-out:hover{background:#f9fafb;border-color:#9ca3af}
.btn-prim{background:#1e5fa8;color:#fff;border-color:#1e5fa8}
.btn-prim:hover{background:#1a4e8a}
.btn-ghost{background:transparent;border-color:transparent;color:#6b7280;padding:6px 10px}
.btn-ghost:hover{background:#f3f4f6;color:#111}
.btn-del{background:transparent;border-color:transparent;color:#dc2626;padding:6px 10px}
.btn-del:hover{background:#fef2f2}
.btn-sm{padding:5px 12px;font-size:12px}

/* ── INFO GRID (hiển thị) ── */
.igrid{display:grid;grid-template-columns:1fr 1fr;gap:.85rem 3rem}
.iitem label{
  display:block;font-size:11px;font-weight:700;letter-spacing:.05em;
  text-transform:uppercase;color:#9ca3af;margin-bottom:4px;
}
.iitem p{font-size:14px;color:#111827;font-weight:500}
.iitem p.mt{color:#d1d5db;font-style:italic;font-weight:400;font-size:13px}
.iitem.full{grid-column:1/-1}

/* ── FORM GRID (chỉnh sửa) ── */
.fgrid{display:grid;grid-template-columns:1fr 1fr;gap:10px 1.5rem}
.fi{display:flex;flex-direction:column;gap:4px}
.fi label{font-size:12px;font-weight:600;color:#6b7280}
.fi input,.fi textarea{
  padding:8px 11px;border:1px solid #d1d5db;border-radius:8px;
  font-size:13px;color:#111827;font-family:inherit;transition:border-color .15s;
}
.fi input:focus,.fi textarea:focus{outline:none;border-color:#1e5fa8;box-shadow:0 0 0 3px #dbeafe44}
.fi input:disabled{background:#f9fafb;color:#9ca3af;cursor:not-allowed}
.fi textarea{resize:vertical;min-height:72px}
.fi .err{font-size:11px;color:#dc2626}
.fi.full{grid-column:1/-1}
.fa{display:flex;justify-content:flex-end;gap:8px;margin-top:14px}

/* ── SOCIAL ── */
.soc-list{display:flex;flex-direction:column;gap:8px}
.soc-item{
  display:flex;align-items:center;gap:12px;
  padding:10px 14px;background:#f8f9fc;
  border:1px solid #e8ecf5;border-radius:9px;
}
.soc-ico{font-size:16px;width:20px;text-align:center;flex-shrink:0;opacity:.7}
.soc-text{flex:1;min-width:0}
.soc-lbl{font-size:10px;font-weight:700;color:#9ca3af;text-transform:uppercase;letter-spacing:.06em;margin-bottom:2px}
.soc-url{font-size:13px;color:#1e5fa8;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;display:block}
.soc-url.mt{color:#d1d5db;font-style:italic;font-size:12px}

.sf-list{display:flex;flex-direction:column;gap:8px}
.sf-row{display:flex;align-items:center;gap:10px}
.sf-ico{font-size:16px;width:20px;text-align:center;flex-shrink:0;opacity:.6}
.sf-row input{
  flex:1;padding:8px 11px;border:1px solid #d1d5db;
  border-radius:8px;font-size:13px;color:#111827;font-family:inherit;
}
.sf-row input:focus{outline:none;border-color:#1e5fa8}

/* ── CV ── */
.cv-item{
  display:flex;align-items:center;gap:10px;
  padding:10px 14px;background:#f8f9fc;
  border:1px solid #e8ecf5;border-radius:9px;margin-bottom:8px;
}
.cv-ico{font-size:22px;flex-shrink:0}
.cv-inf{flex:1;min-width:0}
.cv-name{
  font-size:13px;font-weight:600;color:#111827;
  display:flex;align-items:center;gap:6px;
  white-space:nowrap;overflow:hidden;text-overflow:ellipsis;
}
.cv-meta{font-size:11px;color:#9ca3af;margin-top:2px}
.cv-prim{font-size:10px;font-weight:700;padding:2px 8px;border-radius:20px;background:#dcfce7;color:#166534;flex-shrink:0}
.cv-acts{display:flex;gap:4px;flex-shrink:0}

.upzone{
  border:2px dashed #cdd2de;border-radius:10px;
  padding:2rem 1rem;text-align:center;cursor:pointer;
  transition:all .2s;margin-top:6px;display:block;
}
.upzone:hover{border-color:#1e5fa8;background:#f0f6ff}
.upzone input[type=file]{display:none}
.up-ico{font-size:30px;margin-bottom:8px}
.up-title{font-size:13px;font-weight:600;color:#374151;margin-bottom:4px}
.up-sub{font-size:12px;color:#9ca3af;margin-bottom:14px}
.up-prev{
  display:flex;align-items:center;gap:8px;
  padding:10px 13px;background:#eff6ff;
  border:1px solid #bfdbfe;border-radius:8px;margin-top:10px;
}
.up-prev p{font-size:13px;color:#1e40af;font-weight:500;flex:1;min-width:0;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.empty-cv{text-align:center;padding:1.5rem;color:#d1d5db;font-size:13px}
.err{font-size:11px;color:#dc2626}

/* ══════════ RESPONSIVE ══════════ */
@media(max-width:960px){
  .sb{width:210px;padding:1.5rem 1rem}
}
@media(max-width:700px){
  .page{flex-direction:column}
  .sb{
    width:100%;height:auto;position:static;
    flex-direction:row;flex-wrap:wrap;
    align-items:center;padding:1rem 1.25rem;
    border-right:none;border-bottom:1px solid #222d40;gap:0;
  }
  .sb-ava{width:48px;height:48px;font-size:18px;margin:0 12px 0 0;flex-shrink:0}
  .sb-name{text-align:left;font-size:14px}
  .sb-meta{text-align:left;font-size:11px}
  .sb-badge{margin:0}
  .sb-sec{display:none}
  .main{padding:1rem}
}
@media(max-width:480px){
  .igrid,.fgrid{grid-template-columns:1fr}
  .card{padding:1rem}
  .cv-item{flex-wrap:wrap}
  .cv-acts{width:100%;justify-content:flex-end;margin-top:6px}
}
</style>

<div class="page">
   
  
  <aside class="sb">
  <div class="sb-ava">{{ auth()->user()?->initials ?? '?' }}</div>
  <div class="sb-name">{{ auth()->user()?->name ?? 'Guest' }}</div>
  <div class="sb-meta">
    MSV: {{ auth()->user()?->profile?->msv ?? '—' }}<br>
    {{ auth()->user()?->profile?->lop ?? '—' }}
  </div>
    @php
      $st = $user->profile?->status ?? 'pending';
      $bc = match($st) { 'active' => 'badge-green', 'pending' => 'badge-amber', default => 'badge-gray' };
      $bl = match($st) { 'active' => 'Đang hoạt động', 'pending' => 'Chờ duyệt', default => 'Không hoạt động' };
    @endphp
    <span class="sb-badge {{ $bc }}">{{ $bl }}</span>

    <div class="sb-sec">
      <div class="sb-sec-title">Thông tin nhanh</div>
      <div class="sb-row"><span class="sb-lbl">Khoa</span><span class="sb-val">{{ $user->profile?->khoa ?? '—' }}</span></div>
      <div class="sb-row"><span class="sb-lbl">Ngành</span><span class="sb-val">{{ $user->profile?->nganh ?? '—' }}</span></div>
      <div class="sb-row"><span class="sb-lbl">Email</span><span class="sb-val">{{ $user->email ?? '—' }}</span></div>
      <div class="sb-row"><span class="sb-lbl">Năm TN</span><span class="sb-val">{{ $user->profile?->nam_tot_nghiep ?? '—' }}</span></div>
    </div>
  </aside>
   

  <div class="main">

    @if(session('success'))
      <div class="flash">✓ {{ session('success') }}</div>
    @endif

    <div class="card">
      <div class="card-hd">
        <div class="card-title">Thông tin cơ bản</div>
        @if(isset($edit) && !$edit) 
          <button wire:click="$set('edit',true)" class="btn btn-out">Chỉnh sửa</button>
        @endif
      </div>    

      @if(isset($edit) && !$edit)
        <div class="fgrid">
          <div class="fi">
            <label>Họ và tên *</label>
            <input wire:model="name" type="text" placeholder="Nhập họ tên">
            @error('name')<div class="err">{{ $message }}</div>@enderror
          </div>
          <div class="fi">
            <label>Mã sinh viên</label>
            <input type="text" value="{{ $user->profile?->msv ?? '—' }}" disabled style="background:#f3f4f6;color:#9ca3af">
          </div>
          <div class="fi">
            <label>Số điện thoại</label>
            <input wire:model="phone" type="text" placeholder="0912 345 678">
            @error('phone')<div class="err">{{ $message }}</div>@enderror
          </div>
          <div class="fi">
            <label>Quê quán</label>
            <input wire:model="que_quan" type="text" placeholder="VD: Quảng Ninh">
          </div>
          <div class="fi">
            <label>Tỉnh / Thành phố</label>
            <input wire:model="tinh_thanh" type="text" placeholder="VD: Hà Nội">
          </div>
          <div class="fi fi-full">
            <label>Giới thiệu bản thân</label>
            <textarea wire:model="bio" placeholder="Mô tả ngắn về bản thân..."></textarea>
          </div>
        </div>
        <div class="fa">
          <button wire:click="cancelInfo" class="btn btn-ghost">Huỷ</button>
          <button wire:click="saveInfo" class="btn btn-prim">
            <span wire:loading.remove wire:target="saveInfo">Lưu</span>
            <span wire:loading wire:target="saveInfo">Đang lưu...</span>
          </button>
        </div>

      @else
        <div class="igrid">
          <div class="iitem">
            <label>Họ và tên</label>
            <p>{{ $user->name ?? '' }}</p>
          </div>
          <div class="iitem">
            <label>Mã sinh viên</label>
            <p>{{ $user->profile?->msv ?? '—' }}</p>
          </div>
          <div class="iitem">
            <label>Số điện thoại</label>
              <p class="{{ auth()->user()?->profile?->phone ? '' : 'mt' }}">{{ auth()->user()?->profile?->phone ?? 'Chưa cập nhật' }}</p>          
          </div>
          <div class="iitem">
            <label>Lớp</label>
            <p>{{ $user->profile?->lop ?? '—' }}</p>
          </div>
          <div class="iitem">
            <label>Quê quán</label>
            <p class="{{ auth()->user()?->profile?->que_quan ? '' : 'mt' }}">{{ auth()->user()?->profile?->que_quan ?: 'Chưa cập nhật' }}</p>
          </div>
          <div class="iitem">
            <label>Địa chỉ hiện tại</label>
            <p class="{{ auth()->user()?->profile?->tinh_thanh ? '' : 'mt' }}">{{ auth()->user()?->profile?->tinh_thanh ?: 'Chưa cập nhật' }}</p>
          </div>
          @if(auth()->user()?->profile?->bio)
          <div class="iitem" style="grid-column:1/-1">
            <label>Giới thiệu</label>
            <p style="font-weight:400;color:#374151;line-height:1.6">{{ $user->profile->bio }}</p>
          </div>
          @endif
        </div>
      @endif
    </div>

   
    <div class="card">
      <div class="card-hd">
        <div class="card-title">Mạng xã hội &amp; Liên kết</div>
        @if(isset($editingSocial) && !$editingSocial)
          <button wire:click="$set('editingSocial',true)" class="btn btn-out">Chỉnh sửa</button>
        @endif
      </div>

       @if(isset($editingSocial) && !$editingSocial)
        <div class="sf-list">
          <div class="sf-row">
            <span><i class="fa-brands fa-github"></i></span>
            <input wire:model="github" type="url" placeholder="https://github.com/username">
          </div>
          @error('github')<div class="err" style="margin-left:32px">{{ $message }}</div>@enderror
          <div class="sf-row">
            <span><i class="fa-brands fa-linkedin"></i></span>
            <input wire:model="linkedin" type="url" placeholder="https://linkedin.com/in/username">
          </div>
          @error('linkedin')<div class="err" style="margin-left:32px">{{ $message }}</div>@enderror
          <div class="sf-row">
            <span><i class="fa-brands fa-globe"></i></span>
            <input wire:model="website" type="url" placeholder="https://yourwebsite.com">
          </div>
          @error('website')<div class="err" style="margin-left:32px">{{ $message }}</div>@enderror
        </div>
        <div class="fa">
          <button wire:click="cancelSocial" class="btn btn-ghost">Huỷ</button>
          <button wire:click="saveSocial" class="btn btn-prim">
            <span wire:loading wire:target="saveSocial">Đang lưu...</span>
            <span wire:loading.remove wire:target="saveSocial">Lưu</span>
          </button>
        </div>

      @else
        <div class="soc-list">
          <div class="soc-item">
            <div class="soc-ico"><i class="fa-brands fa-github"></i></div>
            <div class="soc-text">
              <div class="soc-lbl">GitHub</div>
              @if(auth()->user()?->profile?->github)
                <a href="{{auth()->user()?->profile->github }}" target="_blank" class="soc-url">{{ auth()->user()?->profile->github }}</a>
              @else
                <span class="soc-url mt">Chưa cập nhật</span>
              @endif
            </div>
          </div>
          <div class="soc-item">
            <div class="soc-ico"><i class="fa-brands fa-linkedin"></i></div>
            <div class="soc-text">
              <div class="soc-lbl">LinkedIn</div>
              @if(auth()->user()?->profile?->linkedin)
                <a href="{{ auth()->user()?->profile->linkedin }}" target="_blank" class="soc-url">{{ auth()->user()?->profile->linkedin }}</a>
              @else
                <span class="soc-url mt">Chưa cập nhật</span>
              @endif
            </div>
          </div>
          <div class="soc-item">
            <div class="soc-ico"><i class="fa-brands fa-globe"></i></div>
            <div class="soc-text">
              <div class="soc-lbl">Website</div>
              @if(auth()->user()?->profile?->website)
                <a href="{{ auth()->user()?->profile->website }}" target="_blank" class="soc-url">{{ auth()->user()?->profile->website }}</a>
              @else
                <span class="soc-url mt">Chưa cập nhật</span>
              @endif
            </div>
          </div>
        </div>
      @endif
    </div>

  
    <div class="card">
      <div class="card-hd">
        <div class="card-title">CV / Hồ sơ đính kèm</div>
      </div>

      
      @php
        $cvs = auth()->user()?->cv()->get() ?? collect();
      @endphp

      @forelse($cvs as $cv)
        <div class="cv-item">
          <div class="cv-ico"><i class="fa-solid fa-file-lines"></i></div>
          <div class="cv-inf">
            <div class="cv-name">
              {{ $cv->file_name }}
              @if($cv->is_primary)<span class="cv-prim">Chính</span>@endif
            </div>
            <div class="cv-meta">{{ $cv->file_size }} · {{ $cv->created_at->format('d/m/Y') }}</div>
          </div>
          <div class="cv-acts">
            <a href="{{ $cv->url }}" download class="btn btn-sm btn-out">↓ Tải</a>
            @if(!$cv->is_primary)
              <button wire:click="setPrimary({{ $cv->id }})" class="btn btn-sm btn-ghost">Đặt chính</button>
            @endif
            <button wire:click="deleteCv({{ $cv->id }})" wire:confirm="Xoá CV này?" class="btn btn-sm btn-del">✕</button>
          </div>
        </div>
      @empty
        <div class="empty-cv"><i class="fa-solid fa-folder-open"></i> Chưa có CV nào. Tải lên bên dưới.</div>
      @endforelse

      {{-- Upload --}}
      <label class="upzone">
        <input wire:model="cvFile" type="file" accept=".pdf,.doc,.docx">
        <div class="up-ico"><i class="fa-solid fa-cloud-upload-alt"></i></div>
        <div class="up-title">Tải lên CV (PDF)</div>
        <div class="up-sub">PDF, DOC, DOCX · Tối đa 5MB</div>
        <span class="btn btn-out btn-sm" style="pointer-events:none">Chọn file</span>
      </label>

      @if(!empty($errors->get('cvFile')) == false && request()->hasFile('cvFile'))
        <div class="up-prev">
          <span style="font-size:18px"><i class="fa-solid fa-paperclip"></i></span>
          <p>{{ is_object($cvFile) ? $cvFile->getClientOriginalName() : 'File đã chọn' }}</p>
        </div>
        @error('cvFile')<div class="err" style="margin-top:5px;font-size:12px">{{ $message }}</div>@enderror
        @if(!$errors->has('cvFile'))
          <div style="text-align:right;margin-top:10px">
            <button wire:click="uploadCv" class="btn btn-prim">
              <span wire:loading wire:target="uploadCv">Đang tải...</span>
              <span wire:loading.remove wire:target="uploadCv">↑ Xác nhận tải lên</span>
            </button>
          </div>
        @endif
      @endif
    </div>

  </div>
</div>
</div>
