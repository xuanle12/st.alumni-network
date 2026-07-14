<div>
<style>
.mp-wrap{max-width:820px;margin:0 auto;padding:24px 16px 48px;font-family:'Be Vietnam Pro',system-ui,sans-serif;}
.mp-head{margin-bottom:18px;}
.mp-head h1{font-size:22px;font-weight:800;color:#0f172a;letter-spacing:-.4px;margin:0;display:flex;align-items:center;gap:10px;}
.mp-head p{font-size:13.5px;color:#64748b;margin:4px 0 0;}

.mp-tabs{display:flex;gap:8px;margin-bottom:16px;flex-wrap:wrap;}
.mp-tab{padding:7px 15px;border-radius:20px;font-size:13px;font-weight:600;cursor:pointer;
  border:1.5px solid #e5e7eb;background:#fff;color:#6b7280;font-family:inherit;
  display:inline-flex;align-items:center;gap:6px;transition:.15s;}
.mp-tab:hover{background:#f8fafc;}
.mp-tab.active{border-color:#0961aa;background:#eff6ff;color:#0961aa;}
.mp-tab .n{background:#0961aa;color:#fff;border-radius:10px;padding:1px 7px;font-size:11px;}
.mp-tab:not(.active) .n{background:#cbd5e1;}

.mp-card{background:#fff;border:1px solid #e5e7eb;border-radius:14px;padding:16px 18px;margin-bottom:14px;
  box-shadow:0 1px 3px rgba(0,0,0,.04);display:flex;gap:14px;align-items:flex-start;}
.mp-card.pending{border-color:#fde68a;}
.mp-thumb{width:84px;height:84px;border-radius:10px;object-fit:cover;flex-shrink:0;background:#f1f5f9;}
.mp-thumb-df{width:84px;height:84px;border-radius:10px;flex-shrink:0;background:#eff6ff;color:#93c5fd;
  display:flex;align-items:center;justify-content:center;font-size:26px;}
.mp-body{flex:1;min-width:0;}
.mp-badges{display:flex;align-items:center;gap:8px;margin-bottom:6px;flex-wrap:wrap;}
.mp-badge{font-size:11px;font-weight:700;padding:2px 9px;border-radius:20px;}
.mp-badge.published{background:#dbeafe;color:#075490;}
.mp-badge.pending{background:#fef9c3;color:#854d0e;}
.mp-badge.draft{background:#f1f5f9;color:#475569;}
.mp-badge.rejected{background:#fee2e2;color:#dc2626;}
.mp-cat{font-size:11px;font-weight:600;color:#64748b;}
.mp-date{font-size:11.5px;color:#94a3b8;margin-left:auto;white-space:nowrap;}
.mp-text{font-size:13.5px;color:#1a1f2e;line-height:1.6;margin:0 0 8px;
  display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;}
.mp-meta{display:flex;align-items:center;gap:16px;font-size:12.5px;color:#64748b;}
.mp-meta i{margin-right:4px;}
.mp-actions{display:flex;flex-direction:column;gap:8px;flex-shrink:0;}
.mp-btn-del{border:1px solid #fecaca;background:#fef2f2;color:#dc2626;border-radius:9px;
  padding:8px 12px;font-size:12.5px;font-weight:600;cursor:pointer;font-family:inherit;
  display:inline-flex;align-items:center;gap:6px;transition:.15s;white-space:nowrap;}
.mp-btn-del:hover{background:#fee2e2;border-color:#fca5a5;}

.mp-empty{background:#fff;border:1px dashed #d1d5db;border-radius:14px;padding:48px 20px;
  text-align:center;color:#94a3b8;}
.mp-empty i{font-size:34px;color:#cbd5e1;margin-bottom:12px;display:block;}
.mp-empty a{color:#0961aa;font-weight:600;text-decoration:none;}

.mp-pending-note{font-size:11.5px;color:#92400e;background:#fffbeb;border:1px solid #fde68a;
  border-radius:7px;padding:5px 9px;margin-top:8px;display:inline-flex;align-items:center;gap:6px;}

.mp-pg{margin-top:18px;}

/* Modal xoá */
.mp-mbg{position:fixed;inset:0;background:rgba(15,23,42,.5);backdrop-filter:blur(2px);
  display:flex;align-items:center;justify-content:center;z-index:1000;padding:16px;}
.mp-mbox{background:#fff;border-radius:14px;padding:1.5rem;width:400px;max-width:100%;text-align:center;
  box-shadow:0 20px 60px rgba(0,0,0,.2);}
.mp-mico{width:54px;height:54px;border-radius:50%;background:#fef2f2;color:#dc2626;
  display:flex;align-items:center;justify-content:center;font-size:22px;margin:0 auto 14px;}
.mp-mtitle{font-size:16px;font-weight:700;color:#0f172a;margin-bottom:6px;}
.mp-mdesc{font-size:13px;color:#6b7280;margin-bottom:1.25rem;line-height:1.55;}
.mp-mbtns{display:flex;gap:8px;justify-content:center;}
.mp-mbtn{padding:9px 18px;border-radius:9px;font-size:13px;font-weight:600;cursor:pointer;font-family:inherit;
  border:1px solid #d1d5db;background:#fff;color:#374151;transition:.15s;}
.mp-mbtn:hover{background:#f9fafb;}
.mp-mbtn-danger{background:#dc2626;color:#fff;border-color:#dc2626;}
.mp-mbtn-danger:hover{background:#b91c1c;}

@media(max-width:560px){
  .mp-card{flex-direction:column;}
  .mp-thumb,.mp-thumb-df{width:100%;height:180px;}
  .mp-actions{flex-direction:row;width:100%;}
  .mp-date{margin-left:0;}
}
</style>

<div class="mp-wrap">

  <div class="mp-head">
    <h1><i class="fa-solid fa-rectangle-list" style="color:#0961aa"></i> Bài viết của tôi</h1>
    <p>Quản lý các bài bạn đã đăng. Xoá bài sẽ xoá luôn toàn bộ bình luận và lượt thích của bài đó.</p>
  </div>

  <div class="mp-tabs">
    <button wire:click="$set('filter','all')" class="mp-tab {{ $filter==='all' ? 'active' : '' }}">
      Tất cả <span class="n">{{ $counts['all'] }}</span>
    </button>
    <button wire:click="$set('filter','published')" class="mp-tab {{ $filter==='published' ? 'active' : '' }}">
      Đã đăng <span class="n">{{ $counts['published'] }}</span>
    </button>
    <button wire:click="$set('filter','pending')" class="mp-tab {{ $filter==='pending' ? 'active' : '' }}">
      Chờ duyệt <span class="n">{{ $counts['pending'] }}</span>
    </button>
  </div>

  @forelse($posts as $post)
    @php
      $st = $post->status;
      $stLabel = match($st){ 'published'=>'Đã đăng','pending'=>'Chờ duyệt','draft'=>'Nháp','rejected'=>'Từ chối',default=>$st };
      $catLabel = match($post->category){ 'job'=>'Tuyển dụng','event'=>'Sự kiện',default=>'Thảo luận' };
      $photos = $post->photos;
    @endphp
    <div class="mp-card {{ $st==='pending' ? 'pending' : '' }}" wire:key="mp-{{ $post->id }}">
      @if(count($photos))
        <img src="{{ asset('storage/'.$photos[0]) }}" class="mp-thumb" alt="" loading="lazy">
      @else
        <div class="mp-thumb-df"><i class="fa-regular fa-file-lines"></i></div>
      @endif

      <div class="mp-body">
        <div class="mp-badges">
          <span class="mp-badge {{ $st }}">{{ $stLabel }}</span>
          <span class="mp-cat">{{ $catLabel }}</span>
          <span class="mp-date">{{ $post->created_at->format('d/m/Y H:i') }}</span>
        </div>
        <p class="mp-text">{{ $post->content }}</p>
        <div class="mp-meta">
          <span><i class="fa-solid fa-heart" style="color:#ef4444"></i>{{ number_format($post->likes_count) }}</span>
          <span><i class="fa-regular fa-comment"></i>{{ number_format($post->comment_count) }}</span>
          @if(count($photos) > 1)
            <span><i class="fa-regular fa-images"></i>{{ count($photos) }} ảnh</span>
          @endif
        </div>
        @if($st === 'pending')
          <div class="mp-pending-note"><i class="fa-solid fa-clock"></i> Đang chờ quản trị viên duyệt</div>
        @endif
      </div>

      <div class="mp-actions">
        <button class="mp-btn-del" wire:click="confirmDelete({{ $post->id }})">
          <i class="fa-solid fa-trash"></i> Xoá
        </button>
      </div>
    </div>
  @empty
    <div class="mp-empty">
      <i class="fa-regular fa-pen-to-square"></i>
      <div>Bạn chưa có bài viết nào{{ $filter !== 'all' ? ' ở mục này' : '' }}.</div>
      <div style="margin-top:8px"><a href="{{ route('csv') }}" wire:navigate>Đăng bài ngay →</a></div>
    </div>
  @endforelse

  <div class="mp-pg">{{ $posts->links() }}</div>

  {{-- Modal xác nhận xoá --}}
  @if($showDelete)
    <div class="mp-mbg" wire:click.self="closeDelete">
      <div class="mp-mbox">
        <div class="mp-mico"><i class="fa-solid fa-trash"></i></div>
        <div class="mp-mtitle">Xoá bài viết này?</div>
        <div class="mp-mdesc">
          Toàn bộ <strong>bình luận, trả lời và lượt thích</strong> của bài sẽ bị xoá cùng.
          Hành động này không thể hoàn tác.
        </div>
        <div class="mp-mbtns">
          <button class="mp-mbtn" wire:click="closeDelete">Huỷ</button>
          <button class="mp-mbtn mp-mbtn-danger" wire:click="delete">
            <i class="fa-solid fa-trash"></i> Xoá bài
          </button>
        </div>
      </div>
    </div>
  @endif

</div>
</div>
