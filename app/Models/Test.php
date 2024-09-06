<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
     
    protected $table = 'tests';
    protected $fillable = ['sample_id', 'test_name', 'test_date','result', 'status'];

    public function sample()
    {
        return $this->belongsTo(Sample::class);
    }
}
