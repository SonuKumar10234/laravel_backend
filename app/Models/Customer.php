<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table='customers';
    protected $primarykey='id';
    protected $fillable=[
        'customer_name',
        'customer_type',
        'state',
        'city',
        'address',
        'mobile',
        'email',
        'pan_no',
        'gst_no'
    ];

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }
    
    use HasFactory;
}
