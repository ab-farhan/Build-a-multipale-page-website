<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    use HasFactory;
    public $table='services';
    public $primaryKey='id';
    public $incrementing=true;
    public $keyType=false;
    
    protected $casts = [
        // ... other casts
        'id' => 'array', // all lower case
    ];
}
