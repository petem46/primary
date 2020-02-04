<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'usergroup_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getSchool() {
        $domain = explode("@", Auth::user()->email);
        $school = explode(".", $domain[1]);
        // dd($school);
        $checker = $school;
        $school = $school[0];
        if($school === 'FCAT' || $school === 'fcat') {
            $school = strtoupper($school);
        } else {
            $school = ucfirst($school);
        }
        // $data = [
        //     'email' => $domain,
        //     'domain' => $checker,
        //     'school' => $school,
        // ];
        // dd($data);

        return $school;
    }
}
