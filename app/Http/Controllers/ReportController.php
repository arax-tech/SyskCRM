<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Application;
use App\Country;
use App\Student;
use App\State;
use App\User;
use Auth;
use DB;


class ReportController extends Controller
{
    public function index()
    {
        if (auth::check()) {
            error_reporting(0);
            if (auth::user()->role == "Agent"){
                error_reporting(0);
                $students = DB::table('students')->where('agent_id', auth::user()->id)->get();
                $applications = DB::table('applications')->where(['agent_id' => auth::user()->id])->get();
                $commissions = DB::table('commissions')->where(['agent_id' => auth::user()->id])->get();
            }else{
                error_reporting(0);
                $students = DB::table('students')->get();
                $applications = DB::table('applications')->get();
                $commissions = DB::table('commissions')->get();
                }
            return view('common.report.index', compact('students', 'applications', 'commissions'));
        }else{
            return redirect('/login')->with('flash_message_error', 'Please login to access');
        }
    }



    public function student_search(Request $request)
    {
        // dd($request->application_status);

        $students = Student::query();

        if ($request->get('start_date'))
        {
            $students->whereBetween('created_at',[$request->start_date, $request->end_date]);
        }

        
        if ($request->nationality)
        {
            $students->where('nationality',$request->nationality);
        }

        if ($request->application_status)
        {
            $students->whereIn('application_status', $request->application_status);
        }

        if ($request->commission_claimd)
        {
            $students->whereIn('commission_claimd', $request->commission_claimd);
        }


        if ($request->validation)
        {
            $students->where($request->validation,$request->validation_value);
        }

        $students = $students->get();


        if (auth::user()->role == "Agent"){
            error_reporting(0);
            $applications = DB::table('applications')->where(['agent_id' => auth::user()->id])->get();
            $commissions = DB::table('commissions')->where(['agent_id' => auth::user()->id])->get();
        }else{
            error_reporting(0);
            $applications = DB::table('applications')->get();
            $commissions = DB::table('commissions')->get();
        }

    
        return view('common.report.index', compact('students', 'applications', 'commissions'));
    }


    public function application_search(Request $request)
    {
    	// dd($request->all());

	    $applications = Application::query();

	    if ($request->get('app_start_date'))
	    {
	        $applications->whereBetween('created_at',[$request->app_start_date, $request->app_end_date]);
	    }

	    
	    if ($request->app_campus)
	    {
	        $applications->where('campus_id',$request->app_campus);
	    }

	    if ($request->app_intakes)
	    {
	        $applications->whereIn('intake_id', $request->app_intakes);
	    }

	    if ($request->app_application_status)
	    {
	        $applications->whereIn('status', $request->app_application_status);
	    }


	    


        if (auth::user()->role == "Agent"){
            error_reporting(0);
            $students = DB::table('students')->where('agent_id', auth::user()->id)->get();
            $applications = $applications->where(['agent_id' => auth::user()->id])->get();
            $commissions = DB::table('commissions')->where(['agent_id' => auth::user()->id])->get();
        }else{
            error_reporting(0);
            $applications = $applications->get();
            $commissions = DB::table('commissions')->get();
            $students = DB::table('students')->get();
        }

	
	    return view('common.report.index', compact('students', 'applications', 'commissions'));
	}

    
}
