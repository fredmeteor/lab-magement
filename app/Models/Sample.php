<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    protected $table = 'samples';

    protected $fillable = [
        'patient_id', 'sample_type', 'collection_date', 'collected_by', 'status', 'location', 'comments'
    ];
   
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

}
