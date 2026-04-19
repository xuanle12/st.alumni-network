<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'initials',
        'role', 'position', 'avatar', 'is_online',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
 
    public function cv()
    {
        return $this->hasMany(Cv::class)->orderByDesc('is_primary')->orderByDesc('created_at');
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
 
    // Lấy 2 chữ cái đầu để hiển thị avatar
    public function getInitialsAttribute(): string
    {
        $parts = explode(' ', trim($this->name));
        $last  = mb_strtoupper(mb_substr(end($parts), 0, 1));
        $first = count($parts) > 1 ? mb_strtoupper(mb_substr($parts[0], 0, 1)) : '';
        return $last . $first;
    }
      public function contacts()
    {
        return $this->belongsToMany(
            User::class,
            'user_contacts',
            'user_id',
            'contact_id'
        )->wherePivot('status', 'accepted')->withTimestamps();
    }
 
    public function isAdmin()
    {
        return $this->is_admin;
    }
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_online'         => 'boolean',
        ];
    }
     public static function makeInitials(string $name): string
    {
        $parts = explode(' ', $name);
        if (count($parts) >= 2) {
            return mb_strtoupper(
                mb_substr($parts[0], 0, 1) . mb_substr(end($parts), 0, 1)
            );
        }
        return mb_strtoupper(mb_substr($name, 0, 2));
    }
}
