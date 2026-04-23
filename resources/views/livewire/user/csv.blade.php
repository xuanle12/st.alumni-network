<div class="nw-page">

    
    <aside class="nw-left">
        <a href="#" class="nw-profile-row">
            @if($currentUser->profile?->avatar)
                <img src="{{ asset('storage/' . $currentUser->profile->avatar) }}"
                     class="nw-av nw-av-sm" alt="{{ $currentUser->name }}"/>
            @else
                <div class="nw-av nw-av-green">{{ $currentUser->initials }}</div>
            @endif
            <div class="nw-profile-name">{{ $currentUser->name }}</div>
        </a>
        <div class="nw-sep"></div>
        <a href="#" class="nw-li {{ request()->routeIs('home')    ? 'on' : '' }}"><span class="nw-ic"><i class="fa-solid fa-house"></i></span> Trang chủ</a>
        <a href="#" class="nw-li {{ request()->routeIs('network') ? 'on' : '' }}"><span class="nw-ic"><i class="fa-solid fa-users"></i></span> Mạng lưới</a>
        <a href="#" class="nw-li {{ request()->routeIs('jobs*')   ? 'on' : '' }}"><span class="nw-ic"><i class="fa-solid fa-briefcase"></i></span> Tuyển dụng</a>
        <a href="{{ route('event') }}" class="nw-li {{ request()->routeIs('events*') ? 'on' : '' }}"><span class="nw-ic"><i class="fa-solid fa-calendar"></i></span> Sự kiện</a>
        <a href="{{ route('profile') }}" class="nw-li {{ request()->routeIs('profile') ? 'on' : '' }}"><span class="nw-ic"><i class="fa-solid fa-user"></i></span> Hồ sơ</a>
        <div class="nw-sep"></div>
        <div class="nw-lbl">Lối tắt</div>
        <a href="#" class="nw-sc"><span class="nw-sc-ic"><i class="fa-solid fa-school"></i></span> FITA - VNUA</a>
        <a href="#" class="nw-sc"><span class="nw-sc-ic"><i class="fa-solid fa-laptop"></i></span> CSV CNTT HVNNA</a>
        <a href="#" class="nw-sc"><span class="nw-sc-ic"><i class="fa-solid fa-leaf"></i></span> CSV Nông nghiệp</a>
    </aside>

  
    <main class="nw-feed">
        <div class="nw-filter-bar">
            <h2 class="nw-title">Mạng lưới</h2>
            <button wire:click="setFilter('all')"     class="nw-fb {{ $filter === 'all'     ? 'on' : '' }}">Tất cả</button>
            <button wire:click="setFilter('friends')" class="nw-fb {{ $filter === 'friends' ? 'on' : '' }}">Bạn bè</button>
            <button wire:click="setFilter('alumni')"  class="nw-fb {{ $filter === 'alumni'  ? 'on' : '' }}">Cựu SV</button>
            <button wire:click="setFilter('recruit')" class="nw-fb {{ $filter === 'recruit' ? 'on' : '' }}">Tuyển dụng</button>
        </div>

        <div class="nw-cp">
            <div class="nw-cp-row">
                <div class="nw-cp-row">

                @if($currentUser->profile?->avatar)
                    <img src="{{ asset('storage/'.$currentUser->profile->avatar) }}"class="nw-av nw-av-sm">
                @else
                    <div class="nw-av nw-av-green nw-av-sm">{{ $currentUser->initials }}</div>
                @endif
                    <div class="nw-cp-in" wire:click="openModal">Bạn đang nghĩ gì?</div>
                </div>
                        @if($showModal)
<div class="modal-overlay" wire:click.self="closeModal">
  <div class="modal-box">
 
    <div class="modal-hd">
      <div style="width:32px"></div>
      <div class="modal-hd-title">Tạo bài viết</div>
      <button class="modal-close" wire:click="closeModal">×</button>
    </div>
 
    <div class="modal-body">
 
    
      <div class="author-row">
        <div class="author-av">
          {{ strtoupper(substr(auth()->user()?->name ?? 'U', 0, 2)) }}
        </div>
        <div>
          <div class="author-name">{{ auth()->user()?->name }}</div>
          <div class="author-cat">
            <select class="cat-sel" wire:model="category">
              <option value="discussion"><i class="fa-solid fa-comments"></i> Thảo luận</option>
              <option value="experience"><i class="fa-solid fa-lightbulb"></i> Chia sẻ kinh nghiệm</option>
              <option value="news"><i class="fa-solid fa-bullhorn"></i> Tin tức</option>
              <option value="job"><i class="fa-solid fa-briefcase"></i> Tìm việc</option>
              <option value="network"><i class="fa-solid fa-handshake"></i> Kết nối</option>
            </select>
          </div>
        </div>
      </div>
 
      
      @if($coverImage)
        <div class="cover-wrap">
          <img src="{{ $coverImage->temporaryUrl() }}" class="cover-img" alt="Cover">
          <button class="cover-remove" wire:click="$set('coverImage', null)">×</button>
        </div>
      @endif
 
      @if(count($tags) > 0)
        <div class="tags-row">
          @foreach($tags as $i => $tag)
            <span class="tag-pill">
              # {{ $tag }}
              <button type="button" wire:click="removeTag({{ $i }})">×</button>
            </span>
          @endforeach
        </div>
      @endif
 
     
      <input class="title-input"
             wire:model="title"
             type="text"
             placeholder="Tiêu đề (tuỳ chọn)...">
 
    
      <textarea
        class="content-editor"
        wire:model="content"
        placeholder="Bạn đang nghĩ gì? Chia sẻ với mọi người..."
        rows="5"
        autofocus>
      </textarea>
      @error('content')<div class="err">{{ $message }}</div>@enderror
 
    
      @if(count($tags) < 5)
        <div class="tag-input-row">
          <span style="font-size:12px;color:#9ca3af">#</span>
          <input class="tag-input-el"
                 wire:model="tagInput"
                 type="text"
                 placeholder="Thêm tag... (nhấn Enter)"
                 wire:keydown.enter.prevent="addTag">
        </div>
      @endif
 
    </div>
 
    
    <div class="modal-ft">
      <div class="action-row">
        
        <label class="action-btn" for="cover-file">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="1" y="2" width="14" height="12" rx="2" stroke="#16a34a" stroke-width="1.5"/><circle cx="5" cy="6" r="1.2" stroke="#16a34a" stroke-width="1.2"/><path d="M1 11l4-4 3 3 2-2 4 4" stroke="#16a34a" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <span class="action-label" style="color:#16a34a">Ảnh</span>
          <input type="file" id="cover-file" wire:model="coverImage" accept="image/*" style="display:none">
        </label>
 
        
        <button class="action-btn" onclick="this.closest('.modal-box').querySelector('.tag-input-el')?.focus()">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M2 8L8 2l6 6-6 6-6-6z" stroke="#3b82f6" stroke-width="1.5" stroke-linejoin="round"/><circle cx="10" cy="6" r="1" fill="#3b82f6"/></svg>
          <span class="action-label" style="color:#3b82f6">Tag</span>
        </button>
 
        
        <button class="action-btn">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="6" stroke="#f59e0b" stroke-width="1.5"/><circle cx="6" cy="7" r=".8" fill="#f59e0b"/><circle cx="10" cy="7" r=".8" fill="#f59e0b"/><path d="M5.5 10c.5 1 4.5 1 5 0" stroke="#f59e0b" stroke-width="1.2" stroke-linecap="round"/></svg>
          <span class="action-label" style="color:#f59e0b">Cảm xúc</span>
        </button>
      </div>
 
      <button class="pub-btn"
              wire:click="publish"
              wire:loading.attr="disabled"
              wire:loading.class="opacity-75">
        <span wire:loading wire:target="publish">Đang đăng...</span>
        <span wire:loading.remove wire:target="publish">Đăng bài</span>
      </button>
    </div>
  </div>
</div>
@endif

            </div>
            <div class="nw-cp-sep"></div>
            <div class="nw-cp-ac">
                <button class="nw-cpb"><i class="fa-solid fa-camera"></i> Ảnh</button>
                <button class="nw-cpb"><i class="fa-solid fa-briefcase"></i> Tuyển dụng</button>
                <button class="nw-cpb"><i class="fa-solid fa-calendar"></i> Sự kiện</button>
                <button class="nw-cpb nw-cpb-post">Đăng</button>
            </div>
        </div>

        
        @forelse($posts as $post)
            <div class="nw-post">
                <div class="nw-ph">
                    @if($post->author->profile?->avatar)
                        <img src="{{ asset('storage/' . $post->author->profile->avatar) }}"
                             class="nw-av nw-av-sm" alt="{{ $post->author->name }}"/>
                    @else
                        <div class="nw-av nw-av-green nw-av-sm">{{ $post->author->initials }}</div>
                    @endif
                    <div style="flex:1">
                        <div class="nw-pname">
                            {{ $post->author->name }}
                            @if($post->author->profile?->role === 'alumni')
                                <span class="nw-badge">Cựu SV</span>
                            @endif
                        </div>
                        <div class="nw-psub">
                            {{ $post->author->profile?->position }}
                            · {{ $post->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <button class="nw-pmb">···</button>
                </div>

                <div class="nw-pb">
                    <p class="nw-pt">{{ $post->content }}</p>

                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" class="nw-pimg" alt=""/>
                    @endif

                    @if($post->category === 'job' && $post->job)
                        <div class="nw-jb">
                            <div class="nw-jbt"><i class="fa-solid fa-briefcase"></i> {{ $post->job->title }}</div>
                            <div class="nw-jbm">
                                {{ $post->job->type }}
                                @if($post->job->salary) · {{ $post->job->salary }} @endif
                                @if($post->job->location) · {{ $post->job->location }} @endif
                            </div>
                            <a href="{{ $post->job->url ?? '#' }}" class="nw-jbb">Xem chi tiết →</a>
                        </div>
                    @endif
                </div>

                <div class="nw-rr">
                    <span>{{ number_format($post->likes_count) }} lượt thích</span>
                    <span>{{ number_format($post->comments_count) }} bình luận · {{ number_format($post->shares_count) }} chia sẻ</span>
                </div>
                <div class="nw-pac">
                    <button class="nw-pab"><i class="fa-solid fa-thumbs-up"></i>Thích</button>
                    <button class="nw-pab"><i class="fa-solid fa-comment"></i> Bình luận</button>
                    <button class="nw-pab"><i class="fa-solid fa-share"></i> Chia sẻ</button>
                </div>
            </div>
        @empty
            <div class="nw-empty">Chưa có bài viết nào.</div>
        @endforelse
    </main>

    {{-- RIGHT SIDEBAR --}}
    <aside class="nw-right">
        <div class="nw-rs-lbl">Sự kiện sắp tới</div>

        @foreach($events as $event)
            <a href="{{ $event->url ?? '#' }}" class="nw-ev">
                <div class="nw-evd">
                    <div class="nw-evdy">{{ $event->day }}</div>
                    <div class="nw-evmo">{{ $event->month }}</div>
                </div>
                <div>
                    <div class="nw-evn">{{ $event->title }}</div>
                    <div class="nw-evm">{{ $event->location }}</div>
                </div>
            </a>
        @endforeach

        <div class="nw-rs-sep"></div>
        <div class="nw-rs-lbl">Người liên hệ</div>

        @foreach($contacts as $contact)
            <div class="nw-ci">
                @if($contact->profile?->avatar)
                    <img src="{{ asset('storage/' . $contact->profile->avatar) }}"
                         class="nw-av nw-av-xs {{ $contact->profile->is_online ? 'nw-online' : '' }}"
                         alt="{{ $contact->name }}"/>
                @else
                    <div class="nw-av nw-av-green nw-av-xs {{ $contact->profile?->is_online ? 'nw-online' : '' }}">
                        {{ $contact->initials }}
                    </div>
                @endif
                <div class="nw-cn">{{ $contact->name }}</div>
            </div>
        @endforeach

    </aside>
<style>
    
.nw-page{display:grid;grid-template-columns:220px 1fr 240px;height:calc(100vh - 52px);overflow:hidden;font-family:'Be Vietnam Pro',sans-serif;background:#f4f6f4;}
.nw-left{padding:12px 8px;border-right:1px solid #e8f0e8;overflow-y:auto;height:100%;}
.nw-left::-webkit-scrollbar{width:3px;}
.nw-left::-webkit-scrollbar-thumb{background:#d4e8d4;border-radius:99px;}
.nw-profile-row{display:flex;align-items:center;gap:9px;padding:8px;border-radius:10px;cursor:pointer;margin-bottom:6px;text-decoration:none;}
.nw-profile-row:hover{background:#e8f5e9;}
.nw-profile-name{font-size:13px;font-weight:600;color:#0f3d1a;}
.nw-sep{height:1px;background:#e8f0e8;margin:8px 0;}
.nw-li{display:flex;align-items:center;gap:10px;padding:8px;border-radius:10px;font-size:13px;color:#3d5e3d;text-decoration:none;transition:.15s;}
.nw-li:hover,.nw-li.on{background:#e8f5e9;color:#1e5c2a;}
.nw-li.on{font-weight:600;}
.nw-ic{font-size:16px;width:22px;text-align:center;}
.nw-lbl{font-size:11px;font-weight:700;color:#a0b8a0;letter-spacing:.5px;text-transform:uppercase;padding:10px 8px 4px;}
.nw-sc{display:flex;align-items:center;gap:9px;padding:7px 8px;border-radius:10px;font-size:12px;color:#3d5e3d;text-decoration:none;transition:.15s;}
.nw-sc:hover{background:#e8f5e9;}
.nw-sc-ic{width:28px;height:28px;border-radius:7px;background:#e8f5e9;display:flex;align-items:center;justify-content:center;font-size:14px;flex-shrink:0;}
.nw-feed{overflow-y:auto;padding:16px 20px;height:100%;}
.nw-feed::-webkit-scrollbar{width:4px;}
.nw-feed::-webkit-scrollbar-thumb{background:#d4e8d4;border-radius:99px;}
.nw-filter-bar{display:flex;align-items:center;gap:8px;margin-bottom:14px;flex-wrap:wrap;}
.nw-title{font-size:18px;font-weight:700;color:#0f3d1a;margin-right:6px;}
.nw-fb{padding:6px 14px;border-radius:20px;border:1px solid #d4e8d4;background:#fff;font-size:12px;font-weight:500;color:#3d5e3d;cursor:pointer;font-family:'Be Vietnam Pro',sans-serif;transition:.15s;}
.nw-fb:hover{background:#f0f8f0;}
.nw-fb.on{background:#1e5c2a;color:#fff;border-color:#1e5c2a;}
.nw-cp{background:#fff;border-radius:14px;border:1px solid #e0ebe0;padding:14px 16px;margin-bottom:12px;}
.nw-cp-row{display:flex;align-items:center;gap:10px;margin-bottom:12px;}
.nw-cp-in{flex:1;padding:9px 16px;border:1px solid #e0ebe0;border-radius:20px;font-size:13px;color:#3d5e3d;background:#f8faf8;outline:none;font-family:'Be Vietnam Pro',sans-serif;}
.nw-cp-in:focus{border-color:#2d6a35;}
.nw-cp-sep{height:1px;background:#f0f5f0;margin-bottom:10px;}
.nw-cp-ac{display:flex;}
.nw-cpb{flex:1;display:flex;align-items:center;justify-content:center;gap:5px;padding:7px;border-radius:8px;border:none;background:none;font-size:12px;font-weight:500;color:#5a7a5a;cursor:pointer;font-family:'Be Vietnam Pro',sans-serif;transition:.15s;}
.nw-cpb:hover{background:#f0f8f0;color:#1e5c2a;}
.nw-cpb-post{color:#1e5c2a;font-weight:700;}
.nw-post{background:#fff;border-radius:14px;border:1px solid #e0ebe0;margin-bottom:12px;overflow:hidden;}
.nw-ph{display:flex;align-items:flex-start;gap:10px;padding:14px 16px 10px;}
.nw-pname{font-size:13px;font-weight:600;color:#0f3d1a;margin-bottom:2px;}
.nw-psub{font-size:11px;color:#8aa88a;}
.nw-badge{display:inline-block;font-size:10px;padding:1px 6px;border-radius:99px;background:#e8f5e9;color:#2d6a35;font-weight:600;margin-left:5px;}
.nw-pmb{width:28px;height:28px;border-radius:50%;border:none;background:none;cursor:pointer;font-size:14px;color:#8aa88a;margin-left:auto;}
.nw-pmb:hover{background:#f0f8f0;}
.nw-pb{padding:0 16px 14px;}
.nw-pt{font-size:13px;color:#1a2e1a;line-height:1.7;margin-bottom:10px;white-space:pre-line;}
.nw-pimg{width:100%;border-radius:10px;max-height:400px;object-fit:cover;border:1px solid #e0ebe0;margin-bottom:10px;}
.nw-jb{background:#f8fdf8;border:1px solid #d4e8d4;border-radius:10px;padding:12px;margin-bottom:10px;}
.nw-jbt{font-size:13px;font-weight:600;color:#0f3d1a;margin-bottom:3px;}
.nw-jbm{font-size:12px;color:#5a7a5a;margin-bottom:8px;}
.nw-jbb{font-size:12px;font-weight:600;color:#fff;background:#1e5c2a;border:none;border-radius:6px;padding:6px 14px;cursor:pointer;text-decoration:none;display:inline-block;}
.nw-jbb:hover{background:#2d7a38;}
.nw-rr{display:flex;justify-content:space-between;padding:8px 16px;border-top:1px solid #f0f5f0;font-size:12px;color:#8aa88a;}
.nw-pac{display:flex;border-top:1px solid #f0f5f0;}
.nw-pab{flex:1;display:flex;align-items:center;justify-content:center;gap:5px;padding:9px;border:none;background:none;font-size:13px;font-weight:500;color:#5a7a5a;cursor:pointer;font-family:'Be Vietnam Pro',sans-serif;transition:.15s;}
.nw-pab:hover{background:#f8faf8;color:#1e5c2a;}
.nw-empty{text-align:center;padding:40px 20px;font-size:14px;color:#7a9c7e;background:#fff;border-radius:14px;border:1px solid #e0ebe0;}
.nw-av{border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:700;flex-shrink:0;width:34px;height:34px;font-size:11px;object-fit:cover;}
.nw-av-sm{width:40px !important;height:40px !important;font-size:13px !important;}
.nw-av-xs{width:32px !important;height:32px !important;font-size:10px !important;}
.nw-av-green{background:#c8e6c9;color:#1e5c2a;}
.nw-right{padding:12px 8px;border-left:1px solid #e8f0e8;overflow-y:auto;height:100%;}
.nw-right::-webkit-scrollbar{width:3px;}
.nw-right::-webkit-scrollbar-thumb{background:#d4e8d4;border-radius:99px;}
.nw-rs-lbl{font-size:11px;font-weight:700;color:#a0b8a0;letter-spacing:.5px;text-transform:uppercase;padding:8px 8px 6px;}
.nw-ev{display:flex;gap:10px;padding:8px;border-radius:10px;cursor:pointer;margin-bottom:2px;text-decoration:none;transition:.15s;}
.nw-ev:hover{background:#e8f5e9;}
.nw-evd{flex-shrink:0;width:36px;height:36px;background:#e8f5e9;border-radius:8px;display:flex;flex-direction:column;align-items:center;justify-content:center;}
.nw-evdy{font-size:14px;font-weight:700;color:#1e5c2a;line-height:1;}
.nw-evmo{font-size:9px;color:#8aa88a;text-transform:uppercase;}
.nw-evn{font-size:12px;font-weight:600;color:#0f3d1a;line-height:1.4;margin-bottom:1px;}
.nw-evm{font-size:11px;color:#8aa88a;}
.nw-rs-sep{height:1px;background:#e8f0e8;margin:10px 0;}
.nw-ci{display:flex;align-items:center;gap:9px;padding:7px 8px;border-radius:10px;cursor:pointer;transition:.15s;}
.nw-ci:hover{background:#e8f5e9;}
.nw-online{position:relative;}
.nw-online::after{content:'';position:absolute;bottom:0;right:0;width:8px;height:8px;background:#4caf50;border-radius:50%;border:2px solid #f4f6f4;}
.nw-cn{font-size:13px;font-weight:500;color:#1a2e1a;}
@media(max-width:1200px){.nw-page{grid-template-columns:200px 1fr 220px;}}
@media(max-width:960px){
  .nw-page{grid-template-columns:60px 1fr;}
  .nw-right{display:none;}
  .nw-profile-name,.nw-lbl,.nw-li span:not(.nw-ic),.nw-sc span:last-child{display:none;}
  .nw-li,.nw-sc{justify-content:center;padding:10px 0;}
  .nw-ic{font-size:20px;width:auto;}
  .nw-feed{padding:12px;}
}
@media(max-width:600px){
  .nw-page{grid-template-columns:1fr;height:auto;overflow:visible;}
  .nw-left{display:none;}
  .nw-feed{overflow-y:visible;height:auto;padding:10px;}
  .nw-fb{padding:5px 10px;font-size:11px;}
  .nw-title{font-size:16px;}
}
/* Trigger box */
.trigger-wrap{background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:.875rem 1.1rem;display:flex;align-items:center;gap:10px;margin-bottom:1rem;}
.trigger-avatar{width:38px;height:38px;border-radius:50%;background:#1e3a5f;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;color:#60a5fa;flex-shrink:0;}
.trigger-input{flex:1;padding:9px 14px;background:#f8fafc;border:1px solid #e8edf2;border-radius:20px;font-size:13px;color:#9ca3af;cursor:pointer;transition:all .15s;user-select:none;}
.trigger-input:hover{background:#f1f5f9;border-color:#cbd5e1;color:#6b7280;}
 
/* Modal overlay */
.modal-overlay{position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:100;display:flex;align-items:center;justify-content:center;padding:1rem;}
.modal-box{background:#fff;border-radius:12px;width:100%;max-width:520px;max-height:90vh;overflow-y:auto;display:flex;flex-direction:column;}
 
/* Modal header */
.modal-hd{display:flex;align-items:center;justify-content:space-between;padding:1rem 1.25rem;border-bottom:1px solid #f3f4f6;position:sticky;top:0;background:#fff;z-index:1;}
.modal-hd-title{font-size:15px;font-weight:600;color:#111;}
.modal-close{width:32px;height:32px;border:none;background:#f3f4f6;border-radius:50%;cursor:pointer;display:flex;align-items:center;justify-content:center;color:#6b7280;font-size:18px;line-height:1;}
.modal-close:hover{background:#e5e7eb;color:#111;}
 
/* Modal body */
.modal-body{padding:1rem 1.25rem;flex:1;}
.author-row{display:flex;align-items:center;gap:10px;margin-bottom:1rem;}
.author-av{width:40px;height:40px;border-radius:50%;background:#1e3a5f;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;color:#60a5fa;flex-shrink:0;}
.author-name{font-size:13px;font-weight:600;color:#111;}
.author-cat{margin-top:3px;}
.cat-sel{padding:2px 8px;border:1px solid #e2e8f0;border-radius:20px;font-size:11px;color:#374151;background:#f8fafc;cursor:pointer;}
.cat-sel:focus{outline:none;border-color:#3b82f6;}
 
/* Content editor */
.content-editor{width:100%;border:none;outline:none;font-size:14px;color:#374151;font-family:inherit;resize:none;line-height:1.7;min-height:120px;placeholder-color:#9ca3af;}
.content-editor::placeholder{color:#9ca3af;}
.content-editor:focus{outline:none;}
 
/* Cover preview */
.cover-wrap{position:relative;margin-bottom:.875rem;}
.cover-img{width:100%;height:180px;object-fit:cover;border-radius:8px;display:block;}
.cover-remove{position:absolute;top:6px;right:6px;width:28px;height:28px;background:rgba(0,0,0,.6);border:none;border-radius:50%;color:#fff;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:14px;}
.cover-remove:hover{background:rgba(0,0,0,.8);}
 
/* Tags */
.tags-row{display:flex;flex-wrap:wrap;gap:5px;margin-bottom:.875rem;}
.tag-pill{display:flex;align-items:center;gap:3px;background:#eff6ff;color:#1e40af;font-size:11px;font-weight:500;padding:3px 8px;border-radius:20px;}
.tag-pill button{background:none;border:none;cursor:pointer;color:#60a5fa;font-size:12px;line-height:1;padding:0;}
 
/* Title input */
.title-input{width:100%;border:none;border-top:1px solid #f3f4f6;outline:none;font-size:12px;color:#6b7280;font-family:inherit;padding:.625rem 0;margin-bottom:.5rem;}
.title-input::placeholder{color:#c4cdd6;}
 
/* Modal footer */
.modal-ft{padding:.875rem 1.25rem;border-top:1px solid #f3f4f6;display:flex;flex-direction:column;gap:.625rem;position:sticky;bottom:0;background:#fff;}
.action-row{display:flex;align-items:center;gap:6px;}
.action-btn{display:flex;align-items:center;gap:5px;padding:6px 10px;border:1px solid #e2e8f0;border-radius:7px;background:#fff;color:#6b7280;font-size:12px;cursor:pointer;font-family:inherit;transition:all .15s;}
.action-btn:hover{background:#f8fafc;border-color:#cbd5e1;color:#374151;}
.action-label{font-size:11px;font-weight:500;}
 
/* Tag input row */
.tag-input-row{display:flex;align-items:center;gap:6px;padding:4px 0;}
.tag-input-el{flex:1;border:none;outline:none;font-size:12px;color:#111;font-family:inherit;padding:3px 0;}
.tag-input-el::placeholder{color:#c4cdd6;}
 
.pub-btn{width:100%;padding:10px;background:#111;color:#fff;border:none;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;font-family:inherit;}
.pub-btn:hover{background:#333;}
.pub-btn:disabled{background:#d1d5db;cursor:not-allowed;}
 
.err{font-size:11px;color:#dc2626;margin-top:3px;}
.flash-ok{background:#f0fdf4;border:1px solid #86efac;color:#166534;padding:9px 14px;border-radius:8px;font-size:13px;margin-bottom:1rem;}
 
@media(max-width:480px){
  .modal-overlay{padding:.5rem;align-items:flex-end;}
  .modal-box{border-radius:12px 12px 0 0;max-height:95vh;}
}
</style>
</div>
