<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slock extends Model
{
    use HasFactory;

    protected $fillable = [
        'lang_id', 'division_id', 'ref_id', 'slock', 'short_description', 'description', 'summary', 'audio', 'visible_at', 'meta_slug', 'meta_title', 'meta_desc', 'meta_keywords', 'active_status'
    ];

    protected $attributes = [
        'active_status' => 1,
    ];
}
