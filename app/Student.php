<?php

namespace App;

use App\Attendance;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    
    protected $table = 'students19';

    protected $fillable = [
        'upn',
        'lsurname',
        'lforename',
        'psurname',
        'pforename',
        'year',
        'reg',
        'leaveyear',
        'leavereg',
        'house',
        'gender',
        'pp',
        'fsm1',
        'send',
        'eal',
        'stable',
        'status',
        'school',
        'startdate',
        'leavedate',
        'isleaver',
        'genderlabel',
        'pplabel',
        'sendlabel',
        'filterstartdate',
        'filterleavedate'
    ];

    public function attendance() {
        return $this->hasMany('App\Attendance', 'upn', 'upn');
    }
}
