<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PollResponse extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'poll_id', 'ip_address', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'
    ];
}
