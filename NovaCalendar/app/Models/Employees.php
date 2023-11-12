<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $primaryKey = 'emp_id';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'date',
        'gender',
        'position',
        'depart_id',
    ];

}
