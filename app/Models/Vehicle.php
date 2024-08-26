<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hospital\Hospital;


class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'brand',
        'overview',
        'price',
        'year',
        'plate_number',
        'fuel',
        'capacity',
        'image1',
        'image2',
        'image3',
        'image4',
        'seatingcapacity',
        'airconditioner',
        'powerdoorlocks',
        'antilockbrakingsystem',
        'brakeassist',
        'powersteering',
        'driverairbag',
        'passengerairbag',
        'powerwindows',
        'cdplayer',
        'centrallocking',
        'crashsensor',
        'leatherseats',
        'regdate',
        'status',
    ];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
