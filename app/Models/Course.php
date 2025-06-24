<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'slug',
        'image',
        'status',
    ];

    public function category()
{
    return $this->belongsTo(CourseCategory::class, 'category_id');
}
}
