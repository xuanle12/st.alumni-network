<div>
<style>
/* ══════════════════════════════════════════
   FITA-STYLE JOBS PAGE
   ══════════════════════════════════════════ */
:root {
    --fita:        #0961AA;
    --fita2:       #0c83d8;
    --fita-pale:   #e8f1fb;
    --fita-border: rgba(9,97,170,0.18);
    --warning:     #F6A309;
    --text:        #1a1f2e;
    --text-muted:  #5c6470;
    --border:      #e2e8f0;
    --bg:          #f4f7fb;
    --white:       #ffffff;
    --radius:      12px;
    --shadow-sm:   0 2px 8px rgba(0,0,0,0.06);
    --font:        'Barlow', system-ui, sans-serif;
}
.jobs-page { font-family: var(--font); background: var(--bg); min-height: 60vh; padding: 28px 0 48px; }
.jobs-heading { display: flex; align-items: center; gap: 8px; font-size: 13px; color: var(--text-muted); margin-bottom: 18px; font-weight: 500; }
.jobs-heading a { color: var(--fita); text-decoration: none; }
.jobs-heading a:hover { text-decoration: underline; }
.jobs-heading .sep { color: var(--border); }
.jobs-heading .current { color: var(--text); font-weight: 600; }
.jobs-title-bar { display: flex; align-items: center; justify-content: space-between; margin-bottom: 22px; flex-wrap: wrap; gap: 10px; }
.jobs-title-bar h1 { font-size: 26px; font-weight: 800; color: var(--text); letter-spacing: -0.3px; }
.jobs-grid { display: grid; grid-template-columns: 1fr 260px; gap: 24px; align-items: flex-start; }
@media (max-width: 900px) { .jobs-grid { grid-template-columns: 1fr; } .jobs-sidebar { order: -1; } }
.jobs-search-wrap { background: var(--white); border-radius: var(--radius); box-shadow: var(--shadow-sm); padding: 14px 16px; display: flex; gap: 10px; margin-bottom: 16px; border: 1px solid var(--border); }
.jobs-search-wrap input { flex: 1; border: 1px solid var(--border); border-radius: 8px; padding: 9px 14px; font-size: 14px; font-family: var(--font); outline: none; color: var(--text); transition: border-color .2s, box-shadow .2s; background: var(--white); }
.jobs-search-wrap input:focus { border-color: var(--fita); box-shadow: 0 0 0 3px rgba(9,97,170,0.10); }
.jobs-search-wrap input::placeholder { color: #aab2be; }
.jobs-meta { display: flex; align-items: center; justify-content: space-between; margin-bottom: 14px; padding: 0 2px; flex-wrap: wrap; gap: 8px; }
.jobs-meta-count { font-size: 13px; color: var(--text-muted); }
.jobs-meta-count strong { color: var(--text); font-weight: 700; }
.jobs-meta select { border: 1px solid var(--border); border-radius: 8px; padding: 6px 11px; font-size: 13px; font-family: var(--font); background: var(--white); outline: none; color: var(--text); cursor: pointer; }
.jobs-meta select:focus { border-color: var(--fita); }
.jobs-list { background: var(--white); border-radius: var(--radius); box-shadow: var(--shadow-sm); border: 1px solid var(--border); overflow: hidden; margin-bottom: 12px; }
.job-card { display: block; padding: 18px 22px; border-bottom: 1px solid var(--border); text-decoration: none; color: inherit; transition: background .15s; cursor: pointer; }
.job-card:last-child { border-bottom: none; }
.job-card:hover { background: #f8fafb; }
.job-card-inner { display: flex; gap: 18px; align-items: flex-start; }
.job-thumb { width: 80px; height: 80px; border-radius: 10px; background: var(--fita-pale); flex-shrink: 0; overflow: hidden; display: flex; align-items: center; justify-content: center; border: 1px solid var(--fita-border); }
.job-thumb img { width: 100%; height: 100%; object-fit: cover; }
.job-thumb-icon { width: 36px; height: 36px; color: var(--fita); opacity: 0.5; }
.job-body { flex: 1; min-width: 0; }
.job-badges { display: flex; flex-wrap: wrap; gap: 6px; margin-bottom: 7px; align-items: center; }
.badge-cat { display: inline-block; background: var(--fita); color: #fff; font-size: 11px; font-weight: 600; padding: 2px 9px; border-radius: 5px; }
.badge-featured { display: inline-flex; align-items: center; gap: 3px; background: rgba(246,163,9,0.15); color: #a86800; border: 1px solid rgba(246,163,9,0.35); font-size: 11px; font-weight: 600; padding: 2px 8px; border-radius: 5px; }
.badge-new { display: inline-flex; align-items: center; gap: 4px; background: #22c55e; color: #fff; font-size: 10px; font-weight: 700; padding: 2px 8px; border-radius: 5px; }
.badge-new::before { content: ''; width: 6px; height: 6px; background: #fff; border-radius: 50%; display: block; }
.job-title { font-size: 16px; font-weight: 700; color: var(--text); margin-bottom: 4px; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; transition: color .15s; }
.job-card:hover .job-title { color: var(--fita); }
.job-company { font-size: 13px; font-weight: 600; color: var(--fita); margin-bottom: 8px; }
.job-tags { display: flex; flex-wrap: wrap; gap: 6px; margin-bottom: 8px; }
.job-tag { font-size: 11px; color: var(--text-muted); background: #f4f7fb; border: 1px solid var(--border); padding: 3px 9px; border-radius: 5px; }
.job-excerpt { font-size: 13px; color: var(--text-muted); line-height: 1.6; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
.job-skills { display: flex; flex-wrap: wrap; gap: 5px; margin-top: 9px; }
.job-skill { font-size: 11px; color: var(--fita); background: var(--fita-pale); border: 1px solid var(--fita-border); padding: 2px 8px; border-radius: 5px; font-weight: 500; }
.job-right { flex-shrink: 0; width: 130px; text-align: right; display: flex; flex-direction: column; align-items: flex-end; gap: 7px; }
.job-salary { font-size: 15px; font-weight: 700; color: var(--fita); line-height: 1.2; }
.job-btn-apply { display: block; width: 100%; padding: 8px 0; text-align: center; font-size: 12px; font-weight: 700; color: #fff; background: var(--fita); border: none; border-radius: 8px; cursor: pointer; text-decoration: none; font-family: var(--font); transition: background .15s, transform .12s; }
.job-btn-apply:hover { background: var(--fita2); transform: translateY(-1px); }
.job-btn-save { display: block; width: 100%; padding: 7px 0; text-align: center; font-size: 12px; color: var(--text-muted); background: none; border: 1px solid var(--border); border-radius: 8px; cursor: pointer; font-family: var(--font); transition: border-color .15s, color .15s; }
.job-btn-save:hover { border-color: var(--fita); color: var(--fita); }
.job-deadline { font-size: 11px; color: #aab2be; margin-top: 2px; }
.job-card.featured { border-left: 3px solid var(--warning); }
.jobs-empty { background: var(--white); border-radius: var(--radius); border: 1px solid var(--border); padding: 56px 24px; text-align: center; box-shadow: var(--shadow-sm); }
.jobs-empty svg { width: 52px; height: 52px; color: #c9d3df; margin: 0 auto 12px; display: block; }
.jobs-empty p { font-size: 14px; color: var(--text-muted); margin-bottom: 8px; }
.jobs-empty button { font-size: 13px; color: var(--fita); background: none; border: none; cursor: pointer; font-family: var(--font); text-decoration: underline; margin-top: 6px; }
.jobs-pagination { margin-top: 24px; }
.jobs-pagination span[aria-current="page"] > span { background: var(--fita) !important; color: #fff !important; font-weight: 700; }
.jobs-sidebar { display: flex; flex-direction: column; gap: 16px; }
.side-card { background: var(--white); border-radius: var(--radius); box-shadow: var(--shadow-sm); border: 1px solid var(--border); overflow: hidden; }
.side-card-header { padding: 13px 18px; border-bottom: 1px solid var(--border); display: flex; align-items: center; justify-content: space-between; }
.side-card-header h3 { font-size: 14px; font-weight: 700; color: var(--text); }
.reset-btn { font-size: 12px; color: var(--fita); background: none; border: none; cursor: pointer; font-family: var(--font); padding: 0; }
.reset-btn:hover { text-decoration: underline; }
.filter-group { border-bottom: 1px solid var(--border); }
.filter-group:last-child { border-bottom: none; }
.filter-group-btn { width: 100%; display: flex; align-items: center; justify-content: space-between; padding: 11px 18px; background: none; border: none; cursor: pointer; font-family: var(--font); font-size: 13px; font-weight: 600; color: var(--text); transition: background .15s; text-align: left; }
.filter-group-btn:hover { background: #f8fafb; }
.filter-group-btn svg { width: 15px; height: 15px; color: var(--text-muted); transition: transform .2s; }
.filter-group-btn.open svg { transform: rotate(180deg); }
.filter-group-body { padding: 4px 18px 14px; display: flex; flex-direction: column; gap: 9px; }
.filter-check-row { display: flex; align-items: center; gap: 9px; font-size: 13px; color: var(--text-muted); cursor: pointer; transition: color .15s; }
.filter-check-row:hover { color: var(--text); }
.filter-check-row input[type=checkbox] { accent-color: var(--fita); width: 15px; height: 15px; flex-shrink: 0; cursor: pointer; }
.side-search { padding: 14px 18px; }
.side-search input { width: 100%; border: 1px solid var(--border); border-radius: 8px; padding: 9px 13px; font-size: 13px; font-family: var(--font); outline: none; color: var(--text); transition: border-color .2s, box-shadow .2s; background: var(--white); box-sizing: border-box; }
.side-search input:focus { border-color: var(--fita); box-shadow: 0 0 0 3px rgba(9,97,170,0.10); }
.side-search input::placeholder { color: #aab2be; }
.employer-cta { padding: 18px; }
.employer-cta p { font-size: 13px; color: var(--text-muted); line-height: 1.6; margin-bottom: 12px; }
.employer-cta-btn { display: block; width: 100%; padding: 10px 0; text-align: center; font-size: 13px; font-weight: 700; color: #fff; background: var(--fita); border: none; border-radius: 8px; cursor: pointer; font-family: var(--font); transition: background .15s, transform .12s; text-decoration: none; }
.employer-cta-btn:hover { background: var(--fita2); transform: translateY(-1px); }
/* Modal */
.jm-overlay { position: fixed; inset: 0; z-index: 9999; background: rgba(15,23,42,0.55); display: flex; align-items: center; justify-content: center; padding: 24px 16px; opacity: 0; pointer-events: none; transition: opacity 0.2s; }
.jm-overlay.open { opacity: 1; pointer-events: all; }
.jm-modal { background: #fff; border-radius: 16px; border: 1px solid var(--border); width: 100%; max-width: 660px; overflow: hidden; box-shadow: 0 20px 60px rgba(15,23,42,0.2); transform: translateY(16px); transition: transform 0.25s; display: flex; flex-direction: column; max-height: 90vh; }
.jm-overlay.open .jm-modal { transform: translateY(0); }
.jm-header { background: linear-gradient(135deg, #074e89 0%, var(--fita) 55%, var(--fita2) 100%); padding: 22px 28px 20px; display: flex; align-items: flex-start; justify-content: space-between; flex-shrink: 0; }
.jm-header-tag { display: inline-flex; align-items: center; gap: 5px; font-size: 11px; font-weight: 600; color: rgba(255,255,255,0.75); background: rgba(255,255,255,0.15); border: 0.5px solid rgba(255,255,255,0.25); padding: 3px 10px; border-radius: 20px; margin-bottom: 8px; }
.jm-header-title { font-size: 20px; font-weight: 800; color: #fff; margin: 0 0 3px; }
.jm-header-sub { font-size: 13px; color: rgba(255,255,255,0.72); margin: 0; }
.jm-close { background: rgba(255,255,255,0.15); border: none; border-radius: 8px; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; cursor: pointer; color: #fff; font-size: 20px; flex-shrink: 0; transition: background .15s; margin-top: 2px; }
.jm-close:hover { background: rgba(255,255,255,0.28); }
.jm-steps { display: flex; align-items: center; padding: 0 28px; background: var(--fita-pale); border-bottom: 1px solid rgba(9,97,170,0.15); flex-shrink: 0; }
.jm-step { display: flex; align-items: center; gap: 8px; padding: 12px 0; flex: 1; position: relative; }
.jm-step:not(:last-child)::after { content: ''; position: absolute; right: 0; top: 50%; transform: translateY(-50%); width: 22px; height: 1px; background: rgba(9,97,170,0.2); }
.jm-step-num { width: 22px; height: 22px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 700; flex-shrink: 0; }
.jm-step.active .jm-step-num { background: var(--fita); color: #fff; }
.jm-step.inactive .jm-step-num { background: var(--border); color: #94a3b8; }
.jm-step-label { font-size: 12px; font-weight: 600; }
.jm-step.active .jm-step-label { color: var(--fita); }
.jm-step.inactive .jm-step-label { color: #94a3b8; }
.jm-body { padding: 22px 28px 0; overflow-y: auto; flex: 1; font-family: var(--font); }
.jm-body::-webkit-scrollbar { width: 4px; }
.jm-body::-webkit-scrollbar-thumb { background: var(--border); border-radius: 4px; }
.jm-section-title { font-size: 11px; font-weight: 700; color: var(--fita); text-transform: uppercase; letter-spacing: 0.8px; margin: 0 0 14px; display: flex; align-items: center; gap: 7px; padding-bottom: 8px; border-bottom: 1px solid var(--fita-pale); }
.jm-row { display: flex; gap: 14px; margin-bottom: 14px; }
.jm-field { display: flex; flex-direction: column; gap: 5px; flex: 1; }
.jm-label { font-size: 12px; font-weight: 600; color: #334155; }
.jm-label .req { color: #ef4444; }
.jm-input, .jm-select, .jm-textarea { border: 1px solid var(--border); border-radius: 9px; padding: 9px 13px; font-size: 13px; color: var(--text); background: #fff; outline: none; font-family: var(--font); width: 100%; box-sizing: border-box; transition: border-color .2s, box-shadow .2s; }
.jm-input:focus, .jm-select:focus, .jm-textarea:focus { border-color: var(--fita); box-shadow: 0 0 0 3px rgba(9,97,170,0.10); }
.jm-input::placeholder, .jm-textarea::placeholder { color: #aab2be; }
.jm-textarea { resize: vertical; min-height: 90px; line-height: 1.6; }
.jm-select { cursor: pointer; appearance: none; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 12px center; padding-right: 32px; }
.jm-input-prefix { display: flex; align-items: center; border: 1px solid var(--border); border-radius: 9px; overflow: hidden; transition: border-color .2s, box-shadow .2s; }
.jm-input-prefix:focus-within { border-color: var(--fita); box-shadow: 0 0 0 3px rgba(9,97,170,0.10); }
.jm-input-prefix span { padding: 9px 10px 9px 13px; font-size: 13px; color: var(--text-muted); background: #f8fafc; border-right: 1px solid var(--border); white-space: nowrap; flex-shrink: 0; font-family: var(--font); }
.jm-input-prefix input { border: none; border-radius: 0; box-shadow: none; padding: 9px 13px; font-size: 13px; color: var(--text); outline: none; font-family: var(--font); flex: 1; min-width: 0; background: transparent; }
.jm-skill-wrap { display: flex; flex-wrap: wrap; gap: 7px; padding: 10px; border: 1px solid var(--border); border-radius: 9px; min-height: 44px; align-items: flex-start; cursor: text; transition: border-color .2s; box-sizing: border-box; width: 100%; }
.jm-skill-wrap:focus-within { border-color: var(--fita); box-shadow: 0 0 0 3px rgba(9,97,170,0.10); }
.jm-skill-tag { display: inline-flex; align-items: center; gap: 5px; background: var(--fita-pale); border: 1px solid var(--fita-border); color: var(--fita); font-size: 12px; font-weight: 600; padding: 3px 9px; border-radius: 6px; }
.jm-skill-tag button { background: none; border: none; padding: 0; cursor: pointer; color: var(--fita2); line-height: 1; display: flex; align-items: center; font-size: 14px; }
.jm-skill-tag button:hover { color: #ef4444; }
.jm-skill-input { border: none; outline: none; font-size: 13px; color: var(--text); font-family: var(--font); background: transparent; flex: 1; min-width: 80px; }
.jm-hint { font-size: 11px; color: #aab2be; margin-top: 3px; }
.jm-toggle-row { display: flex; align-items: center; justify-content: space-between; padding: 12px 14px; background: #f8fafc; border: 1px solid var(--border); border-radius: 9px; margin-bottom: 12px; }
.jm-toggle-label { font-size: 13px; font-weight: 600; color: var(--text); }
.jm-toggle-desc { font-size: 11.5px; color: var(--text-muted); }
.jm-toggle { position: relative; width: 40px; height: 22px; flex-shrink: 0; }
.jm-toggle input { opacity: 0; width: 0; height: 0; }
.jm-toggle-slider { position: absolute; inset: 0; background: #cbd5e1; border-radius: 22px; cursor: pointer; transition: background .2s; }
.jm-toggle-slider::before { content: ''; position: absolute; width: 16px; height: 16px; left: 3px; top: 3px; background: #fff; border-radius: 50%; transition: transform .2s; box-shadow: 0 1px 3px rgba(0,0,0,0.2); }
.jm-toggle input:checked ~ .jm-toggle-slider { background: var(--fita); }
.jm-toggle input:checked ~ .jm-toggle-slider::before { transform: translateX(18px); }
.jm-divider { border: none; border-top: 1px solid #f1f5f9; margin: 18px 0; }
.jm-char-count { font-size: 11px; color: #aab2be; text-align: right; margin-top: 3px; }
.jm-required-note { font-size: 11.5px; color: #aab2be; margin-bottom: 18px; }
.jm-footer { padding: 16px 28px; border-top: 1px solid var(--border); display: flex; align-items: center; justify-content: space-between; background: #fff; flex-shrink: 0; }
.jm-footer-left { font-size: 12px; color: var(--text-muted); display: flex; align-items: center; gap: 6px; }
.jm-footer-right { display: flex; gap: 10px; }
.jm-btn-cancel { padding: 9px 18px; font-size: 13px; font-weight: 500; color: var(--text-muted); background: none; border: 1px solid var(--border); border-radius: 9px; cursor: pointer; transition: all .15s; font-family: var(--font); }
.jm-btn-cancel:hover { border-color: #94a3b8; color: var(--text); }
.jm-btn-preview { padding: 9px 16px; font-size: 13px; font-weight: 600; color: var(--fita); background: var(--fita-pale); border: 1px solid var(--fita-border); border-radius: 9px; cursor: pointer; transition: all .15s; font-family: var(--font); display: flex; align-items: center; gap: 6px; }
.jm-btn-preview:hover { background: rgba(9,97,170,0.12); }
.jm-btn-submit { padding: 9px 22px; font-size: 13px; font-weight: 800; color: #fff; background: var(--fita); border: none; border-radius: 9px; cursor: pointer; transition: background .15s; font-family: var(--font); display: flex; align-items: center; gap: 7px; }
.jm-btn-submit:hover { background: var(--fita2); }
@media (max-width: 640px) {
    .job-card-inner { flex-direction: column; gap: 12px; }
    .job-right { width: 100%; flex-direction: row; align-items: center; flex-wrap: wrap; }
    .job-btn-apply, .job-btn-save { width: auto; flex: 1; }
    .jm-row { flex-direction: column; }
    .jm-steps { padding: 0 18px; }
    .jm-body { padding: 18px 18px 0; }
    .jm-header { padding: 18px; }
    .jm-footer { padding: 14px 18px; flex-wrap: wrap; gap: 10px; }
    .jm-step-label { display: none; }
}
</style>
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
            <div class="jm-step active"><div class="jm-step-num">1</div><span class="jm-step-label">Thông tin cơ bản</span></div>
            <div class="jm-step inactive"><div class="jm-step-num">2</div><span class="jm-step-label">Chi tiết vị trí</span></div>
            <div class="jm-step inactive"><div class="jm-step-num">3</div><span class="jm-step-label">Xem trước & gửi</span></div>
        </div>
        <div class="jm-body">
            <p class="jm-required-note">Các trường có dấu <span style="color:#ef4444">*</span> là bắt buộc.</p>
            <p class="jm-section-title">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
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
                        <option>1 – 50 nhân viên</option><option>51 – 200</option><option>201 – 1.000</option><option>Trên 1.000</option>
                    </select>
                </div>
            </div>
            <div class="jm-row">
                <div class="jm-field">
                    <label class="jm-label">Website công ty</label>
                    <div class="jm-input-prefix"><span>https://</span><input type="text" name="website" placeholder="company.com"></div>
                </div>
                <div class="jm-field">
                    <label class="jm-label">Email liên hệ <span class="req">*</span></label>
                    <input class="jm-input" type="email" name="contact_email" placeholder="hr@company.com" required>
                </div>
            </div>
            <hr class="jm-divider">
            <p class="jm-section-title">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
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
                        <option value="full-time">Toàn thời gian</option><option value="part-time">Bán thời gian</option><option value="internship">Thực tập</option><option value="remote">Remote</option>
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
                        <option value="">Không yêu cầu</option><option>Dưới 1 năm</option><option>1 – 2 năm</option><option>2 – 5 năm</option><option>Trên 5 năm</option>
                    </select>
                </div>
                <div class="jm-field">
                    <label class="jm-label">Mức lương</label>
                    <input class="jm-input" type="text" name="salary" placeholder="VD: 12 – 18 triệu hoặc Thỏa thuận">
                </div>
            </div>
            <div class="jm-row">
                <div class="jm-field" style="max-width:220px">
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
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                Tuỳ chọn
            </p>
            <div class="jm-toggle-row">
                <div><div class="jm-toggle-label">Tin nổi bật</div><div class="jm-toggle-desc">Hiển thị ưu tiên, tăng lượt xem</div></div>
                <label class="jm-toggle"><input type="checkbox" name="is_featured"><span class="jm-toggle-slider"></span></label>
            </div>
            <div class="jm-toggle-row">
                <div><div class="jm-toggle-label">Cho phép nộp hồ sơ trực tuyến</div><div class="jm-toggle-desc">Ứng viên nộp CV trực tiếp qua hệ thống</div></div>
                <label class="jm-toggle"><input type="checkbox" name="allow_online_apply" checked><span class="jm-toggle-slider"></span></label>
            </div>
            <div style="height:24px"></div>
        </div>
        <div class="jm-footer">
            <span class="jm-footer-left">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                Tin sẽ được duyệt trong 24h
            </span>
            <div class="jm-footer-right">
                <button type="button" class="jm-btn-cancel" onclick="closeModal()">Huỷ</button>
                <button type="button" class="jm-btn-preview">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                    Xem trước
                </button>
                <button type="submit" class="jm-btn-submit">
                    Đăng tin
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="jobs-page">
    <div class="container" style="max-width:1200px;margin:0 auto;padding:0 24px">

        <nav class="jobs-heading">
            <a href="/csv">Trang chủ</a>
            <span class="sep">/</span>
            <span class="current">Việc làm</span>
        </nav>

        <div class="jobs-title-bar">
            <h1>Cơ hội việc làm</h1>
        </div>

        <div class="jobs-grid">
            <div>
                <div class="jobs-search-wrap">
                    <input type="text" wire:model.live.debounce.300ms="search" placeholder="Tìm vị trí, kỹ năng, công ty...">
                </div>

                <div class="jobs-meta">
                    <p class="jobs-meta-count">Tìm thấy <strong>{{ $jobs->total() }} tin</strong> phù hợp</p>
                    <select wire:model.live="sort">
                        <option value="latest">Mới nhất</option>
                        <option value="salary">Lương cao nhất</option>
                    </select>
                </div>

                @forelse($jobs as $job)
                    @php $isNew = $job->created_at && $job->created_at->diffInDays(now()) <= 3; @endphp
                    <div class="jobs-list">
                        <div class="job-card {{ $job->is_featured ? 'featured' : '' }}">
                            <div class="job-card-inner">

                                <div class="job-thumb">
                                    @if(!empty($job->logo))
                                        <img src="{{ $job->logo }}" alt="{{ $job->company }}">
                                    @else
                                        <svg class="job-thumb-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/></svg>
                                    @endif
                                </div>

                                <div class="job-body">
                                    <div class="job-badges">
                                        @if($job->is_featured)
                                            <span class="badge-featured">
                                                <svg width="10" height="10" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 00.951-.69l1.07-3.292z"/></svg>
                                                Nổi bật
                                            </span>
                                        @endif
                                        @if($isNew)<span class="badge-new">Mới</span>@endif
                                        @if($job->type_label ?? $job->type)
                                            <span class="badge-cat">{{ $job->type_label ?? $job->type }}</span>
                                        @endif
                                    </div>

                                    <a href="{{ route('job.show', $job->id) }}" wire:navigate>
                                        <h3 class="job-title">{{ $job->title }}</h3>
                                    </a>
                                    <p class="job-company">{{ $job->company }}</p>

                                    <div class="job-tags">
                                        @if($job->location)
                                            <span class="job-tag">📍 {{ $job->location }}</span>
                                        @endif
                                        @if($job->experience)
                                            <span class="job-tag">⏱ {{ $job->experience }}</span>
                                        @endif
                                    </div>

                                    @if($job->description)
                                        <p class="job-excerpt">{{ $job->description }}</p>
                                    @endif

                                    @if(!empty($job->skills))
                                        <div class="job-skills">
                                            @foreach($job->skills as $skill)
                                                <span class="job-skill">{{ $skill }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                <div class="job-right">
                                    @if($job->salary)
                                        <p class="job-salary">{{ $job->salary }}</p>
                                    @endif
                                    <a href="{{ route('job.show', $job->id) }}" wire:navigate class="job-btn-apply">Ứng tuyển</a>
                                    <button class="job-btn-save">Lưu tin</button>
                                    @if($job->deadline)
                                        <p class="job-deadline">Hạn: {{ $job->deadline }}</p>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="jobs-empty">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/><line x1="12" y1="11" x2="12" y2="15"/><line x1="10" y1="13" x2="14" y2="13"/></svg>
                        <p>Không tìm thấy tin tuyển dụng phù hợp.</p>
                        <button wire:click="resetFilters">Xóa bộ lọc</button>
                    </div>
                @endforelse

                @if($jobs->hasPages())
                    <div class="jobs-pagination">{{ $jobs->links() }}</div>
                @endif
            </div>

           
            <aside class="jobs-sidebar">

                <!-- <div class="side-card">
                    <div class="side-card-header">
                        <h3>🔍 Tìm kiếm</h3>
                    </div>
                    <div class="side-search">
                        <input type="text" wire:model.live.debounce.400ms="search" placeholder="Tìm vị trí, kỹ năng...">
                    </div>
                </div> -->

                <div class="side-card">
                    <div class="side-card-header">
                        <h3>☰ Bộ lọc</h3>
                        <button wire:click="resetFilters" class="reset-btn">Đặt lại</button>
                    </div>

                    <div class="filter-group" x-data="{ open: true }">
                        <button class="filter-group-btn" :class="open ? 'open' : ''" @click="open = !open">
                            Loại công việc
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open" x-transition class="filter-group-body">
                            @foreach($jobTypes as $val => $label)
                                <label class="filter-check-row">
                                    <input type="checkbox" wire:model.live="types" value="{{ $val }}">
                                    <span>{{ $label }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="filter-group" x-data="{ open: false }">
                        <button class="filter-group-btn" :class="open ? 'open' : ''" @click="open = !open">
                            Địa điểm
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open" x-transition class="filter-group-body">
                            @foreach($locationOptions as $loc)
                                <label class="filter-check-row">
                                    <input type="checkbox" wire:model.live="locations" value="{{ $loc->location_key }}">
                                    <span>{{ $loc->location }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="side-card">
                    <div class="side-card-header">
                        <h3>Dành cho doanh nghiệp</h3>
                    </div>
                    <div class="employer-cta">
                        <p>Đăng tin miễn phí, tiếp cận trực tiếp sinh viên & cựu sinh viên VNUA.</p>
                        <button onclick="openModal()" class="employer-cta-btn">+ Đăng tin tuyển dụng</button>
                    </div>
                </div>

            </aside>

        </div>
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
document.addEventListener('keydown', function(e) { if (e.key === 'Escape') closeModal(); });
function jmCount(el, id, max) {
    var s = document.getElementById(id);
    if (s) { s.textContent = el.value.length; s.style.color = el.value.length > max * 0.9 ? '#ef4444' : ''; }
}
var si = document.getElementById('jm-skill-input');
var sw = document.getElementById('jm-skill-wrap');
si && si.addEventListener('keydown', function(e) {
    if ((e.key === 'Enter' || e.key === ',') && this.value.trim()) {
        e.preventDefault(); addSkill(this.value.trim().replace(/,$/, '')); this.value = '';
    }
    if (e.key === 'Backspace' && !this.value) {
        var tags = sw.querySelectorAll('.jm-skill-tag'); if (tags.length) tags[tags.length - 1].remove();
    }
});
function addSkill(t) {
    if (!t) return;
    var tag = document.createElement('div'); tag.className = 'jm-skill-tag';
    tag.innerHTML = t + '<button type="button" onclick="this.parentNode.remove()" aria-label="Xoá">×</button>';
    sw.insertBefore(tag, si);
}
</script>
</div>