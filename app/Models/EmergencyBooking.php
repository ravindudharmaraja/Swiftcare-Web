<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hospital\Hospital;
use App\Models\Ambulance\Ambulance;
use App\Models\User\User;
use App\Models\Payment;


class EmergencyBooking extends Model
{

    protected $table = 'emergency_bookings';
    use HasFactory;

    protected $fillable = [
        'name',
        'mobile',
        'latitude',
        'longitude',
        'ambulance_id',
        'progress',
        'updated_at',
        'created_at',
        'user_id'     
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function ambulance()
    {
        return $this->belongsTo(Ambulance::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

}
