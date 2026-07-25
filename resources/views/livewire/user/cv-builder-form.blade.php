<div class="cvb-page">
<style>
.cvb-page{--cvb-blue:#0c83d8;--cvb-ink:#0f172a;--cvb-mut:#64748b;--cvb-line:#e2e8f0;
  max-width:1320px;margin:0 auto;padding:22px 20px 60px;font-family:var(--font,'Inter',system-ui,sans-serif);color:var(--cvb-ink);}
.cvb-head{display:flex;align-items:flex-start;gap:16px;margin-bottom:20px;flex-wrap:wrap;}
.cvb-head h1{font-size:22px;font-weight:800;letter-spacing:-.4px;margin:0;}
.cvb-head p{font-size:13.5px;color:var(--cvb-mut);margin:5px 0 0;}
.cvb-head-acts{margin-left:auto;display:flex;gap:10px;}
.cvb-btn{display:inline-flex;align-items:center;gap:8px;border:none;border-radius:10px;padding:11px 20px;
  font-size:13.5px;font-weight:700;font-family:inherit;cursor:pointer;text-decoration:none;transition:.15s;}
.cvb-btn-pri{background:var(--cvb-blue);color:#fff;}
.cvb-btn-pri:hover{background:#0a6fb5;}
.cvb-btn-sec{background:#fff;color:var(--cvb-ink);border:1px solid var(--cvb-line);}
.cvb-btn-sec:hover{background:#f8fafc;}

.cvb-grid{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:22px;align-items:start;}

/* ── Cột form: tự cuộn riêng, khớp chiều cao với cột xem trước ── */
.cvb-form-col{max-height:78vh;overflow-y:auto;overflow-x:hidden;padding-right:10px;}
.cvb-form-col::-webkit-scrollbar{width:8px;}
.cvb-form-col::-webkit-scrollbar-track{background:#f1f5f9;border-radius:99px;}
.cvb-form-col::-webkit-scrollbar-thumb{background:#cbd5e1;border-radius:99px;}
.cvb-form-col::-webkit-scrollbar-thumb:hover{background:#94a3b8;}
.cvb-form-col > .cvb-card:last-child{margin-bottom:0;}
.cvb-card{background:#fff;border:1px solid var(--cvb-line);border-radius:14px;padding:20px;margin-bottom:16px;}
.cvb-card h2{font-size:15px;font-weight:700;margin:0 0 14px;display:flex;align-items:center;gap:9px;}
.cvb-card h2 i{color:var(--cvb-blue);font-size:13px;}
.cvb-f{margin-bottom:12px;}
.cvb-f label{display:block;font-size:12.5px;font-weight:600;color:#334155;margin-bottom:5px;}
.cvb-f input,.cvb-f textarea{width:100%;border:1px solid var(--cvb-line);border-radius:9px;padding:10px 12px;
  font-size:13.5px;font-family:inherit;color:var(--cvb-ink);background:#fff;outline:none;transition:.15s;}
.cvb-f input:focus,.cvb-f textarea:focus{border-color:var(--cvb-blue);box-shadow:0 0 0 3px rgba(12,131,216,.12);}
.cvb-f textarea{resize:vertical;min-height:92px;line-height:1.6;}
.cvb-row2{display:grid;grid-template-columns:1fr 1fr;gap:12px;}
.cvb-item{border:1px solid var(--cvb-line);border-radius:11px;padding:14px;margin-bottom:10px;background:#fbfcfe;position:relative;}
.cvb-item-x{position:absolute;top:9px;right:9px;width:26px;height:26px;border:none;border-radius:7px;
  background:none;color:#94a3b8;cursor:pointer;font-size:14px;}
.cvb-item-x:hover{background:#fee2e2;color:#dc2626;}
.cvb-add{width:100%;border:1px dashed #cbd5e1;background:none;border-radius:10px;padding:10px;
  font-size:13px;font-weight:600;font-family:inherit;color:var(--cvb-blue);cursor:pointer;transition:.15s;}
.cvb-add:hover{background:#f0f9ff;border-color:var(--cvb-blue);}
.cvb-err{font-size:12px;color:#dc2626;margin-top:4px;}

/* ── Cột xem trước ── */
.cvb-preview-wrap{position:sticky;top:120px;}
.cvb-preview-lbl{font-size:12px;font-weight:700;color:var(--cvb-mut);text-transform:uppercase;letter-spacing:.6px;margin-bottom:9px;}
.cv-paper{background:#fff;border:1px solid var(--cvb-line);border-radius:14px;padding:38px 40px;
  font-size:13px;line-height:1.6;color:#1f2937;max-height:78vh;overflow-y:auto;}
.cv-name{font-size:27px;font-weight:800;letter-spacing:-.6px;color:#0f172a;margin:0;}
.cv-role{font-size:14.5px;font-weight:600;color:var(--cvb-blue);margin:3px 0 0;}
.cv-contact{display:flex;flex-wrap:wrap;gap:5px 16px;font-size:12.5px;color:var(--cvb-mut);margin-top:11px;}
.cv-contact span{display:inline-flex;align-items:center;gap:6px;}
.cv-rule{height:2px;background:var(--cvb-blue);margin:18px 0 4px;border-radius:2px;}
.cv-sec{margin-top:20px;}
.cv-sec-t{font-size:12.5px;font-weight:800;text-transform:uppercase;letter-spacing:1px;color:var(--cvb-blue);
  border-bottom:1px solid var(--cvb-line);padding-bottom:5px;margin-bottom:11px;}
.cv-e{margin-bottom:13px;}
.cv-e-hd{display:flex;justify-content:space-between;gap:12px;align-items:baseline;}
.cv-e-t{font-size:13.5px;font-weight:700;color:#0f172a;}
.cv-e-when{font-size:12px;color:var(--cvb-mut);white-space:nowrap;flex-shrink:0;}
.cv-e-s{font-size:12.5px;color:#475569;font-weight:600;}
.cv-e-n{font-size:12.5px;color:#475569;margin-top:3px;white-space:pre-line;}
.cv-summary{white-space:pre-line;color:#374151;}
.cv-skills{display:flex;flex-wrap:wrap;gap:7px;}
.cv-skill{font-size:12px;font-weight:600;background:#eff6ff;color:#075490;border-radius:20px;padding:4px 12px;}
.cv-blank{font-size:12.5px;color:#cbd5e1;font-style:italic;}

@media (max-width:1000px){
  .cvb-grid{grid-template-columns:1fr;}
  .cvb-preview-wrap{position:static;}
  /* Màn hẹp: xếp dọc, để trang cuộn như bình thường */
  .cvb-form-col{max-height:none;overflow:visible;padding-right:0;}
}

</style>

<div class="cvb-head">
  <div>
    <h1>Tạo CV của bạn</h1>
    <p>Điền thông tin bên trái, bản CV bên phải cập nhật ngay. Bấm "Tải PDF" để lưu và mở trang in — chọn <b>Save as PDF</b> trong hộp in.</p>
  </div>
  <div class="cvb-head-acts">
    <a href="{{ route('profile') }}" wire:navigate class="cvb-btn cvb-btn-sec"><i class="fa-solid fa-arrow-left"></i> Về hồ sơ</a>
    <button type="button" class="cvb-btn cvb-btn-sec" wire:click="save" wire:loading.attr="disabled">
      <i class="fa-solid fa-floppy-disk"></i> Lưu
    </button>
    <button type="button" class="cvb-btn cvb-btn-pri" wire:click="saveAndPrint" wire:loading.attr="disabled">
      <i class="fa-solid fa-file-arrow-down"></i> Tải PDF
    </button>
  </div>
</div>

<div class="cvb-grid">

  {{-- ══════════ FORM ══════════ --}}
  <div class="cvb-form-col">

    <div class="cvb-card">
      <h2><i class="fa-solid fa-id-card"></i> Thông tin liên hệ</h2>
      <div class="cvb-row2">
        <div class="cvb-f">
          <label>Họ và tên *</label>
          <input type="text" wire:model.live.debounce.300ms="full_name" placeholder="Nguyễn Văn A">
          @error('full_name')<div class="cvb-err">{{ $message }}</div>@enderror
        </div>
        <div class="cvb-f">
          <label>Vị trí ứng tuyển</label>
          <input type="text" wire:model.live.debounce.300ms="job_title" placeholder="Kỹ sư phần mềm">
        </div>
      </div>
      <div class="cvb-row2">
        <div class="cvb-f">
          <label>Email</label>
          <input type="email" wire:model.live.debounce.300ms="email" placeholder="ban@example.com">
          @error('email')<div class="cvb-err">{{ $message }}</div>@enderror
        </div>
        <div class="cvb-f">
          <label>Số điện thoại</label>
          <input type="text" wire:model.live.debounce.300ms="phone" placeholder="09xx xxx xxx">
        </div>
      </div>
      <div class="cvb-row2">
        <div class="cvb-f">
          <label>Địa chỉ</label>
          <input type="text" wire:model.live.debounce.300ms="address" placeholder="Hà Nội">
        </div>
        <div class="cvb-f">
          <label>Website / LinkedIn</label>
          <input type="text" wire:model.live.debounce.300ms="website" placeholder="linkedin.com/in/...">
        </div>
      </div>
    </div>

    <div class="cvb-card">
      <h2><i class="fa-solid fa-user"></i> Giới thiệu bản thân</h2>
      <div class="cvb-f">
        <textarea wire:model.live.debounce.500ms="summary"
                  placeholder="Vài dòng về bạn: thế mạnh, định hướng nghề nghiệp, mục tiêu..."></textarea>
      </div>
    </div>

    <div class="cvb-card">
      <h2><i class="fa-solid fa-graduation-cap"></i> Học vấn</h2>
      @foreach($education as $i => $row)
        <div class="cvb-item" wire:key="edu-{{ $i }}">
          <button type="button" class="cvb-item-x" wire:click="removeRow('education', {{ $i }})">×</button>
          <div class="cvb-f"><label>Trường</label>
            <input type="text" wire:model.live.debounce.300ms="education.{{ $i }}.school" placeholder="Học viện Nông nghiệp Việt Nam"></div>
          <div class="cvb-f"><label>Ngành / Chuyên ngành</label>
            <input type="text" wire:model.live.debounce.300ms="education.{{ $i }}.major" placeholder="Công nghệ thông tin"></div>
          <div class="cvb-row2">
            <div class="cvb-f"><label>Từ</label>
              <input type="text" wire:model.live.debounce.300ms="education.{{ $i }}.from" placeholder="2021"></div>
            <div class="cvb-f"><label>Đến</label>
              <input type="text" wire:model.live.debounce.300ms="education.{{ $i }}.to" placeholder="2025"></div>
          </div>
          <div class="cvb-f"><label>Ghi chú</label>
            <input type="text" wire:model.live.debounce.300ms="education.{{ $i }}.note" placeholder="GPA 3.2/4.0, Lớp K66..."></div>
        </div>
      @endforeach
      <button type="button" class="cvb-add" wire:click="addRow('education')">+ Thêm học vấn</button>
    </div>

    <div class="cvb-card">
      <h2><i class="fa-solid fa-briefcase"></i> Kinh nghiệm làm việc</h2>
      @foreach($experience as $i => $row)
        <div class="cvb-item" wire:key="exp-{{ $i }}">
          <button type="button" class="cvb-item-x" wire:click="removeRow('experience', {{ $i }})">×</button>
          <div class="cvb-f"><label>Công ty</label>
            <input type="text" wire:model.live.debounce.300ms="experience.{{ $i }}.company" placeholder="Công ty TNHH ABC"></div>
          <div class="cvb-f"><label>Vị trí</label>
            <input type="text" wire:model.live.debounce.300ms="experience.{{ $i }}.role" placeholder="Lập trình viên"></div>
          <div class="cvb-row2">
            <div class="cvb-f"><label>Từ</label>
              <input type="text" wire:model.live.debounce.300ms="experience.{{ $i }}.from" placeholder="06/2024"></div>
            <div class="cvb-f"><label>Đến</label>
              <input type="text" wire:model.live.debounce.300ms="experience.{{ $i }}.to" placeholder="Hiện tại"></div>
          </div>
          <div class="cvb-f"><label>Mô tả công việc</label>
            <textarea wire:model.live.debounce.500ms="experience.{{ $i }}.note"
                      placeholder="Mỗi ý một dòng, ví dụ:&#10;Xây dựng API cho hệ thống bán hàng&#10;Tối ưu truy vấn, giảm 40% thời gian tải"></textarea></div>
        </div>
      @endforeach
      <button type="button" class="cvb-add" wire:click="addRow('experience')">+ Thêm kinh nghiệm</button>
    </div>

    <div class="cvb-card">
      <h2><i class="fa-solid fa-lightbulb"></i> Kỹ năng</h2>
      @foreach($skills as $i => $row)
        <div class="cvb-item" wire:key="skill-{{ $i }}" style="padding:10px 44px 10px 12px;margin-bottom:8px;">
          <button type="button" class="cvb-item-x" wire:click="removeRow('skills', {{ $i }})">×</button>
          <input type="text" wire:model.live.debounce.300ms="skills.{{ $i }}.name"
                 placeholder="PHP, Laravel, làm việc nhóm..."
                 style="width:100%;border:1px solid var(--cvb-line);border-radius:8px;padding:9px 11px;font-size:13.5px;font-family:inherit;outline:none;">
        </div>
      @endforeach
      <button type="button" class="cvb-add" wire:click="addRow('skills')">+ Thêm kỹ năng</button>
    </div>

    <div class="cvb-card">
      <h2><i class="fa-solid fa-diagram-project"></i> Dự án</h2>
      @foreach($projects as $i => $row)
        <div class="cvb-item" wire:key="prj-{{ $i }}">
          <button type="button" class="cvb-item-x" wire:click="removeRow('projects', {{ $i }})">×</button>
          <div class="cvb-f"><label>Tên dự án</label>
            <input type="text" wire:model.live.debounce.300ms="projects.{{ $i }}.name" placeholder="Website mạng lưới cựu sinh viên"></div>
          <div class="cvb-row2">
            <div class="cvb-f"><label>Vai trò</label>
              <input type="text" wire:model.live.debounce.300ms="projects.{{ $i }}.role" placeholder="Full-stack"></div>
            <div class="cvb-f"><label>Liên kết</label>
              <input type="text" wire:model.live.debounce.300ms="projects.{{ $i }}.link" placeholder="github.com/..."></div>
          </div>
          <div class="cvb-f"><label>Mô tả</label>
            <textarea wire:model.live.debounce.500ms="projects.{{ $i }}.note" placeholder="Công nghệ dùng, kết quả đạt được..."></textarea></div>
        </div>
      @endforeach
      <button type="button" class="cvb-add" wire:click="addRow('projects')">+ Thêm dự án</button>
    </div>

    <div class="cvb-card">
      <h2><i class="fa-solid fa-certificate"></i> Chứng chỉ</h2>
      @foreach($certificates as $i => $row)
        <div class="cvb-item" wire:key="cert-{{ $i }}">
          <button type="button" class="cvb-item-x" wire:click="removeRow('certificates', {{ $i }})">×</button>
          <div class="cvb-f"><label>Tên chứng chỉ</label>
            <input type="text" wire:model.live.debounce.300ms="certificates.{{ $i }}.name" placeholder="TOEIC 750"></div>
          <div class="cvb-row2">
            <div class="cvb-f"><label>Nơi cấp</label>
              <input type="text" wire:model.live.debounce.300ms="certificates.{{ $i }}.issuer" placeholder="IIG Việt Nam"></div>
            <div class="cvb-f"><label>Năm</label>
              <input type="text" wire:model.live.debounce.300ms="certificates.{{ $i }}.year" placeholder="2025"></div>
          </div>
        </div>
      @endforeach
      <button type="button" class="cvb-add" wire:click="addRow('certificates')">+ Thêm chứng chỉ</button>
    </div>

  </div>

  {{-- ══════════ XEM TRƯỚC ══════════ --}}
  <div class="cvb-preview-wrap">
    <div class="cvb-preview-lbl">Xem trước — đây cũng chính là bản in ra</div>

    @include("livewire.user.partials.cv-paper")
  </div>

</div>
</div>
