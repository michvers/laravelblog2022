<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    use softDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        //'role_id',
        'is_active',
        'name',
        'email',
        'photo_id',
        'password',    ];

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

    public function roles(){
      return $this->belongsToMany(Role::class, 'user_role');
    }
    public function photo(){
        return $this ->belongsTo(Photo::class);
    }
    public function isAdmin(){
        foreach($this->roles as $role){
            if($role->name =='administrator' && $this->is_active == 1){
                return true;
            }
        }
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }


    /**searching/filtering**/
    public function scopeFilter($query, array $filters){
        //if(isset($filters['search']) == false
        if($filters['search'] ?? false){ //php 8
            $query
                ->where('name','like', '%' . request('search') . '%')
                ->orWhere('email','like', '%' . request('search') . '%');
        }
    }

}
