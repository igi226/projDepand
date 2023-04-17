<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galary extends Model
{
    use HasFactory;
    protected $fillable = [
        'employer_id', 'company_image_gal'
    ];

    public function employer() {
        return $this->belongsTo(User::class, 'employer_id', 'id');
    }
}
