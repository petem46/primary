<?php

namespace App\Http\Controllers;

use DB;
use App\Reports;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
class analysisController extends Controller
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
        if ($school == 'Mereside') {
            $school = ['school' => $school];
            return view('analysis.mereside', $school);
        }
        $schoolname = ['school' => $school];

        $enddate = Carbon::yesterday()->toDateString();

        if ($school === 'FCAT' || $school === 'fcat') {
            $school = 'Westcliff';
        }

        $data = [
            // 'attgroups' => DB::select(" exec sp_att_fcatGroups19 @enddate = '$enddate', @school = '$school' "),
            // 'pastudents' => DB::select(" exec sp_AttendancePAStudents19 @enddate = '$enddate', @school = '$school' "),
            // 'pagroups' => DB::select(" exec sp_att_paGroupsFCAT19 @enddate = '$enddate', @school = '$school' "),
            // 'attgroups' => '',
            'pastudents' => '',
            'pagroups' => '',
            // 'school' => $school = User::first()->getSchool(),
            'school' => $school,
            'enddate' => $enddate,
        ];
        // dd($data);
        return view('analysis.index', $data);
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
                'attgroups' => DB::select(" exec sp_att_fcatGroups19 @enddate = '$lastFriday', @school = '$schoolname' "),
                'pagroups' => DB::select(" exec sp_att_paGroups19 @enddate = '$lastFriday', @school = '$schoolname' "),
                'attrunningweekly' => DB::select(" exec sp_att_schoolRunningWeek19 @enddate = '$lastFriday', @school = '$schoolname' "),
                // 'pastudents' => DB::select(" exec sp_AttendancePAStudents19 @enddate = '$enddate', @school = '$schoolname' "),
                'nonroutine' => DB::select(" exec sp_startersLeaverer19 @enddate = '$lastFriday', @school = '$schoolname' "),
                'school' => $school,
                'userschool' => $userschool,
                'schoolname' => $schoolname,
                'enddate' => $enddate,
            ];
            // dd($data);
            return view('analysis.dev', $data);
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
