<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $usertype = Auth::user()->usertype;

        switch ($usertype) {
        case 'etudiant':
            return view('student.etudiant');

        case 'enseignant':
            return view('teacher.enseignant ');

        case 'admin':
            return view('admin.admin');

        default:
            return view('admin');
        }
    }
}
