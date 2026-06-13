<?php

namespace App\Models;
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
    public function cvs()
    {
        return $this->hasMany(Cv::class,'user_id');
    }
    
    public function cv()
{
    return $this->hasMany(Cv::class,'user_id');
}
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function mentorProfile()
{
    return $this->hasOne(MentorProfile::class);
}
 
   
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
    // phân quyền 
    public function getRole(): string
    {
    return $this->profile?->role ?? 'student';
    }
    public function hasRole(string|array $roles): bool
    {
    $myRole = $this->getRole();
    return in_array($myRole, (array) $roles);
    }   

   public function isAdmin(): bool    
   { 
        return $this->role === 'admin';   
    }
    public function isAlumni(): bool  
    { 
        return $this->getRole() === 'alumni'; 
    }
    public function isStudent(): bool  
    { 
        return $this->getRole() === 'student'; 
    }
    public function isLecturer(): bool 
    { 
        return $this->getRole() === 'lecturer'; 
    }
    public function isBusiness(): bool 
    { 
        return $this->getRole() === 'business'; 
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
