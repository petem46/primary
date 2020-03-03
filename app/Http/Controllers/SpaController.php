<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Illuminate\Http\Request;

class SpaController extends Controller
{
    public function index()
    {
      $data = [
        'whodisschool' => User::first()->getSchool(),
      ];
      // dd($whodisschool);
        return view('/analysis/dev', $data);
    }
}
