<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadLog extends Model
{

    use HasFactory;

    protected $table = 'lead_logs';

    // Define the fields that can be mass-assigned
    protected $fillable = [
        'lead_id',        // Foreign key to lead
        'lead_status',   
        'closure_date', 
        'remarks',       
    ];

    // Define the relationship with the Lead model
    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
}
