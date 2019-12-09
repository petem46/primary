<?php

namespace App;

use App\Student;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';

    protected $fillable = [
        'upn','mark','mark_description', 'mark_date', 'meaning', 'school', 'present', 'possible', 'filterdate', 
    ];

    public function student() {
        return $this->belongsTo('App\Student', 'upn', 'upn');
    }
    
}
