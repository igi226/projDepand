<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentComment extends Model
{
    use HasFactory;
    // protected $model = ParentComment::class;

    protected $fillable = [
        'relpy', 'user_id', 'comment_id'
    ];

    public function comment() {
        return $this->belongsTo(Comment::class, 'comment_id', 'id');
    }
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function blog() {
        return $this->belongsTo(Blog::class, 'blog_id', 'id');
    }
}
