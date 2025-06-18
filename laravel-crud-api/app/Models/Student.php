<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students'; // Asegúrate de que la tabla se llame "students"
    protected $fillable = [
        'name',
        'email',
        'phone',
        'language',
    ];
}
