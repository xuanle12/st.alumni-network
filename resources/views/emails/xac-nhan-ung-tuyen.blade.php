<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Xác nhận ứng tuyển</title>
</head>
<body style="margin:0;padding:0;background:#f3f4f6;font-family:Arial,sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center" style="padding:32px 16px;">
                <table width="560" cellpadding="0" cellspacing="0"
                       style="background:#fff;border-radius:12px;overflow:hidden;border:1px solid #e5e7eb;">

                    <tr>
                        <td style="background:#0961AA;padding:24px 32px;">
                            <h1 style="margin:0;color:#fff;font-size:20px;font-weight:700;">VNUA Alumni Network</h1>
                            <p style="margin:4px 0 0;color:#b3d4f0;font-size:13px;">Xác nhận nộp hồ sơ ứng tuyển</p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:28px 32px;">
                            <p style="font-size:15px;color:#111;margin:0 0 6px;">
                                Chào <strong>{{ $application->name }}</strong>,
                            </p>
                            <p style="font-size:14px;color:#374151;margin:0 0 20px;line-height:1.6;">
                                Bạn đã nộp hồ sơ ứng tuyển thành công cho vị trí <strong>{{ $job->title }}</strong>
                                @if($job->company)
                                    tại <strong>{{ $job->company }}</strong>
                                @endif
                                vào lúc {{ $application->created_at->format('H:i d/m/Y') }}.
                                Nhà tuyển dụng sẽ xem xét hồ sơ của bạn và liên hệ lại trong thời gian sớm nhất.
                            </p>

                            <table width="100%" cellpadding="0" cellspacing="0"
                                   style="background:#f9fafb;border-radius:8px;border:1px solid #e5e7eb;margin-bottom:20px;">
                                <tr>
                                    <td style="padding:16px 20px;">
                                        <p style="margin:0 0 12px;font-size:13px;color:#6b7280;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">Thông tin hồ sơ của bạn</p>
                                        <table width="100%" cellpadding="5" cellspacing="0">
                                            <tr>
                                                <td style="font-size:13px;color:#6b7280;width:130px;">Họ và tên</td>
                                                <td style="font-size:13px;color:#111;font-weight:600;">{{ $application->name }}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size:13px;color:#6b7280;">Email</td>
                                                <td style="font-size:13px;color:#0961AA;">{{ $application->email }}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size:13px;color:#6b7280;">Số điện thoại</td>
                                                <td style="font-size:13px;color:#111;">{{ $application->phone }}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size:13px;color:#6b7280;">Địa điểm</td>
                                                <td style="font-size:13px;color:#111;">{{ $application->location }}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size:13px;color:#6b7280;">CV đã nộp</td>
                                                <td style="font-size:13px;color:#111;">
                                                    {{ $application->cv_path ? 'Có' : 'Không' }}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            @if($application->cover_letter)
                            <div style="background:#fff;border:1px solid #e5e7eb;border-radius:8px;padding:16px 20px;margin-bottom:20px;">
                                <p style="margin:0 0 8px;font-size:13px;color:#6b7280;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">Thư giới thiệu của bạn</p>
                                <p style="margin:0;font-size:13px;color:#374151;line-height:1.7;">{{ $application->cover_letter }}</p>
                            </div>
                            @endif

                            <p style="font-size:13px;color:#6b7280;margin:0;">
                                Đây là email tự động xác nhận hệ thống đã ghi nhận hồ sơ của bạn. Vui lòng không trả lời email này.
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:20px 32px;border-top:1px solid #e5e7eb;background:#f9fafb;">
                            <p style="margin:0;font-size:12px;color:#9ca3af;text-align:center;">
                                Email này được gửi tự động từ VNUA Alumni Network.
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
