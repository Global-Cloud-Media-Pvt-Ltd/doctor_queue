<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iframe extends Model
{
    use HasFactory;

    protected $fillable = ['iframe'];

    protected $visible = ['iframe'];
    
    protected $editable = ['iframe'];
}