<?php

namespace App\Http\Controllers;

use DB;
use App\Reports;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\Resource;


class AnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function assessment($school)
    {
        $userschool = User::first()->getSchool();
        $schoolname = $school;
        if($userschool === 'FCAT' && $schoolname === 'FCAT') {
             $schoolname = '%';
        }

        if($schoolname === $userschool || $userschool === 'FCAT' || $userschool === 'fcat') {
            $data = [
                'school' => $school,
                'userschool' => $userschool,
                'schoolname' => $schoolname,
            ];
            // dd($data);

            return view('analysis.assessment', $data);
        }
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reports  $reports
     * @return \Illuminate\Http\Response
     */
    public function show($school)
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
            return view('analysis.view', $data);
        }
        return redirect('/');

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
            return Resource::toArray($data);
        }
        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reports  $reports
     * @return \Illuminate\Http\Response
     */
    public function edit(Reports $reports)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reports  $reports
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reports $reports)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reports  $reports
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reports $reports)
    {
        //
    }
}
