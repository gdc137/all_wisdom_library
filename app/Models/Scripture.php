<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scripture extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'image', 'author', 'publish_detail', 'root_language', 'visible_at', 'meta_slug', 'meta_title', 'meta_desc', 'meta_keywords', 'active_status', 'delete_status'
    ];

    protected $attributes = [
        'active_status' => 1,
        'delete_status' => 0,
    ];
}
