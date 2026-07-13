<?php

namespace App\Traits;

trait HasTimeLabel
{
    /**
     * Nhãn thời gian hiển thị:
     *  - Trong 24 giờ: dạng tương đối ("5 phút trước", "2 giờ trước")
     *  - Quá 24 giờ:   hiện ngày đăng cụ thể ("14:30 · 13/07/2026")
     */
    public function getTimeLabelAttribute(): string
    {
        $c = $this->created_at;

        if (!$c) {
            return '';
        }

        if ($c->greaterThan(now()->subDay())) {
            return $c->locale('vi')->diffForHumans();
        }

        return $c->format('d/m/Y');
    }
}
