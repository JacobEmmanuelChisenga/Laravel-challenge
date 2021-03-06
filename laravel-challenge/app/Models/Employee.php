<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employeesdb';
    protected $fillable = [
        'firstname', 'lastname','company','email','phone' 
    ];
    public function company()
  {
    return $this->belongsTo('App\Models\Company', 'company');
  }
}