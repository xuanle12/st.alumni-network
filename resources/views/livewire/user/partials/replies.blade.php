@foreach($replies as $reply)
<div class="nw-cmi" wire:key="reply-{{ $reply->id }}-{{ $depth }}"
     style="margin-bottom:8px; margin-left: {{ $depth * 24 }}px">

    <div class="nw-cmi-av nw-cmi-av-sm av-c{{ ($reply->user_id ?? 0) % 6 }}">
        {{ strtoupper(substr($reply->user?->name ?? 'U', 0, 2)) }}
    </div>

    <div class="nw-cmi-wrap">
        <div class="nw-bbl" style="padding:7px 12px">
            <div class="nw-bbl-name" style="font-size:11px">
                {{ $reply->user?->name ?? 'Người dùng' }}
            </div>
            <div class="nw-bbl-text" style="font-size:12px">
                @if($reply->parent?->user?->name)
    <span class="nw-mention">&#64;{{ $reply->parent->user->name }}</span>
@endif
                {{ $reply->content }}
            </div>
        </div>

        <div class="nw-cmab">
            <span x-data="{ liked: {{ $reply->isLikedBy(auth()->id()) ? 'true' : 'false' }}, count: {{ $reply->likes_count }}, toggle() { this.liked=!this.liked; this.count=this.liked?this.count+1:this.count-1; } }">
                <button class="nw-cmab-btn" :class="liked?'nw-liked':''" @click="toggle()" wire:click="likeComment({{ $reply->id }})">Thích</button>
            </span>
            <button class="nw-cmab-btn" wire:click="setReply({{ $reply->id }}, '{{ e($reply->user?->name ?? '') }}')">
                Trả lời
            </button>
            <span class="nw-cmab-time">{{ $reply->created_at->diffForHumans() }}</span>
            @if(($reply->user_id ?? 0) === auth()->id())
                <button class="nw-cmab-btn nw-red"
                        wire:click="deleteComment({{ $reply->id }})"
                        wire:confirm="Xóa trả lời này?">Xóa</button>
            @endif
            @if($reply->likes_count > 0)
                <div class="nw-cmab-likes">
                    <div class="nw-cmab-likes-ico">
                        <svg width="9" height="9" viewBox="0 0 24 24" fill="#fff"><path d="M7 22V11M2 13v7a2 2 0 002 2h13.5a2 2 0 001.98-1.71l1-7A2 2 0 0018.5 11H15V6a3 3 0 00-3-3 1 1 0 00-1 1v.5L8.5 9H4a2 2 0 00-2 2v2z"/></svg>
                    </div>
                    <span>{{ $reply->likes_count }}</span>
                </div>
            @endif
        </div>

        {{-- Đệ quy: hiện replies con nếu có --}}
        @if($reply->replies->count() > 0)
            @include('livewire.user.partials.replies', [
                'replies' => $reply->replies,
                'depth'   => $depth + 1
            ])
        @endif

    </div>
</div>
@endforeach