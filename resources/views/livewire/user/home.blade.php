<div>
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
  --navy:  #1a5c9a;
  --blue:  #2e86de;
  --sky:   #74b9e8;
  --pale:  #e8f4fd;
  --cream: #faf8f4;
  --cream2:#f5f1eb;
  --line:  #e4ddd3;
  --lineb: #b8d9f5;
  --muted: #8a8278;
  --mutedb:#5fa8d8;
  --white: #ffffff;
}

body { font-family: 'Be Vietnam Pro', sans-serif; color: var(--navy); background: var(--cream); }

.lp-hero {
  min-height: calc(100vh - 60px);
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 80px;
  align-items: center;
  padding: 0 0 60px;
   padding-top: 0;
}
.lp-tag {
  display: inline-flex; align-items: center; gap: 8px;
  font-size: 20px; font-weight: 600; color: var(--navy);
  background: var(--white); border: 1px solid var(--lineb);
  padding: 6px 14px; border-radius: 20px;
  margin-bottom: 32px; width: fit-content;
  animation: fadeUp .5s ease both;
  
}
.lp-hero h1 {
  font-size: clamp(42px, 5vw, 64px);
  font-weight: 700; line-height: 1.05;
  letter-spacing: -2px; color: var(--navy);
  animation: fadeUp .55s .05s ease both;
}
.lp-hero h1 span { color: var(--blue); }
.lp-hero-right {
  display: flex; flex-direction: column; gap: 0;
  animation: fadeUp .6s .1s ease both;
}
.lp-hero-desc {
  font-size: 15px; font-weight: 300; color: var(--muted);
  line-height: 1.8; margin-bottom: 32px;
}
.lp-btns { display: flex; gap: 12px; margin-bottom: 40px; flex-wrap: wrap; }

.btn-main {
  padding: 13px 28px; border-radius: 8px;
  font-size: 14px; font-weight: 600; color: var(--white);
  background: var(--blue); border: none; cursor: pointer;
  text-decoration: none;
  font-family: inherit; display: inline-flex; align-items: center; gap: 8px;
  transition: background .2s, transform .18s, box-shadow .2s;
}
.btn-main:hover {
  background: var(--navy);
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(46,134,222,0.3);
}
.btn-main:active { transform: translateY(0); }
.btn-main svg { width: 14px; height: 14px; flex-shrink: 0; }

.btn-ghost {
  padding: 13px 28px; border-radius: 8px;
  font-size: 14px; font-weight: 500; color: var(--navy);
  background: none; border: 1px solid var(--lineb);
  cursor: pointer; text-decoration: none;
  font-family: inherit;
  transition: border-color .18s, transform .18s, background .18s;
}
.btn-ghost:hover {
  border-color: var(--blue);
  background: var(--pale);
  transform: translateY(-2px);
}

/* Stats */
.lp-stats {
  display: flex; gap: 0;
  border: 1px solid var(--lineb); border-radius: 12px;
  overflow: hidden; background: var(--white);
  box-shadow: 0 2px 12px rgba(46,134,222,0.08);
}
.lp-stat {
  flex: 1; padding: 16px 20px;
  border-right: 1px solid var(--lineb);
  transition: background .18s;
}
.lp-stat:hover { background: var(--pale); }
.lp-stat:last-child { border-right: none; }
.lp-stat-val {
  font-size: 24px; font-weight: 700; color: var(--blue);
  letter-spacing: -1px; line-height: 1; margin-bottom: 4px;
}
.lp-stat-lbl { font-size: 11px; color: var(--mutedb); font-weight: 400; }

/* ── DIVIDER ── */
.lp-divider { height: 1px; background: var(--line); margin: 0; }

/* ── FEATURES ── */
.lp-features { padding: 72px 0; background: var(--cream); }
.lp-sec-label {
  font-size: 11px; font-weight: 600; color: var(--blue);
  text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 10px;
}
.lp-sec-title {
  font-size: clamp(22px, 3vw, 30px); font-weight: 700;
  color: var(--navy); letter-spacing: -0.5px; margin-bottom: 40px;
  line-height: 1.2;
}
.feat-grid {
  display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px;
}
.feat-card {
  border: 1px solid var(--line); border-radius: 14px;
  padding: 26px; background: var(--white);
  transition: border-color .2s, transform .22s, box-shadow .22s;
  cursor: default;
}
.feat-card:hover {
  border-color: var(--sky);
  transform: translateY(-4px);
  box-shadow: 0 8px 28px rgba(46,134,222,0.12);
}
.feat-ic {
  width: 44px; height: 44px; border-radius: 10px;
  background: var(--pale); border: 1px solid var(--lineb);
  display: flex; align-items: center; justify-content: center;
  font-size: 20px; margin-bottom: 16px; color: var(--blue);
  transition: background .2s, transform .2s, color .2s;
}
.feat-card:hover .feat-ic {
  background: var(--blue);
  color: var(--white);
  transform: scale(1.08);
}
.feat-title { font-size: 14px; font-weight: 600; color: var(--navy); margin-bottom: 8px; }
.feat-desc  { font-size: 13px; color: var(--muted); line-height: 1.7; }

/* ── WHY ── */
.lp-why { background: var(--cream2); padding: 72px 0; }
.why-inner { display: grid; grid-template-columns: 1fr 1fr; gap: 64px; align-items: center; }
.why-list { display: flex; flex-direction: column; gap: 20px; margin-top: 32px; }
.why-item {
  display: flex; gap: 14px; align-items: flex-start;
  transition: transform .2s;
}
.why-item:hover { transform: translateX(4px); }
.why-num {
  width: 28px; height: 28px; border-radius: 50%;
  background: var(--blue); color: var(--white);
  font-size: 12px; font-weight: 700;
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0; margin-top: 2px;
  transition: background .2s, transform .2s;
}
.why-item:hover .why-num {
  background: var(--sky);
  transform: scale(1.1);
}
.why-item-title { font-size: 14px; font-weight: 600; color: var(--navy); margin-bottom: 4px; }
.why-item-desc  { font-size: 13px; color: var(--muted); line-height: 1.6; }
.why-right {
  background: var(--white); border: 1px solid var(--lineb);
  border-radius: 16px; padding: 32px;
  box-shadow: 0 4px 24px rgba(46,134,222,0.08);
}
.why-card-title {
  font-size: 13px; font-weight: 600; color: var(--mutedb);
  text-transform: uppercase; letter-spacing: 0.8px; margin-bottom: 20px;
}
.why-row {
  display: flex; align-items: center; gap: 12px;
  padding: 12px 0; border-bottom: 1px solid var(--line);
  transition: background .15s, padding .15s; border-radius: 8px;
}
.why-row:hover { background: var(--pale); padding-left: 8px; padding-right: 8px; margin: 0 -8px; }
.why-row:last-child { border-bottom: none; padding-bottom: 0; }
.why-row-ic {
  width: 36px; height: 36px; border-radius: 8px;
  background: var(--pale); display: flex; align-items: center;
  justify-content: center; font-size: 16px; flex-shrink: 0; color: var(--blue);
}
.why-row-name { font-size: 13px; font-weight: 500; color: var(--navy); }
.why-row-sub  { font-size: 11px; color: var(--mutedb); }
.why-row-tag  {
  margin-left: auto; font-size: 11px; padding: 2px 9px;
  border-radius: 20px; background: var(--pale);
  color: var(--blue); border: 1px solid var(--lineb);
  white-space: nowrap;
}

/* ── STEPS ── */
.lp-steps { padding: 72px 0; background: var(--cream); }
.steps-grid {
  display: grid; grid-template-columns: repeat(4,1fr);
  gap: 0; margin-top: 40px; position: relative;
}
.steps-grid::before {
  content: ''; position: absolute;
  top: 22px; left: calc(12.5%); right: calc(12.5%);
  height: 1px; background: var(--lineb); z-index: 0;
}
.step-item { text-align: center; padding: 0 16px; position: relative; z-index: 1; }
.step-num {
  width: 44px; height: 44px; border-radius: 50%;
  background: var(--white); border: 2px solid var(--lineb);
  display: flex; align-items: center; justify-content: center;
  font-size: 14px; font-weight: 700; color: var(--blue);
  margin: 0 auto 16px;
  transition: background .2s, color .2s, border-color .2s, transform .2s, box-shadow .2s;
}
.step-item:hover .step-num {
  background: var(--blue); color: var(--white);
  border-color: var(--blue);
  transform: scale(1.1);
  box-shadow: 0 4px 14px rgba(46,134,222,0.25);
}
.step-title { font-size: 14px; font-weight: 600; color: var(--navy); margin-bottom: 6px; }
.step-desc  { font-size: 12px; color: var(--muted); line-height: 1.6; }

/* ── CTA ── */
.lp-cta { padding: 0 0 80px; background: var(--cream); }
.cta-box {
  background: var(--blue); border-radius: 20px;
  padding: 56px; text-align: center;
  position: relative; overflow: hidden;
}
.cta-box::before {
  content: '';
  position: absolute; inset: 0;
  background: radial-gradient(ellipse at 25% 50%, rgba(255,255,255,0.12) 0%, transparent 65%),
              radial-gradient(ellipse at 80% 20%, rgba(255,255,255,0.07) 0%, transparent 55%);
  pointer-events: none;
}
.cta-box h2 {
  font-size: clamp(22px, 3vw, 32px); font-weight: 700;
  color: var(--white); letter-spacing: -0.5px; margin-bottom: 10px;
  position: relative;
}
.cta-box p {
  font-size: 14px; color: rgba(255,255,255,0.7);
  margin-bottom: 28px; font-weight: 300; position: relative;
}
.cta-btns { display: flex; gap: 10px; justify-content: center; position: relative; }
.btn-white {
  padding: 11px 24px; border-radius: 8px;
  font-size: 14px; font-weight: 600; color: var(--blue);
  background: var(--white); border: none; cursor: pointer;
  text-decoration: none; font-family: inherit;
  transition: opacity .15s, transform .18s, box-shadow .18s;
}
.btn-white:hover {
  opacity: .95;
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}
.btn-outline-w {
  padding: 11px 24px; border-radius: 8px;
  font-size: 14px; font-weight: 500; color: rgba(255,255,255,0.85);
  background: none; border: 1px solid rgba(255,255,255,0.35);
  cursor: pointer; text-decoration: none; font-family: inherit;
  transition: all .18s;
}
.btn-outline-w:hover {
  border-color: rgba(255,255,255,0.8); color: #fff;
  transform: translateY(-2px);
}

/* ── WRAP ── */
.lp-wrap { max-width: 1100px; margin: 0 auto; padding: 0 40px; }

/* ── KEYFRAMES ── */
@keyframes fadeUp {
  from { opacity: 0; transform: translateY(18px); }
  to   { opacity: 1; transform: translateY(0); }
}

.reveal {
  opacity: 0; transform: translateY(20px);
  transition: opacity .5s ease, transform .5s ease;
}
.reveal.visible { opacity: 1; transform: translateY(0); }

@media (max-width: 768px) {
  .lp-wrap { padding: 0 20px; }
  .lp-hero { grid-template-columns: 1fr; min-height: 100svh; padding: 48px 0 56px; gap: 32px; }
  .lp-hero-right { display: none; }
  .feat-grid { grid-template-columns: 1fr 1fr; }
  .why-inner { grid-template-columns: 1fr; gap: 32px; }
  .steps-grid { grid-template-columns: 1fr 1fr; gap: 28px; }
  .steps-grid::before { display: none; }
  .cta-box { padding: 36px 24px; }
}
@media (max-width: 480px) {
  .feat-grid { grid-template-columns: 1fr; }
  .steps-grid { grid-template-columns: 1fr; }
}
</style>

<div class="lp-wrap">

  <div class="lp-hero">
    <div>
      <div class="lp-tag">Cộng đồng cựu sinh viên khoa CNTT</div>
      <h1>Kết nối.<br>Chia sẻ.<br><span>Phát triển.</span></h1>
      <p class="lp-hero-desc">Nền tảng kết nối cộng đồng cựu sinh viên Học viện Nông nghiệp Việt Nam — cơ hội nghề nghiệp, tri thức chuyên môn và mạng lưới bền vững.</p>
    </div>

    <div class="lp-hero-right">
      <div class="lp-btns">
        <a href="{{ route('register') }}" class="btn-main">
          Tham gia miễn phí
          <svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 7h10M8 3l4 4-4 4"/></svg>
        </a>
        <a href="{{ route('login') }}" class="btn-ghost">Đăng nhập</a>
      </div>
      <div class="lp-stats">
        <div class="lp-stat">
          <div class="lp-stat-val">{{ number_format($stats['alumni']) }}+</div>
          <div class="lp-stat-lbl">Cựu sinh viên</div>
        </div>
        <div class="lp-stat">
          <div class="lp-stat-val">{{ number_format($stats['companies']) }}+</div>
          <div class="lp-stat-lbl">Doanh nghiệp</div>
        </div>
        <div class="lp-stat">
          <div class="lp-stat-val">{{ number_format($stats['jobs']) }}+</div>
          <div class="lp-stat-lbl">Tin tuyển dụng</div>
        </div>
      </div>
    </div>

  </div>

</div>

<div class="lp-divider"></div>

{{-- FEATURES --}}
<div class="lp-features">
  <div class="lp-wrap">
    <div class="lp-sec-label">Tính năng</div>
    <div class="lp-sec-title">Mọi thứ bạn cần trong một nền tảng</div>
    <div class="feat-grid">
      <div class="feat-card">
        <div class="feat-ic"><i class="fa-solid fa-handshake"></i></div>
        <div class="feat-title">Mạng lưới chuyên gia</div>
        <div class="feat-desc">Kết nối với cựu sinh viên đang làm việc tại hàng trăm doanh nghiệp trong và ngoài nước.</div>
      </div>
      <div class="feat-card">
        <div class="feat-ic"><i class="fa-solid fa-briefcase"></i></div>
        <div class="feat-title">Cơ hội việc làm</div>
        <div class="feat-desc">Tin tuyển dụng chất lượng cao từ doanh nghiệp đối tác, ưu tiên cựu sinh viên VNUA.</div>
      </div>
      <div class="feat-card">
        <div class="feat-ic"><i class="fa-solid fa-calendar-days"></i></div>
        <div class="feat-title">Sự kiện & Hội thảo</div>
        <div class="feat-desc">Cập nhật lịch hội thảo, workshop, buổi gặp mặt alumni thường xuyên trong và ngoài trường.</div>
      </div>
      <div class="feat-card">
        <div class="feat-ic"><i class="fa-solid fa-pen-to-square"></i></div>
        <div class="feat-title">Chia sẻ bài viết</div>
        <div class="feat-desc">Đăng bài, chia sẻ kinh nghiệm, kiến thức chuyên môn với cộng đồng cựu sinh viên.</div>
      </div>
      <div class="feat-card">
        <div class="feat-ic"><i class="fa-solid fa-building"></i></div>
        <div class="feat-title">Hồ sơ doanh nghiệp</div>
        <div class="feat-desc">Doanh nghiệp đăng tin tuyển dụng, tiếp cận trực tiếp nguồn nhân lực chất lượng từ VNUA.</div>
      </div>
      <div class="feat-card">
        <div class="feat-ic"><i class="fa-solid fa-bell"></i></div>
        <div class="feat-title">Thông báo thông minh</div>
        <div class="feat-desc">Nhận thông báo về tin tuyển dụng, sự kiện và bài viết phù hợp với lĩnh vực của bạn.</div>
      </div>
    </div>
  </div>
</div>

<div class="lp-divider"></div>
<div class="lp-why">
  <div class="lp-wrap">
    <div class="why-inner">
      <div class="why-left">
        <div class="lp-sec-label">Tại sao chọn chúng tôi</div>
        <div class="lp-sec-title">Được xây dựng dành riêng cho cộng đồng VNUA</div>
        <div class="why-list">
          <div class="why-item">
            <div class="why-num">1</div>
            <div>
              <div class="why-item-title">Cộng đồng chuyên biệt</div>
              <div class="why-item-desc">Không gian riêng cho sinh viên và cựu sinh viên VNUA — kết nối đúng người, đúng ngành.</div>
            </div>
          </div>
          <div class="why-item">
            <div class="why-num">2</div>
            <div>
              <div class="why-item-title">Cơ hội thực tế</div>
              <div class="why-item-desc">Doanh nghiệp đăng tin trực tiếp, không qua trung gian, tỷ lệ phản hồi cao hơn.</div>
            </div>
          </div>
          <div class="why-item">
            <div class="why-num">3</div>
            <div>
              <div class="why-item-title">Hoàn toàn miễn phí</div>
              <div class="why-item-desc">Toàn bộ tính năng dành cho sinh viên và cựu sinh viên đều miễn phí 100%.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="lp-steps">
  <div class="lp-wrap">
    <div class="lp-sec-label">Bắt đầu</div>
    <div class="lp-sec-title">Chỉ 3 bước để tham gia</div>
    <div class="steps-grid" style="grid-template-columns:repeat(3,1fr)">
      <div class="step-item">
        <div class="step-num">1</div>
        <div class="step-title">Đăng ký tài khoản</div>
        <div class="step-desc">Tạo tài khoản miễn phí bằng email sinh viên hoặc email cá nhân của bạn.</div>
      </div>
      <div class="step-item">
        <div class="step-num">2</div>
        <div class="step-title">Hoàn thiện hồ sơ</div>
        <div class="step-desc">Cập nhật thông tin học vấn, kinh nghiệm làm việc và kỹ năng chuyên môn.</div>
      </div>
      <div class="step-item">
        <div class="step-num">3</div>
        <div class="step-title">Kết nối & Khám phá</div>
        <div class="step-desc">Tìm kiếm việc làm, tham gia sự kiện và kết nối với cộng đồng alumni.</div>
      </div>
    </div>
  </div>
</div>

<div class="lp-divider"></div>


<div class="lp-cta" style="padding-top:56px;">
  <div class="lp-wrap">
    <div class="cta-box">
      <h2>Sẵn sàng tham gia cộng đồng?</h2>
      <p>Đăng ký miễn phí — kết nối ngay với hàng nghìn cựu sinh viên VNUA.</p>
      <div class="cta-btns">
        <a href="{{ route('register') }}" class="btn-white">Đăng ký ngay</a>
        <a href="{{ route('login') }}" class="btn-outline-w">Đã có tài khoản →</a>
      </div>
    </div>
  </div>
</div>
<script>
const obs = new IntersectionObserver(els => 
  els.forEach(e => e.isIntersecting && e.target.classList.add('visible')),
  { threshold: 0.12 }
);
document.querySelectorAll('.feat-card, .why-item, .step-item, .why-right')
  .forEach(el => { el.classList.add('reveal'); obs.observe(el); });
</script>
</div>