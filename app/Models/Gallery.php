<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    public $table="galleries";
    public $primarykey ="id";
    public $incrementing=true;
    public $keyType= false;
    
    public $casts = [
        // ... other casts
        'id' => 'array', // all lower case
    ];
}
