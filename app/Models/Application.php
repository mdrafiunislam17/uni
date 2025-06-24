<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'course_id',
        'postal_address',
        'visa_type_id',
        'referrer_name',
        'referrer_phone',
    ];


      public function visaType()
    {
        return $this->belongsTo(VisaType::class, 'visa_type_id');
        // দ্বিতীয় আর্গুমেন্ট না দিলেও চলবে কারণ ফিল্ড নাম conventional
    }

}
