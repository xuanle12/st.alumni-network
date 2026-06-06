<div>
<style>
.mts-card           { background: #fff; border: 1px solid var(--border); border-radius: 12px; margin-top: 24px; overflow: hidden; }
.mts-hd             { display: flex; align-items: center; gap: 12px; padding: 18px 24px; border-bottom: 1px solid var(--border); }
.mts-hd-icon        { width: 36px; height: 36px; border-radius: 9px; background: linear-gradient(135deg,#f0c050,#c8912a); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.mts-hd-icon i      { color: #fff; font-size: 16px; }
.mts-hd-title       { font-size: 15px; font-weight: 700; color: var(--text); }
.mts-body           { padding: 20px 24px; }

.mts-desc           { font-size: 14px; color: var(--text-muted); margin-bottom: 16px; line-height: 1.6; }
.mts-btn-register   { display: inline-flex; align-items: center; gap: 6px; background: var(--blue); color: #fff; border: none; padding: 9px 18px; border-radius: 8px; font-size: 14px; font-weight: 600; cursor: pointer; font-family: inherit; transition: .15s; }
.mts-btn-register:hover { background: var(--blue-light); }

.mts-status-row     { display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 12px; margin-bottom: 16px; }
.mts-badge          { padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; }
.mts-note           { font-size: 13px; color: var(--text-muted); margin-top: 8px; width: 100%; }
.mts-btn-edit       { display: inline-flex; align-items: center; gap: 6px; background: transparent; color: var(--text-muted); border: 1px solid var(--border); padding: 6px 12px; border-radius: 8px; font-size: 13px; cursor: pointer; font-family: inherit; transition: .15s; }
.mts-btn-edit:hover { background: #f1f5f9; color: var(--text); }

.mts-info-grid      { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; font-size: 13px; }
.mts-info-label     { font-weight: 600; color: var(--text-muted); font-size: 11px; text-transform: uppercase; letter-spacing: .8px; margin-bottom: 3px; }
.mts-info-val       { color: var(--text); }

.mts-form           { background: #f8faf9; border: 1px solid var(--border); border-radius: 10px; padding: 20px; }
.mts-form-grid      { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
.mts-form-full      { grid-column: 1 / -1; }
.mts-form-label     { font-size: 13px; font-weight: 600; color: var(--text); display: block; margin-bottom: 6px; }
.mts-form-label span{ color: #dc2626; }
.mts-form-input     { width: 100%; padding: 9px 12px; border: 1px solid var(--border); border-radius: 8px; font-size: 14px; font-family: inherit; background: #fff; }
.mts-form-input:focus { outline: none; border-color: var(--blue); }
.mts-form-textarea  { width: 100%; padding: 9px 12px; border: 1px solid var(--border); border-radius: 8px; font-size: 14px; font-family: inherit; resize: vertical; background: #fff; }
.mts-form-textarea:focus { outline: none; border-color: var(--blue); }
.mts-err            { color: #dc2626; font-size: 12px; margin-top: 4px; }
.mts-form-actions   { display: flex; gap: 8px; justify-content: flex-end; margin-top: 16px; }
.mts-btn-cancel     { background: transparent; color: var(--text-muted); border: 1px solid var(--border); padding: 8px 16px; border-radius: 8px; font-size: 14px; cursor: pointer; font-family: inherit; }
.mts-btn-save       { display: inline-flex; align-items: center; gap: 6px; background: var(--blue); color: #fff; border: none; padding: 8px 18px; border-radius: 8px; font-size: 14px; font-weight: 600; cursor: pointer; font-family: inherit; transition: .15s; }
.mts-btn-save:hover { background: var(--blue-light); }
</style>

@if(auth()->user()->profile?->role === 'alumni')
<div class="mts-card">
  <div class="mts-hd">
    <div class="mts-hd-icon"><i class="fa-solid fa-user-graduate"></i></div>
    <span class="mts-hd-title">Chương trình Mentor</span>
  </div>

  <div class="mts-body">
    @php $mentor = auth()->user()->mentorProfile; @endphp

    @if(!$mentor)
      <p class="mts-desc">Chia sẻ kinh nghiệm và hỗ trợ sinh viên bằng cách tham gia chương trình Mentor.</p>
      <button wire:click="$set('showMentorForm', true)" class="mts-btn-register">
        <i class="fa-solid fa-plus"></i> Đăng ký làm Mentor
      </button>
    @endif

    @if($mentor && !$editingMentor)
      @php
        $sc = match($mentor->status) {
          'approved' => ['bg'=>'#dcfce7','text'=>'#166534'],
          'rejected' => ['bg'=>'#fee2e2','text'=>'#991b1b'],
          default    => ['bg'=>'#fef9c3','text'=>'#854d0e'],
        };
      @endphp
      <div class="mts-status-row">
        <span class="mts-badge" style="background:{{ $sc['bg'] }};color:{{ $sc['text'] }}">
          {{ $mentor->status_label }}
        </span>
        <button wire:click="$set('editingMentor', true)" class="mts-btn-edit">
          <i class="fa-solid fa-pen"></i> Chỉnh sửa
        </button>
        @if($mentor->admin_note)
          <p class="mts-note"><i class="fa-solid fa-circle-info"></i> {{ $mentor->admin_note }}</p>
        @endif
      </div>

      <div class="mts-info-grid">
        <div>
          <div class="mts-info-label">Lĩnh vực</div>
          <div class="mts-info-val">{{ $mentor->expertise }}</div>
        </div>
        <div>
          <div class="mts-info-label">Liên hệ</div>
          <div class="mts-info-val">{{ $mentor->contact_info }}</div>
        </div>
        <div>
          <div class="mts-info-label">Kỹ năng</div>
          <div class="mts-info-val">{{ $mentor->skills }}</div>
        </div>
        <div>
          <div class="mts-info-label">Số mentee tối đa</div>
          <div class="mts-info-val">{{ $mentor->max_mentee }} người</div>
        </div>
      </div>
    @endif

    @if($showMentorForm || $editingMentor)
      <div class="mts-form">
        <div class="mts-form-grid">

          <div class="mts-form-full">
            <label class="mts-form-label">Lĩnh vực hỗ trợ <span>*</span></label>
            <input wire:model="mentorExpertise" type="text" class="mts-form-input"
                   placeholder="VD: Backend, Mobile, UI/UX...">
            @error('mentorExpertise') <div class="mts-err">{{ $message }}</div> @enderror
          </div>

          <div class="mts-form-full">
            <label class="mts-form-label">Kỹ năng chuyên môn <span>*</span></label>
            <input wire:model="mentorSkills" type="text" class="mts-form-input"
                   placeholder="VD: Laravel, Vue.js, Docker (phân cách bằng dấu phẩy)">
            @error('mentorSkills') <div class="mts-err">{{ $message }}</div> @enderror
          </div>

          <div class="mts-form-full">
            <label class="mts-form-label">Giới thiệu bản thân</label>
            <textarea wire:model="mentorBio" rows="3" class="mts-form-textarea"
                      placeholder="Chia sẻ kinh nghiệm và lý do bạn muốn làm mentor..."></textarea>
          </div>

          <div>
            <label class="mts-form-label">Thông tin liên hệ <span>*</span></label>
            <input wire:model="mentorContactInfo" type="text" class="mts-form-input"
                   placeholder="VD: Zalo 0123456789, facebook.com/...">
            @error('mentorContactInfo') <div class="mts-err">{{ $message }}</div> @enderror
          </div>

          <div>
            <label class="mts-form-label">Số mentee tối đa <span>*</span></label>
            <input wire:model="mentorMaxMentee" type="number" min="1" max="10" class="mts-form-input">
            @error('mentorMaxMentee') <div class="mts-err">{{ $message }}</div> @enderror
          </div>

        </div>

        <div class="mts-form-actions">
          <button wire:click="cancelMentor" class="mts-btn-cancel">Huỷ</button>
          <button wire:click="saveMentor" class="mts-btn-save">
            <span wire:loading wire:target="saveMentor">Đang lưu...</span>
            <span wire:loading.remove wire:target="saveMentor">
              <i class="fa-solid fa-paper-plane"></i>
              {{ $editingMentor ? 'Cập nhật' : 'Gửi đăng ký' }}
            </span>
          </button>
        </div>
      </div>
    @endif

  </div>
</div>
@endif
</div>
