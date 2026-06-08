<div class="nw-page">

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
                @if($currentUser->profile?->avatar)
                    <img src="{{ asset('storage/'.$currentUser->profile->avatar) }}" class="nw-av nw-av-sm">
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
                    <div class="author-av">{{ strtoupper(substr(auth()->user()?->name ?? 'U', 0, 2)) }}</div>
                    <div>
                      <div class="author-name">{{ auth()->user()?->name }}</div>
                      <div class="author-cat">
                        <select class="cat-sel" wire:model="category">
                          <option value="discussion">Thảo luận</option>
                          <option value="experience">Chia sẻ kinh nghiệm</option>
                          <option value="news">Tin tức</option>
                          <option value="job">Tìm việc</option>
                          <option value="network">Kết nối</option>
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
                        <span class="tag-pill"># {{ $tag }}<button type="button" wire:click="removeTag({{ $i }})">×</button></span>
                      @endforeach
                    </div>
                  @endif
                  <input class="title-input" wire:model="title" type="text" placeholder="Tiêu đề (tuỳ chọn)...">
                  <textarea class="content-editor" wire:model="content" placeholder="Bạn đang nghĩ gì? Chia sẻ với mọi người..." rows="5" autofocus></textarea>
                  @error('content')<div class="err">{{ $message }}</div>@enderror
                  @if(count($tags) < 5)
                    <div class="tag-input-row">
                      <span style="font-size:12px;color:#9ca3af">#</span>
                      <input class="tag-input-el" wire:model="tagInput" type="text" placeholder="Thêm tag... (nhấn Enter)" wire:keydown.enter.prevent="addTag">
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
                    <button class="action-btn">
                      <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="6" stroke="#f59e0b" stroke-width="1.5"/><circle cx="6" cy="7" r=".8" fill="#f59e0b"/><circle cx="10" cy="7" r=".8" fill="#f59e0b"/><path d="M5.5 10c.5 1 4.5 1 5 0" stroke="#f59e0b" stroke-width="1.2" stroke-linecap="round"/></svg>
                      <span class="action-label" style="color:#f59e0b">Cảm xúc</span>
                    </button>
                  </div>
                  <button class="pub-btn" wire:click="publish" wire:loading.attr="disabled" wire:loading.class="opacity-75">
                    <span wire:loading wire:target="publish">Đang đăng...</span>
                    <span wire:loading.remove wire:target="publish">Đăng bài</span>
                  </button>
                </div>
              </div>
            </div>
            @endif

            <div class="nw-cp-sep"></div>
            <div class="nw-cp-ac">
                <button class="nw-cpb"><i class="fa-solid fa-camera"></i> Ảnh</button>
                <button class="nw-cpb"><i class="fa-solid fa-briefcase"></i> Tuyển dụng</button>
                <button class="nw-cpb"><i class="fa-solid fa-calendar"></i> Sự kiện</button>
                <button class="nw-cpb nw-cpb-post" wire:click="openModal">Đăng</button>
            </div>
        </div>

         @forelse($posts as $post)
            <div class="nw-post" x-data="{ openComments:false }">
                <div class="nw-ph">
                    @if($post->author->profile?->avatar)
                        <img src="{{ asset('storage/' . $post->author->profile->avatar) }}" class="nw-av nw-av-sm" alt="{{ $post->author->name }}"/>
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
                        <div class="nw-psub">{{ $post->author->profile?->position }} · {{ $post->created_at->diffForHumans() }}</div>
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
                            <div class="nw-jbm">{{ $post->job->type }}@if($post->job->salary) · {{ $post->job->salary }}@endif@if($post->job->location) · {{ $post->job->location }}@endif</div>
                            <a href="{{ $post->job->url ?? '#' }}" class="nw-jbb">Xem chi tiết →</a>
                        </div>
                    @endif
                </div>
                <div class="nw-rr">
                    <span>{{ number_format($post->likes_count) }} lượt thích</span>
                    <span>{{ number_format($post->comments_count) }} bình luận · {{ number_format($post->shares_count) }} chia sẻ</span>
                </div>
                <div class="nw-pac">
                    <button class="nw-pab"><i class="fa-solid fa-thumbs-up"></i> Thích</button>
                    <button class="nw-pab" @click="openComments = !openComments"><i class="fa-solid fa-comment"></i> Bình luận</button>
                    <button class="nw-pab"><i class="fa-solid fa-share"></i> Chia sẻ</button>
                </div>
                <div x-show="openComments" x-transition>
                    <livewire:user.comment :post="$post" :key="'comment-'.$post->id" />
                </div>
            </div>
        @empty
            <div class="nw-empty">Chưa có bài viết nào.</div>
        @endforelse
    </main>

    <aside class="nw-right">

        <div class="nw-profile-card">
            <a href="{{ route('profile') }}" wire:navigate class="nw-profile-link">
                @if($currentUser->profile?->avatar)
                    <img src="{{ asset('storage/' . $currentUser->profile->avatar) }}" class="nw-pcard-av" alt="{{ $currentUser->name }}"/>
                @else
                    <div class="nw-pcard-av nw-pcard-av-default">{{ $currentUser->initials }}</div>
                @endif
                <div>
                    <div class="nw-pcard-name">{{ $currentUser->name }}</div>
                    <div class="nw-pcard-sub">{{ $currentUser->profile?->position ?? 'Xem hồ sơ của bạn' }}</div>
                </div>
            </a>
        </div>

        <div class="nw-rs-block">
            <div class="nw-rs-lbl"><i class="fa-solid fa-calendar-days"></i> Sự kiện sắp tới</div>
            @forelse($events as $event)
                <a href="{{ route('event.show', $event->id) }}" class="nw-ev" wire:navigate>
                    <div class="nw-evd">
                        <div class="nw-evdy">{{ $event->day }}</div>
                        <div class="nw-evmo">{{ $event->month }}</div>
                    </div>
                    <div>
                        <div class="nw-evn">{{ $event->title }}</div>
                        <div class="nw-evm">{{ $event->location }}</div>
                    </div>
                </a>
            @empty
                <div class="nw-rs-empty">Không có sự kiện nào.</div>
            @endforelse
            <a href="{{ route('event') }}" class="nw-rs-more" wire:navigate>Xem tất cả →</a>
        </div>

        <div class="nw-rs-block">
            <div class="nw-rs-lbl"><i class="fa-solid fa-briefcase"></i> Việc làm mới</div>
            @forelse($jobs as $job)
                <a href="{{ route('job.show', $job->id) }}" class="nw-job-item" wire:navigate>
                    <div class="nw-job-title">{{ $job->title }}</div>
                    <div class="nw-job-meta">
                        {{ $job->company?->name ?? $job->company_name ?? '' }}
                        @if($job->location) · {{ $job->location }} @endif
                    </div>
                    @if($job->salary)
                        <div class="nw-job-salary">{{ $job->salary }}</div>
                    @endif
                </a>
            @empty
                <div class="nw-rs-empty">Không có việc làm nào.</div>
            @endforelse
            <a href="{{ route('job') }}" class="nw-rs-more" wire:navigate>Xem tất cả →</a>
        </div>

    </aside>

<style>
:root{
  --oc:   #000000;
  --oc-m: #1a4fa8;
  --oc-l: #1b1c1d;
  --oc-s: #e8f0fc;
  --oc-p: #f0f5ff;
  --bd:   #c5d5f5;
  --muted:#8aaad8;
}


.nw-page{
  display: grid;
  grid-template-columns: 1fr 300px;
  height: calc(100vh - var(--header-h));
  overflow: hidden;
  background: var(--oc-p);
  font-family: 'Barlow', system-ui, sans-serif;
  padding: 20px;
  gap: 20px;
  max-width: 1790px;
  margin: 0 auto;
  width: 100%;
}


.nw-feed{
  overflow-y: auto;
  padding: 16px 20px;
  height: 100%;
  background: #fff;
  border-radius: 14px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.06);
}
.nw-feed::-webkit-scrollbar{width:4px;}
.nw-feed::-webkit-scrollbar-thumb{background:var(--bd);border-radius:99px;}

.nw-filter-bar{display:flex;align-items:center;gap:8px;margin-bottom:14px;flex-wrap:wrap;}
.nw-title{font-size:18px;font-weight:700;color:var(--oc);margin-right:6px;}
.nw-fb{padding:6px 14px;border-radius:20px;border:1px solid var(--bd);background:#fff;font-size:12px;font-weight:500;color:var(--oc-m);cursor:pointer;font-family:'Barlow',system-ui,sans-serif;transition:.15s;}
.nw-fb:hover{background:var(--oc-s);}
.nw-fb.on{background:var(--oc-m);color:#fff;border-color:var(--oc-m);}


.nw-cp{background:#fff;border-radius:14px;border:1px solid var(--bd);padding:14px 16px;margin-bottom:12px;}
.nw-cp-row{display:flex;align-items:center;gap:10px;margin-bottom:12px;}
.nw-cp-in{flex:1;padding:9px 16px;border:1px solid var(--bd);border-radius:20px;font-size:13px;color:var(--muted);background:var(--oc-s);cursor:pointer;font-family:'Barlow',system-ui,sans-serif;}
.nw-cp-sep{height:1px;background:var(--oc-p);margin-bottom:10px;}
.nw-cp-ac{display:flex;}
.nw-cpb{flex:1;display:flex;align-items:center;justify-content:center;gap:5px;padding:7px;border-radius:8px;border:none;background:none;font-size:12px;font-weight:500;color:var(--oc-l);cursor:pointer;font-family:'Barlow',system-ui,sans-serif;transition:.15s;}
.nw-cpb:hover{background:var(--oc-s);color:var(--oc);}
.nw-cpb-post{color:var(--oc-m);font-weight:700;}


.nw-post{background:#fff;border-radius:14px;border:1px solid var(--bd);margin-bottom:12px;overflow:hidden;}
.nw-ph{display:flex;align-items:flex-start;gap:10px;padding:14px 16px 10px;}
.nw-pname{font-size:13px;font-weight:600;color:var(--oc);margin-bottom:2px;}
.nw-psub{font-size:11px;color:var(--muted);}
.nw-badge{display:inline-block;font-size:10px;padding:1px 6px;border-radius:99px;background:var(--oc-s);color:var(--oc-m);font-weight:600;margin-left:5px;}
.nw-pmb{width:28px;height:28px;border-radius:50%;border:none;background:none;cursor:pointer;font-size:14px;color:var(--muted);margin-left:auto;}
.nw-pmb:hover{background:var(--oc-s);}
.nw-pb{padding:0 16px 14px;}
.nw-pt{font-size:13px;color:#0d1f3c;line-height:1.7;margin-bottom:10px;white-space:pre-line;}
.nw-pimg {
    width: 100%;
    border-radius: 10px;
    max-height: 300px;
    object-fit: contain;
    border: 1px solid var(--bd);
    margin-bottom: 10px;
    background: #f0f5ff;
}
.nw-jb{background:var(--oc-s);border:1px solid var(--bd);border-radius:10px;padding:12px;margin-bottom:10px;}
.nw-jbt{font-size:13px;font-weight:600;color:var(--oc);margin-bottom:3px;}
.nw-jbm{font-size:12px;color:var(--oc-l);margin-bottom:8px;}
.nw-jbb{font-size:12px;font-weight:600;color:#fff;background:var(--oc-m);border:none;border-radius:6px;padding:6px 14px;cursor:pointer;text-decoration:none;display:inline-block;}
.nw-jbb:hover{background:var(--oc);}
.nw-rr{display:flex;justify-content:space-between;padding:8px 16px;border-top:1px solid var(--oc-p);font-size:12px;color:var(--muted);}
.nw-pac{display:flex;border-top:1px solid var(--oc-p);}
.nw-pab{flex:1;display:flex;align-items:center;justify-content:center;gap:5px;padding:9px;border:none;background:none;font-size:13px;font-weight:500;color:var(--oc-l);cursor:pointer;font-family:'Barlow',system-ui,sans-serif;transition:.15s;}
.nw-pab:hover{background:var(--oc-s);color:var(--oc);}
.nw-empty{text-align:center;padding:40px 20px;font-size:14px;color:var(--muted);background:#fff;border-radius:14px;border:1px solid var(--bd);}


.nw-av{border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:700;flex-shrink:0;width:34px;height:34px;font-size:11px;object-fit:cover;}
.nw-av-sm{width:40px!important;height:40px!important;font-size:13px!important;}
.nw-av-green{background:var(--oc-s);color:var(--oc-m);}


.nw-right{
  overflow-y: auto;
  height: 100%;
  background: #fff;
  border-radius: 14px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.06);
  display: flex;
  flex-direction: column;
  border-left: none;
}.nw-right::-webkit-scrollbar{width:3px;}
.nw-right::-webkit-scrollbar-thumb{background:var(--bd);border-radius:99px;}


.nw-profile-card{padding:16px 14px;border-bottom:1px solid var(--bd);}
.nw-profile-link{display:flex;align-items:center;gap:10px;text-decoration:none;border-radius:10px;padding:8px;transition:.15s;}
.nw-profile-link:hover{background:var(--oc-s);}
.nw-pcard-av{width:44px;height:44px;border-radius:50%;object-fit:cover;flex-shrink:0;}
.nw-pcard-av-default{display:flex;align-items:center;justify-content:center;background:var(--oc-s);color:var(--oc-m);font-weight:700;font-size:14px;}
.nw-pcard-name{font-size:14px;font-weight:700;color:var(--oc);}
.nw-pcard-sub{font-size:12px;color:var(--muted);margin-top:2px;}


.nw-rs-block{padding:14px 14px 8px;border-bottom:1px solid var(--bd);}
.nw-rs-lbl{font-size:11px;font-weight:700;color:var(--muted);letter-spacing:.5px;text-transform:uppercase;margin-bottom:10px;display:flex;align-items:center;gap:5px;}
.nw-rs-lbl i{font-size:11px;}
.nw-rs-empty{font-size:12px;color:var(--muted);padding:6px 0;}
.nw-rs-more{display:inline-block;margin-top:8px;font-size:12px;font-weight:600;color:var(--oc-l);text-decoration:none;}
.nw-rs-more:hover{color:var(--oc);text-decoration:underline;}


.nw-ev{display:flex;gap:10px;padding:7px 6px;border-radius:10px;cursor:pointer;margin-bottom:4px;text-decoration:none;transition:.15s;}
.nw-ev:hover{background:var(--oc-s);}
.nw-evd{flex-shrink:0;width:36px;height:36px;background:var(--oc-s);border-radius:8px;display:flex;flex-direction:column;align-items:center;justify-content:center;}
.nw-evdy{font-size:14px;font-weight:700;color:var(--oc-m);line-height:1;}
.nw-evmo{font-size:9px;color:var(--muted);text-transform:uppercase;}
.nw-evn{font-size:12px;font-weight:600;color:var(--oc);line-height:1.4;margin-bottom:1px;}
.nw-evm{font-size:11px;color:var(--muted);}

 
.nw-job-item{display:block;padding:8px 6px;border-radius:10px;text-decoration:none;margin-bottom:4px;transition:.15s;border-bottom:1px solid var(--oc-p);}
.nw-job-item:last-of-type{border-bottom:none;}
.nw-job-item:hover{background:var(--oc-s);}
.nw-job-title{font-size:12px;font-weight:600;color:var(--oc);margin-bottom:2px;}
.nw-job-meta{font-size:11px;color:var(--muted);}
.nw-job-salary{font-size:11px;font-weight:600;color:var(--oc-l);margin-top:3px;}


.modal-overlay{position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:500;display:flex;align-items:center;justify-content:center;padding:1rem;}
.modal-box{background:#fff;border-radius:12px;width:100%;max-width:520px;max-height:90vh;overflow-y:auto;display:flex;flex-direction:column;}
.modal-hd{display:flex;align-items:center;justify-content:space-between;padding:1rem 1.25rem;border-bottom:1px solid var(--oc-p);position:sticky;top:0;background:#fff;z-index:1;}
.modal-hd-title{font-size:15px;font-weight:600;color:var(--oc);}
.modal-close{width:32px;height:32px;border:none;background:var(--oc-s);border-radius:50%;cursor:pointer;display:flex;align-items:center;justify-content:center;color:var(--muted);font-size:18px;line-height:1;}
.modal-close:hover{background:var(--bd);color:var(--oc);}
.modal-body{padding:1rem 1.25rem;flex:1;}
.author-row{display:flex;align-items:center;gap:10px;margin-bottom:1rem;}
.author-av{width:40px;height:40px;border-radius:50%;background:var(--oc-s);display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;color:var(--oc-m);flex-shrink:0;}
.author-name{font-size:13px;font-weight:600;color:var(--oc);}
.author-cat{margin-top:3px;}
.cat-sel{padding:2px 8px;border:1px solid var(--bd);border-radius:20px;font-size:11px;color:var(--oc-m);background:var(--oc-s);cursor:pointer;}
.content-editor{width:100%;border:none;outline:none;font-size:14px;color:#0d1f3c;font-family:inherit;resize:none;line-height:1.7;min-height:120px;}
.content-editor::placeholder{color:#b0c4de;}
.cover-wrap{position:relative;margin-bottom:.875rem;}
.cover-img{width:100%;height:180px;object-fit:cover;border-radius:8px;display:block;}
.cover-remove{position:absolute;top:6px;right:6px;width:28px;height:28px;background:rgba(0,0,0,.6);border:none;border-radius:50%;color:#fff;cursor:pointer;font-size:14px;}
.tags-row{display:flex;flex-wrap:wrap;gap:5px;margin-bottom:.875rem;}
.tag-pill{display:flex;align-items:center;gap:3px;background:var(--oc-s);color:var(--oc);font-size:11px;font-weight:500;padding:3px 8px;border-radius:20px;}
.tag-pill button{background:none;border:none;cursor:pointer;color:var(--oc-l);font-size:12px;line-height:1;padding:0;}
.title-input{width:100%;border:none;border-top:1px solid var(--oc-p);outline:none;font-size:12px;color:var(--muted);font-family:inherit;padding:.625rem 0;margin-bottom:.5rem;}
.tag-input-row{display:flex;align-items:center;gap:6px;padding:4px 0;}
.tag-input-el{flex:1;border:none;outline:none;font-size:12px;color:var(--oc);font-family:inherit;padding:3px 0;}
.modal-ft{padding:.875rem 1.25rem;border-top:1px solid var(--oc-p);display:flex;flex-direction:column;gap:.625rem;position:sticky;bottom:0;background:#fff;}
.action-row{display:flex;align-items:center;gap:6px;}
.action-btn{display:flex;align-items:center;gap:5px;padding:6px 10px;border:1px solid var(--bd);border-radius:7px;background:#fff;color:var(--muted);font-size:12px;cursor:pointer;font-family:inherit;transition:all .15s;}
.action-btn:hover{background:var(--oc-s);border-color:var(--oc-m);color:var(--oc);}
.action-label{font-size:11px;font-weight:500;}
.pub-btn{width:100%;padding:10px;background:var(--oc-m);color:#fff;border:none;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;font-family:inherit;}
.pub-btn:hover{background:var(--oc);}
.pub-btn:disabled{background:#d1d5db;cursor:not-allowed;}
.err{font-size:11px;color:#dc2626;margin-top:3px;}

@media(max-width:960px){
  .nw-page{grid-template-columns:1fr 240px;}
}
@media(max-width:640px){
  .nw-page{grid-template-columns:1fr;height:auto;overflow:visible;gap: 20px;}
  .nw-right{display:none;}
  .nw-feed{overflow-y:visible;height:auto;padding:10px;}
}
</style>
</div>