<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name', 'active_status', 'delete_status'
    ];

    protected $attributes = [
        'active_status' => 1,
        'delete_status' => 0,
    ];
}
