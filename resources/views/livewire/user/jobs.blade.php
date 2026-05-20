<div>
    <style>
    /* ── SIDEBAR ── */
    .jl-wrap { display: flex; gap: 24px; align-items: flex-start; }
    .jl-sidebar { width: 240px; flex-shrink: 0; position: sticky; top: 80px; display: flex; flex-direction: column; gap: 14px; }

    .jl-filter-box { background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden; }
    .jl-filter-header { display: flex; align-items: center; justify-content: space-between; padding: 12px 18px; border-bottom: 1px solid #e2e8f0; }
    .jl-filter-header span { font-size: 11px; font-weight: 600; color: #9ca3af; text-transform: uppercase; letter-spacing: 0.6px; }
    .jl-filter-header button { font-size: 12px; color: #1d4ed8; background: none; border: none; cursor: pointer; padding: 0; }
    .jl-filter-header button:hover { text-decoration: underline; }

    .jl-acc-group { border-bottom: 1px solid #e2e8f0; }
    .jl-acc-group:last-child { border-bottom: none; }
    .jl-check-row { display: flex; align-items: center; gap: 8px; font-size: 13px; color: #374151; cursor: pointer; }
    .jl-check-row input[type=checkbox] { accent-color: #1d4ed8; width: 14px; height: 14px; flex-shrink: 0; cursor: pointer; }

    .jl-emp-box { background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px; }
    .jl-emp-btn { display: block; width: 100%; padding: 9px; text-align: center; font-size: 13px; font-weight: 600; color: #fff; background: #1d4ed8; border-radius: 8px; text-decoration: none; border: none; cursor: pointer; transition: background 0.2s; font-family: inherit; }
    .jl-emp-btn:hover { background: #1e40af; }

    /* ── MAIN ── */
    .jl-main { flex: 1; min-width: 0; }
    .jl-searchbar { background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 12px 16px; display: flex; gap: 10px; margin-bottom: 14px; }
    .jl-searchbar input { flex: 1; border: 1px solid #cbd5e1; border-radius: 8px; padding: 8px 12px; font-size: 13px; outline: none; font-family: inherit; transition: border-color 0.2s; }
    .jl-searchbar input:focus { border-color: #1d4ed8; box-shadow: 0 0 0 3px rgba(29,78,216,0.1); }

    .jl-meta { display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px; padding: 0 2px; }
    .jl-meta p { font-size: 13px; color: #6b7280; }
    .jl-meta strong { color: #111827; }
    .jl-meta select { border: 1px solid #cbd5e1; border-radius: 8px; padding: 5px 10px; font-size: 12px; background: #fff; outline: none; font-family: inherit; color: #374151; }

    /* ── CARD ── */
    .jl-card { background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; transition: border-color 0.2s; }
    .jl-card:hover { border-color: #1d4ed8; }
    .jl-card.featured { border-color: #f59e0b; }

    .jl-badge-featured { display: inline-block; font-size: 11px; font-weight: 500; color: #92600e; background: #fffbeb; border: 1px solid #fde68a; padding: 2px 8px; border-radius: 6px; margin-bottom: 8px; }
    .jl-job-title { font-size: 15px; font-weight: 600; color: #111827; margin-bottom: 3px; }
    .jl-job-title:hover { color: #1d4ed8; }
    .jl-company { font-size: 13px; font-weight: 500; color: #1d4ed8; margin-bottom: 10px; }

    .jl-tags { display: flex; flex-wrap: wrap; gap: 6px; margin-bottom: 8px; }
    .jl-tag { font-size: 11px; color: #6b7280; background: #f8fafc; border: 1px solid #e2e8f0; padding: 3px 9px; border-radius: 6px; }

    .jl-desc { font-size: 13px; color: #6b7280; line-height: 1.6; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }

    .jl-skills { display: flex; flex-wrap: wrap; gap: 5px; margin-top: 10px; }
    .jl-skill { font-size: 11px; color: #1d4ed8; background: #eff6ff; border: 1px solid #bfdbfe; padding: 2px 8px; border-radius: 6px; }

    .jl-right { text-align: right; }
    .jl-salary { font-size: 14px; font-weight: 600; color: #1d4ed8; margin-bottom: 10px; }
    .jl-btn-apply { display: block; width: 100%; padding: 8px; text-align: center; font-size: 12px; font-weight: 600; color: #fff; background: #1d4ed8; border: none; border-radius: 8px; cursor: pointer; text-decoration: none; margin-bottom: 6px; transition: background 0.2s; font-family: inherit; }
    .jl-btn-apply:hover { background: #1e40af; }
    .jl-btn-save { display: block; width: 100%; padding: 7px; text-align: center; font-size: 12px; color: #6b7280; background: none; border: 1px solid #cbd5e1; border-radius: 8px; cursor: pointer; transition: all 0.2s; font-family: inherit; }
    .jl-btn-save:hover { border-color: #1d4ed8; color: #1d4ed8; }
    .jl-deadline { font-size: 11px; color: #9ca3af; margin-top: 6px; }

    .jl-empty { background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 48px 20px; text-align: center; }
    .jl-empty p { font-size: 13px; color: #9ca3af; }
    .jl-empty button { margin-top: 10px; font-size: 13px; color: #1d4ed8; background: none; border: none; cursor: pointer; font-family: inherit; }
    .jl-empty button:hover { text-decoration: underline; }

    
    .jm-overlay {
       position: fixed; inset: 0; z-index: 9999;
        background: rgba(15,23,42,0.55);
        display: flex; align-items: center; justify-content: center;
        padding: 24px 16px;
        opacity: 0; pointer-events: none;
        transition: opacity 0.2s;
    }
    .jm-overlay.open { opacity: 1; pointer-events: all; }

   
    .jm-modal {
        background: #fff; border-radius: 18px;
        border: 1px solid #e2e8f0;
        width: 100%; max-width: 660px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(15,23,42,0.2);
        transform: translateY(16px);
        transition: transform 0.25s;
        display: flex; flex-direction: column;
        max-height: 90vh;
    }
    .jm-overlay.open .jm-modal { transform: translateY(0); }

    .jm-header {
        background: linear-gradient(135deg, #1e40af 0%, #1d4ed8 60%, #2563eb 100%);
        padding: 22px 28px 20px;
        display: flex; align-items: flex-start; justify-content: space-between;
        flex-shrink: 0;
    }
    .jm-header-tag { display: inline-flex; align-items: center; gap: 5px; font-size: 11px; font-weight: 500; color: #bfdbfe; background: rgba(255,255,255,0.15); border: 0.5px solid rgba(255,255,255,0.25); padding: 3px 10px; border-radius: 20px; margin-bottom: 8px; }
    .jm-header-title { font-size: 20px; font-weight: 700; color: #fff; margin: 0 0 3px; }
    .jm-header-sub { font-size: 13px; color: #bfdbfe; margin: 0; }
    .jm-close { background: rgba(255,255,255,0.15); border: none; border-radius: 8px; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; cursor: pointer; color: #fff; font-size: 20px; flex-shrink: 0; transition: background 0.15s; margin-top: 2px; }
    .jm-close:hover { background: rgba(255,255,255,0.28); }

    .jm-steps { display: flex; align-items: center; padding: 0 28px; background: #eff6ff; border-bottom: 1px solid #bfdbfe; flex-shrink: 0; }
    .jm-step { display: flex; align-items: center; gap: 8px; padding: 12px 0; flex: 1; position: relative; }
    .jm-step:not(:last-child)::after { content: ''; position: absolute; right: 0; top: 50%; transform: translateY(-50%); width: 22px; height: 1px; background: #bfdbfe; }
    .jm-step-num { width: 22px; height: 22px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 700; flex-shrink: 0; }
    .jm-step.active   .jm-step-num { background: #1d4ed8; color: #fff; }
    .jm-step.inactive .jm-step-num { background: #e2e8f0; color: #94a3b8; }
    .jm-step-label { font-size: 12px; font-weight: 500; }
    .jm-step.active   .jm-step-label { color: #1d4ed8; }
    .jm-step.inactive .jm-step-label { color: #94a3b8; }

    .jm-body { padding: 24px 28px 0; overflow-y: auto; flex: 1; }
    .jm-body::-webkit-scrollbar { width: 4px; }
    .jm-body::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }

    .jm-section-title { font-size: 12px; font-weight: 700; color: #475569; text-transform: uppercase; letter-spacing: 0.6px; margin: 0 0 14px; display: flex; align-items: center; gap: 7px; }
    .jm-section-title svg { color: #1d4ed8; width: 15px; height: 15px; }

    .jm-row { display: flex; gap: 14px; margin-bottom: 14px; }
    .jm-field { display: flex; flex-direction: column; gap: 5px; flex: 1; }
    .jm-label { font-size: 12px; font-weight: 600; color: #334155; }
    .jm-label .req { color: #ef4444; }

    .jm-input, .jm-select, .jm-textarea { border: 1px solid #cbd5e1; border-radius: 10px; padding: 9px 13px; font-size: 13px; color: #0f172a; background: #fff; outline: none; transition: border-color 0.2s, box-shadow 0.2s; font-family: inherit; width: 100%; box-sizing: border-box; }
    .jm-input:focus, .jm-select:focus, .jm-textarea:focus { border-color: #1d4ed8; box-shadow: 0 0 0 3px rgba(29,78,216,0.12); }
    .jm-input::placeholder, .jm-textarea::placeholder { color: #94a3b8; }
    .jm-textarea { resize: vertical; min-height: 90px; line-height: 1.6; }
    .jm-select { cursor: pointer; appearance: none; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 12px center; padding-right: 32px; }

    .jm-input-prefix { display: flex; align-items: center; border: 1px solid #cbd5e1; border-radius: 10px; overflow: hidden; transition: border-color 0.2s, box-shadow 0.2s; }
    .jm-input-prefix:focus-within { border-color: #1d4ed8; box-shadow: 0 0 0 3px rgba(29,78,216,0.12); }
    .jm-input-prefix span { padding: 9px 10px 9px 13px; font-size: 13px; color: #64748b; background: #f8fafc; border-right: 1px solid #e2e8f0; white-space: nowrap; flex-shrink: 0; }
    .jm-input-prefix input { border: none; border-radius: 0; box-shadow: none; padding: 9px 13px; font-size: 13px; color: #0f172a; outline: none; font-family: inherit; flex: 1; min-width: 0; background: transparent; }

    .jm-skill-wrap { display: flex; flex-wrap: wrap; gap: 7px; padding: 10px; border: 1px solid #cbd5e1; border-radius: 10px; min-height: 44px; align-items: flex-start; cursor: text; transition: border-color 0.2s; box-sizing: border-box; width: 100%; }
    .jm-skill-wrap:focus-within { border-color: #1d4ed8; box-shadow: 0 0 0 3px rgba(29,78,216,0.12); }
    .jm-skill-tag { display: inline-flex; align-items: center; gap: 5px; background: #eff6ff; border: 1px solid #bfdbfe; color: #1e40af; font-size: 12px; font-weight: 500; padding: 3px 9px; border-radius: 6px; }
    .jm-skill-tag button { background: none; border: none; padding: 0; cursor: pointer; color: #3b82f6; line-height: 1; display: flex; align-items: center; font-size: 14px; }
    .jm-skill-tag button:hover { color: #ef4444; }
    .jm-skill-input { border: none; outline: none; font-size: 13px; color: #0f172a; font-family: inherit; background: transparent; flex: 1; min-width: 80px; }
    .jm-hint { font-size: 11px; color: #94a3b8; margin-top: 3px; }

    .jm-toggle-row { display: flex; align-items: center; justify-content: space-between; padding: 12px 14px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; margin-bottom: 12px; }
    .jm-toggle-label { font-size: 13px; font-weight: 500; color: #334155; }
    .jm-toggle-desc  { font-size: 12px; color: #94a3b8; }
    .jm-toggle { position: relative; width: 40px; height: 22px; flex-shrink: 0; }
    .jm-toggle input { opacity: 0; width: 0; height: 0; }
    .jm-toggle-slider { position: absolute; inset: 0; background: #cbd5e1; border-radius: 22px; cursor: pointer; transition: background 0.2s; }
    .jm-toggle-slider::before { content: ''; position: absolute; width: 16px; height: 16px; left: 3px; top: 3px; background: #fff; border-radius: 50%; transition: transform 0.2s; box-shadow: 0 1px 3px rgba(0,0,0,0.2); }
    .jm-toggle input:checked ~ .jm-toggle-slider { background: #1d4ed8; }
    .jm-toggle input:checked ~ .jm-toggle-slider::before { transform: translateX(18px); }

    .jm-divider { border: none; border-top: 1px solid #f1f5f9; margin: 20px 0; }
    .jm-char-count { font-size: 11px; color: #94a3b8; text-align: right; margin-top: 3px; }
    .jm-required-note { font-size: 11.5px; color: #94a3b8; margin-bottom: 18px; }

    .jm-footer { padding: 16px 28px; border-top: 1px solid #e2e8f0; display: flex; align-items: center; justify-content: space-between; background: #fff; flex-shrink: 0; }
    .jm-footer-left { font-size: 12px; color: #94a3b8; display: flex; align-items: center; gap: 6px; }
    .jm-footer-right { display: flex; gap: 10px; }

    .jm-btn-cancel { padding: 9px 18px; font-size: 13px; font-weight: 500; color: #64748b; background: none; border: 1px solid #e2e8f0; border-radius: 10px; cursor: pointer; transition: all 0.15s; font-family: inherit; }
    .jm-btn-cancel:hover { border-color: #94a3b8; color: #334155; }
    .jm-btn-preview { padding: 9px 16px; font-size: 13px; font-weight: 500; color: #1d4ed8; background: #eff6ff; border: 1px solid #bfdbfe; border-radius: 10px; cursor: pointer; transition: all 0.15s; font-family: inherit; display: flex; align-items: center; gap: 6px; }
    .jm-btn-preview:hover { background: #dbeafe; }
    .jm-btn-submit { padding: 9px 22px; font-size: 13px; font-weight: 700; color: #fff; background: #1d4ed8; border: none; border-radius: 10px; cursor: pointer; transition: background 0.15s; font-family: inherit; display: flex; align-items: center; gap: 7px; }
    .jm-btn-submit:hover { background: #1e40af; }

    /* ── RESPONSIVE ── */
    @media (max-width: 1024px) { .jl-sidebar { width: 210px; } }
    @media (max-width: 768px) {
        .jl-wrap { flex-direction: column; gap: 14px; }
        .jl-sidebar { width: 100%; position: static; flex-direction: row; overflow-x: auto; }
        .jm-steps { padding: 0 18px; }
        .jm-body { padding: 18px 18px 0; }
        .jm-header { padding: 18px; }
        .jm-footer { padding: 14px 18px; flex-wrap: wrap; gap: 10px; }
        .jm-step-label { display: none; }
        .jm-row { flex-direction: column; }
    }
</style>

{{-- MODAL --}}
<div class="jm-overlay" id="jm-overlay" role="dialog" aria-modal="true" aria-labelledby="jm-title">
    <div class="jm-modal">
        <div class="jm-header">
            <div>
                <div class="jm-header-tag">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/></svg>
                    Tuyển dụng
                </div>
                <p class="jm-header-title" id="jm-title">Đăng tin tuyển dụng</p>
                <p class="jm-header-sub">Tiếp cận sinh viên & cựu sinh viên VNUA ngay hôm nay</p>
            </div>
            <button class="jm-close" onclick="closeModal()" aria-label="Đóng">&times;</button>
        </div>

        <div class="jm-steps">
            <div class="jm-step active">
                <div class="jm-step-num">1</div>
                <span class="jm-step-label">Thông tin cơ bản</span>
            </div>
            <div class="jm-step inactive">
                <div class="jm-step-num">2</div>
                <span class="jm-step-label">Chi tiết vị trí</span>
            </div>
            <div class="jm-step inactive">
                <div class="jm-step-num">3</div>
                <span class="jm-step-label">Xem trước & gửi</span>
            </div>
        </div>

        <div class="jm-body">
            <p class="jm-required-note">Các trường có dấu <span style="color:#ef4444">*</span> là bắt buộc.</p>

            <p class="jm-section-title">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                Thông tin công ty
            </p>

            <div class="jm-row">
                <div class="jm-field">
                    <label class="jm-label">Tên công ty <span class="req">*</span></label>
                    <input class="jm-input" type="text" name="company" placeholder="VD: Công ty CP ABC Technology" required>
                </div>
                <div class="jm-field" style="max-width:180px">
                    <label class="jm-label">Quy mô</label>
                    <select class="jm-select" name="company_size">
                        <option value="">Chọn quy mô</option>
                        <option>1 – 50 nhân viên</option>
                        <option>51 – 200</option>
                        <option>201 – 1.000</option>
                        <option>Trên 1.000</option>
                    </select>
                </div>
            </div>

            <div class="jm-row">
                <div class="jm-field">
                    <label class="jm-label">Website công ty</label>
                    <div class="jm-input-prefix">
                        <span>https://</span>
                        <input type="text" name="website" placeholder="company.com">
                    </div>
                </div>
                <div class="jm-field">
                    <label class="jm-label">Email liên hệ <span class="req">*</span></label>
                    <input class="jm-input" type="email" name="contact_email" placeholder="hr@company.com" required>
                </div>
            </div>

            <hr class="jm-divider">

            <p class="jm-section-title">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                Thông tin vị trí
            </p>

            <div class="jm-row">
                <div class="jm-field">
                    <label class="jm-label">Tên vị trí tuyển dụng <span class="req">*</span></label>
                    <input class="jm-input" type="text" name="title" placeholder="VD: Kỹ sư phần mềm Backend" oninput="jmCount(this,'jm-tc',80)" required>
                    <div class="jm-char-count"><span id="jm-tc">0</span>/80</div>
                </div>
            </div>

            <div class="jm-row">
                <div class="jm-field">
                    <label class="jm-label">Loại hình <span class="req">*</span></label>
                    <select class="jm-select" name="type" required>
                        <option value="">Chọn loại hình</option>
                        <option value="full-time">Toàn thời gian (Full-time)</option>
                        <option value="part-time">Bán thời gian (Part-time)</option>
                        <option value="internship">Thực tập</option>
                        <option value="remote">Remote</option>
                    </select>
                </div>
                <div class="jm-field">
                    <label class="jm-label">Địa điểm <span class="req">*</span></label>
                    <input class="jm-input" type="text" name="location" placeholder="VD: Hà Nội, Hồ Chí Minh..." required>
                </div>
            </div>

            <div class="jm-row">
                <div class="jm-field">
                    <label class="jm-label">Kinh nghiệm yêu cầu</label>
                    <select class="jm-select" name="experience">
                        <option value="">Không yêu cầu</option>
                        <option>Dưới 1 năm</option>
                        <option>1 – 2 năm</option>
                        <option>2 – 5 năm</option>
                        <option>Trên 5 năm</option>
                    </select>
                </div>
                <div class="jm-field">
                    <label class="jm-label">Mức lương</label>
                    <input class="jm-input" type="text" name="salary" placeholder="VD: 12 – 18 triệu hoặc Thỏa thuận">
                </div>
            </div>

            <div class="jm-row">
                <div class="jm-field">
                    <label class="jm-label">Hạn nộp hồ sơ <span class="req">*</span></label>
                    <input class="jm-input" type="date" name="deadline" style="color:#334155" required>
                </div>
            </div>

            <div class="jm-row">
                <div class="jm-field" style="flex:1 1 100%">
                    <label class="jm-label">Mô tả công việc <span class="req">*</span></label>
                    <textarea class="jm-textarea" name="description" placeholder="Mô tả chi tiết về vị trí, trách nhiệm, quyền lợi..." oninput="jmCount(this,'jm-dc',2000)" required></textarea>
                    <div class="jm-char-count"><span id="jm-dc">0</span>/2000</div>
                </div>
            </div>

            <div class="jm-row">
                <div class="jm-field" style="flex:1 1 100%">
                    <label class="jm-label">Kỹ năng yêu cầu</label>
                    <div class="jm-skill-wrap" id="jm-skill-wrap" onclick="document.getElementById('jm-skill-input').focus()">
                        <input id="jm-skill-input" class="jm-skill-input" type="text" placeholder="Nhập kỹ năng rồi nhấn Enter...">
                    </div>
                    <p class="jm-hint">Nhấn <kbd style="font-size:10px;background:#f1f5f9;border:1px solid #cbd5e1;padding:1px 5px;border-radius:4px;">Enter</kbd> hoặc dấu phẩy để thêm kỹ năng</p>
                </div>
            </div>

            <hr class="jm-divider">

            <p class="jm-section-title">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                Tuỳ chọn
            </p>

            <div class="jm-toggle-row">
                <div>
                    <div class="jm-toggle-label">Tin nổi bật</div>
                    <div class="jm-toggle-desc">Hiển thị ưu tiên, tăng lượt xem</div>
                </div>
                <label class="jm-toggle" aria-label="Bật tin nổi bật">
                    <input type="checkbox" name="is_featured">
                    <span class="jm-toggle-slider"></span>
                </label>
            </div>

            <div class="jm-toggle-row">
                <div>
                    <div class="jm-toggle-label">Cho phép nộp hồ sơ trực tuyến</div>
                    <div class="jm-toggle-desc">Ứng viên nộp CV trực tiếp qua hệ thống</div>
                </div>
                <label class="jm-toggle" aria-label="Cho phép nộp hồ sơ trực tuyến">
                    <input type="checkbox" name="allow_online_apply" checked>
                    <span class="jm-toggle-slider"></span>
                </label>
            </div>

            <div style="height:24px"></div>
        </div>

        <div class="jm-footer">
            <span class="jm-footer-left">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="#1d4ed8" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                Tin sẽ được duyệt trong 24h
            </span>
            <div class="jm-footer-right">
                <button type="button" class="jm-btn-cancel" onclick="closeModal()">Huỷ</button>
                <button type="button" class="jm-btn-preview">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                    Xem trước
                </button>
                <button type="submit" class="jm-btn-submit">
                    Đăng tin
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                </button>
            </div>
        </div>
    </div>
</div>

{{-- TRANG DANH SÁCH --}}
<div class="jl-wrap flex gap-6 items-start">

    <aside class="jl-sidebar w-64 flex-shrink-0 sticky top-20 space-y-4">

        <div class="jl-filter-box bg-white border border-gray-100 rounded-xl overflow-hidden">
            <div class="jl-filter-header px-5 py-3 border-b border-gray-100 flex items-center justify-between">
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wide">Bộ lọc</span>
                <button wire:click="resetFilters" class="text-xs" style="color:#1d4ed8;background:none;border:none;cursor:pointer;">Đặt lại</button>
            </div>

            {{-- Loại công việc --}}
            <div x-data="{ open: true }" class="border-b border-gray-100">
                <button @click="open = !open" class="w-full flex items-center justify-between px-5 py-3 hover:bg-gray-50 transition text-left">
                    <span class="text-sm font-medium text-gray-700">Loại công việc</span>
                    <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 text-gray-400 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open" x-transition class="px-5 pb-4 space-y-2">
                    @foreach($jobTypes as $val => $label)
                        <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer hover:text-gray-900">
                            <input type="checkbox" wire:model.live="types" value="{{ $val }}"
                                   style="accent-color:#1d4ed8" class="w-4 h-4 flex-shrink-0">
                            <span>{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- Địa điểm --}}
            <div x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex items-center justify-between px-5 py-3 hover:bg-gray-50 transition text-left">
                    <span class="text-sm font-medium text-gray-700">Địa điểm</span>
                    <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 text-gray-400 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open" x-transition class="px-5 pb-4 space-y-2">
                    @foreach($locationOptions as $loc)
                        <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer hover:text-gray-900">
                            <input type="checkbox" wire:model.live="locations" value="{{ $loc->location_key }}"
                                   style="accent-color:#1d4ed8" class="w-4 h-4 flex-shrink-0">
                            <span>{{ $loc->location }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="jl-emp-box">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-2">Doanh nghiệp</p>
            <p class="text-sm text-gray-500 leading-relaxed mb-3">
                Đăng tin miễn phí, tiếp cận trực tiếp sinh viên & cựu sinh viên VNUA.
            </p>
            <button onclick="openModal()" class="jl-emp-btn">
                Đăng tin tuyển dụng
            </button>
        </div>

    </aside>

    <div class="jl-main flex-1 min-w-0">

        {{-- Tìm kiếm — chỉ còn ô text, bỏ select lĩnh vực --}}
        <div class="jl-searchbar bg-white border border-gray-100 rounded-xl p-4 flex gap-3 mb-4">
            <input type="text"
                   wire:model.live.debounce.300ms="search"
                   placeholder="Tìm vị trí, kỹ năng, công ty..."
                   class="flex-1 border rounded-lg px-4 py-2 text-sm outline-none transition"
                   style="border-color:#cbd5e1"
                   onfocus="this.style.borderColor='#1d4ed8';this.style.boxShadow='0 0 0 3px rgba(29,78,216,0.1)'"
                   onblur="this.style.borderColor='#cbd5e1';this.style.boxShadow='none'">
        </div>

        <div class="flex items-center justify-between mb-3 px-1">
            <p class="text-sm text-gray-500">
                Tìm thấy <span class="font-semibold text-gray-800">{{ $jobs->total() }} tin</span> phù hợp
            </p>
            <select wire:model.live="sort"
                    class="border rounded-lg px-3 py-1.5 text-sm bg-white outline-none text-gray-700"
                    style="border-color:#cbd5e1">
                <option value="latest">Mới nhất</option>
                <option value="salary">Lương cao nhất</option>
            </select>
        </div>

        <div class="space-y-3">
            @forelse($jobs as $job)
                <div class="jl-card {{ $job->is_featured ? 'featured' : '' }}">
                    <div class="flex gap-4 items-start">
                        <div class="flex-1 min-w-0">
                            @if($job->is_featured)
                                <span class="jl-badge-featured">⭐ Nổi bật</span>
                            @endif
                            <a href="{{ route('job.show', $job->id) }}" wire:navigate>
                                <h3 class="jl-job-title">{{ $job->title }}</h3>
                            </a>
                            <p class="jl-company">{{ $job->company }}</p>
                            <div class="jl-tags">
                                <span class="jl-tag">{{ $job->location }}</span>
                                <span class="jl-tag">{{ $job->type_label }}</span>
                                @if($job->experience)
                                    <span class="jl-tag">{{ $job->experience }}</span>
                                @endif
                            </div>
                            <p class="jl-desc">{{ $job->description }}</p>
                            @if(!empty($job->skills))
                                <div class="jl-skills">
                                    @foreach($job->skills as $skill)
                                        <span class="jl-skill">{{ $skill }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="jl-right flex-shrink-0 w-36">
                            <p class="jl-salary">{{ $job->salary }}</p>
                            <a href="{{ route('job.show', $job->id) }}" wire:navigate class="jl-btn-apply">
                                Ứng tuyển
                            </a>
                            <button class="jl-btn-save">Lưu tin</button>
                            <p class="jl-deadline">Hạn: {{ $job->deadline }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="jl-empty">
                    <p>Không tìm thấy tin tuyển dụng phù hợp.</p>
                    <button wire:click="resetFilters">Xóa bộ lọc</button>
                </div>
            @endforelse
        </div>

        @if($jobs->hasPages())
            <div class="mt-6">{{ $jobs->links() }}</div>
        @endif

    </div>
</div>

<script>
function openModal() {
    document.getElementById('jm-overlay').classList.add('open');
    document.body.style.overflow = 'hidden';
}
function closeModal() {
    document.getElementById('jm-overlay').classList.remove('open');
    document.body.style.overflow = '';
}
document.getElementById('jm-overlay').addEventListener('click', function(e) {
    if (e.target === this) closeModal();
});
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeModal();
});

function jmCount(el, id, max) {
    var s = document.getElementById(id);
    if (s) { s.textContent = el.value.length; s.style.color = el.value.length > max * 0.9 ? '#ef4444' : ''; }
}

var si = document.getElementById('jm-skill-input');
var sw = document.getElementById('jm-skill-wrap');
si && si.addEventListener('keydown', function(e) {
    if ((e.key === 'Enter' || e.key === ',') && this.value.trim()) {
        e.preventDefault();
        addSkill(this.value.trim().replace(/,$/, ''));
        this.value = '';
    }
    if (e.key === 'Backspace' && !this.value) {
        var tags = sw.querySelectorAll('.jm-skill-tag');
        if (tags.length) tags[tags.length - 1].remove();
    }
});
function addSkill(t) {
    if (!t) return;
    var tag = document.createElement('div');
    tag.className = 'jm-skill-tag';
    tag.innerHTML = t + '<button type="button" onclick="this.parentNode.remove()" aria-label="Xoá">×</button>';
    sw.insertBefore(tag, si);
}
</script>
</div>