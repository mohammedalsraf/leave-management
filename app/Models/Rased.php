<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rased extends Model
{
    protected $fillable = [
        'employee_id',
        'rased',
        'rasedm',
       
        
    ];
    use HasFactory;
}
