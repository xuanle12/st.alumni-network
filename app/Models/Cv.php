<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{  
    protected $table = 'cv';
    protected $fillable = ['user_id', 'file_name', 'file_path', 'file_size', 'is_primary'];
    protected $casts    = ['is_primary' => 'boolean'];
 
    public function user() { return $this->belongsTo(User::class); }
 
    public function getUrlAttribute(): string
    {
        return asset('storage/' . $this->file_path);
    }
}
