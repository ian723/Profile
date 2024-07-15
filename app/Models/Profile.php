<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Accessor for profile image path
    public function profileImage()
    {
        $imagePath = $this->image ? $this->image : 'profile/lHOaAgQk9KYDR2Orp0Rf1tITikoN9BNKThlCXoHw.webp';
        
        return '/storage/' . $imagePath;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
