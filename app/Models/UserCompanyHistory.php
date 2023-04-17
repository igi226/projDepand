<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCompanyHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name', 'join_date', 'leave_date', 'position'
    ];
}
