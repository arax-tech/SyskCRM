<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\University;
use App\Application;
use App\Intake;
use App\Student;
use App\Campus;
use App\Course;
use App\User;
use Auth;
use DB;

class ApplicationController extends Controller
{
    public function index()
    {
        Check('ApplicationView');
        error_reporting(0);
        $students = Student::get();
        $campuses = Campus::get();
        foreach ($campuses as $key => $value)
        {
            $university = University::find($value->university_id);
            $campuses[$key]->university_id = $university->id;
            $campuses[$key]->university_name = $university->name;
        }

        return view('admin.application.index', compact('students', 'campuses'));
    }

    
    

    public function view($id)
    {
        Check('ApplicationView');
        $application = Application::find($id);
        return view('common.application.view', compact('application'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        Check("ApplicationUpdate");

        Notification('<b>'.auth::user()->name.'</b> has update application status to <b>'.$request->status.'</b>', 'Agent');


        $application = Application::find($id);
        $application->status = $request->status;
        $application->payment_status = $request->payment_status;
        $application->remarks = $request->remarks;

        if ($request->hasFile('document')) 
        {
            $file1 = 'application-document-'.time().'.'.$request->document->extension();
            $request->document->storeAs('/application/document/', $file1, 'my_files');
            $application->document = $file1;
        }
        else
        {
            $application->document = $application->document;
        }



        $application->save();
        return redirect()->back()->with('flash_message_success','Application Update Successfully...');
    }
    public function view_course ($id)
    {
        error_reporting(0);
        $courses = Course::get();
        $course = Course::find($id);
        $campuses = Campus::get();
        $intakes = Intake::where('course_id', $course->id)->get();
        foreach ($campuses as $key => $value)
        {
            $university = University::find($value->university_id);
            $campuses[$key]->university_id = $university->id;
            $campuses[$key]->university_name = $university->name;
        }

        // $campuses = json_decode(json_encode($campuses));
        // echo "<pre>";   print_r($campuses); die();
        return view('common.course.view', compact('campuses', 'course', 'intakes', 'courses'));
    }


   public function delete($id)
    {
        Check('ApplicationDelete');
        Application::find($id)->delete();
        return redirect()->back()->with('flash_message_success','Application Delete Successfully...');
    }
    
}
