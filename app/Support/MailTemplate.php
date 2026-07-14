<?php

namespace App\Support;

use App\Models\Setting;

/**
 * Lấy & render nội dung email do admin cấu hình (tiêu đề + nội dung),
 * hỗ trợ placeholder dạng {ten}, {vi_tri}... Fallback về mặc định nếu chưa cấu hình.
 */
class MailTemplate
{
    /** Tiêu đề đã render placeholder (mặc định lấy từ defaults() nếu không truyền). */
    public static function subject(string $key, array $vars = [], ?string $default = null): string
    {
        $raw = Setting::get("mail_tpl.{$key}.subject");
        $text = ($raw !== null && $raw !== '') ? $raw : ($default ?? (self::defaults()[$key]['subject'] ?? ''));
        return self::render($text, $vars);
    }

    /** Nội dung (plain text) đã render placeholder. */
    public static function body(string $key, array $vars = [], ?string $default = null): string
    {
        $raw = Setting::get("mail_tpl.{$key}.body");
        $text = ($raw !== null && $raw !== '') ? $raw : ($default ?? (self::defaults()[$key]['body'] ?? ''));
        return self::render($text, $vars);
    }

    /** Thay thế các placeholder {key} bằng giá trị tương ứng. */
    public static function render(string $text, array $vars): string
    {
        foreach ($vars as $k => $v) {
            $text = str_replace('{' . $k . '}', (string) $v, $text);
        }
        return $text;
    }

    /** Nội dung mặc định của các thư (dùng cho fallback & prefill trang cấu hình). */
    public static function defaults(): array
    {
        return [
            'apply_confirm' => [
                'label'   => 'Xác nhận ứng tuyển (gửi ứng viên)',
                'vars'    => '{ten}, {vi_tri}, {cong_ty}, {thoi_gian}',
                'subject' => 'Xác nhận nộp hồ sơ ứng tuyển',
                'body'    => "Bạn đã nộp hồ sơ ứng tuyển thành công cho vị trí {vi_tri} tại {cong_ty} vào lúc {thoi_gian}. Nhà tuyển dụng sẽ xem xét hồ sơ của bạn và liên hệ lại trong thời gian sớm nhất.",
            ],
            'apply_notify' => [
                'label'   => 'Thông báo ứng viên mới (gửi nhà tuyển dụng)',
                'vars'    => '{ten}, {vi_tri}, {email}, {phone}',
                'subject' => 'Có ứng viên mới ứng tuyển vị trí {vi_tri}',
                'body'    => "{ten} vừa ứng tuyển vị trí {vi_tri}. Thông tin liên hệ: email {email}, điện thoại {phone}. CV của ứng viên được đính kèm trong email này.",
            ],
            'company_account' => [
                'label'   => 'Cấp tài khoản doanh nghiệp (gửi người phụ trách)',
                'vars'    => '{ten}, {cong_ty}, {email}, {mat_khau}, {link}',
                'subject' => 'Tài khoản doanh nghiệp — {cong_ty}',
                'body'    => "Xin chào {ten},\n\nTài khoản doanh nghiệp cho \"{cong_ty}\" đã được tạo trên hệ thống Mạng lưới Cựu sinh viên FITA-VNUA.\n\nThông tin đăng nhập:\n- Email: {email}\n- Mật khẩu: {mat_khau}\n\nVui lòng đăng nhập tại: {link}\nKhuyến nghị đổi mật khẩu sau lần đăng nhập đầu tiên.\n\nTrân trọng.",
            ],
        ];
    }
}
