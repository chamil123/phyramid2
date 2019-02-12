<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password', 'user_nic', 'user_address', 'user_contact_1', 'user_pv', 'user_gender', 'user_dob', 'user_contact_2', 'user_bank_name', 'user_bank_branch', 'user_account_no', 'user_benifit_name', 'user_benifit_address', 'user_status','image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders() {
        return $this->hasMany(orders::class);
    }
    public function partner(){
        return $this->hasOne(partner::class);
    }

}
