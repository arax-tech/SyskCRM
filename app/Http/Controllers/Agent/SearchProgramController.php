<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\University;
use App\User;
use Auth;
use DB;


class SearchProgramController extends Controller
{
    public function index ()
    {
    	Check('SearchProgramView');
    	$countries = DB::table('countries')->get();
    	return view('agent.search.index', compact('countries'));
    }

  

}
