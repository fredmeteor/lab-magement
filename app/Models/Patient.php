<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sample;

class Patient extends Model
{
    
    
    protected $table = 'patients';

    
    protected $fillable = [
        'patient_id', 'name' 
    ];

    public function samples()
    {
        return $this->hasMany(Sample::class);
    }

}
