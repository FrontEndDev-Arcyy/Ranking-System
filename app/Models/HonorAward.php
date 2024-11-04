<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HonorAward extends Model
{
    use HasFactory;

    protected $fillable = [
        'document',
        'title',
        'sponsor',
        'points'
    ];
}
