<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 0) {
            return view('admin.home');
        } elseif (Auth::user()->role == 1) {
            $students = User::where('role', '=', '2')->where('email_verified_at', '!=', NULL)->get();
            return view('teacher.home')->with('students', $students);
        } elseif (Auth::user()->role == 2) {
            return view('student.home');
        }
        
    }
}
