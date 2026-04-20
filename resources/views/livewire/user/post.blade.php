<div>
<style>
.cp-wrap{max-width:900px;margin:0 auto;padding:2rem 1.5rem}
.cp-topbar{display:flex;align-items:center;justify-content:space-between;margin-bottom:1.5rem;gap:10px;flex-wrap:wrap}
.back-btn{display:flex;align-items:center;gap:6px;font-size:13px;color:#6b7280;cursor:pointer;background:none;border:none;font-family:inherit;text-decoration:none}
.back-btn:hover{color:#111}
.cp-title{font-size:18px;font-weight:600;color:#111}
.cp-layout{display:grid;grid-template-columns:1fr 270px;gap:1.25rem}
.form-card{background:#fff;border:1px solid #e2e8f0;border-radius:10px;padding:1.5rem}
.fi{display:flex;flex-direction:column;gap:5px;margin-bottom:1.1rem}
.fi:last-child{margin-bottom:0}
.fi label{font-size:11px;font-weight:600;color:#6b7280;text-transform:uppercase;letter-spacing:.4px}
.fi input,.fi select,.fi textarea{padding:9px 11px;border:1px solid #e2e8f0;border-radius:8px;font-size:13px;color:#111;font-family:inherit;width:100%;background:#fff;transition:border .15s}
.fi input:focus,.fi select:focus,.fi textarea:focus{outline:none;border-color:#3b82f6;box-shadow:0 0 0 3px rgba(59,130,246,.08)}
.fi textarea{resize:vertical;min-height:64px;line-height:1.6}
.err{font-size:11px;color:#dc2626;margin-top:3px}
.row2{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-bottom:1.1rem}
.row2 .fi{margin-bottom:0}
 
/* Editor */
.editor-wrap{border:1px solid #e2e8f0;border-radius:8px;overflow:hidden;transition:border .15s}
.editor-wrap:focus-within{border-color:#3b82f6;box-shadow:0 0 0 3px rgba(59,130,246,.08)}
.editor-toolbar{display:flex;gap:2px;padding:6px 8px;border-bottom:1px solid #f3f4f6;background:#fafafa;flex-wrap:wrap}
.tb{width:28px;height:28px;border:none;background:none;border-radius:5px;cursor:pointer;display:flex;align-items:center;justify-content:center;color:#6b7280;font-size:13px;font-weight:700;font-family:inherit}
.tb:hover{background:#e5e7eb;color:#111}
.tb-sep{width:1px;height:20px;background:#e5e7eb;margin:4px 3px}
.editor-area{padding:12px;min-height:280px;font-size:13px;color:#374151;line-height:1.8;outline:none}
.char-count{font-size:11px;color:#9ca3af;text-align:right;padding:5px 10px;border-top:1px solid #f3f4f6}
 
/* Tags */
.tags-wrap{display:flex;flex-wrap:wrap;gap:6px;padding:8px;border:1px solid #e2e8f0;border-radius:8px;min-height:42px;cursor:text;transition:border .15s}
.tags-wrap:focus-within{border-color:#3b82f6;box-shadow:0 0 0 3px rgba(59,130,246,.08)}
.tag-pill{display:flex;align-items:center;gap:4px;background:#eff6ff;color:#1e40af;font-size:11px;font-weight:500;padding:3px 8px;border-radius:20px}
.tag-pill button{background:none;border:none;cursor:pointer;color:#60a5fa;font-size:13px;line-height:1;padding:0}
.tag-pill button:hover{color:#1d4ed8}
.tag-input-el{border:none;outline:none;font-size:12px;color:#111;font-family:inherit;min-width:80px;flex:1;padding:2px 0}
 
/* Cover */
.cover-upload{border:2px dashed #e2e8f0;border-radius:8px;padding:1.5rem;text-align:center;cursor:pointer;transition:all .15s}
.cover-upload:hover{border-color:#3b82f6;background:#f8fbff}
.cover-preview{width:100%;height:160px;border-radius:8px;object-fit:cover;display:none}
.cover-preview.show{display:block}
.cover-upload.has-img{padding:0;border:none}
.change-cover{display:block;text-align:center;font-size:11px;color:#6b7280;margin-top:5px;cursor:pointer}
.change-cover:hover{color:#3b82f6}
 
/* Sidebar */
.side-card{background:#fff;border:1px solid #e2e8f0;border-radius:10px;padding:1.1rem;margin-bottom:10px}
.side-title{font-size:12px;font-weight:600;color:#374151;margin-bottom:.875rem}
.pub-btn{width:100%;padding:10px;background:#111;color:#fff;border:none;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;font-family:inherit;margin-bottom:8px;display:flex;align-items:center;justify-content:center;gap:6px}
.pub-btn:hover{background:#333}
.draft-btn{width:100%;padding:9px;background:#fff;color:#374151;border:1px solid #e2e8f0;border-radius:8px;font-size:13px;cursor:pointer;font-family:inherit;display:flex;align-items:center;justify-content:center;gap:6px}
.draft-btn:hover{background:#f9fafb}
.meta-row{display:flex;justify-content:space-between;align-items:center;padding:7px 0;border-bottom:1px solid #f3f4f6;font-size:12px}
.meta-row:last-child{border-bottom:none}
.meta-key{color:#6b7280}
.meta-val{color:#111;font-weight:500}
.meta-sel{padding:3px 8px;border:1px solid #e2e8f0;border-radius:6px;font-size:11px;color:#374151;background:#fff}
.meta-sel:focus{outline:none;border-color:#3b82f6}
.tip-list{display:flex;flex-direction:column;gap:8px}
.tip-item{display:flex;gap:8px;font-size:12px;color:#6b7280;line-height:1.4}
.tip-ico{width:18px;height:18px;border-radius:50%;background:#f0fdf4;color:#166534;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:10px;font-weight:700}
.flash-ok{background:#f0fdf4;border:1px solid #86efac;color:#166534;padding:9px 14px;border-radius:8px;font-size:13px;margin-bottom:1rem}
.flash-err{background:#fef2f2;border:1px solid #fca5a5;color:#991b1b;padding:9px 14px;border-radius:8px;font-size:13px;margin-bottom:1rem}
 
@media(max-width:768px){
  .cp-layout{grid-template-columns:1fr}
  .cp-wrap{padding:1rem}
  .row2{grid-template-columns:1fr}
  .side-card:not(:last-child){display:none}
  .side-card:last-child{display:none}
  .side-card.pub-card{display:block}
}
@media(max-width:480px){
  .editor-area{min-height:200px}
  .cp-title{font-size:15px}
}
</style>
 
<div class="cp-wrap">
 
  {{-- Topbar --}}
  <div class="cp-topbar">
    <a href="{{ route('csv') }}" class="back-btn">
      <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M10 4L6 8l4 4" stroke="#6b7280" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
      Quay lại diễn đàn
    </a>
    <div class="cp-title">Tạo bài viết mới</div>
    <div style="width:120px;text-align:right">
      {{-- Nút đăng nhanh trên mobile --}}
      <button wire:click="publish" class="pub-btn" style="display:none;width:auto;padding:7px 14px;" id="mobile-pub">Đăng</button>
    </div>
  </div>
 
  @if(session('success'))
    <div class="flash-ok">✓ {{ session('success') }}</div>
  @endif
 
  <div class="cp-layout">
 
    {{-- Form chính --}}
    <div>
      <div class="form-card">
 
        {{-- Tiêu đề --}}
        <div class="fi">
          <label>Tiêu đề *</label>
          <input wire:model="title" type="text" placeholder="Nhập tiêu đề hấp dẫn cho bài viết...">
          @error('title')<div class="err">{{ $message }}</div>@enderror
        </div>
 
        {{-- Danh mục + Khoa --}}
        <div class="row2">
          <div class="fi">
            <label>Danh mục *</label>
            <select wire:model="category">
              <option value="">Chọn danh mục</option>
              @foreach(\App\Models\Post::CATEGORIES as $val => $label)
                <option value="{{ $val }}">{{ $label }}</option>
              @endforeach
            </select>
            @error('category')<div class="err">{{ $message }}</div>@enderror
          </div>
          <div class="fi">
            <label>Khoa liên quan</label>
            <select wire:model="khoa">
              <option value="">Tất cả khoa</option>
              @foreach(\App\Models\Job::KHOA_LIST as $k => $l)
                <option value="{{ $k }}">{{ $l }}</option>
              @endforeach
            </select>
          </div>
        </div>
 
        {{-- Mô tả ngắn --}}
        <div class="fi">
          <label>Mô tả ngắn</label>
          <textarea wire:model="excerpt" rows="2" placeholder="Tóm tắt bài viết trong 1-2 câu..."></textarea>
        </div>
 
        {{-- Editor nội dung --}}
        <div class="fi">
          <label>Nội dung *</label>
          <div class="editor-wrap">
            <div class="editor-toolbar">
              <button type="button" class="tb" onclick="fmt('bold')" title="Bold"><b>B</b></button>
              <button type="button" class="tb" onclick="fmt('italic')" title="Italic"><i style="font-style:italic">I</i></button>
              <button type="button" class="tb" onclick="fmt('underline')" title="Underline"><u>U</u></button>
              <div class="tb-sep"></div>
              <button type="button" class="tb" onclick="fmt('formatBlock','h2')" title="Tiêu đề">H2</button>
              <button type="button" class="tb" onclick="fmt('formatBlock','h3')" title="Tiêu đề nhỏ">H3</button>
              <div class="tb-sep"></div>
              <button type="button" class="tb" onclick="fmt('insertUnorderedList')" title="Danh sách">
                <svg width="13" height="13" viewBox="0 0 16 16" fill="none"><circle cx="2" cy="4" r="1.5" fill="currentColor"/><path d="M6 4h8M6 8h8M6 12h8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><circle cx="2" cy="8" r="1.5" fill="currentColor"/><circle cx="2" cy="12" r="1.5" fill="currentColor"/></svg>
              </button>
              <button type="button" class="tb" onclick="fmt('insertOrderedList')" title="Danh sách số">
                <svg width="13" height="13" viewBox="0 0 16 16" fill="none"><path d="M1 3h2M1 8h2M1 13h2M6 4h8M6 8h8M6 12h8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
              </button>
              <div class="tb-sep"></div>
              <button type="button" class="tb" onclick="insertLink()" title="Link">
                <svg width="13" height="13" viewBox="0 0 16 16" fill="none"><path d="M6 10l4-4M5 7l-1 1a3 3 0 004 4l1-1M11 9l1-1a3 3 0 00-4-4L7 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
              </button>
              <button type="button" class="tb" onclick="fmt('formatBlock','blockquote')" title="Trích dẫn">
                <svg width="13" height="13" viewBox="0 0 16 16" fill="none"><path d="M3 5h3v4H3V5zm7 0h3v4h-3V5zM6 9c0 2-1 3-3 4M13 9c0 2-1 3-3 4" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg>
              </button>
            </div>
            <div class="editor-area"
                 id="editor"
                 contenteditable="true"
                 data-placeholder="Bắt đầu viết nội dung bài viết..."
                 wire:ignore
                 x-data
                 @input="$wire.content = $event.target.innerHTML; updateCount()">
            </div>
            <div class="char-count"><span id="charCount">0</span> ký tự</div>
          </div>
          @error('content')<div class="err">{{ $message }}</div>@enderror
        </div>
 
        {{-- Tags --}}
        <div class="fi">
          <label>Tags (tối đa 5)</label>
          <div class="tags-wrap" onclick="this.querySelector('.tag-input-el').focus()">
            @foreach($tags as $i => $tag)
              <span class="tag-pill">
                {{ $tag }}
                <button type="button" wire:click="removeTag({{ $i }})">×</button>
              </span>
            @endforeach
            @if(count($tags) < 5)
              <input class="tag-input-el"
                     wire:model="tagInput"
                     type="text"
                     placeholder="{{ count($tags) === 0 ? 'Thêm tag, nhấn Enter...' : 'Thêm tag...' }}"
                     wire:keydown.enter.prevent="addTag">
            @endif
          </div>
        </div>
 
        {{-- Ảnh bìa --}}
        <div class="fi">
          <label>Ảnh bìa</label>
          <div>
            @if($coverImage)
              <img src="{{ $coverImage->temporaryUrl() }}" class="cover-preview show" alt="Cover">
              <span class="change-cover" wire:click="$set('coverImage', null)">✕ Xóa ảnh</span>
            @else
              <label class="cover-upload" for="cover-input">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" style="margin:0 auto 8px;display:block;color:#9ca3af"><rect x="3" y="3" width="18" height="18" rx="3" stroke="currentColor" stroke-width="1.5"/><circle cx="8.5" cy="8.5" r="1.5" stroke="currentColor" stroke-width="1.5"/><path d="M21 15l-5-5L5 21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <div style="font-size:13px;color:#6b7280;margin-bottom:3px">Nhấn để tải ảnh bìa lên</div>
                <div style="font-size:11px;color:#9ca3af">JPG, PNG · Tối đa 2MB</div>
                <input type="file" id="cover-input" wire:model="coverImage" accept="image/*" style="display:none">
              </label>
            @endif
            @error('coverImage')<div class="err">{{ $message }}</div>@enderror
          </div>
        </div>
 
      </div>
    </div>
 
    {{-- Sidebar --}}
    <div>
 
      {{-- Publish --}}
      <div class="side-card pub-card">
        <div class="side-title">Xuất bản</div>
        <button wire:click="publish" class="pub-btn">
          <span wire:loading wire:target="publish">Đang đăng...</span>
          <span wire:loading.remove wire:target="publish">🚀 Đăng bài viết</span>
        </button>
        <button wire:click="saveDraft" class="draft-btn">
          <span wire:loading wire:target="saveDraft">Đang lưu...</span>
          <span wire:loading.remove wire:target="saveDraft">💾 Lưu nháp</span>
        </button>
      </div>
 
      {{-- Thông tin bài viết --}}
      <div class="side-card">
        <div class="side-title">Cài đặt bài viết</div>
        <div class="meta-row">
          <span class="meta-key">Trạng thái</span>
          <select class="meta-sel" wire:model="status">
            <option value="published">Công khai</option>
            <option value="private">Chỉ mình tôi</option>
            <option value="draft">Nháp</option>
          </select>
        </div>
        <div class="meta-row">
          <span class="meta-key">Bình luận</span>
          <select class="meta-sel" wire:model="allow_comments">
            <option value="1">Cho phép</option>
            <option value="0">Tắt</option>
          </select>
        </div>
        <div class="meta-row">
          <span class="meta-key">Tác giả</span>
          <span class="meta-val">{{ auth()->user()->name }}</span>
        </div>
        <div class="meta-row">
          <span class="meta-key">Ngày đăng</span>
          <span class="meta-val">{{ now()->format('d/m/Y') }}</span>
        </div>
      </div>
 
      {{-- Tips --}}
      <div class="side-card">
        <div class="side-title">Gợi ý viết bài</div>
        <div class="tip-list">
          <div class="tip-item"><div class="tip-ico">✓</div><span>Tiêu đề rõ ràng, dưới 100 ký tự</span></div>
          <div class="tip-item"><div class="tip-ico">✓</div><span>Thêm ảnh bìa để bài viết nổi bật hơn</span></div>
          <div class="tip-item"><div class="tip-ico">✓</div><span>Dùng tags để người đọc dễ tìm thấy</span></div>
          <div class="tip-item"><div class="tip-ico">✓</div><span>Viết mô tả ngắn hấp dẫn để thu hút đọc</span></div>
        </div>
      </div>
 
    </div>
  </div>
</div>
 
<script>
function fmt(cmd, val = null) {
  document.getElementById('editor').focus();
  document.execCommand(cmd, false, val);
  syncContent();
}
function insertLink() {
  const url = prompt('Nhập URL:');
  if (url) fmt('createLink', url);
}
function syncContent() {
  const editor = document.getElementById('editor');
  window.livewire?.find(editor.closest('[wire\\:id]')?.getAttribute('wire:id'))?.set('content', editor.innerHTML);
}
function updateCount() {
  const text = document.getElementById('editor').innerText;
  document.getElementById('charCount').textContent = text.length;
}
document.getElementById('editor').addEventListener('input', updateCount);
// Placeholder
const editor = document.getElementById('editor');
editor.addEventListener('focus', () => {
  if (!editor.innerHTML.trim()) editor.innerHTML = '';
});
</script>
</div>