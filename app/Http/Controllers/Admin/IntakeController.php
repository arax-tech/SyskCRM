<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Intake;
use App\Course;
use Auth;
use DB;

class IntakeController extends Controller
{
    public function index()
    {
        Check('IntakeView');
        $intakes = Intake::get();
        $courses = Course::get();
        return view('admin.intake.index', compact('intakes', 'courses'));
    }


    public function store(Request $request)
    {
        Check('IntakeCreate');
    	// dd($request->all());
        $intake = new Intake();
        $intake->course_id = $request->course_id;
        $intake->month = $request->intake_month;
        $intake->year = $request->intake_year;
        $intake->start_date = $request->start_date;
        $intake->deadline = $request->deadline;
        $intake->status = $request->intake_status;
        $intake->save();
        return redirect()->back()->with('flash_message_success','Intake Create Successfully...');
    }




    public function update(Request $request, $id)
    {
        Check('IntakeUpdate');
        // dd($request->all());
        $intake = Intake::find($id);
        $intake->course_id = $request->course_id;
        $intake->month = $request->intake_month;
        $intake->year = $request->intake_year;
        $intake->start_date = $request->start_date;
        $intake->deadline = $request->deadline;
        $intake->status = $request->intake_status;
        $intake->save();
        return redirect()->back()->with('flash_message_success','Intake Update Successfully...');
    }

  



    public function delete($id)
    {
        Check('IntakeDelete');
        Intake::find($id)->delete();
        return redirect()->back()->with('flash_message_success','Intake Delete Successfully...');
    }

}
