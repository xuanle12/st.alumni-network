<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
.aw{padding:1.5rem 1.75rem;display:flex;flex-direction:column;gap:1rem;min-height:100vh;background:#f8fafc}
.flash{background:#f0fdf4;border:1px solid #86efac;color:#166534;padding:9px 14px;border-radius:8px;font-size:13px}
 
.topbar{display:flex;align-items:center;justify-content:space-between;gap:10px;flex-wrap:wrap}
.tt{font-size:17px;font-weight:700;color:#0f172a}.ts{font-size:12px;color:#64748b;margin-top:2px}
.btn-add{padding:8px 16px;border-radius:9px;font-size:13px;font-weight:600;cursor:pointer;background:#1d4ed8;color:#fff;border:none;display:inline-flex;align-items:center;gap:6px}
.btn-add:hover{background:#1e40af}
 
.stats{display:grid;grid-template-columns:repeat(4,1fr);gap:12px}
.stat{background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:1rem 1.1rem}
.stat-ic{width:32px;height:32px;border-radius:9px;display:flex;align-items:center;justify-content:center;font-size:15px;margin-bottom:9px}
.ic-b{background:#eff6ff}.ic-g{background:#f0fdf4}.ic-o{background:#fff7ed}.ic-a{background:#fffbeb}
.stat-n{font-size:24px;font-weight:700}.stat-l{font-size:11px;color:#64748b;margin-top:3px}
.n-b{color:#0f172a}.n-g{color:#16a34a}.n-o{color:#ea580c}.n-a{color:#d97706}
 
.toolbar{display:flex;gap:8px;flex-wrap:wrap}
.sw{flex:1;min-width:180px;position:relative}
.sw input{width:100%;padding:9px 12px 9px 34px;background:#fff;border:1px solid #e2e8f0;border-radius:9px;font-size:13px;color:#0f172a;font-family:inherit}
.sw input:focus{outline:none;border-color:#3b82f6}
.sw input::placeholder{color:#94a3b8}
.sw-ic{position:absolute;left:11px;top:50%;transform:translateY(-50%);font-size:13px;color:#94a3b8}
.sel{padding:9px 10px;background:#fff;border:1px solid #e2e8f0;border-radius:9px;font-size:13px;color:#475569;font-family:inherit}
.sel:focus{outline:none;border-color:#3b82f6}
 
.tcard{
    background:#fff;
    border:1px solid #e2e8f0;
    border-radius:12px;
    overflow:visible;}
.tbl-wrap{
    overflow-x:auto;
    overflow-y:visible;
}
.tbl{width:100%;border-collapse:collapse;table-layout:fixed;min-width:620px}
.tbl th{padding:10px 14px;font-size:10.5px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:#94a3b8;text-align:left;background:#f8fafc;border-bottom:1px solid #e2e8f0}
.tbl td{padding:12px 14px;border-bottom:1px solid #f1f5f9;vertical-align:middle}
.tbl tr:last-child td{border-bottom:none}
.tbl tbody tr:hover td{background:#fafbfc}

 
.post-row{display:flex;align-items:center;gap:10px}
.post-thumb{width:44px;height:36px;border-radius:7px;background:#f1f5f9;border:1px solid #e2e8f0;display:flex;align-items:center;justify-content:center;font-size:16px;flex-shrink:0;overflow:hidden}
.post-thumb img{width:100%;height:100%;object-fit:cover}
.post-title{font-size:13px;font-weight:600;color:#0f172a;line-height:1.4;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.post-meta{font-size:11px;color:#94a3b8;margin-top:2px}
 
.bd{display:inline-flex;align-items:center;gap:4px;font-size:10.5px;font-weight:600;padding:3px 8px;border-radius:20px}
.bd::before{content:'';width:5px;height:5px;border-radius:50%;flex-shrink:0}
.bd-g{background:#f0fdf4;color:#15803d}.bd-g::before{background:#16a34a}
.bd-a{background:#fffbeb;color:#b45309}.bd-a::before{background:#d97706}
.bd-r{background:#fef2f2;color:#b91c1c}.bd-r::before{background:#dc2626}
.bd-o{background:#fff7ed;color:#c2410c}.bd-o::before{background:#ea580c}
 
.author-row{display:flex;align-items:center;gap:6px}
.author-ava{width:26px;height:26px;border-radius:50%;background:#eff6ff;color:#1d4ed8;font-size:10px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0}
 

.dot-wrap{position:relative;display:inline-block}
.dot-btn{width:30px;height:30px;border-radius:7px;border:1px solid #e2e8f0;background:transparent;cursor:pointer;color:#94a3b8;display:flex;align-items:center;justify-content:center;flex-direction:column;gap:3px}
.dot-btn:hover{background:#f1f5f9}
.dot-btn span{display:block;width:13px;height:1.5px;background:currentColor;border-radius:2px}
.dropdown{display:none;position:absolute;top:34px;right:0;background:#fff;border:1px solid #e2e8f0;border-radius:10px;min-width:172px;z-index:999;overflow:hidden;box-shadow:0 8px 24px rgba(0,0,0,.1)}
.dropdown.open{display:block}
.dd-item{padding:9px 14px;font-size:13px;cursor:pointer;display:flex;align-items:center;gap:9px;color:#334155}
.dd-item:hover{background:#f8fafc}
.dd-item.green{color:#15803d}.dd-item.green:hover{background:#f0fdf4}
.dd-item.amber{color:#b45309}.dd-item.amber:hover{background:#fffbeb}
.dd-item.red{color:#b91c1c}.dd-item.red:hover{background:#fef2f2}
.dd-sep{height:1px;background:#f1f5f9;margin:3px 0}
 
.pgn{display:flex;justify-content:space-between;align-items:center;padding:.875rem 1rem;border-top:1px solid #f1f5f9;background:#fafafa;flex-wrap:wrap;gap:8px}
.pgn-info{font-size:12px;color:#94a3b8}
 
/* buttons */
.btn{display:inline-flex;align-items:center;gap:5px;padding:7px 16px;border-radius:8px;font-size:13px;font-weight:600;border:1px solid transparent;cursor:pointer;font-family:inherit;transition:all .15s;white-space:nowrap}
.btn-ghost{background:transparent;border-color:#e2e8f0;color:#475569}
.btn-ghost:hover{background:#f8fafc}
.btn-prim{background:#1d4ed8;color:#fff}.btn-prim:hover{background:#1e40af}
.btn-green{background:#15803d;color:#fff}.btn-green:hover{background:#166534}
.btn-amber{background:#d97706;color:#fff}.btn-amber:hover{background:#b45309}
.btn-del{background:#fef2f2;color:#b91c1c;border-color:#fecaca}.btn-del:hover{background:#fee2e2}
 
/* MODAL */
.mo-bg{position:fixed;inset:0;background:rgba(15,23,42,.5);display:flex;align-items:center;justify-content:center;z-index:999;padding:1rem}
.mo{background:#fff;border-radius:14px;width:100%;max-width:600px;max-height:92vh;overflow-y:auto;box-shadow:0 20px 60px rgba(0,0,0,.2)}
.mo-sm{max-width:380px}
.mo-hd{padding:1.1rem 1.4rem;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;background:#fff;z-index:1}
.mo-title{font-size:15px;font-weight:700;color:#0f172a}
.mo-close{width:28px;height:28px;border-radius:8px;border:1px solid #e2e8f0;background:transparent;cursor:pointer;color:#94a3b8;font-size:16px;display:flex;align-items:center;justify-content:center}
.mo-body{padding:1.4rem;display:flex;flex-direction:column;gap:12px}
.mo-ft{padding:.875rem 1.4rem;border-top:1px solid #f1f5f9;display:flex;justify-content:flex-end;gap:8px;position:sticky;bottom:0;background:#fff;flex-wrap:wrap}
 
/* form fields */
.fi{display:flex;flex-direction:column;gap:5px}
.fi label{font-size:12px;font-weight:600;color:#475569}
.fi input,.fi select,.fi textarea{width:100%;padding:9px 11px;border:1px solid #e2e8f0;border-radius:9px;font-size:13px;color:#0f172a;font-family:inherit;background:#fff}
.fi input:focus,.fi select:focus,.fi textarea:focus{outline:none;border-color:#3b82f6;box-shadow:0 0 0 3px #3b82f611}
.fi textarea{resize:vertical}
.fi .err{font-size:11px;color:#dc2626}
.fg2{display:grid;grid-template-columns:1fr 1fr;gap:12px}
.mo-sec{font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:#94a3b8}
.mdiv{border:none;border-top:1px solid #f1f5f9}
.check-row{display:flex;align-items:center;gap:8px;font-size:13px;color:#374151}
.check-row input[type=checkbox]{width:16px;height:16px;cursor:pointer}
 
/* preview */
.pv-thumb{width:100%;height:160px;background:#f1f5f9;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:36px;margin-bottom:1rem;border:1px solid #e2e8f0;overflow:hidden}
.pv-thumb img{width:100%;height:100%;object-fit:cover}
.pv-cat{font-size:11px;font-weight:700;color:#1d4ed8;text-transform:uppercase;letter-spacing:.06em;margin-bottom:6px}
.pv-title{font-size:17px;font-weight:700;color:#0f172a;line-height:1.4;margin-bottom:10px}
.pv-meta{display:flex;align-items:center;gap:12px;font-size:12px;color:#94a3b8;margin-bottom:14px;flex-wrap:wrap}
.pv-excerpt{font-size:13px;color:#374151;font-style:italic;margin-bottom:12px;padding:10px 12px;background:#f8fafc;border-radius:8px;border-left:3px solid #e2e8f0;line-height:1.7}
.pv-body{font-size:13px;color:#64748b;line-height:1.8}
 
/* approve modal */
.ap-info{background:#fffbeb;border:1px solid #fde68a;border-radius:10px;padding:1rem;margin-bottom:1rem}
.ap-title{font-size:14px;font-weight:600;color:#92400e;margin-bottom:4px}
.ap-meta{font-size:12px;color:#b45309}
 
/* confirm */
.cf-wrap{padding:2rem 1.5rem;text-align:center}
.cf-ic{font-size:34px;margin-bottom:10px}
.cf-t{font-size:15px;font-weight:700;color:#0f172a;margin-bottom:6px}
.cf-s{font-size:13px;color:#64748b;line-height:1.7;margin-bottom:1.25rem}
.cf-btns{display:flex;gap:10px;justify-content:center}
 
.empty{text-align:center;padding:3rem;color:#cbd5e1;font-size:13px}
.spin{display:inline-block;width:13px;height:13px;border:2px solid rgba(255,255,255,.3);border-top-color:#fff;border-radius:50%;animation:spin .6s linear infinite}
@keyframes spin{to{transform:rotate(360deg)}}
 
/* responsive */
@media(max-width:1024px){.stats{grid-template-columns:repeat(2,1fr)}}
@media(max-width:768px){
  .aw{padding:1rem}
  .stats{grid-template-columns:repeat(2,1fr)}
  .toolbar{flex-direction:column}
  .sw,.sel{width:100%}
  .topbar{flex-direction:column;align-items:flex-start}
  .btn-add{width:100%;justify-content:center}
  .fg2{grid-template-columns:1fr}
  .tbl th:nth-child(3),.tbl td:nth-child(3){display:none}
}
@media(max-width:480px){
  .tbl th:nth-child(5),.tbl td:nth-child(5){display:none}
}
</style>
 
<div>
<div class="aw">
 
@if(session('success'))
  <div class="flash">✓ {{ session('success') }}</div>
@endif
 
<div class="topbar">
  <div><div class="tt">Bài viết</div><div class="ts">Quản lý nội dung & tin tức</div></div>
  <button wire:click="openAdd" class="btn-add">＋ Viết bài mới</button>
</div>
 
<div class="stats">
  <div class="stat"><div class="stat-ic ic-b"><i class="fa-solid fa-pen-to-square"></i></div><div class="stat-n n-b">{{ $stats['total'] }}</div><div class="stat-l">Tổng bài viết</div></div>
  <div class="stat"><div class="stat-ic ic-g"><i class="fa-solid fa-check-circle"></i></div><div class="stat-n n-g">{{ $stats['published'] }}</div><div class="stat-l">Đã đăng</div></div>
  <div class="stat"><div class="stat-ic ic-o"><i class="fa-solid fa-bell"></i></div><div class="stat-n n-o">{{ $stats['pending'] }}</div><div class="stat-l">Chờ duyệt</div></div>
  <div class="stat"><div class="stat-ic ic-a"><i class="fa-solid fa-clock"></i></div><div class="stat-n n-a">{{ $stats['draft'] }}</div><div class="stat-l">Bản nháp</div></div>
</div>
 
<div class="toolbar">
  <div class="sw">
    <span class="sw-ic"><i class="fa-solid fa-magnifying-glass"></i></span>
    <input wire:model.live.debounce.300ms="search" type="text" placeholder="Tìm tiêu đề, tác giả...">
  </div>
  <select wire:model.live="filterStatus" class="sel">
    <option value="">Tất cả trạng thái</option>
    <option value="published">Đã đăng</option>
    <option value="pending">Chờ duyệt</option>
    <option value="draft">Bản nháp</option>
    <option value="hidden">Ẩn</option>
  </select>
  <select wire:model.live="filterCat" class="sel">
    <option value="">Tất cả danh mục</option>
    <option value="Tin tức">Tin tức</option>
    <option value="Sự kiện">Sự kiện</option>
    <option value="Tuyển dụng">Tuyển dụng</option>
    <option value="Chia sẻ">Chia sẻ</option>
  </select>
</div>
 
<div class="tcard">
  <div class="tbl-wrap">
    <table class="tbl">
      <thead>
        <tr>
          <th style="width:36%">Bài viết</th>
          <th style="width:12%">Danh mục</th>
          <th style="width:14%">Tác giả</th>
          <th style="width:12%">Trạng thái</th>
          <th style="width:13%">Ngày</th>
          <th style="width:13%;text-align:right">Thao tác</th>
        </tr>
      </thead>
      <tbody>
        @forelse($posts as $post)
        @php
          $bc = match($post->status) {
            'published' => 'bd-g',
            'pending'   => 'bd-o',
            'draft'     => 'bd-a',
            default     => 'bd-r'
          };
          $bl = match($post->status) {
            'published' => 'Đã đăng',
            'pending'   => 'Chờ duyệt',
            'draft'     => 'Bản nháp',
            default     => 'Ẩn'
          };
          $catIcons = [
            'Sự kiện'   => '<i class="fa-solid fa-calendar-days"></i>',
            'Tuyển dụng'=> '<i class="fa-solid fa-briefcase"></i>',
            'Chia sẻ'   => '<i class="fa-solid fa-comments"></i>',
            'Tin tức'   => '<i class="fa-solid fa-newspaper"></i>',
          ];

          $ico = $catIcons[$post->category] ?? '<i class="fa-solid fa-file-lines"></i>';        
      @endphp
        <tr>
          <td>
            <div class="post-row">
              <div class="post-thumb">
                @if($post->thumbnail)
                  <img src="{{ asset('storage/'.$post->thumbnail) }}" alt="">
                @else
                  {!! $ico !!}
                @endif
              </div>
              <div style="min-width:0">
                <div class="post-title">{{ $post->title }}</div>
                <div class="post-meta"><i class="fa-solid fa-eye"></i> {{ $post->formatted_views }} lượt xem</div>
              </div>
            </div>
          </td>
          <td><span style="font-size:12px;color:#64748b">{{ $post->category ?: '—' }}</span></td>
          <td>
            <div class="author-row">
              <div class="author-ava">{{ $post->author?->initials ?? '?' }}</div>
              <span style="font-size:12px;color:#64748b;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:80px">{{ $post->author?->name ?? '—' }}</span>
            </div>
          </td>
          <td><span class="bd {{ $bc }}">{{ $bl }}</span></td>
          <td><span style="font-size:12px;color:#94a3b8">{{ $post->published_date }}</span></td>
          <td style="text-align:right">
            <div class="dot-wrap" x-data="{ open: false }" @click.away="open = false">
              <button type="button" class="dot-btn" @click.stop="open = !open">
                <span></span><span></span><span></span>
              </button>
              <div class="dropdown" :class="{ open: open }">
 
                {{-- Xem trước --}}
                <div class="dd-item" @click="open=false" wire:click="openView({{ $post->id }})">
                  <i class="fa-solid fa-eye"></i> Xem trước
                </div>
 
               
                @if($post->status === 'pending')
                <div class="dd-item green" @click="open=false" wire:click="openApprove({{ $post->id }})">
                  <i class="fa-solid fa-check"></i> Duyệt bài
                </div>
                @endif
 
                
                @if(in_array($post->status, ['draft', 'hidden']))
                <div class="dd-item green" @click="open=false" wire:click="openApprove({{ $post->id }})"">
                  <i class="fa-solid fa-check"></i> Duyệt & Đăng
                </div>
                @endif
 
                
                @if($post->status === 'published')
                <div class="dd-item amber" @click="open=false" wire:click="toDraft({{ $post->id }})">
                  <i class="fa-solid fa-clock"></i> Chờ duyệt 
                </div>
                @endif
 
                
                @if($post->status === 'published')
                <div class="dd-item amber" @click="open=false" wire:click="hidePost({{ $post->id }})">
                  <i class="fa-solid fa-eye-slash"></i> Từ chối 
                </div>
                @endif
 
                <div class="dd-sep"></div>
 
                
                <div class="dd-item" @click="open=false" wire:click="openEdit({{ $post->id }})">
                  <i class="fa-solid fa-edit"></i> Chỉnh sửa
                </div>
 
                <div class="dd-sep"></div>
 
                
                <div class="dd-item red" @click="open=false" wire:click="confirmDelete({{ $post->id }})">
                  <i class="fa-solid fa-trash"></i> Xoá
                </div>
 
              </div>
            </div>
          </td>
        </tr>
        @empty
        <tr><td colspan="6"><div class="empty">📭 Không tìm thấy bài viết nào.</div></td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <div class="pgn">
    <div class="pgn-info">
      Hiển thị {{ $posts->firstItem() }}–{{ $posts->lastItem() }} / {{ $posts->total() }} bài viết
    </div>
    {{ $posts->links() }}
  </div>
</div>
 
</div>
 

@if($showModal)
<div class="mo-bg" wire:click.self="closeModal">
  <div class="mo">
    <div class="mo-hd">
      <div class="mo-title">{{ $editId ? 'Chỉnh sửa bài viết' : 'Viết bài mới' }}</div>
      <button class="mo-close" wire:click="closeModal">✕</button>
    </div>
    <div class="mo-body">
 
      <div class="mo-sec">Thông tin cơ bản</div>
 
      <div class="fi">
        <label>Tiêu đề *</label>
        <input wire:model="f_title" type="text" placeholder="Nhập tiêu đề bài viết...">
        @error('f_title')<div class="err">{{ $message }}</div>@enderror
      </div>
 
      <div class="fg2">
        <div class="fi">
          <label>Danh mục *</label>
          <select wire:model="f_category">
            <option value="">-- Chọn danh mục --</option>
            <option value="Tin tức"><i class="fa-solid fa-newspaper"></i> Tin tức</option>
            <option value="Sự kiện"><i class="fa-solid fa-calendar"></i> Sự kiện</option>
            <option value="Tuyển dụng"><i class="fa-solid fa-briefcase"></i> Tuyển dụng</option>
            <option value="Chia sẻ"><i class="fa-solid fa-comments"></i> Chia sẻ</option>
          </select>
          @error('f_category')<div class="err">{{ $message }}</div>@enderror
        </div>
        <div class="fi">
          <label>Trạng thái</label>
          <select wire:model="f_status">
            <option value="draft"><i class="fa-solid fa-clock"></i> Chờ duyệt</option>
            <option value="pending"><i class="fa-solid fa-paper-plane"></i> Gửi duyệt</option>
            <option value="published"><i class="fa-solid fa-check"></i> Đăng luôn</option>
            <option value="hidden"><i class="fa-solid fa-eye-slash"></i> Từ chối</option>
          </select>
        </div>
      </div>
 
      <div class="fi">
        <label>Mô tả ngắn</label>
        <textarea wire:model="f_excerpt" rows="2" placeholder="Tóm tắt nội dung bài viết..."></textarea>
      </div>
 
      <hr class="mdiv">
      <div class="mo-sec">Nội dung *</div>
 
      <div class="fi">
        <textarea wire:model="f_content" rows="8"
          placeholder="Viết nội dung bài viết tại đây...&#10;&#10;(Hỗ trợ văn bản thường. Sau này sẽ tích hợp editor rich text.)"></textarea>
        @error('f_content')<div class="err">{{ $message }}</div>@enderror
      </div>
 
      <hr class="mdiv">
 
      <div class="check-row">
        <input type="checkbox" wire:model="f_featured" id="featured">
        <label for="featured"><i class="fa-solid fa-star"></i> Đánh dấu là bài viết nổi bật</label>
      </div>
 
    </div>
    <div class="mo-ft">
      <button wire:click="closeModal" class="btn btn-ghost">Huỷ</button>
      <button wire:click="save" class="btn btn-prim">
        <span wire:loading.remove wire:target="save">{{ $editId ? 'Cập nhật' : 'Lưu bài viết' }}</span>
        <span wire:loading wire:target="save"><span class="spin"></span> Đang lưu...</span>
      </button>
    </div>
  </div>
</div>
@endif
 

@if($showView && $viewPost)
<div class="mo-bg" wire:click.self="closeView">
  <div class="mo">
    <div class="mo-hd">
      <div class="mo-title">Xem trước bài viết</div>
      <button class="mo-close" wire:click="closeView">✕</button>
    </div>
    <div class="mo-body" style="gap:0">
    @php
      $catIcons = [
        'Sự kiện'    => '<i class="fa-solid fa-calendar-days"></i>',
        'Tuyển dụng' => '<i class="fa-solid fa-briefcase"></i>',
        'Chia sẻ'    => '<i class="fa-solid fa-comments"></i>',
        'Tin tức'    => '<i class="fa-solid fa-newspaper"></i>',
      ];
    @endphp      
    <div class="pv-thumb">
        @if($viewPost->thumbnail)
          <img src="{{ asset('storage/'.$viewPost->thumbnail) }}" alt="">
        @else
          {!! $catIcons[$viewPost->category] ?? '<i class="fa-solid fa-file-lines"></i>' !!}
        @endif
      </div>
      <div class="pv-cat">{{ $viewPost->category ?: 'Chưa phân loại' }}</div>
      <div class="pv-title">{{ $viewPost->title }}</div>
      <div class="pv-meta">
        <span><i class="fa-solid fa-pen"></i> {{ $viewPost->author?->name ?? '—' }}</span>
        <span><i class="fa-solid fa-calendar-days"></i> {{ $viewPost->published_date }}</span>
        <span><i class="fa-solid fa-eye"></i> {{ $viewPost->formatted_views }} lượt xem</span>
        @php
          $vbc = match($viewPost->status){ 'published'=>'bd-g','pending'=>'bd-o','draft'=>'bd-a',default=>'bd-r' };
          $vbl = match($viewPost->status){ 'published'=>'Đã đăng','pending'=>'Chờ duyệt','draft'=>'Bản nháp',default=>'Ẩn' };
        @endphp
        <span class="bd {{ $vbc }}">{{ $vbl }}</span>
      </div>
      @if($viewPost->excerpt)
        <div class="pv-excerpt">{{ $viewPost->excerpt }}</div>
      @endif
      <div class="pv-body">{{ $viewPost->content }}</div>
    </div>
    <div class="mo-ft">
      <button wire:click="closeView" class="btn btn-ghost">Đóng</button>
      <button wire:click="openEdit({{ $viewPost->id }})" class="btn btn-ghost"><i class="fa-solid fa-pen-to-square"></i> Sửa</button>
      @if(in_array($viewPost->status, ['draft','pending','hidden']))
        <button wire:click="openApprove({{ $viewPost->id }})" class="btn btn-green"><i class="fa-solid fa-check"></i> Duyệt & Đăng</button>
      @elseif($viewPost->status === 'published')
        <button wire:click="toDraft({{ $viewPost->id }})" class="btn btn-amber"><i class="fa-solid fa-clock"></i> Về nháp</button>
      @endif
    </div>
  </div>
</div>
@endif
 

@if($showApprove && $approvePost)
<div class="mo-bg" wire:click.self="closeApprove">
  <div class="mo mo-sm">
    <div class="mo-hd">
      <div class="mo-title">✓ Duyệt bài viết</div>
      <button class="mo-close" wire:click="closeApprove">✕</button>
    </div>
    <div class="mo-body">
      <div class="ap-info">
        <div class="ap-title">{{ $approvePost->title }}</div>
        <div class="ap-meta">
          <i class="fa-solid fa-pen"></i> {{ $approvePost->author?->name ?? '—' }} ·
          <i class="fa-solid fa-calendar-days"></i> {{ $approvePost->published_date }} ·
          <i class="fa-solid fa-tag"></i> {{ $approvePost->category }}
        </div>
      </div>
      <p style="font-size:13px;color:#64748b;line-height:1.7">
        Bạn có chắc muốn <strong style="color:#15803d">duyệt và đăng</strong> bài viết này không?<br>
        Bài viết sẽ hiển thị công khai ngay sau khi duyệt.
      </p>
    </div>
    <div class="mo-ft">
      <button wire:click="closeApprove" class="btn btn-ghost">Huỷ</button>
      <button wire:click="approve" class="btn btn-green">
        <span wire:loading.remove wire:target="approve"><i class="fa-solid fa-check"></i> Duyệt & Đăng ngay</span>
        <span wire:loading wire:target="approve"><span class="spin"></span> Đang duyệt...</span>
      </button>
    </div>
  </div>
</div>
@endif
 

@if($showDelete)
<div class="mo-bg" wire:click.self="closeDelete">
  <div class="mo mo-sm">
    <div class="cf-wrap">
      <div class="cf-ic"><i class="fa-solid fa-trash"></i></div>
      <div class="cf-t">Xoá bài viết?</div>
      <div class="cf-s">
        Bạn sắp xoá bài viết<br>
        <strong>{{ $deleteName }}</strong><br>
        Hành động này không thể hoàn tác.
      </div>
      <div class="cf-btns">
        <button wire:click="closeDelete" class="btn btn-ghost">Huỷ</button>
        <button wire:click="destroy" class="btn btn-del">
          <span wire:loading.remove wire:target="destroy">Xoá</span>
          <span wire:loading wire:target="destroy"><span class="spin"></span></span>
        </button>
      </div>
    </div>
  </div>
</div>
@endif
 
</div>