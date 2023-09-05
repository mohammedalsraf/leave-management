<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = [
        'employee_id',
        'start_date',
        'end_date',
        'days',
        'leave_type',
        'reason',
        
    ];

    public function lcrud()
    {
        return $this->belongsTo(Lcrud::class);
    }
    use HasFactory;
}
