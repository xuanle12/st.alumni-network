<div class="nb-wrap" wire:poll.30s x-data @click.outside="$wire.open = false">
    <button type="button" class="nb-btn" wire:click="toggle" aria-label="Thông báo">
        <i class="fa-regular fa-bell"></i>
        @if($unreadCount > 0)
            <span class="nb-badge">{{ $unreadCount > 9 ? '9+' : $unreadCount }}</span>
        @endif
    </button>

    @if($open)
        <div class="nb-panel">
            <div class="nb-hd">
                <span class="nb-hd-title">Thông báo</span>
                @if($unreadCount > 0)
                    <button type="button" class="nb-mark" wire:click="markAllRead">Đánh dấu đã đọc</button>
                @endif
            </div>

            <div class="nb-list">
                @forelse($notifications as $n)
                    <button type="button" class="nb-item {{ $n->read_at ? '' : 'nb-unread' }}" wire:click="openNotification({{ $n->id }})" wire:key="nb-{{ $n->id }}">
                        <span class="nb-ava">
                            @if($n->actor?->profile?->avatar)
                                <img src="{{ asset('storage/'.$n->actor->profile->avatar) }}" alt="">
                            @else
                                <span class="nb-ava-df">{{ $n->actor?->initials ?? '🔔' }}</span>
                            @endif
                        </span>
                        <span class="nb-body">
                            <span class="nb-title">{{ $n->title }}</span>
                            @if($n->message)
                                <span class="nb-msg">{{ $n->message }}</span>
                            @endif
                            <span class="nb-time">{{ $n->created_at->diffForHumans() }}</span>
                        </span>
                        @unless($n->read_at)<span class="nb-dot"></span>@endunless
                    </button>
                @empty
                    <div class="nb-empty">Chưa có thông báo nào.</div>
                @endforelse
            </div>
        </div>
    @endif

    <style>
    .nb-wrap{position:relative;display:inline-flex;}
    .nb-btn{position:relative;width:40px;height:40px;border:none;background:#f1f5f9;border-radius:50%;cursor:pointer;color:#334155;font-size:16px;display:flex;align-items:center;justify-content:center;transition:.15s;}
    .nb-btn:hover{background:#e2e8f0;}
    .nb-badge{position:absolute;top:-2px;right:-2px;min-width:18px;height:18px;padding:0 4px;background:#ef4444;color:#fff;font-size:10px;font-weight:700;border-radius:99px;display:flex;align-items:center;justify-content:center;border:2px solid #fff;}
    .nb-panel{position:absolute;top:calc(100% + 10px);right:0;width:360px;max-width:calc(100vw - 24px);background:#fff;border:1px solid #e5e7eb;border-radius:14px;box-shadow:0 12px 40px rgba(0,0,0,.14);z-index:1000;overflow:hidden;}
    .nb-hd{display:flex;align-items:center;justify-content:space-between;padding:12px 16px;border-bottom:1px solid #f1f5f9;}
    .nb-hd-title{font-size:15px;font-weight:700;color:#0f172a;}
    .nb-mark{border:none;background:none;color:#2f6bff;font-size:12px;font-weight:600;cursor:pointer;font-family:inherit;}
    .nb-mark:hover{text-decoration:underline;}
    .nb-list{max-height:420px;overflow-y:auto;}
    .nb-item{display:flex;align-items:flex-start;gap:11px;width:100%;text-align:left;padding:11px 16px;border:none;background:none;cursor:pointer;font-family:inherit;border-bottom:1px solid #f6f7f9;transition:.12s;}
    .nb-item:hover{background:#f7f9fc;}
    .nb-unread{background:#eff4ff;}
    .nb-unread:hover{background:#e6efff;}
    .nb-ava{flex-shrink:0;width:40px;height:40px;border-radius:50%;overflow:hidden;background:#eef2ff;display:flex;align-items:center;justify-content:center;}
    .nb-ava img{width:100%;height:100%;object-fit:cover;}
    .nb-ava-df{font-size:12px;font-weight:700;color:#4f46e5;}
    .nb-body{display:flex;flex-direction:column;gap:2px;min-width:0;flex:1;}
    .nb-title{font-size:13px;color:#1a1d29;line-height:1.4;}
    .nb-msg{font-size:12px;color:#64748b;line-height:1.4;overflow:hidden;text-overflow:ellipsis;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;}
    .nb-time{font-size:11px;color:#94a3b8;margin-top:1px;}
    .nb-dot{flex-shrink:0;width:8px;height:8px;border-radius:50%;background:#2f6bff;margin-top:6px;}
    .nb-empty{padding:32px 16px;text-align:center;font-size:13px;color:#94a3b8;}
    </style>
</div>
