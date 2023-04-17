<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'image', 'description', 'user_id'
    ];
   
    public function comments() {
        return $this->hasMany(Comment::class, 'blog_id', 'id'); 
    }

    public function parentComments() {
        return $this->hasMany(ParentComment::class, 'blog_id', 'id'); 
    }
    
}
