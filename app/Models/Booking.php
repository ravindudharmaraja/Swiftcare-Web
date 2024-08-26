<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;
use App\Models\Hospital\Hospital;
use App\Models\Vehcle;
use App\Models\Payment;


class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'vehicle_id',
        'hospital_id',
        'fromdate',
        'todate',
        'time',
        'message',
        'is_emergency',
        'price',
        'status',
    ];

    // Define relationships with User, Ambulance, and Hospital models
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
