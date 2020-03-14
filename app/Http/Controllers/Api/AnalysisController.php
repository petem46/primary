<?php

namespace App\Http\Controllers\Api;

use DB;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Resources\Analysis;
use App\User;


class AnalysisController extends Controller
{

  public function dfe_compare($schoolname)
  {
    if($schoolname === 'FCAT') {
      $schoolname = '%';
    }
    $data = [
      'ks4_19' => DB::select(" select * from dfe_compare where school = '$schoolname' and namespace = 'ks4_19' "),
      'ofsted' => DB::select(" select * from dfe_compare where school = '$schoolname' and namespace = 'o' "),
      'census_19' => DB::select(" select * from dfe_compare where school = '$schoolname' and namespace = 'census_19' "),
      'abs_18' => DB::select(" select * from dfe_compare where school = '$schoolname' and namespace = 'abs_18' "),
      'ks4_pupdest_19' => DB::select(" select * from dfe_compare where school = '$schoolname' and namespace = 'ks4_pupdest_19' "),
    ];
    return new Analysis($data);
  }

  public function norkpi($schoolname)
  {
    if($schoolname === 'FCAT') {
      $schoolname = '%';
    }
    $data = DB::select(" exec sp_studentGroupCount19 @school = '$schoolname' ");
    return new Analysis($data);
  }

  public function ppkpi($schoolname)
  {
    if($schoolname === 'FCAT') {
      $schoolname = '%';
    }
    $data = DB::select(" exec sp_studentGroupCount19 @school = '$schoolname' ");

    return new Analysis($data);
  }

  public function attendancekpi($schoolname, $enddate)
  {
    if($schoolname === 'FCAT') {
      $schoolname = '%';
    }
    $lastFriday = Carbon::parse($enddate)->modify("last friday")->toDateString();
    $data = DB::select(" exec sp_AttendanceBySchool19 @enddate = '$lastFriday', @school = '$schoolname' ");

    return new Analysis($data);
  }

  public function trustattendancekpi($enddate)
  {
    $lastFriday = Carbon::parse($enddate)->modify("last friday")->toDateString();
    $data = DB::select(" exec sp_AttendanceByTrust19 @enddate = '$lastFriday' ");

    return new Analysis($data);
  }

  public function pakpi($schoolname, $enddate)
  {
    if($schoolname === 'FCAT') {
      $schoolname = '%';
    }
    $lastFriday = Carbon::parse($enddate)->modify("last friday")->toDateString();
    $data = DB::select(" exec sp_att_paGroups19 @enddate = '$lastFriday', @school = '$schoolname' ");

    return new Analysis($data);
  }

  public function cohortsummary($schoolname)
  {
    if($schoolname === 'FCAT') {
      $schoolname = '%';
    }
    $data = DB::select(" exec sp_studentGroupCount19 @school = '$schoolname' ");

    return new Analysis($data);
  }

  public function yeargroupsummary($schoolname)
  {
    if($schoolname === 'FCAT') {
      $schoolname = '%';
    }
    $data = DB::select(" exec sp_studentYearCount19 @school = '$schoolname' ");

    return new Analysis($data);
  }

  public function startersleaverssummary($schoolname, $enddate)
  {
    if($schoolname === 'FCAT') {
      $schoolname = '%';
    }
    // $enddate = Carbon::parse($enddate)->toDateString();
    $lastFriday = Carbon::parse($enddate)->modify("last friday")->toDateString();
    $data = DB::select(" exec sp_startersLeaverer19 @enddate = '$lastFriday', @school = '$schoolname' ");

    return new Analysis($data);
  }

  public function attendanceweekly($schoolname, $enddate)
  {
    if($schoolname === 'FCAT') {
      $schoolname = '%';
    }
    // $enddate = Carbon::yesterday()->toDateString();
    $lastFriday = Carbon::parse($enddate)->modify("last friday")->toDateString();
    $data = DB::select(" exec sp_att_RunningWeeklybySchool19 @enddate = '$lastFriday', @school = '$schoolname' ");

    return new Analysis($data);
  }

  public function trustattendanceweekly($enddate)
  {
    $lastFriday = Carbon::parse($enddate)->modify("last friday")->toDateString();
    $data = DB::select(" exec sp_att_RunningWeeklybyTrust19 @enddate = '$lastFriday' ");

    return new Analysis($data);
  }

  public function attendanceyear($schoolname, $enddate)
  {
    if($schoolname === 'FCAT') {
      $schoolname = '%';
    }
    // $enddate = Carbon::yesterday()->toDateString();
    $lastFriday = Carbon::parse($enddate)->modify("last friday")->toDateString();
    $data = DB::select(" exec sp_att_RunningWeeklybyYear19 @enddate = '$lastFriday', @school = '$schoolname', @week = '$week' ");

    return new Analysis($data);
  }

  public function attendanceweek($schoolname, $enddate, $week)
  {
    if($schoolname === 'FCAT') {
      $schoolname = '%';
    }
    // $enddate = Carbon::yesterday()->toDateString();
    $lastFriday = Carbon::parse($enddate)->modify("last friday")->toDateString();
    $data = DB::select(" exec sp_att_RunningWeeklybyYear19 @enddate = '$lastFriday', @school = '$schoolname', @week = '$week' ");

    return new Analysis($data);
  }

  public function attendancepie($schoolname, $enddate)
  {
    if($schoolname === 'FCAT') {
      $schoolname = '%';
    }
    // $enddate = Carbon::yesterday()->toDateString();
    $lastFriday = Carbon::parse($enddate)->modify("last friday")->toDateString();
    $data = DB::select(" exec sp_AttendanceSchool19 @enddate = '$lastFriday', @school = '$schoolname' ");

    return new Analysis($data);
  }

  public function paatrisk($schoolname, $enddate)
  {
    if($schoolname === 'FCAT') {
      $schoolname = '%';
    }
    $lastFriday = Carbon::parse($enddate)->modify("last friday")->toDateString();
    $data = [
      'paatrisk' => DB::select(" exec sp_att_paGroups19 @enddate = '$lastFriday', @school = '$schoolname' "),
      'pastudents' => DB::select(" exec sp_AttendancePAStudents19 @enddate = '$enddate', @school = '$schoolname' "),
    ];
    return new Analysis($data);
  }

  public function paatriskstudents($schoolname, $enddate)
  {
    if($schoolname === 'FCAT') {
      $schoolname = '%';
    }
    $data = DB::select(" exec sp_AttendancePAStudents19 @enddate = '$enddate', @school = '$schoolname' ");

    return new Analysis($data);
  }

  public function trustpaatrisk($enddate)
  {
    $lastFriday = Carbon::parse($enddate)->modify("last friday")->toDateString();
    $data = [
      'paatrisk' => DB::select(" exec sp_att_paGroups19 @enddate = '$lastFriday' "),
      'pastudents' => DB::select(" exec sp_AttendancePAStudents19 @enddate = '$enddate' "),
    ];
    return new Analysis($data);
  }

  public function trustpaatriskstudents($enddate)
  {
    $data = DB::select(" exec sp_AttendancePAStudents19 @enddate = '$enddate' ");

    return new Analysis($data);
  }

  public function exclusionsstudents($schoolname)
  {
    if($schoolname === 'FCAT') {
      $schoolname = '%';
    }
    $data = [
      'exstudents' => DB::select(" exec sp_exclusions19 @school = '$schoolname' "),
      'exgroups' => DB::select(" exec sp_exclusions19 @school = '$schoolname' "),
    ];

    return new Analysis($data);
  }

}
