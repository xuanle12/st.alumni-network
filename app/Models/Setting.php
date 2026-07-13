<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

/**
 * Lưu cấu hình dạng key-value trong DB, giúp admin đổi cấu hình
 * ngay trên giao diện mà không cần sửa file .env.
 */
class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    /** Lấy giá trị theo key, trả về $default nếu chưa có. */
    public static function get(string $key, $default = null)
    {
        $value = Cache::rememberForever("setting:{$key}", function () use ($key) {
            // Trả về mảng để phân biệt "chưa có" với "có nhưng null".
            $row = static::query()->where('key', $key)->first();
            return $row ? ['v' => $row->value] : null;
        });

        return $value === null ? $default : $value['v'];
    }

    /** Đặt giá trị cho key (tạo mới nếu chưa có). */
    public static function set(string $key, $value): void
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
        Cache::forget("setting:{$key}");
    }
}
