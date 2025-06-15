<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

      protected $fillable = [
        'name',
        'slug',
        'title',
        'message',
        'designation',
        'image',
        'sort',
        'status',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'youtube',
        'email',
        'phone',
        'address',
    ];
}
