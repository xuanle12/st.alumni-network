<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Ứng viên mới</title>
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
                            <p style="margin:4px 0 0;color:#b3d4f0;font-size:13px;">Thông báo ứng viên mới</p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:28px 32px;">
                            <p style="font-size:15px;color:#111;margin:0 0 6px;">
                                Có một ứng viên mới vừa nộp hồ sơ cho vị trí <strong>{{ $job->title }}</strong>.
                            </p>
                            <p style="font-size:13px;color:#6b7280;margin:0 0 20px;">
                                Thời gian: {{ $application->created_at->format('H:i d/m/Y') }}
                            </p>

                            <table width="100%" cellpadding="0" cellspacing="0"
                                   style="background:#f9fafb;border-radius:8px;border:1px solid #e5e7eb;margin-bottom:20px;">
                                <tr>
                                    <td style="padding:16px 20px;">
                                        <p style="margin:0 0 12px;font-size:13px;color:#6b7280;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">Thông tin ứng viên</p>
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
                                            @if($application->cv_path)
                                            <tr>
                                                <td style="font-size:13px;color:#6b7280;">CV</td>
                                                <td>
                                                    <a href="{{ url(Storage::url($application->cv_path)) }}"
                                                       style="font-size:13px;color:#0961AA;text-decoration:underline;">
                                                        Tải xuống CV
                                                    </a>
                                                </td>
                                            </tr>
                                            @endif
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            @if($application->cover_letter)
                            <div style="background:#fff;border:1px solid #e5e7eb;border-radius:8px;padding:16px 20px;margin-bottom:20px;">
                                <p style="margin:0 0 8px;font-size:13px;color:#6b7280;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">Thư giới thiệu</p>
                                <p style="margin:0;font-size:13px;color:#374151;line-height:1.7;">{{ $application->cover_letter }}</p>
                            </div>
                            @endif

                            <a href="{{ url('/admin/applications/' . $application->id) }}"
                               style="display:inline-block;background:#0961AA;color:#fff;text-decoration:none;border-radius:8px;padding:11px 22px;font-size:14px;font-weight:600;">
                                Xem hồ sơ trên hệ thống →
                            </a>
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