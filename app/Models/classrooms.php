<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classrooms extends Model
{
    use HasFactory;
    
    public $timestamps = False;

    protected $fillable = [
        'class_name', 'room_no'
    ];
}
