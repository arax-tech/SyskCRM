<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\University;
use App\Campus;
use App\Course;
use App\Intake;
use App\User;
use Auth;
use DB;


class CourseController extends Controller
{
    public function index()
    {
        Check('CourseView');
        $courses = Course::get();
        return view('admin.course.index', compact('courses'));
    }

    public function create ()
    {
        Check('CourseCreate');
        error_reporting(0);
        $campuses = Campus::get();
        foreach ($campuses as $key => $value)
        {
            $university = University::find($value->university_id);
            $campuses[$key]->university_id = $university->id;
            $campuses[$key]->university_name = $university->name;
        }

        // $campuses = json_decode(json_encode($campuses));
        // echo "<pre>";   print_r($campuses); die();
        return view('admin.course.create', compact('campuses'));
    }

    public function view ($id)
    {
        Check('CourseView');
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
    public function store(Request $request)
    {

        // dd($request->all());
        $validatedData = $request->validate([
            'course_name' => 'required',
            'course_description' => 'required',
            'campus_name' => 'required',
            'tuition_fee' => 'required',
            'commission_fee' => 'required',
            'application_fee' => 'required',
            'fee_and_commission_currency' => 'required',
            'duration' => 'required',
            'degree_type' => 'required',
            'study_field' => 'required',
            'study_type' => 'required',
            'fees_per_year' => 'required',
            'year' => 'required',
            'status' => 'required',
            'education_requirement' => 'required',
            'test_name' => 'required',
            'over_all_socre' => 'required',
            'speaking' => 'required',
            'listening' => 'required',
            'reading' => 'required',
            'writing' => 'required'
        ]);
        // dd($request->all());

        $course = new Course();
        $course->course_name = $request->course_name;
        $course->course_description = $request->course_description;
        $course->campus_name = $request->campus_name;
        $course->tuition_fee = $request->tuition_fee;
        $course->commission_fee = $request->commission_fee;
        $course->application_fee = $request->application_fee;
        $course->fee_and_commission_currency = $request->fee_and_commission_currency;
        $course->duration = $request->duration;
        $course->degree_type = $request->degree_type;
        $course->study_field = $request->study_field;
        $course->study_type = $request->study_type;
        $course->fees_per_year = $request->fees_per_year;
        $course->year = $request->year;
        $course->status = $request->status;
        $course->education_requirement = $request->education_requirement;
        $course->test_name = $request->test_name;
        $course->over_all_socre = $request->over_all_socre;
        $course->speaking = $request->speaking;
        $course->listening = $request->listening;
        $course->reading = $request->reading;
        $course->writing = $request->writing;
        $course->save();

        $course_id = DB::getPdo()->lastInsertId();


        foreach ($request->intake_month as $key => $value)
        {
            if (!empty($value))
            {
                $data = $request->all();
                
                $intake = New Intake();

                $intake->course_id = $course_id;
                $intake->month = $value;
                $intake->year = $data['intake_year'][$key];
                $intake->start_date = $data['start_date'][$key];
                $intake->deadline = $data['deadline'][$key];
                $intake->status = $data['intake_status'][$key];

                $intake->save();

            }
        }

        return redirect('/admin/course')->with('flash_message_success','Course Create Successfully...');


    	
    }

    public function edit ($id)
    {
        Check('CourseUpdate');
        error_reporting(0);
        $course = Course::find($id);
        $campuses = Campus::get();
        foreach ($campuses as $key => $value)
        {
            $university = University::find($value->university_id);
            $campuses[$key]->university_id = $university->id;
            $campuses[$key]->university_name = $university->name;
        }

        // $campuses = json_decode(json_encode($campuses));
        // echo "<pre>";   print_r($campuses); die();
        return view('admin.course.edit', compact('campuses', 'course'));
    }



    public function update(Request $request, $id)
    {

        // dd($request->all());
        $validatedData = $request->validate([
            'course_name' => 'required',
            'course_description' => 'required',
            'campus_name' => 'required',
            'tuition_fee' => 'required',
            'commission_fee' => 'required',
            'application_fee' => 'required',
            'fee_and_commission_currency' => 'required',
            'duration' => 'required',
            'degree_type' => 'required',
            'study_field' => 'required',
            'study_type' => 'required',
            'fees_per_year' => 'required',
            'year' => 'required',
            'status' => 'required',
            'education_requirement' => 'required',
            'test_name' => 'required',
            'over_all_socre' => 'required',
            'speaking' => 'required',
            'listening' => 'required',
            'reading' => 'required',
            'writing' => 'required'
        ]);
        // dd($request->all());

        $course = Course::find($id);
        $course->course_name = $request->course_name;
        $course->course_description = $request->course_description;
        $course->campus_name = $request->campus_name;
        $course->tuition_fee = $request->tuition_fee;
        $course->commission_fee = $request->commission_fee;
        $course->application_fee = $request->application_fee;
        $course->fee_and_commission_currency = $request->fee_and_commission_currency;
        $course->duration = $request->duration;
        $course->degree_type = $request->degree_type;
        $course->study_field = $request->study_field;
        $course->study_type = $request->study_type;
        $course->fees_per_year = $request->fees_per_year;
        $course->year = $request->year;
        $course->status = $request->status;
        $course->education_requirement = $request->education_requirement;
        $course->test_name = $request->test_name;
        $course->over_all_socre = $request->over_all_socre;
        $course->speaking = $request->speaking;
        $course->listening = $request->listening;
        $course->reading = $request->reading;
        $course->writing = $request->writing;
        $course->save();

    

        return redirect('/admin/course')->with('flash_message_success','Course Update Successfully...');


        
    }



    public function delete($id)
    {
        Check('CourseDelete');
        Course::find($id)->delete();
        Intake::where('course_id', $id)->delete();
        return redirect('/admin/course')->with('flash_message_success','Course Delete Successfully...');
    }

}
