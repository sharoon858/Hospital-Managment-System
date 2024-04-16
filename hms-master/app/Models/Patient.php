<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'phone_number',
        'age',
        'gender',
        'height',
        'weight',
        'cnic',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function checkup(){
        return $this->hasMany(CheckUp::class,'patient_id');
    }
}
