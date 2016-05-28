<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot() {

        parent::boot();

        static::creating(function($user) {
            $user->emailtoken = str_random(36);
        });
    }

    public function confirmEmail() {
        $this->verified = true;
        $this->emailtoken = null;
        $this->save();
    }

    public function detachAllRoles()
    {
        DB::table('role_user')->where('user_id', $this->id)->delete();
        return true;
    }

    public function setPasswordAttribute($password)
    {
        if(Hash::needsRehash($password)) {
            $password = bcrypt($password);
        }
        $this->attributes['password'] = $password;
    }
}
