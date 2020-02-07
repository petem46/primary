<?php

namespace App\Http\Controllers\Api;

use DB;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Resources\Analysis;
use App\User;


class AnalysisController extends Controller
{
    public function index()
    {
        $school = 'Montgomery';
        $schoolname = $school;
        $userschool = $school;
        $enddate = Carbon::yesterday()->toDateString();
        $lastFriday = Carbon::parse($enddate)->modify("last friday")->toDateString();

        // $data = DB::select(" exec sp_studentGroupCount19 @school = '$schoolname' ");
        // return new Analysis($data);
        $data = [
            'studentCounts19' => DB::select(" exec sp_studentGroupCount19 @school = '$schoolname' "),
            'studentYearCounts19' => DB::select(" exec sp_studentYearCount19 @school = '$schoolname' "),
            // 'schoolattendance' => collect(DB::select(" exec sp_AttendanceSchool19 @enddate = '$lastFriday', @school = '$schoolname' "))->first(),
            'pagroups' => DB::select(" exec sp_att_paGroups19 @enddate = '$lastFriday', @school = '$schoolname' "),
            'attrunningweekly' => DB::select(" exec sp_att_schoolRunningWeek19 @enddate = '$lastFriday', @school = '$schoolname' "),
            // 'pastudents' => DB::select(" exec sp_AttendancePAStudents19 @enddate = '$enddate', @school = '$schoolname' "),
            'nonroutine' => DB::select(" exec sp_startersLeaverer19 @enddate = '$lastFriday', @school = '$schoolname' "),
            // 'vov' => collect(DB::select(" exec sp_vov @enddate = '$lastFriday', @school = '$schoolname' "))->first(),
            // 'school' => $school,
            // 'userschool' => $userschool,
            // 'schoolname' => $schoolname,
            // 'enddate' => $enddate,
    ];
        return Analysis::collection($data);
    }

    public function norkpi($schoolname) {
        // $school = 'Montgomery';
        // $schoolname = $school;

        $data = DB::select(" exec sp_studentGroupCount19 @school = '$schoolname' ");

        return new Analysis($data);
    }

    public function ppkpi($schoolname) {
        // $school = 'Montgomery';
        // $schoolname = $school;

        $data = DB::select(" exec sp_studentGroupCount19 @school = '$schoolname' ");

        return new Analysis($data);
    }

    public function attendancekpi($schoolname, $enddate) {
        // $enddate = Carbon::yesterday()->toDateString();
        $lastFriday = Carbon::parse($enddate)->modify("last friday")->toDateString();
        $data = DB::select(" exec sp_AttendanceSchool19 @enddate = '$lastFriday', @school = '$schoolname' ");

        return new Analysis($data);
    }

    public function pakpi($schoolname, $enddate) {
        // $enddate = Carbon::yesterday()->toDateString();
        $lastFriday = Carbon::parse($enddate)->modify("last friday")->toDateString();
        $data = DB::select(" exec sp_att_paGroups19 @enddate = '$lastFriday', @school = '$schoolname' ");

        return new Analysis($data);
    }

    public function cohortsummary($schoolname) {
        $data = DB::select(" exec sp_studentGroupCount19 @school = '$schoolname' ");

        return new Analysis($data);
    }

    public function yeargroupsummary($schoolname) {
        $data = DB::select(" exec sp_studentYearCount19 @school = '$schoolname' ");

        return new Analysis($data);
    }

    public function startersleaverssummary($schoolname, $enddate) {
        // $enddate = Carbon::parse($enddate)->toDateString();
        $lastFriday = Carbon::parse($enddate)->modify("last friday")->toDateString();
        $data = DB::select(" exec sp_startersLeaverer19 @enddate = '$lastFriday', @school = '$schoolname' ");

        return new Analysis($data);
    }

    public function attendanceweekly($schoolname, $enddate) {
        // $enddate = Carbon::yesterday()->toDateString();
        $lastFriday = Carbon::parse($enddate)->modify("last friday")->toDateString();
        $data = DB::select(" exec sp_att_schoolRunningWeek19 @enddate = '$lastFriday', @school = '$schoolname' ");

        return new Analysis($data);
    }

    public function attendancepie($schoolname, $enddate) {
        // $enddate = Carbon::yesterday()->toDateString();
        $lastFriday = Carbon::parse($enddate)->modify("last friday")->toDateString();
        $data = DB::select(" exec sp_AttendanceSchool19 @enddate = '$lastFriday', @school = '$schoolname' ");

        return new Analysis($data);
    }



    public function dev($school)
    {
        $userschool = User::first()->getSchool();
        $schoolname = $school;
        if($userschool === 'FCAT' && $schoolname === 'FCAT') {
             $schoolname = '%';
        }
        // dd($schoolname);
        $enddate = Carbon::yesterday()->toDateString();
        $lastFriday = Carbon::parse($enddate)->modify("last friday")->toDateString();
        // dd($lastFriday);

        if($schoolname === $userschool || $userschool === 'FCAT' || $userschool === 'fcat') {
            $data = [
                'studentCounts19' => DB::select(" exec sp_studentGroupCount19 @school = '$schoolname' "),
                'studentYearCounts19' => DB::select(" exec sp_studentYearCount19 @school = '$schoolname' "),
                'schoolattendance' => collect(DB::select(" exec sp_AttendanceSchool19 @enddate = '$lastFriday', @school = '$schoolname' "))->first(),
                'pagroups' => DB::select(" exec sp_att_paGroups19 @enddate = '$lastFriday', @school = '$schoolname' "),
                'attrunningweekly' => DB::select(" exec sp_att_schoolRunningWeek19 @enddate = '$lastFriday', @school = '$schoolname' "),
                // 'pastudents' => DB::select(" exec sp_AttendancePAStudents19 @enddate = '$enddate', @school = '$schoolname' "),
                'nonroutine' => DB::select(" exec sp_startersLeaverer19 @enddate = '$lastFriday', @school = '$schoolname' "),
                'vov' => collect(DB::select(" exec sp_vov @enddate = '$lastFriday', @school = '$schoolname' "))->first(),
                'school' => $school,
                'userschool' => $userschool,
                'schoolname' => $schoolname,
                'enddate' => $enddate,
            ];
            // dd($data);
            return $data;
        }
        return redirect('/');

    }

}
