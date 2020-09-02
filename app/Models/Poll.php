<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'status', 'start_date', 'end_date', 'total_yes', 'total_no', 'total_no_comment', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'
    ];
}
