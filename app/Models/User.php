<?php

namespace App\Models;

use App\Mail\NewUserWelcomeMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //this function will create a profile when a user is created
    protected static function boot(): void
    {
        parent::boot();

        static::created(function ($user) {
            $user->profile()->create([
                'title' => $user->username
            ]);
            Mail::to($user->email)->send(new NewUserWelcomeMail());
        });
    }

    //one to one relation with profile
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    //many to many relation with profile
    public function following(): BelongsToMany
    {
        return $this->belongsToMany(Profile::class);
    }

    //one to many relation with profile
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class)->orderBy('created_at', 'desc');
    }
}
