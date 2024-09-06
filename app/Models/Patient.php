<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sample;

class Patient extends Model
{
    
    
    protected $table = 'patients';

    
    protected $fillable = [
        'name',
    ];

    public function samples()
    {
        return $this->hasMany(Sample::class);
    }

}
