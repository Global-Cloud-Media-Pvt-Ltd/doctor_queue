<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_no',
        'doctor_name',
        'doctor_special'
    ];

    protected $visible = [
        'id',
        'room_no',
        'doctor_name',
        'doctor_special'
    ];

    protected $editable = [
        'room_no',
        'doctor_name',
        'doctor_special'
    ];
}