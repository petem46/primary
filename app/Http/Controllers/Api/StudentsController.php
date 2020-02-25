<?php

namespace App\Http\Controllers\Api;

// use DB;
// use App\User;
// use Illuminate\Http\Request;
// use Socialite;
// use App\Services\SocialGoogleAccountService;
// use Auth;
// use Carbon\Carbon;

use DB;
use App\Student;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\User;

class StudentsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $school = User::first()->getSchool();
        if($school === 'FCAT' || $school === 'fcat') {$school = '%';}
        $data = [
            // 'students' => Student::where('school', 'armfield')->get(),
            'schoolname' => $school,
            'students' => Student::where('school', 'LIKE', $school)->where('isLeaver', NULL)->orderBy('lsurname')->get(),

        ];
        // dd($data);
        return view('students.index', $data);
    }

    public function list($school)
    {
        $data = [
            'students' => Student::where('school', 'LIKE', $school)->where('isLeaver', NULL)->orderBy('lsurname')->get(),
        ];
        return new StudentResource($data);
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
     * @param  \App\students  $students
     * @return \Illuminate\Http\Response
     */
    public function show($school, $id)
    {
        $upn = Student::select('upn', 'school')->find($id);
        if(strlen($upn->upn) < 3) {
            return redirect()->back()->with('message-fail','<i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;Pupil missing UPN');
        }
        /** SET $enddate to YESTERDAY'S DATE
        */
        $enddate = Carbon::yesterday()->toDateString();

        if($school === $upn->school || $school === 'FCAT' || $school === 'fcat') {
            $aupn = $upn->upn;
            $data = [
                'student' => Student::where('upn', $upn->upn)->where('id', $id)->first(),
                // 'student' => Student::with('Attendance')->where('upn', $upn->upn)->first(),
                'attendance' => DB::select(" exec sp_AttendancePAStudents19 @enddate = '$enddate', @upn = '$aupn' "),
                'weekdayattendance' => DB::select(" exec sp_att_studentWeekDay19 @enddate = '$enddate', @upn = '$aupn' "),
                'weeklyrunningattendance' => DB::select(" exec sp_att_studentRunningWeek @enddate = '$enddate', @upn = '$aupn' "),
                'ppa' => collect(DB::select(" exec sp_pupilPriorAttainment @upn = '$aupn' "))->first(),
                'primarydcdata' => DB::select(" exec sp_pupilPrimaryDCData @upn = '$aupn' "),
                'secondarydcdata' => DB::select(" exec sp_pupilSecondaryDCData @upn = '$aupn' "),
            ];
            // dd($data);
            return new StudentResource($data);
        }
        return redirect('/summary');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit(students $students)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, students $students)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(students $students)
    {
        //
    }
}
