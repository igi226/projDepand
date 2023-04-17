<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'skills_required','position','number_of_post','application_last_date','cover_image','job_doc','employer_id','created_at','compensation','slug','title','description','location','department_id','type','experience','compensation', 'status'
    ];

    public function department() {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'employer_id', 'id');
    }
}
