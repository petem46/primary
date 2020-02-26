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
    public function details($school, $id)
    {
        $upn = Student::select('upn', 'school')->find($id);
        if($school === $upn->school || $school === 'FCAT' || $school === 'fcat') {
            $data = [
              'student' => Student::where('upn', $upn->upn)->where('id', $id)->first(),
            ];
            return new StudentResource($data);
        }
        return 'NOOPE';
    }

    public function attendance($school, $id)
    {
        $upn = Student::select('upn', 'school')->find($id);
        $enddate = Carbon::yesterday()->toDateString();

        if($school === $upn->school || $school === 'FCAT' || $school === 'fcat') {
            $aupn = $upn->upn;
            $data = [
                'attendance' => DB::select(" exec sp_AttendancePAStudents19 @enddate = '$enddate', @upn = '$aupn' "),
            ];
            return new StudentResource($data);
        }
        return 'NOOPE';
    }

    public function weekdayattendance($school, $id)
    {
        $upn = Student::select('upn', 'school')->find($id);
        $enddate = Carbon::yesterday()->toDateString();

        if($school === $upn->school || $school === 'FCAT' || $school === 'fcat') {
            $aupn = $upn->upn;
            $data = [
                'weekdayattendance' => DB::select(" exec sp_att_studentWeekDay19 @enddate = '$enddate', @upn = '$aupn' "),
            ];
            return new StudentResource($data);
        }
        return 'NOOPE';
    }

    public function weeklyrunningattendance($school, $id)
    {
        $upn = Student::select('upn', 'school')->find($id);
        $enddate = Carbon::yesterday()->toDateString();

        if($school === $upn->school || $school === 'FCAT' || $school === 'fcat') {
            $aupn = $upn->upn;
            $data = [
                'weeklyrunningattendance' => DB::select(" exec sp_att_studentRunningWeek @enddate = '$enddate', @upn = '$aupn' "),
            ];
            return new StudentResource($data);
        }
        return 'NOOPE';
    }

    public function assessmentdata($school, $id)
    {
        $upn = Student::select('upn', 'school')->find($id);
        $enddate = Carbon::yesterday()->toDateString();
        if($school === $upn->school || $school === 'FCAT' || $school === 'fcat') {
            $aupn = $upn->upn;
            $data = [
                'ppa' => collect(DB::select(" exec sp_pupilPriorAttainment @upn = '$aupn' "))->first(),
                'primarydcdata' => DB::select(" exec sp_pupilPrimaryDCData @upn = '$aupn' "),
                'secondarydcdata' => DB::select(" exec sp_pupilSecondaryDCData @upn = '$aupn' "),
            ];
            return new StudentResource($data);
        }
        return 'NOOPE';
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
