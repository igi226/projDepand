<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestTalent extends Model
{
    use HasFactory;

    protected $fillable = [
        'jobfunction',
        'positiontype',
        'position_hiring_for',
        'email',
        'fname',
        'lname',
        'jobtitle',
        'number',
        'address',
        'city',
        'state',
        'country',
        'zipcode',
        'company',
        'message',
    ];
}
