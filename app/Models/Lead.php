<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{

    use HasFactory;
    protected $table = 'leads';

    // Mass assignable attributes
    protected $fillable = [
        'customer_id',
        'customer_name',
        'state',
        'city',
        'customer_requirement',
        'customer_budget',
        'assigned_to_emp'
    ];

    // relationships
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function assignedEmployee()
    {
        return $this->belongsTo(Employee::class, 'assigned_to_emp');
    }
}
