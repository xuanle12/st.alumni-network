<div class="cm-page">

    {{-- ═══════════ CỘT TRÁI ═══════════ --}}
    <aside class="cm-left">

        <div class="cm-card cm-profile">
            <div class="cm-profile-cover"></div>
            @if($currentUser->profile?->avatar)
                <img src="{{ asset('storage/' . $currentUser->profile->avatar) }}" class="cm-profile-av" alt="{{ $currentUser->name }}">
            @else
                <div class="cm-profile-av cm-profile-av-df">{{ $currentUser->initials }}</div>
            @endif
            <div class="cm-profile-name">{{ $currentUser->name }}</div>
            <div class="cm-profile-handle">{{ '@' . \Illuminate\Support\Str::of($currentUser->email)->before('@') }}</div>

            <div class="cm-stats">
                <div class="cm-stat">
                    <div class="cm-stat-num">{{ number_format($stats['posts']) }}</div>
                    <div class="cm-stat-lbl">Bài viết</div>
                </div>
                <div class="cm-stat">
                    <div class="cm-stat-num">{{ number_format($stats['members']) }}</div>
                    <div class="cm-stat-lbl">Thành viên</div>
                </div>
                <div class="cm-stat">
                    <div class="cm-stat-num">{{ number_format($stats['events']) }}</div>
                    <div class="cm-stat-lbl">Sự kiện</div>
                </div>
            </div>

            <a href="{{ route('profile') }}" wire:navigate class="cm-profile-btn">Hồ sơ của tôi</a>
        </div>

        <div class="cm-card cm-shortcuts">
            <div class="cm-card-hd">
                <span class="cm-card-title">Lối tắt của bạn</span>
            </div>
            <a href="{{ route('job') }}" wire:navigate class="cm-sc">
                <span class="cm-sc-ic" style="background:#eef2ff;color:#4f46e5"><i class="fa-solid fa-briefcase"></i></span>
                <span class="cm-sc-lbl">Việc làm</span>
            </a>
            <a href="{{ route('event') }}" wire:navigate class="cm-sc">
                <span class="cm-sc-ic" style="background:#ecfdf5;color:#059669"><i class="fa-solid fa-calendar-days"></i></span>
                <span class="cm-sc-lbl">Sự kiện</span>
            </a>
            <a href="{{ route('job.create') }}" wire:navigate class="cm-sc">
                <span class="cm-sc-ic" style="background:#fff7ed;color:#ea580c"><i class="fa-solid fa-plus"></i></span>
                <span class="cm-sc-lbl">Đăng tin tuyển dụng</span>
            </a>
            <a href="{{ route('profile') }}" wire:navigate class="cm-sc">
                <span class="cm-sc-ic" style="background:#faf5ff;color:#9333ea"><i class="fa-solid fa-user"></i></span>
                <span class="cm-sc-lbl">Hồ sơ của tôi</span>
            </a>
        </div>

    </aside>

    {{-- ═══════════ CỘT GIỮA – FEED ═══════════ --}}
    <main class="cm-feed">

        {{-- Composer --}}
        <div class="cm-card cm-composer">
            <div class="cm-composer-row">
                @if($currentUser->profile?->avatar)
                    <img src="{{ asset('storage/'.$currentUser->profile->avatar) }}" class="cm-av cm-av-40">
                @else
                    <div class="cm-av cm-av-40 cm-av-df">{{ $currentUser->initials }}</div>
                @endif
                <div class="cm-composer-in" wire:click="openModal">Chia sẻ điều gì đó...</div>
            </div>
            <div class="cm-composer-ac">
                <button class="cm-composer-btn" wire:click="openModal('normal')"><i class="fa-solid fa-image" style="color:#22c55e"></i> Ảnh</button>
                <button class="cm-composer-btn" wire:click="openModal('job')"><i class="fa-solid fa-briefcase" style="color:#3b82f6"></i> Tuyển dụng</button>
                <button class="cm-composer-btn" wire:click="openModal('event')"><i class="fa-solid fa-calendar" style="color:#f59e0b"></i> Sự kiện</button>
                <button class="cm-composer-post" wire:click="openModal('normal')">Đăng</button>
            </div>
        </div>

        {{-- Modal tạo bài viết --}}
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
                      <option value="normal">Thảo luận</option>
                      <option value="job">Tuyển dụng</option>
                      <option value="event">Sự kiện</option>
                    </select>
                  </div>
                </div>
              </div>
              @if(count($coverImages))
                <div class="cover-grid" wire:key="cover-grid">
                  @foreach($coverImages as $i => $img)
                    <div class="cover-thumb" wire:key="cover-{{ $i }}">
                      <img src="{{ $img->temporaryUrl() }}" alt="">
                      <button type="button" class="cover-remove" wire:click="removeCoverImage({{ $i }})">×</button>
                    </div>
                  @endforeach
                </div>
              @endif
              <div wire:loading wire:target="coverImages" style="font-size:12px;color:var(--cm-muted);margin-bottom:8px">Đang tải ảnh lên...</div>
              @error('coverImages.*')<div class="err">{{ $message }}</div>@enderror
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
            </div>
            <div class="modal-ft">
              <div class="action-row">
                <label class="action-btn" for="cover-file">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="1" y="2" width="14" height="12" rx="2" stroke="#3b82f6" stroke-width="1.5"/><circle cx="5" cy="6" r="1.2" stroke="#3b82f6" stroke-width="1.2"/><path d="M1 11l4-4 3 3 2-2 4 4" stroke="#3b82f6" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  <span class="action-label" style="color:#3b82f6">Thêm ảnh</span>
                  <input type="file" id="cover-file" wire:model="coverImages" accept="image/*" multiple style="display:none">
                </label>
              </div>
              <button class="pub-btn" wire:click="publish" wire:loading.attr="disabled" wire:loading.class="opacity-75">
                <span wire:loading wire:target="publish">Đang đăng...</span>
                <span wire:loading.remove wire:target="publish">Đăng bài</span>
              </button>
            </div>
          </div>
        </div>
        @endif

        {{-- Thanh sắp xếp --}}
        <div class="cm-sortbar">
            <span class="cm-sortbar-t">Bảng tin</span>
            <span class="cm-sortbar-s">Sắp xếp theo: <b>Mới nhất</b></span>
        </div>

        {{-- Danh sách bài viết --}}
        @forelse($posts as $post)
            <div class="cm-card cm-post" x-data="{ openComments:false }">
                <div class="cm-post-hd">
                    @if($post->author->profile?->avatar)
                        <img src="{{ asset('storage/' . $post->author->profile->avatar) }}" class="cm-av cm-av-44" alt="{{ $post->author->name }}"/>
                    @else
                        <div class="cm-av cm-av-44 cm-av-df">{{ $post->author->initials }}</div>
                    @endif
                    <div style="flex:1">
                        <div class="cm-post-name">
                            {{ $post->author->name }}
                            @if($post->author->profile?->role === 'alumni')
                                <span class="cm-badge">Cựu SV</span>
                            @endif
                        </div>
                        <div class="cm-post-sub">{{ $post->author->profile?->position }} · {{ $post->time_label }}</div>
                    </div>
                    <button class="cm-post-more">···</button>
                </div>

                <div class="cm-post-body">
                    <p class="cm-post-text">{{ $post->content }}</p>
                    @php $photos = $post->photos; $pc = count($photos); @endphp
                    @if($pc)
                        <div class="cm-gallery cm-gallery-{{ min($pc, 4) }}">
                            @foreach(array_slice($photos, 0, 4) as $idx => $ph)
                                <div class="cm-gphoto">
                                    <img src="{{ asset('storage/' . $ph) }}" alt="" loading="lazy">
                                    @if($pc > 4 && $idx === 3)
                                        <span class="cm-gmore-ov">+{{ $pc - 4 }}</span>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                    @if($post->category === 'job' && $post->job)
                        <div class="cm-embed">
                            <div class="cm-embed-t"><i class="fa-solid fa-briefcase"></i> {{ $post->job->title }}</div>
                            <div class="cm-embed-m">{{ $post->job->type }}@if($post->job->min_salary || $post->job->max_salary) · {{ $post->job->salary_range }}@endif @if($post->job->location)· {{ $post->job->location }}@endif</div>
                            <a href="{{ route('job.show', $post->job->id) }}" class="cm-embed-btn" wire:navigate>Xem chi tiết →</a>
                        </div>
                    @endif
                    @if($post->category === 'event' && $post->event)
                        <div class="cm-embed">
                            <div class="cm-embed-t"><i class="fa-solid fa-calendar-days"></i> {{ $post->event->title }}</div>
                            <div class="cm-embed-m">
                                {{ \Illuminate\Support\Carbon::parse($post->event->event_date)->format('d/m/Y') }}
                                @if($post->event->location) · {{ $post->event->location }} @endif
                                · {{ $post->event->format_label }}
                            </div>
                            <a href="{{ route('event.show', $post->event->id) }}" class="cm-embed-btn" wire:navigate>Xem chi tiết →</a>
                        </div>
                    @endif
                </div>

                <div class="cm-post-stats">
                    <span><i class="fa-solid fa-heart" style="color:#ef4444"></i> {{ number_format($post->likes_count) }}</span>
                    <span><i class="fa-regular fa-comment"></i> {{ number_format($post->comments_count) }}</span>
                </div>

                <div class="cm-post-actions">
                    <button class="cm-post-act {{ $post->isLikedBy() ? 'is-liked' : '' }}" wire:click="like({{ $post->id }})">
                        <i class="fa-{{ $post->isLikedBy() ? 'solid' : 'regular' }} fa-heart"></i>
                        {{ $post->isLikedBy() ? 'Đã thích' : 'Thích' }}
                    </button>
                    <button class="cm-post-act" @click="openComments = !openComments"><i class="fa-regular fa-comment"></i> Bình luận</button>
                </div>

                <div x-show="openComments" x-transition>
                    <livewire:user.comment :post="$post" :key="'comment-'.$post->id" />
                </div>
            </div>
        @empty
            <div class="cm-card cm-empty">Chưa có bài viết nào.</div>
        @endforelse
    </main>

    {{-- ═══════════ CỘT PHẢI ═══════════ --}}
    <aside class="cm-right">

        {{-- Gợi ý kết nối --}}
        <div class="cm-card cm-side">
            <div class="cm-card-hd">
                <span class="cm-card-title">Gợi ý cho bạn</span>
            </div>
            @forelse($contacts as $c)
                <div class="cm-person">
                    @if($c->profile?->avatar)
                        <img src="{{ asset('storage/'.$c->profile->avatar) }}" class="cm-av cm-av-36" alt="{{ $c->name }}">
                    @else
                        <div class="cm-av cm-av-36 cm-av-df">{{ $c->initials }}</div>
                    @endif
                    <div class="cm-person-info">
                        <div class="cm-person-name">{{ $c->name }}</div>
                        <div class="cm-person-sub">{{ $c->profile?->position ?? ($c->profile?->role === 'alumni' ? 'Cựu sinh viên' : 'Thành viên') }}</div>
                    </div>
                </div>
            @empty
                <div class="cm-side-empty">Chưa có gợi ý.</div>
            @endforelse
        </div>

        {{-- Sự kiện sắp tới --}}
        <div class="cm-card cm-side">
            <div class="cm-card-hd">
                <span class="cm-card-title"><i class="fa-solid fa-calendar-days" style="color:#059669"></i> Sự kiện sắp tới</span>
                <a href="{{ route('event') }}" wire:navigate class="cm-card-more">Xem tất cả</a>
            </div>
            @forelse($events as $event)
                <a href="{{ route('event.show', $event->id) }}" class="cm-ev" wire:navigate>
                    <div class="cm-ev-date">
                        <div class="cm-ev-d">{{ $event->day }}</div>
                        <div class="cm-ev-mo">{{ $event->month_label }}</div>
                    </div>
                    <div class="cm-person-info">
                        <div class="cm-person-name">{{ $event->title }}</div>
                        <div class="cm-person-sub">{{ $event->location }}</div>
                    </div>
                </a>
            @empty
                <div class="cm-side-empty">Không có sự kiện nào.</div>
            @endforelse
        </div>

        {{-- Việc làm mới --}}
        <div class="cm-card cm-side">
            <div class="cm-card-hd">
                <span class="cm-card-title"><i class="fa-solid fa-briefcase" style="color:#3b82f6"></i> Việc làm mới</span>
                <a href="{{ route('job.create') }}" wire:navigate class="cm-card-more">+ Đăng tin</a>
            </div>
            @forelse($jobs as $job)
                <a href="{{ route('job.show', $job->id) }}" class="cm-jobitem" wire:navigate>
                    <div class="cm-person-name">{{ $job->title }}</div>
                    <div class="cm-person-sub">{{ $job->company }}@if($job->location) · {{ $job->location }} @endif</div>
                    @if($job->min_salary || $job->max_salary)
                        <div class="cm-jobitem-salary">{{ $job->salary_range }}</div>
                    @endif
                </a>
            @empty
                <div class="cm-side-empty">Không có việc làm nào.</div>
            @endforelse
            <a href="{{ route('job') }}" wire:navigate class="cm-card-morelink">Xem tất cả →</a>
        </div>

    </aside>

<style>
.cm-page{
  --cm-bg:#eef0f4;
  --cm-card:#ffffff;
  --cm-txt:#1a1d29;
  --cm-muted:#8a91a3;
  --cm-line:#eef0f3;
  --cm-blue:#2f6bff;
  --cm-blue-d:#1d54e0;
  --cm-blue-s:#eff4ff;
  display:grid;
  grid-template-columns:250px minmax(0,1fr) 290px;
  gap:18px;
  align-items:start;
  max-width:1400px;
  width:100%;
  margin:0 auto;
  padding:18px 20px;
  background:var(--cm-bg);
  min-height:calc(100vh - var(--header-h, 102px));
  font-family:var(--font, 'Inter', system-ui, sans-serif);
  color:var(--cm-txt);
}

/* Ghim 2 cột bên: dính tại chỗ khi cuộn, chỉ feed giữa chạy */
.cm-left,.cm-right{
  position:sticky;
  top:calc(var(--header-h, 102px) + 14px);
  max-height:calc(100vh - var(--header-h, 102px) - 28px);
  overflow-y:auto;
  overflow-x:hidden;
}
/* Không cho card co lại (tránh bị cắt nội dung) */
.cm-left > *,.cm-right > *{flex-shrink:0;}
.cm-left::-webkit-scrollbar,.cm-right::-webkit-scrollbar{width:6px;}
.cm-left::-webkit-scrollbar-thumb,.cm-right::-webkit-scrollbar-thumb{background:#d5d9e2;border-radius:99px;}
.cm-left::-webkit-scrollbar-thumb:hover,.cm-right::-webkit-scrollbar-thumb:hover{background:#c0c6d2;}

/* Card chung */
.cm-card{background:var(--cm-card);border-radius:16px;box-shadow:0 1px 3px rgba(16,24,40,.06);border:1px solid #f0f1f4;}
.cm-card-hd{display:flex;align-items:center;justify-content:space-between;padding:14px 16px 6px;}
.cm-card-title{font-size:14px;font-weight:700;color:var(--cm-txt);display:flex;align-items:center;gap:7px;}
.cm-card-more{font-size:12px;font-weight:600;color:var(--cm-blue);text-decoration:none;}
.cm-card-more:hover{text-decoration:underline;}
.cm-card-morelink{display:block;text-align:center;padding:10px;font-size:12px;font-weight:600;color:var(--cm-blue);text-decoration:none;border-top:1px solid var(--cm-line);}
.cm-card-morelink:hover{background:var(--cm-blue-s);}

/* Avatar */
.cm-av{border-radius:50%;object-fit:cover;flex-shrink:0;display:flex;align-items:center;justify-content:center;font-weight:700;}
.cm-av-df{background:var(--cm-blue-s);color:var(--cm-blue);}
.cm-av-36{width:36px;height:36px;font-size:12px;}
.cm-av-40{width:40px;height:40px;font-size:13px;}
.cm-av-44{width:44px;height:44px;font-size:14px;}

/* ── Cột trái ── */
.cm-left{display:flex;flex-direction:column;gap:20px;}
.cm-profile{padding-bottom:16px;overflow:hidden;text-align:center;}
.cm-profile-cover{height:76px;background:linear-gradient(120deg,#2f6bff 0%,#5b8cff 45%,#8f6bff 100%);}
.cm-profile-av{width:76px;height:76px;border-radius:50%;object-fit:cover;border:4px solid #fff;margin:-40px auto 0;display:block;box-shadow:0 2px 8px rgba(0,0,0,.1);}
.cm-profile-av-df{width:76px;height:76px;border-radius:50%;border:4px solid #fff;margin:-40px auto 0;display:flex;align-items:center;justify-content:center;background:var(--cm-blue-s);color:var(--cm-blue);font-size:22px;font-weight:700;}
.cm-profile-name{font-size:16px;font-weight:700;margin-top:10px;}
.cm-profile-handle{font-size:12.5px;color:var(--cm-muted);margin-top:2px;}
.cm-stats{display:flex;justify-content:space-around;margin:16px 0;padding:14px 0;border-top:1px solid var(--cm-line);border-bottom:1px solid var(--cm-line);}
.cm-stat-num{font-size:16px;font-weight:700;}
.cm-stat-lbl{font-size:11px;color:var(--cm-muted);margin-top:2px;}
.cm-profile-btn{display:block;margin:0 16px;padding:10px;background:var(--cm-blue);color:#fff;border-radius:10px;font-size:13px;font-weight:600;text-decoration:none;transition:.15s;}
.cm-profile-btn:hover{background:var(--cm-blue-d);}

.cm-shortcuts{padding-bottom:8px;}
.cm-sc{display:flex;align-items:center;gap:10px;padding:8px 16px;text-decoration:none;color:var(--cm-txt);transition:.15s;}
.cm-sc:hover{background:var(--cm-blue-s);}
.cm-sc-ic{width:34px;height:34px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:14px;flex-shrink:0;}
.cm-sc-lbl{font-size:13px;font-weight:500;}

/* ── Cột giữa ── */
.cm-feed{display:flex;flex-direction:column;gap:16px;min-width:0;padding-bottom:8px;}
.cm-composer{padding:14px 16px;}
.cm-composer-row{display:flex;align-items:center;gap:10px;}
.cm-composer-in{flex:1;padding:11px 18px;background:#f2f4f7;border-radius:24px;font-size:13.5px;color:var(--cm-muted);cursor:pointer;transition:.15s;}
.cm-composer-in:hover{background:#eaedf2;}
.cm-composer-ac{display:flex;align-items:center;gap:6px;margin-top:12px;padding-top:12px;border-top:1px solid var(--cm-line);}
.cm-composer-btn{display:flex;align-items:center;gap:6px;padding:7px 12px;border:none;background:none;border-radius:8px;font-size:13px;font-weight:500;color:var(--cm-txt);cursor:pointer;font-family:inherit;transition:.15s;}
.cm-composer-btn:hover{background:#f2f4f7;}
.cm-composer-post{margin-left:auto;padding:8px 20px;background:var(--cm-blue);color:#fff;border:none;border-radius:9px;font-size:13px;font-weight:600;cursor:pointer;font-family:inherit;transition:.15s;}
.cm-composer-post:hover{background:var(--cm-blue-d);}

.cm-sortbar{display:flex;align-items:center;justify-content:space-between;padding:2px 4px;}
.cm-sortbar-t{font-size:15px;font-weight:700;}
.cm-sortbar-s{font-size:12px;color:var(--cm-muted);}
.cm-sortbar-s b{color:var(--cm-txt);}

.cm-post{overflow:hidden;}
.cm-post-hd{display:flex;align-items:flex-start;gap:11px;padding:14px 16px 10px;}
.cm-post-name{font-size:14px;font-weight:700;display:flex;align-items:center;gap:6px;}
.cm-post-sub{font-size:12px;color:var(--cm-muted);margin-top:2px;}
.cm-badge{font-size:10px;padding:1px 7px;border-radius:99px;background:var(--cm-blue-s);color:var(--cm-blue);font-weight:600;}
.cm-post-more{margin-left:auto;width:30px;height:30px;border:none;background:none;border-radius:50%;color:var(--cm-muted);cursor:pointer;font-size:15px;}
.cm-post-more:hover{background:#f2f4f7;}
.cm-post-body{padding:0 16px 12px;}
.cm-post-text{font-size:14px;line-height:1.65;color:#2b2f3a;white-space:pre-line;margin-bottom:10px;}
/* Lưới ảnh kiểu Facebook */
.cm-gallery{display:grid;gap:3px;border-radius:12px;overflow:hidden;margin-bottom:2px;background:#e9ebf0;}
.cm-gphoto{position:relative;overflow:hidden;background:#f0f2f5;}
.cm-gphoto img{width:100%;height:100%;object-fit:cover;display:block;}
/* 1 ảnh: khung matte gọn đẹp, ảnh căn giữa, thu nhỏ vừa phải */
.cm-gallery-1{grid-template-columns:1fr;background:transparent;}
.cm-gallery-1 .cm-gphoto{
  background:#f6f7f9;
  border:1px solid #ebedf0;
  border-radius:14px;
  padding:12px;
  display:flex;align-items:center;justify-content:center;
  max-height:420px;
}
.cm-gallery-1 .cm-gphoto img{
  width:auto;max-width:100%;
  height:auto;max-height:396px;
  object-fit:contain;
  border-radius:8px;
}
/* 2 ảnh: 2 cột vuông */
.cm-gallery-2{grid-template-columns:1fr 1fr;}
.cm-gallery-2 .cm-gphoto{aspect-ratio:1/1;}
/* 3 ảnh: 1 lớn trên + 2 dưới */
.cm-gallery-3{grid-template-columns:1fr 1fr;}
.cm-gallery-3 .cm-gphoto:first-child{grid-column:1 / -1;aspect-ratio:16/9;}
.cm-gallery-3 .cm-gphoto:not(:first-child){aspect-ratio:1/1;}
/* 4+ ảnh: lưới 2x2, ô cuối phủ "+N" */
.cm-gallery-4{grid-template-columns:1fr 1fr;}
.cm-gallery-4 .cm-gphoto{aspect-ratio:1/1;}
.cm-gmore-ov{position:absolute;inset:0;background:rgba(0,0,0,.5);display:flex;align-items:center;justify-content:center;color:#fff;font-size:26px;font-weight:700;}
.cm-embed{background:#f7f9fc;border:1px solid var(--cm-line);border-radius:12px;padding:13px;margin-top:6px;}
.cm-embed-t{font-size:13.5px;font-weight:600;margin-bottom:4px;display:flex;align-items:center;gap:7px;}
.cm-embed-m{font-size:12.5px;color:var(--cm-muted);margin-bottom:10px;}
.cm-embed-btn{display:inline-block;font-size:12.5px;font-weight:600;color:#fff;background:var(--cm-blue);border-radius:8px;padding:7px 15px;text-decoration:none;transition:.15s;}
.cm-embed-btn:hover{background:var(--cm-blue-d);}
.cm-post-stats{display:flex;gap:16px;padding:8px 16px;font-size:12.5px;color:var(--cm-muted);}
.cm-post-stats i{margin-right:3px;}
.cm-post-actions{display:flex;padding:4px 8px;border-top:1px solid var(--cm-line);}
.cm-post-act{flex:1;display:flex;align-items:center;justify-content:center;gap:7px;padding:10px;border:none;background:none;border-radius:8px;font-size:13.5px;font-weight:600;color:var(--cm-muted);cursor:pointer;font-family:inherit;transition:.15s;}
.cm-post-act:hover{background:#f2f4f7;}
.cm-post-act.is-liked{color:#ef4444;}
.cm-empty{text-align:center;padding:44px 20px;font-size:14px;color:var(--cm-muted);}

/* ── Cột phải ── */
.cm-right{display:flex;flex-direction:column;gap:20px;}
.cm-side{padding-bottom:10px;}
.cm-side-empty{font-size:12.5px;color:var(--cm-muted);padding:6px 16px 12px;}
.cm-person{display:flex;align-items:center;gap:11px;padding:8px 16px;}
.cm-person-info{min-width:0;flex:1;}
.cm-person-name{font-size:13px;font-weight:600;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
.cm-person-sub{font-size:11.5px;color:var(--cm-muted);margin-top:1px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
.cm-ev{display:flex;align-items:center;gap:11px;padding:8px 16px;text-decoration:none;color:var(--cm-txt);transition:.15s;}
.cm-ev:hover{background:var(--cm-blue-s);}
.cm-ev-date{flex-shrink:0;width:40px;height:40px;border-radius:10px;background:#ecfdf5;display:flex;flex-direction:column;align-items:center;justify-content:center;}
.cm-ev-d{font-size:15px;font-weight:700;color:#059669;line-height:1;}
.cm-ev-mo{font-size:9px;color:#10b981;text-transform:uppercase;font-weight:600;}
.cm-jobitem{display:block;padding:9px 16px;text-decoration:none;color:var(--cm-txt);transition:.15s;}
.cm-jobitem:hover{background:var(--cm-blue-s);}
.cm-jobitem-salary{font-size:11.5px;font-weight:600;color:#059669;margin-top:3px;}

/* ── Modal (giữ nguyên chức năng) ── */
.modal-overlay{position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:500;display:flex;align-items:center;justify-content:center;padding:1rem;}
.modal-box{background:#fff;border-radius:14px;width:100%;max-width:520px;max-height:90vh;overflow-y:auto;display:flex;flex-direction:column;}
.modal-hd{display:flex;align-items:center;justify-content:space-between;padding:1rem 1.25rem;border-bottom:1px solid var(--cm-line);position:sticky;top:0;background:#fff;z-index:1;}
.modal-hd-title{font-size:15px;font-weight:700;color:var(--cm-txt);}
.modal-close{width:32px;height:32px;border:none;background:#f2f4f7;border-radius:50%;cursor:pointer;display:flex;align-items:center;justify-content:center;color:var(--cm-muted);font-size:16px;line-height:1;}
.modal-close:hover{background:#e6e9ef;color:var(--cm-txt);}
.modal-body{padding:1rem 1.25rem;flex:1;}
.author-row{display:flex;align-items:center;gap:10px;margin-bottom:1rem;}
.author-av{width:40px;height:40px;border-radius:50%;background:var(--cm-blue-s);display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;color:var(--cm-blue);flex-shrink:0;}
.author-name{font-size:13px;font-weight:600;color:var(--cm-txt);}
.author-cat{margin-top:3px;}
.cat-sel{padding:3px 10px;border:1px solid var(--cm-line);border-radius:20px;font-size:11px;color:var(--cm-blue);background:var(--cm-blue-s);cursor:pointer;}
.content-editor{width:100%;border:none;outline:none;font-size:14px;color:#2b2f3a;font-family:inherit;resize:none;line-height:1.7;min-height:120px;}
.content-editor::placeholder{color:#aab1c0;}
.cover-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:6px;margin-bottom:.875rem;}
.cover-thumb{position:relative;aspect-ratio:1/1;border-radius:10px;overflow:hidden;background:#f0f2f5;}
.cover-thumb img{width:100%;height:100%;object-fit:cover;display:block;}
.cover-remove{position:absolute;top:5px;right:5px;width:24px;height:24px;background:rgba(0,0,0,.6);border:none;border-radius:50%;color:#fff;cursor:pointer;font-size:13px;line-height:1;display:flex;align-items:center;justify-content:center;}
.cover-remove:hover{background:rgba(0,0,0,.8);}
.tags-row{display:flex;flex-wrap:wrap;gap:5px;margin-bottom:.875rem;}
.tag-pill{display:flex;align-items:center;gap:3px;background:var(--cm-blue-s);color:var(--cm-txt);font-size:11px;font-weight:500;padding:3px 8px;border-radius:20px;}
.tag-pill button{background:none;border:none;cursor:pointer;color:var(--cm-muted);font-size:12px;line-height:1;padding:0;}
.title-input{width:100%;border:none;border-top:1px solid var(--cm-line);outline:none;font-size:12.5px;color:var(--cm-txt);font-family:inherit;padding:.625rem 0;margin-bottom:.5rem;}
.modal-ft{padding:.875rem 1.25rem;border-top:1px solid var(--cm-line);display:flex;flex-direction:column;gap:.625rem;position:sticky;bottom:0;background:#fff;}
.action-row{display:flex;align-items:center;gap:6px;}
.action-btn{display:flex;align-items:center;gap:5px;padding:6px 10px;border:1px solid var(--cm-line);border-radius:8px;background:#fff;color:var(--cm-muted);font-size:12px;cursor:pointer;font-family:inherit;transition:all .15s;}
.action-btn:hover{background:var(--cm-blue-s);border-color:var(--cm-blue);color:var(--cm-txt);}
.action-label{font-size:11px;font-weight:500;}
.pub-btn{width:100%;padding:11px;background:var(--cm-blue);color:#fff;border:none;border-radius:10px;font-size:13px;font-weight:600;cursor:pointer;font-family:inherit;transition:.15s;}
.pub-btn:hover{background:var(--cm-blue-d);}
.pub-btn:disabled{background:#c7ccd6;cursor:not-allowed;}
.err{font-size:11px;color:#dc2626;margin-top:3px;}

/* ── Responsive ── */
@media(max-width:1100px){
  .cm-page{grid-template-columns:230px minmax(0,1fr);}
  .cm-right{display:none;}
}
@media(max-width:760px){
  /* Mobile: bỏ ghim, cho cả trang cuộn bình thường */
  .cm-page{grid-template-columns:1fr;padding:14px;gap:14px;}
  .cm-left{display:none;}
  .cm-right{position:static;max-height:none;}
}
</style>
</div>
