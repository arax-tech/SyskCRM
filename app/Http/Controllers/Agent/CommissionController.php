<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Application;
use Auth; 

class CommissionController extends Controller
{
    public function index()
    {
    	Check('CommissionView');
        return view('agent.commission.index');
    }


    

}
