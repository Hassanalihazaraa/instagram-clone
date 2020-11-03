<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/17JWK7OQzONG721Ju9I5yOGCQZP4fZaBBTcIxK1p.jpeg';
        return '/storage/' . $imagePath;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
