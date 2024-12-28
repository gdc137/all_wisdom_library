<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $fillable = [
        'scripture_id', 'title', 'description', 'image', 'visible_at', 'meta_slug', 'meta_title', 'meta_desc', 'meta_keywords', 'active_status', 'delete_status'
    ];

    protected $attributes = [
        'active_status' => 1,
        'delete_status' => 0,
    ];
}
