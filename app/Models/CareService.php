<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareService extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_type', 'name', 'message', 'phone', 'email'
    ];
}
