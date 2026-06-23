<div>
    @if($show)
<div class="modal-backdrop" wire:click.self="closeModal">
    <div class="apply-modal" role="dialog" aria-modal="true" aria-labelledby="apply-modal-title">

        <div class="apply-modal__header">
            <div>
                <h2 id="apply-modal-title" class="apply-modal__title">Ứng tuyển</h2>
                <p class="apply-modal__subtitle">{{ $job?->title }}</p>
            </div>
            <button wire:click="closeModal" class="apply-modal__close" aria-label="Đóng">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
            </button>
        </div>

        {{-- Body --}}
        <div class="apply-modal__body">
            @if($errors->has('general'))
                <div class="alert alert--danger">{{ $errors->first('general') }}</div>
            @endif

            {{-- Upload CV --}}
            <div class="form-section-label">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                    <polyline points="14 2 14 8 20 8"/>
                </svg>
                Chọn CV để ứng tuyển
            </div>

            <label class="cv-dropzone" for="cv_file_input">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <polyline points="16 16 12 12 8 16"/><line x1="12" y1="12" x2="12" y2="21"/>
                    <path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"/>
                </svg>
                <p class="cv-dropzone__text">Tải lên CV từ máy tính, chọn hoặc kéo thả</p>
                <p class="cv-dropzone__hint">Hỗ trợ .doc, .docx, .pdf — tối đa 5MB</p>
                <input id="cv_file_input" type="file" wire:model="cv_file"
                       accept=".doc,.docx,.pdf" class="sr-only" />
                <span class="btn-outline">
                    Chọn CV
                </span>
                @if($cv_file)
                    <p class="cv-dropzone__filename">{{ $cv_file->getClientOriginalName() }}</p>
                @endif
            </label>
            @error('cv_file')
                <p class="field-error">{{ $message }}</p>
            @enderror

            {{-- Thông tin --}}
            <p class="form-required-notice">
                Vui lòng nhập đầy đủ thông tin chi tiết:
                <span>(*) Bắt buộc</span>
            </p>

            <div class="form-group">
                <label class="form-label" for="apply_name">Họ và tên <span class="required">*</span></label>
                <input id="apply_name" type="text" wire:model.live.debounce.300ms="name"
                       placeholder="Họ tên hiển thị với NTD" class="form-input" />
                @error('name') <p class="field-error">{{ $message }}</p> @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="apply_email">Email <span class="required">*</span></label>
                    <input id="apply_email" type="email" wire:model.live.debounce.300ms="email"
                           placeholder="Email hiển thị với NTD" class="form-input" />
                    @error('email') <p class="field-error">{{ $message }}</p> @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="apply_phone">Số điện thoại <span class="required">*</span></label>
                    <input id="apply_phone" type="tel" wire:model.live.debounce.300ms="phone"
                           placeholder="SĐT hiển thị với NTD" class="form-input" />
                    @error('phone') <p class="field-error">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="apply_location">Địa điểm làm việc mong muốn <span class="required">*</span></label>
                <select id="apply_location" wire:model="location" class="form-input form-select">
                    <option value="">Chọn địa điểm bạn muốn làm việc</option>
                    <option value="Hà Nội">Hà Nội</option>
                    <option value="TP. Hồ Chí Minh">TP. Hồ Chí Minh</option>
                    <option value="Đà Nẵng">Đà Nẵng</option>
                    <option value="Hải Phòng">Hải Phòng</option>
                    <option value="Cần Thơ">Cần Thơ</option>
                    <option value="Khác">Khác</option>
                </select>
                @error('location') <p class="field-error">{{ $message }}</p> @enderror
            </div>

            {{-- Thư giới thiệu --}}
            <div class="form-section-label" style="margin-top: 1.25rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"/>
                    <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"/>
                </svg>
                Thư giới thiệu
            </div>
            <p class="form-hint">Một thư giới thiệu ngắn gọn, chỉn chu sẽ giúp bạn gây ấn tượng hơn với nhà tuyển dụng.</p>
            <textarea wire:model.defer="cover_letter" rows="4"
                      placeholder="Viết giới thiệu ngắn gọn về bản thân (điểm mạnh, điểm yếu) và nêu rõ mong muốn, lý do bạn muốn ứng tuyển cho vị trí này."
                      class="form-input form-textarea"></textarea>
            @error('cover_letter') <p class="field-error">{{ $message }}</p> @enderror

            {{-- Submit --}}
            <button wire:click="submit" wire:loading.attr="disabled" class="btn-submit">
                <span wire:loading.remove>Nộp hồ sơ ứng tuyển</span>
                <span wire:loading>Đang gửi...</span>
            </button>
        </div>

    </div>
</div>
@endif

<style>
.modal-backdrop {
    position: fixed; inset: 0; z-index: 50;
    background: rgba(0,0,0,0.45);
    display: flex; align-items: center; justify-content: center;
    padding: 1rem;
}
.apply-modal {
    background: #fff; border-radius: 12px;
    width: 100%; max-width: 560px;
    max-height: 90vh; display: flex; flex-direction: column;
    overflow: hidden;
}
.apply-modal__header {
    display: flex; align-items: flex-start; justify-content: space-between;
    padding: 1.25rem 1.5rem;
    border-bottom: 1px solid #e5e7eb;
    flex-shrink: 0;
}
.apply-modal__title { font-size: 17px; font-weight: 600; margin: 0; color: #111; }
.apply-modal__subtitle { font-size: 13px; color: #6b7280; margin: 3px 0 0; }
.apply-modal__close {
    background: none; border: none; cursor: pointer;
    color: #9ca3af; padding: 2px; border-radius: 6px;
    display: flex; align-items: center; justify-content: center;
}
.apply-modal__close:hover { color: #374151; background: #f3f4f6; }
.apply-modal__body { padding: 1.25rem 1.5rem; overflow-y: auto; flex: 1; }
.form-section-label {
    display: flex; align-items: center; gap: 7px;
    font-size: 14px; font-weight: 600; color: #0961AA;
    margin-bottom: 10px;
}
.cv-dropzone {
    display: flex; flex-direction: column; align-items: center;
    border: 1.5px dashed #d1d5db; border-radius: 8px;
    padding: 1.25rem; text-align: center; cursor: pointer;
    transition: background 0.15s; margin-bottom: 1rem;
    color: #6b7280;
}
.cv-dropzone:hover { background: #f9fafb; }
.cv-dropzone__text { font-size: 13px; margin: 8px 0 3px; }
.cv-dropzone__hint { font-size: 12px; color: #9ca3af; margin: 0 0 10px; }
.cv-dropzone__filename { font-size: 12px; color: #0961AA; margin: 6px 0 0; font-weight: 500; }
.btn-outline {
    border: 1px solid #d1d5db; border-radius: 6px;
    padding: 6px 16px; font-size: 13px; background: #fff;
    color: #374151; pointer-events: none;
}
.form-required-notice {
    font-size: 13px; font-weight: 500; color: #0961AA;
    display: flex; justify-content: space-between; margin: 0 0 12px;
}
.form-required-notice span { color: #ef4444; font-weight: 400; }
.form-group { margin-bottom: 12px; }
.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 12px; }
.form-label { font-size: 13px; color: #374151; display: block; margin-bottom: 4px; }
.required { color: #ef4444; }
.form-input {
    width: 100%; box-sizing: border-box;
    border: 1px solid #d1d5db; border-radius: 8px;
    padding: 8px 12px; font-size: 14px;
    color: #111; background: #fff;
    transition: border-color 0.15s;
}
.form-input:focus { outline: none; border-color: #0961AA; box-shadow: 0 0 0 3px rgba(9,97,170,0.1); }
.form-select { appearance: none; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%236b7280' stroke-width='2'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 12px center; padding-right: 32px; }
.form-textarea { resize: vertical; line-height: 1.6; min-height: 100px; }
.form-hint { font-size: 13px; color: #6b7280; margin: 0 0 8px; }
.checkbox-group { margin-top: 14px; display: flex; flex-direction: column; gap: 10px; }
.checkbox-label { display: flex; align-items: flex-start; gap: 8px; font-size: 13px; color: #374151; cursor: pointer; line-height: 1.5; }
.checkbox-label input { margin-top: 2px; flex-shrink: 0; accent-color: #0961AA; }
.link { color: #0961AA; text-decoration: underline; }
.field-error { font-size: 12px; color: #ef4444; margin: 4px 0 0; }
.alert--danger { background: #fef2f2; border: 1px solid #fecaca; color: #b91c1c; border-radius: 8px; padding: 10px 14px; font-size: 13px; margin-bottom: 12px; }
.btn-submit {
    width: 100%; margin-top: 1.25rem;
    background: #0961AA; color: #fff; border: none;
    border-radius: 8px; padding: 13px;
    font-size: 15px; font-weight: 600; cursor: pointer;
    transition: background 0.15s;
}
.btn-submit:hover { background: #074e8c; }
.btn-submit:disabled { opacity: 0.7; cursor: not-allowed; }
.sr-only { position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0,0,0,0); white-space: nowrap; border-width: 0; }
</style>
</div>
