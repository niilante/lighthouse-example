<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nuwave\Lighthouse\Support\Traits\RelayConnection;

class Job extends Model
{
    use RelayConnection;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title'];

    /**
     * The user who created the task.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Items that belongs to the task.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
