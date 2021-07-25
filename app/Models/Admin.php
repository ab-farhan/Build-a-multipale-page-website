<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    public $table="admins";
    public $primarykey ="id";
    public $incrementing=true;
    public $keyType= false;
    
    public $casts = [
        // ... other casts
        'id' => 'array', // all lower case
    ];
}