<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Nuwave\Lighthouse\Support\Traits\RelayConnection;

class User extends Authenticatable
{
    use Notifiable, RelayConnection;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Jobs user has created.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    /**
     * Tasks assigned to user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToManyk
     */
    public function tasks()
    {
        return $this->belongsToMany(Task::class)->withTimestamps();
    }
}
