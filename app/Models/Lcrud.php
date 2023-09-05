<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lcrud extends Model
{
    protected $fillable = ['name','image','salary','empnumber','gander','jd','ct','department','mstate','chnumber','phone'];
    public function leaves()
{
    return $this->hasMany(Leave::class);
}
    use HasFactory;
}
