<div class="nw-cms">
<style>
.nw-cms{border-top:1px solid #f0f5f0;padding:10px 16px 14px;}
.nw-cms-sort{font-size:12px;font-weight:700;color:#5a7a5a;margin-bottom:10px;}
.nw-cmi{display:flex;gap:8px;margin-bottom:10px;}
.nw-cmi-av{border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:700;color:#fff;flex-shrink:0;margin-top:2px;}
.nw-cmi-av-lg{width:32px;height:32px;font-size:11px;}
.nw-cmi-av-sm{width:26px;height:26px;font-size:9px;}
.nw-cmi-wrap{flex:1;min-width:0;}
.nw-bbl{background:#f0f5f0;border-radius:18px;padding:8px 12px;display:inline-block;max-width:100%;}
.nw-bbl-name{font-size:12px;font-weight:700;color:#0f3d1a;margin-bottom:2px;}
.nw-bbl-text{font-size:13px;color:#1a2e1a;line-height:1.5;word-break:break-word;}
.nw-mention{color:#1e5c2a;font-weight:600;}
.nw-cmab{display:flex;align-items:center;gap:10px;margin-top:4px;padding:0 4px;flex-wrap:wrap;}
.nw-cmab-btn{font-size:12px;font-weight:700;color:#5a7a5a;cursor:pointer;background:none;border:none;font-family:'Be Vietnam Pro',sans-serif;padding:0;}
.nw-cmab-btn:hover{text-decoration:underline;}
.nw-cmab-btn.nw-liked{color:#1877f2;}
.nw-cmab-btn.nw-red{color:#dc2626;}
.nw-cmab-time{font-size:11px;color:#8aa88a;}
.nw-cmab-likes{display:flex;align-items:center;gap:3px;font-size:12px;color:#5a7a5a;margin-left:auto;}
.nw-cmab-likes-ico{width:16px;height:16px;border-radius:50%;background:#1877f2;display:flex;align-items:center;justify-content:center;}
.nw-replies{margin-left:40px;margin-top:6px;}
.nw-show-replies{display:flex;align-items:center;gap:5px;font-size:12px;font-weight:700;color:#5a7a5a;cursor:pointer;background:none;border:none;font-family:'Be Vietnam Pro',sans-serif;padding:2px 0;margin-top:2px;}
.nw-show-replies:hover{text-decoration:underline;}
.nw-show-replies svg{transition:transform .2s;}
.nw-show-replies.open svg{transform:rotate(180deg);}
.nw-reply-tag{display:flex;align-items:center;gap:6px;padding:5px 10px;background:#e8f5e9;border-radius:8px;margin-bottom:6px;font-size:12px;color:#1e5c2a;font-weight:600;}
.nw-reply-tag button{background:none;border:none;cursor:pointer;font-size:16px;color:#5a7a5a;margin-left:auto;line-height:1;padding:0;}
.nw-cm-input-wrap{display:flex;gap:8px;align-items:flex-end;margin-top:10px;}
.nw-cm-input-av{width:32px;height:32px;border-radius:50%;background:#1e5c2a;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;color:#fff;flex-shrink:0;}
.nw-cm-input-box{flex:1;background:#f0f5f0;border-radius:20px;padding:8px 14px;display:flex;align-items:flex-end;gap:6px;}
.nw-cm-input-box:focus-within{background:#e4ede4;}
.nw-cm-textarea{flex:1;border:none;background:none;outline:none;font-size:13px;color:#1a2e1a;font-family:'Be Vietnam Pro',sans-serif;resize:none;min-height:20px;max-height:120px;line-height:1.5;}
.nw-cm-textarea::placeholder{color:#8aa88a;}
.nw-cm-send{background:none;border:none;cursor:pointer;color:#1e5c2a;padding:0;flex-shrink:0;display:flex;align-items:center;}
.nw-cm-send:disabled{color:#a0b8a0;cursor:not-allowed;}
.nw-cm-emoji{background:none;border:none;cursor:pointer;font-size:17px;flex-shrink:0;line-height:1;padding:0;}
.nw-cm-empty{text-align:center;padding:1rem;color:#8aa88a;font-size:13px;}
.av-c0{background:#1e5c2a;}.av-c1{background:#1e3a5f;}
.av-c2{background:#7c2d12;}.av-c3{background:#4a1d96;}
.av-c4{background:#9d174d;}.av-c5{background:#065f46;}
</style>

<div class="nw-cms-sort"><span>Phù hợp nhất</span> ▾</div>

@forelse($comments as $comment)
<div class="nw-cmi" wire:key="comment-{{ $comment->id }}">
  <div class="nw-cmi-av nw-cmi-av-lg av-c{{ ($comment->user_id ?? 0) % 6 }}">
    {{ strtoupper(substr($comment->user?->name ?? 'U', 0, 2)) }}
  </div>
  <div class="nw-cmi-wrap">
    <div class="nw-bbl">
      <div class="nw-bbl-name">{{ $comment->user?->name ?? 'Người dùng' }}</div>
      <div class="nw-bbl-text">{{ $comment->content }}</div>
    </div>
    <div class="nw-cmab">
      <span x-data="{ liked: {{ $comment->isLikedBy(auth()->id()) ? 'true' : 'false' }}, count: {{ $comment->likes_count }}, toggle() { this.liked=!this.liked; this.count=this.liked?this.count+1:this.count-1; } }">
        <button class="nw-cmab-btn" :class="liked?'nw-liked':''" @click="toggle()" wire:click="likeComment({{ $comment->id }})">Thích</button>
      </span>
      <button class="nw-cmab-btn" wire:click="setReply({{ $comment->id }}, '{{ addslashes($comment->user?->name ?? '') }}')">Trả lời</button>
      <span class="nw-cmab-time">{{ $comment->created_at->diffForHumans() }}</span>
      @if(($comment->user_id ?? 0) === auth()->id())
        <button class="nw-cmab-btn nw-red" wire:click="deleteComment({{ $comment->id }})" wire:confirm="Xóa bình luận này?">Xóa</button>
      @endif
      @if($comment->likes_count > 0)
        <div class="nw-cmab-likes">
          <div class="nw-cmab-likes-ico"><svg width="9" height="9" viewBox="0 0 24 24" fill="#fff"><path d="M7 22V11M2 13v7a2 2 0 002 2h13.5a2 2 0 001.98-1.71l1-7A2 2 0 0018.5 11H15V6a3 3 0 00-3-3 1 1 0 00-1 1v.5L8.5 9H4a2 2 0 00-2 2v2z"/></svg></div>
          <span>{{ $comment->likes_count }}</span>
        </div>
      @endif
    </div>
    @if($comment->replies->count() > 0)
      <button wire:click="toggleReplies({{ $comment->id }})" class="nw-show-replies {{ in_array($comment->id, $openReplies) ? 'open' : '' }}">
        <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M4 6l4 4 4-4" stroke="#5a7a5a" stroke-width="1.5" stroke-linecap="round"/></svg>
        {{ in_array($comment->id, $openReplies) ? 'Ẩn trả lời' : 'Xem '.$comment->replies->count().' trả lời' }}
      </button>
    @endif
    @if(in_array($comment->id, $openReplies))
      <div class="nw-replies">
        @foreach($comment->replies as $reply)
        <div class="nw-cmi" wire:key="reply-{{ $reply->id }}" style="margin-bottom:8px">
          <div class="nw-cmi-av nw-cmi-av-sm av-c{{ ($reply->user_id ?? 0) % 6 }}">{{ strtoupper(substr($reply->user?->name ?? 'U', 0, 2)) }}</div>
          <div class="nw-cmi-wrap">
            <div class="nw-bbl" style="padding:7px 12px">
              <div class="nw-bbl-name" style="font-size:11px">{{ $reply->user?->name ?? 'Người dùng' }}</div>
              <div class="nw-bbl-text" style="font-size:12px"><span class="nw-mention">@{{ $comment->user?->name }}</span> {{ $reply->content }}</div>
            </div>
            <div class="nw-cmab">
              <span x-data="{ liked: {{ $reply->isLikedBy(auth()->id()) ? 'true' : 'false' }}, count: {{ $reply->likes_count }}, toggle() { this.liked=!this.liked; this.count=this.liked?this.count+1:this.count-1; } }">
                <button class="nw-cmab-btn" :class="liked?'nw-liked':''" @click="toggle()" wire:click="likeComment({{ $reply->id }})">Thích</button>
              </span>
              <button class="nw-cmab-btn" wire:click="setReply({{ $comment->id }}, '{{ addslashes($reply->user?->name ?? '') }}')">Trả lời</button>
              <span class="nw-cmab-time">{{ $reply->created_at->diffForHumans() }}</span>
              @if(($reply->user_id ?? 0) === auth()->id())
                <button class="nw-cmab-btn nw-red" wire:click="deleteComment({{ $reply->id }})" wire:confirm="Xóa trả lời này?">Xóa</button>
              @endif
            </div>
          </div>
        </div>
        @endforeach
      </div>
    @endif
  </div>
</div>
@empty
  <div class="nw-cm-empty">Chưa có bình luận nào. Hãy là người đầu tiên! 👋</div>
@endforelse

@auth
<div>
  @if($replyTo)
    <div class="nw-reply-tag">
      <svg width="12" height="12" viewBox="0 0 16 16" fill="none"><path d="M14 11v1a2 2 0 01-2 2H4l-2 2V5a2 2 0 012-2h2" stroke="#1e5c2a" stroke-width="1.5" stroke-linecap="round"/></svg>
      Đang trả lời <strong style="margin-left:3px">{{ $replyName }}</strong>
      <button wire:click="cancelReply">×</button>
    </div>
  @endif
  <div class="nw-cm-input-wrap">
    @if(auth()->user()?->profile?->avatar)
      <img src="{{ asset('storage/'.auth()->user()->profile->avatar) }}" class="nw-cmi-av nw-cmi-av-lg" style="margin-top:0">
    @else
      <div class="nw-cm-input-av">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</div>
    @endif
    <div class="nw-cm-input-box">
      <textarea wire:model="newComment" class="nw-cm-textarea"
        placeholder="{{ $replyTo ? 'Viết trả lời...' : 'Viết bình luận...' }}"
        rows="1" wire:keydown.enter.prevent="submit"
        x-data x-on:input="$el.style.height='auto';$el.style.height=Math.min($el.scrollHeight,120)+'px'">
      </textarea>
      <button class="nw-cm-emoji" type="button">😊</button>
      <button class="nw-cm-send" wire:click="submit" wire:loading.attr="disabled" wire:target="submit" x-data :disabled="!$wire.newComment.trim()">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>
      </button>
    </div>
  </div>
</div>
@else
  <div style="text-align:center;padding:.875rem;font-size:13px;color:#8aa88a;">
    <a href="{{ route('login') }}" style="color:#1e5c2a;font-weight:700">Đăng nhập</a> để bình luận
  </div>
@endauth
</div>