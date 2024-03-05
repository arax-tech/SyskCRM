<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\University;
use App\Agent;
use App\User;
use Auth;
use DB;

class UniversityController extends Controller
{
    public function index()
    {
        Check('UniversityView');
        $universities = University::whereIn('id', explode(",", auth::user()->universities))->get();
        return view('agent.university.index', compact('universities'));
    }

 
  

    public function view($id)
    {
        $university = University::find($id);
        return view('common.university.view',compact('university'));
    }

    


}
