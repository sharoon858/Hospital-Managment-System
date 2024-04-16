<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkup extends Model
{
    use HasFactory;
    protected $fillable =[
        'patient_id',
        'appointment_id',
        'symptoms',
        'disease',
        'medications',
        'precautions',
        'tests',
    ];


    public function appointment(){
        return $this->belongsTo(Appointment::class);
    }

    public function patient(){
        return $this->belongsTo(Patient::class);
    }


}
