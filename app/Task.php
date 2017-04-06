<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nuwave\Lighthouse\Support\Traits\RelayConnection;

class Task extends Model
{
    use RelayConnection;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title'];

    /**
     * The task the item belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    /**
     * User who completed the item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function completedBy()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Users assigned to the item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
