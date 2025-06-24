<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];


    // Application মডেলে
public function visaType()
{
    return $this->belongsTo(VisaType::class);
}

}
