<?php

namespace App\Http\Controllers\Agent;

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
        $students = Student::where('agent_id', auth::user()->id)->get();
        
        $campuses = Campus::get();
        foreach ($campuses as $key => $value)
        {
            $university = University::find($value->university_id);
            $campuses[$key]->university_id = $university->id;
            $campuses[$key]->university_name = $university->name;
        }

        return view('agent.application.index', compact('students', 'campuses'));
    }

    
    public function getCourses($id)
    {
        $courses = DB::table('courses')->where('campus_name',$id)->pluck('course_name','id');
        return json_encode($courses);
    }

    public function getCourseDetail($id)
    {
        $course = DB::table('courses')->where('id',$id)->first();
        $intakes = Intake::where(['course_id' => $id, 'status' => 'Active'])->get();
        return response()->json([
            $course,
            $intakes,
        ]);
    }


    public function create()
    {
        error_reporting(0);
        $students = Student::where('agent_id', auth::user()->id)->get();
        $applications = Application::where('agent_id', auth::user()->id)->get();

        $universities = University::whereIn('id', explode(",", auth::user()->universities))->pluck('id');
        
        $campuses = Campus::whereIn('university_id', $universities)->get();

        foreach ($campuses as $key => $value)
        {
            $university = University::find($value->university_id);
            $campuses[$key]->university_id = $university->id;
            $campuses[$key]->university_name = $university->name;
        }

        return view('agent.application.create', compact('students', 'campuses', 'applications'));
    }

    public function store (Request $request)
    {

        Check('ApplicationCreate');

        $student = Student::find($request->student_id);
        Notification('<b>'.auth::user()->name.'</b> has create new application for <b>'.$student->firs_name.' '.$student->last_name.'</b> Student', 'Admin');
        // dd($request->all());
        $application = New Application();
        $application->agent_id = auth::user()->id;
        $application->student_id = $request->student_id;
        $application->campus_id = $request->campus_id;
        $application->course_id = $request->course_id;
        $application->intake_id = $request->intake;
        $application->year = $request->year;
        $application->tuition_fee = $request->tuition_fee;
        $application->application_fee = $request->application_fee;
        $application->commission_fee = $request->commission_fee;
        $application->save();


        $application_id = DB::getPdo()->lastInsertId();

        return redirect('/agent/application/create?application='.$application_id);
    }


    public function edit($id)
    {
        error_reporting(0);
        $students = Student::where('agent_id', auth::user()->id)->get();
        $application = Application::where('id', $id)->first();
        $applications = Application::where('agent_id', auth::user()->id)->get();
        $campuses = Campus::get();
        foreach ($campuses as $key => $value)
        {
            $university = University::find($value->university_id);
            $campuses[$key]->university_id = $university->id;
            $campuses[$key]->university_name = $university->name;
        }

        return view('agent.application.edit', compact('students', 'campuses', 'applications', 'application'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        error_reporting(0);
         $student = Student::find($request->student_id);
        Notification('<b>'.auth::user()->name.'</b> has update application for <b>'.$student->firs_name.' '.$student->last_name.'</b> Student', 'Admin');
        // dd($request->all());
        $application = Application::find($id);
        $application->student_id = $request->student_id;
        $application->campus_id = $request->campus_id;
        $application->course_id = $request->course_id;
        $application->intake_id = $request->intake;
        $application->year = $request->year;
        $application->tuition_fee = $request->tuition_fee;
        $application->application_fee = $request->application_fee;
        $application->commission_fee = $request->commission_fee;
        $application->save();



        return redirect('agent/application')->with('flash_message_success','Application Update Successfully...');
    }

   

   public function redirect()
   {
       return redirect('/agent/application')->with('flash_message_success','Apply Successfully...');
   }

    public function view($id)
    {
        $application = Application::find($id);
        return view('common.application.view', compact('application'));
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


    public function view_campus($id)
    {
        $campus = Campus::find($id);
        return view('common.campus.view',compact('campus'));
    }


    public function view_university($id)
    {
        $university = University::find($id);
        return view('common.university.view',compact('university'));
    }



    
    
}
