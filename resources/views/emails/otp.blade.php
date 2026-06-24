<x-mail::message>

@if($type === 'event')
# Xác thực email đăng sự kiện

Xin chào **{{ $itemName }}**,

Bạn vừa gửi yêu cầu đăng sự kiện **"{{ $itemTitle }}"** trên hệ thống **{{ config('app.name') }}**.
@else
# Xác thực email đăng tin tuyển dụng

Xin chào **{{ $itemName }}**,

Bạn vừa gửi yêu cầu đăng tin tuyển dụng **"{{ $itemTitle }}"** trên hệ thống **{{ config('app.name') }}**.
@endif

Để xác nhận email liên hệ, vui lòng nhập mã OTP bên dưới:

<x-mail::panel>
<div style="text-align:center;padding:8px 0">
  <span style="font-size:34px;font-weight:800;letter-spacing:12px;color:#16a34a;font-family:'Courier New',monospace">{{ $otp }}</span>
</div>
</x-mail::panel>

**Mã có hiệu lực trong 10 phút.**

Nếu bạn không thực hiện yêu cầu này, hãy bỏ qua email này.

Trân trọng,<br>
**Đội ngũ {{ config('app.name') }}**

---
<small>Email tự động — vui lòng không trả lời trực tiếp.</small>

</x-mail::message>
