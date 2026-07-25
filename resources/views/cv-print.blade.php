<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
{{-- Tiêu đề này chính là tên file PDF mặc định khi lưu --}}
<title>cv-{{ \Illuminate\Support\Str::slug($full_name !== '' ? $full_name : 'chua-dat-ten') }}</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
*{box-sizing:border-box;}
body{margin:0;background:#f1f5f9;font-family:'Inter',system-ui,-apple-system,'Segoe UI',sans-serif;
  color:#1f2937;font-size:13px;line-height:1.6;}

/* Thanh công cụ — chỉ hiện trên màn hình, không bao giờ in ra */
.pv-bar{position:sticky;top:0;z-index:10;display:flex;align-items:center;gap:10px;
  padding:12px 18px;background:#fff;border-bottom:1px solid #e2e8f0;}
.pv-bar b{font-size:14px;margin-right:auto;}
.pv-btn{display:inline-flex;align-items:center;gap:8px;border:1px solid #e2e8f0;border-radius:9px;
  padding:9px 17px;font-size:13px;font-weight:700;font-family:inherit;background:#fff;color:#0f172a;
  text-decoration:none;cursor:pointer;}
.pv-btn-pri{background:#0c83d8;border-color:#0c83d8;color:#fff;}

.pv-sheet{max-width:820px;margin:22px auto;}

.cv-paper{background:#fff;border-radius:10px;padding:40px 44px;box-shadow:0 1px 6px rgba(0,0,0,.08);}
.cv-name{font-size:27px;font-weight:800;letter-spacing:-.6px;color:#0f172a;margin:0;}
.cv-role{font-size:14.5px;font-weight:600;color:#0c83d8;margin:3px 0 0;}
.cv-contact{display:flex;flex-wrap:wrap;gap:5px 16px;font-size:12.5px;color:#64748b;margin-top:11px;}
.cv-contact span{display:inline-flex;align-items:center;gap:6px;}
.cv-rule{height:2px;background:#0c83d8;margin:18px 0 4px;border-radius:2px;}
.cv-sec{margin-top:20px;}
.cv-sec-t{font-size:12.5px;font-weight:800;text-transform:uppercase;letter-spacing:1px;color:#0c83d8;
  border-bottom:1px solid #e2e8f0;padding-bottom:5px;margin-bottom:11px;}
.cv-e{margin-bottom:13px;}
.cv-e-hd{display:flex;justify-content:space-between;gap:12px;align-items:baseline;}
.cv-e-t{font-size:13.5px;font-weight:700;color:#0f172a;}
.cv-e-when{font-size:12px;color:#64748b;white-space:nowrap;flex-shrink:0;}
.cv-e-s{font-size:12.5px;color:#475569;font-weight:600;}
.cv-e-n{font-size:12.5px;color:#475569;margin-top:3px;white-space:pre-line;}
.cv-summary{white-space:pre-line;color:#374151;}
.cv-skills{display:flex;flex-wrap:wrap;gap:7px;}
.cv-skill{font-size:12px;font-weight:600;background:#eff6ff;color:#075490;border-radius:20px;padding:4px 12px;}
.cv-blank{font-size:12.5px;color:#cbd5e1;font-style:italic;}

@media print{
  .pv-bar{display:none;}
  body{background:#fff;}
  .pv-sheet{max-width:none;margin:0;}
  .cv-paper{padding:0;box-shadow:none;border-radius:0;font-size:12px;}
  .cv-e{break-inside:avoid;}
  .cv-sec-t{break-after:avoid;}
  @page{margin:14mm;}
}
</style>
</head>
<body>

<div class="pv-bar">
  <b>Bản CV của bạn</b>
  <a href="{{ route('cv.builder') }}" class="pv-btn"><i class="fa-solid fa-pen"></i> Sửa tiếp</a>
  <button type="button" class="pv-btn pv-btn-pri" onclick="window.print()">
    <i class="fa-solid fa-file-arrow-down"></i> Lưu PDF
  </button>
</div>

<div class="pv-sheet">
  @include('livewire.user.partials.cv-paper')
</div>

<script>
  // Mở kèm ?print=1 thì bật hộp in luôn
  if (new URLSearchParams(location.search).get('print') === '1') {
    window.addEventListener('load', () => setTimeout(() => window.print(), 350));
  }
</script>
</body>
</html>
