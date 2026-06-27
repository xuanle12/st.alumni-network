<x-mail::message>
    # Đặt lại mật khẩu

    Xin chào **{{ $userName }}**,

    Bạn (hoặc ai đó) vừa yêu cầu đặt lại mật khẩu cho tài khoản trên hệ thống **{{ config('app.name') }}**.

<x-mail::button :url="$resetUrl">
    Đặt lại mật khẩu
</x-mail::button>

Liên kết có hiệu lực trong 60 phút. Nếu bạn không thực hiện yêu cầu này, hãy bỏ qua email này — mật khẩu của bạn sẽ không bị thay đổi.

Trân trọng,<br>
**Đội ngũ {{ config('app.name') }}**

---
<small>Email tự động — vui lòng không trả lời trực tiếp.</small>

</x-mail::message>
