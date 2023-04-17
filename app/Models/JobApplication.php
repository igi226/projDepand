<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id', 'employer_id', 'user_id', 'status'
    ];

    public function employee() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function employer() {
        return $this->belongsTo(User::class, 'employer_id', 'id');
    }

    public function job() {
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }
}
