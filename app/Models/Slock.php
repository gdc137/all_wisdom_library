<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slock extends Model
{
    use HasFactory;

    protected $attributes = [
        'active_status' => 1,
    ];
}
