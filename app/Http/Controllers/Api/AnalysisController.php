<?php

namespace App\Http\Controllers\Api;

use DB;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Resources\Analysis;
use App\User;


class AnalysisController extends Controller
{
  public function norkpi($schoolname)
  {
    $data = DB::select(" exec sp_studentGroupCount19 @school = '$schoolname' ");
    return new Analysis($data);
  }

  public function norkpifcat($schoolname)
  {
    $data = DB::select(" exec sp_studentGroupCount19 @school = '%'");
    return new Analysis($data);
  }

  public function ppkpi($schoolname)
  {
    // $school = 'Montgomery';
    // $schoolname = $school;

    $data = DB::select(" exec sp_studentGroupCount19 @school = '$schoolname' ");

    return new Analysis($data);
  }

  public function attendancekpi($schoolname, $enddate)
  {
    // $enddate = Carbon::yesterday()->toDateString();
    $lastFriday = Carbon::parse($enddate)->modify("last friday")->toDateString();
    $data = DB::select(" exec sp_AttendanceSchool19 @enddate = '$lastFriday', @school = '$schoolname' ");

    return new Analysis($data);
  }

  public function pakpi($schoolname, $enddate)
  {
    // $enddate = Carbon::yesterday()->toDateString();
    $lastFriday = Carbon::parse($enddate)->modify("last friday")->toDateString();
    $data = DB::select(" exec sp_att_paGroups19 @enddate = '$lastFriday', @school = '$schoolname' ");

    return new Analysis($data);
  }

  public function cohortsummary($schoolname)
  {
    $data = DB::select(" exec sp_studentGroupCount19 @school = '$schoolname' ");

    return new Analysis($data);
  }

  public function yeargroupsummary($schoolname)
  {
    $data = DB::select(" exec sp_studentYearCount19 @school = '$schoolname' ");

    return new Analysis($data);
  }

  public function startersleaverssummary($schoolname, $enddate)
  {
    // $enddate = Carbon::parse($enddate)->toDateString();
    $lastFriday = Carbon::parse($enddate)->modify("last friday")->toDateString();
    $data = DB::select(" exec sp_startersLeaverer19 @enddate = '$lastFriday', @school = '$schoolname' ");

    return new Analysis($data);
  }

  public function attendanceweekly($schoolname, $enddate)
  {
    // $enddate = Carbon::yesterday()->toDateString();
    $lastFriday = Carbon::parse($enddate)->modify("last friday")->toDateString();
    $data = DB::select(" exec sp_att_schoolRunningWeek19 @enddate = '$lastFriday', @school = '$schoolname' ");

    return new Analysis($data);
  }

  public function attendanceyear($schoolname, $enddate)
  {
    // $enddate = Carbon::yesterday()->toDateString();
    $lastFriday = Carbon::parse($enddate)->modify("last friday")->toDateString();
    $data = DB::select(" exec sp_att_yearRunningWeek19 @enddate = '$lastFriday', @school = '$schoolname', @week = '$week' ");

    return new Analysis($data);
  }

  public function attendanceweek($schoolname, $enddate, $week)
  {
    // $enddate = Carbon::yesterday()->toDateString();
    $lastFriday = Carbon::parse($enddate)->modify("last friday")->toDateString();
    $data = DB::select(" exec sp_att_yearRunningWeek19 @enddate = '$lastFriday', @school = '$schoolname', @week = '$week' ");

    return new Analysis($data);
  }

  public function attendancepie($schoolname, $enddate)
  {
    // $enddate = Carbon::yesterday()->toDateString();
    $lastFriday = Carbon::parse($enddate)->modify("last friday")->toDateString();
    $data = DB::select(" exec sp_AttendanceSchool19 @enddate = '$lastFriday', @school = '$schoolname' ");

    return new Analysis($data);
  }

  public function paatrisk($schoolname, $enddate)
  {
    // $enddate = Carbon::yesterday()->toDateString();
    $lastFriday = Carbon::parse($enddate)->modify("last friday")->toDateString();
    $data = [
      'paatrisk' => DB::select(" exec sp_att_paGroups19 @enddate = '$lastFriday', @school = '$schoolname' "),
      'pastudents' => DB::select(" exec sp_AttendancePAStudents19 @enddate = '$enddate', @school = '$schoolname' "),
    ];
    return new Analysis($data);
  }

  public function paatriskstudents($schoolname, $enddate)
  {
    // $enddate = Carbon::yesterday()->toDateString();
    // $lastFriday = Carbon::parse($enddate)->modify("last friday")->toDateString();
    $data = DB::select(" exec sp_AttendancePAStudents19 @enddate = '$enddate', @school = '$schoolname' ");

    return new Analysis($data);
  }

  public function exclusionsstudents($schoolname)
  {
    $data = [
      'exstudents' => DB::select(" exec sp_exclusions19 @school = '$schoolname' "),
      'exgroups' => DB::select(" exec sp_exclusions19 @school = '$schoolname' "),
    ];

    return new Analysis($data);
  }

}
