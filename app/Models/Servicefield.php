<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicefield extends Model
{
    protected $table = 'service_fields';
    protected $fillable = ['name', 'value', 'service_id'];

    
}
