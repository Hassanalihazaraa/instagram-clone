<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/17JWK7OQzONG721Ju9I5yOGCQZP4fZaBBTcIxK1p.jpeg';
        return '/storage/' . $imagePath;
    }

    //one to one relation
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //many to many relation with user
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
