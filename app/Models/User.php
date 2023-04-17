<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $timestamps = true;
    
   
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'created_at',
        'slug',
        'biography',
        'experience',
        'skills',
        'github_link',
        'linkdin_link',
        'video',
        'company_name',
        'company_website',
        'company_employee_strength',
        'company_address',
        'company_image',
        'user_type',
        'image',
        'password'
    ];
   

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function role(): Attribute {
        return new Attribute (
            get: fn($value) => ["Employee", "Employer"][$value],
        );
    }

    

    public function blogs() {
        return $this->hasMany(Blog::class, 'user_id', 'id');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    public function parentComments() {
        return $this->hasMany(ParentComment::class, 'user_id', 'id');
    }

    public function academicsInfos() {
        return $this->hasMany(academicInfo::class, 'user_id', 'id');
    }

    public function user_company_histories() {
        return $this->hasMany(UserCompanyHistory::class, 'user_id', 'id');
    }

    public function jobs() {
        return $this->hasMany(Job::class, 'employer_id', 'id');
    }

    public function galaries() {
        return $this->hasMany(Galary::class, 'employer_id', 'id');
    }

}
