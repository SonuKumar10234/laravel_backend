<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    use HasFactory;
    protected $table = 'employees';

    // Specify the fields that can be mass assigned
    protected $fillable = [
        'employee_name',
        'email',
        'phone',
        'address',
        'designation',
        'supervisor',
        'username',
        'password',
        'role'
    ];

    protected $hidden = [
        'password'
    ];

    public function leads()
    {
        return $this->hasMany(Lead::class, 'assigned_to');
    }
}
