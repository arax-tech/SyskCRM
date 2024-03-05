<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Application;
use App\Student;
use App\User;
use Auth;
use DB;

class StudentController extends Controller
{
    public function index()
    {
        error_reporting(0);
        Check('StudentView');
        $students = Student::where('agent_id', auth::user()->id)->get();
        return view('common.student.index', compact('students'));
    }

    public function type()
    {
        return view('common.student.type');
    }


    public function create()
    {
        Check('StudentCreate');
        $countries = DB::table('countries')->get();
        return view('common.student.create', compact('countries'));
    }
    

    public function store (Request $request)
    {




        $validatedData = $request->validate([
            'title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'passport_number' => 'required',
            'passport_expiry_date' => 'required',
            'email_address' => 'required',
            'contact_number' => 'required',
            'permanent_address_line_one' => 'required',
            'permanent_address_line_two' => 'required',
            'permanent_address_country' => 'required',
            'permanent_address_state' => 'required',
            'permanent_address_city' => 'required',
            'permanent_address_pincode' => 'required',
            'communication_address_line_one' => 'required',
            'communication_address_line_two' => 'required',
            'communication_address_country' => 'required',
            'communication_address_state' => 'required',
            'communication_address_city' => 'required',
            'communication_address_pincode' => 'required',
            'emergency_contact_number' => 'required',
            'qualification1_course_title' => 'required',
            'qualification1_course_level' => 'required',
            'qualification1_course_duration' => 'required',
            'qualification1_university_or_organisation' => 'required',
            'qualification1_medium_of_education' => 'required',
            'qualification1_grade' => 'required',
            'qualification1_year_of_passing' => 'required',
            'photograph' => 'required',
            'passport' => 'required',
            'address_proof' => 'required',
            'qualifications' => 'required'
        ]);

        // dd($request->all());

        

        $student = New Student();
        $student->registration_number = rand(3200000,4500000);
        $student->agent_id = auth::user()->id;
        $student->title = $request->title;
        $student->type = $request->type;
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->last_name = $request->last_name;
        $student->date_of_birth = $request->date_of_birth;
        $student->gender = $request->gender;
        $student->nationality = $request->nationality;
        $student->passport_number = $request->passport_number;
        $student->passport_expiry_date = $request->passport_expiry_date;
        $student->share_code = $request->share_code;
        $student->share_code_expiry_date = $request->share_code_expiry_date;
        $student->is_valid = $request->is_valid;
        $student->email_address = $request->email_address;
        $student->contact_number = $request->contact_number;
        $student->permanent_address_line_one = $request->permanent_address_line_one;
        $student->permanent_address_line_two = $request->permanent_address_line_two;
        $student->permanent_address_country = $request->permanent_address_country;
        $student->permanent_address_state = $request->permanent_address_state;
        $student->permanent_address_city = $request->permanent_address_city;
        $student->permanent_address_pincode = $request->permanent_address_pincode;
        $student->communication_address_line_one = $request->communication_address_line_one;
        $student->communication_address_line_two = $request->communication_address_line_two;
        $student->communication_address_country = $request->communication_address_country;
        $student->communication_address_state = $request->communication_address_state;
        $student->communication_address_city = $request->communication_address_city;
        $student->communication_address_pincode = $request->communication_address_pincode;
        $student->emergency_contact_name = $request->emergency_contact_name;
        $student->emergency_contact_relationship = $request->emergency_contact_relationship;
        $student->emergency_contact_number = $request->emergency_contact_number;
        $student->qualification1_course_title = $request->qualification1_course_title;
        $student->qualification1_course_level = $request->qualification1_course_level;
        $student->qualification1_course_duration = $request->qualification1_course_duration;
        $student->qualification1_university_or_organisation = $request->qualification1_university_or_organisation;
        $student->qualification1_medium_of_education = $request->qualification1_medium_of_education;
        $student->qualification1_grade = $request->qualification1_grade;
        $student->qualification1_year_of_passing = $request->qualification1_year_of_passing;
        $student->qualification2_course_title = $request->qualification2_course_title;
        $student->qualification2_course_level = $request->qualification2_course_level;
        $student->qualification2_course_duration = $request->qualification2_course_duration;
        $student->qualification2_university_or_organisation = $request->qualification2_university_or_organisation;
        $student->qualification2_medium_of_education = $request->qualification2_medium_of_education;
        $student->qualification2_grade = $request->qualification2_grade;
        $student->qualification2_year_of_passing = $request->qualification2_year_of_passing;
        $student->test_name = $request->test_name;
        $student->over_all_socre = $request->over_all_socre;
        $student->speaking = $request->speaking;
        $student->listening = $request->listening;
        $student->reading = $request->reading;
        $student->writing = $request->writing;
        $student->english_level = $request->english_level;
        $student->student_finance = $request->student_finance;
        $student->cnr_no = $request->cnr_no;
        $student->job_title = $request->job_title;
        $student->company_name = $request->company_name;
        $student->years_of_experience = $request->years_of_experience;
        

        if ($request->hasFile('photograph')) 
        {
            $file1 = $request->first_name.'-'.time().'.'.$request->photograph->extension();
            $request->photograph->storeAs('/student/document/', $file1, 'my_files');
            $student->photograph = $file1;
        }


        if ($request->hasFile('passport')) 
        {
            $file2 = $request->first_name.'-'.time().'.'.$request->passport->extension();
            $request->passport->storeAs('/student/document/', $file2, 'my_files');
            $student->passport = $file2;
        }


        if ($request->hasFile('address_proof')) 
        {
            $file3 = $request->first_name.'-'.time().'.'.$request->address_proof->extension();
            $request->address_proof->storeAs('/student/document/', $file3, 'my_files');
            $student->address_proof = $file3;
        }


        if ($request->hasFile('qualifications')) 
        {
            $file4 = $request->first_name.'-'.time().'.'.$request->qualifications->extension();
            $request->qualifications->storeAs('/student/document/', $file4, 'my_files');
            $student->qualifications = $file4;
        }


        if ($request->hasFile('work_experience')) 
        {
            $file5 = $request->first_name.'-'.time().'.'.$request->work_experience->extension();
            $request->work_experience->storeAs('/student/document/', $file5, 'my_files');
            $student->work_experience = $file5;
        }



        if ($request->hasFile('cv')) 
        {
            $file6 = $request->first_name.'-'.time().'.'.$request->cv->extension();
            $request->cv->storeAs('/student/document/', $file6, 'my_files');
            $student->cv = $file6;
        }


        if ($request->hasFile('personal_statement')) 
        {
            $file7 = $request->first_name.'-'.time().'.'.$request->personal_statement->extension();
            $request->personal_statement->storeAs('/student/document/', $file7, 'my_files');
            $student->personal_statement = $file7;
        }


        if ($request->hasFile('any_other_supporting_documents')) 
        {
            $file8 = $request->first_name.'-'.time().'.'.$request->any_other_supporting_documents->extension();
            $request->any_other_supporting_documents->storeAs('/student/document/', $file8, 'my_files');
            $student->any_other_supporting_documents = $file8;
        }

        $student->save();

        Notification('<b>'.auth::user()->name.'</b> has create <b>'.$request->first_name.' '.$request->last_name.'</b> Student', 'Admin');
        return redirect('/agent/student')->with('flash_message_success', 'Student Create Successfully...');
    }
   

    public function view($id)
    {
        $student = Student::find($id);
        $applications = Application::where('student_id', $student->id)->get();
        return view('common.student.view', compact('student', 'applications'));
    }

    public function edit($id)
    {
        $student = Student::find($id);
        $countries = DB::table('countries')->get();
        return view('common.student.edit', compact('countries', 'student'));
    }

    public function update (Request $request, $id)
    {




        $validatedData = $request->validate([
            'title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'passport_number' => 'required',
            'email_address' => 'required',
            'contact_number' => 'required',
            'permanent_address_line_one' => 'required',
            'permanent_address_line_two' => 'required',
            'permanent_address_country' => 'required',
            'permanent_address_state' => 'required',
            'permanent_address_city' => 'required',
            'permanent_address_pincode' => 'required',
            'communication_address_line_one' => 'required',
            'communication_address_line_two' => 'required',
            'communication_address_country' => 'required',
            'communication_address_state' => 'required',
            'communication_address_city' => 'required',
            'communication_address_pincode' => 'required',
            'emergency_contact_number' => 'required',
            'qualification1_course_title' => 'required',
            'qualification1_course_level' => 'required',
            'qualification1_course_duration' => 'required',
            'qualification1_university_or_organisation' => 'required',
            'qualification1_medium_of_education' => 'required',
            'qualification1_grade' => 'required',
            'qualification1_year_of_passing' => 'required',
        ]);

        // dd($request->all());

        

        $student = Student::find($id);
        $student->title = $request->title;
        $student->type = $request->type;
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->last_name = $request->last_name;
        $student->date_of_birth = $request->date_of_birth;
        $student->gender = $request->gender;
        $student->nationality = $request->nationality;
        $student->passport_number = $request->passport_number;
        $student->email_address = $request->email_address;
        $student->contact_number = $request->contact_number;
        $student->permanent_address_line_one = $request->permanent_address_line_one;
        $student->permanent_address_line_two = $request->permanent_address_line_two;
        $student->permanent_address_country = $request->permanent_address_country;
        $student->permanent_address_state = $request->permanent_address_state;
        $student->permanent_address_city = $request->permanent_address_city;
        $student->permanent_address_pincode = $request->permanent_address_pincode;
        $student->communication_address_line_one = $request->communication_address_line_one;
        $student->communication_address_line_two = $request->communication_address_line_two;
        $student->communication_address_country = $request->communication_address_country;
        $student->communication_address_state = $request->communication_address_state;
        $student->communication_address_city = $request->communication_address_city;
        $student->communication_address_pincode = $request->communication_address_pincode;
        $student->emergency_contact_name = $request->emergency_contact_name;
        $student->emergency_contact_relationship = $request->emergency_contact_relationship;
        $student->emergency_contact_number = $request->emergency_contact_number;
        $student->qualification1_course_title = $request->qualification1_course_title;
        $student->qualification1_course_level = $request->qualification1_course_level;
        $student->qualification1_course_duration = $request->qualification1_course_duration;
        $student->qualification1_university_or_organisation = $request->qualification1_university_or_organisation;
        $student->qualification1_medium_of_education = $request->qualification1_medium_of_education;
        $student->qualification1_grade = $request->qualification1_grade;
        $student->qualification1_year_of_passing = $request->qualification1_year_of_passing;
        $student->qualification2_course_title = $request->qualification2_course_title;
        $student->qualification2_course_level = $request->qualification2_course_level;
        $student->qualification2_course_duration = $request->qualification2_course_duration;
        $student->qualification2_university_or_organisation = $request->qualification2_university_or_organisation;
        $student->qualification2_medium_of_education = $request->qualification2_medium_of_education;
        $student->qualification2_grade = $request->qualification2_grade;
        $student->qualification2_year_of_passing = $request->qualification2_year_of_passing;
        $student->test_name = $request->test_name;
        $student->over_all_socre = $request->over_all_socre;
        $student->speaking = $request->speaking;
        $student->listening = $request->listening;
        $student->reading = $request->reading;
        $student->writing = $request->writing;
        $student->english_level = $request->english_level;
        $student->job_title = $request->job_title;
        $student->company_name = $request->company_name;
        $student->years_of_experience = $request->years_of_experience;
        
        $student->application_status = $request->application_status;
        $student->admission_status = $request->admission_status;
        $student->visa_status = $request->visa_status;
        $student->enrolment_status = $request->enrolment_status;
        

        if ($request->hasFile('photograph')) 
        {
            $file1 = $request->first_name.'-'.time().'.'.$request->photograph->extension();
            $request->photograph->storeAs('/student/document/', $file1, 'my_files');
            $student->photograph = $file1;
        }else{
            $student->photograph = $student->photograph;
        }


        if ($request->hasFile('passport')) 
        {
            $file2 = $request->first_name.'-'.time().'.'.$request->passport->extension();
            $request->passport->storeAs('/student/document/', $file2, 'my_files');
            $student->passport = $file2;
        }else{
            $student->passport = $student->passport;
        }


        if ($request->hasFile('address_proof')) 
        {
            $file3 = $request->first_name.'-'.time().'.'.$request->address_proof->extension();
            $request->address_proof->storeAs('/student/document/', $file3, 'my_files');
            $student->address_proof = $file3;
        }else{
            $student->address_proof = $student->address_proof;
        }


        if ($request->hasFile('qualifications')) 
        {
            $file4 = $request->first_name.'-'.time().'.'.$request->qualifications->extension();
            $request->qualifications->storeAs('/student/document/', $file4, 'my_files');
            $student->qualifications = $file4;
        }else{
            $student->qualifications = $student->qualifications;
        }


        if ($request->hasFile('work_experience')) 
        {
            $file5 = $request->first_name.'-'.time().'.'.$request->work_experience->extension();
            $request->work_experience->storeAs('/student/document/', $file5, 'my_files');
            $student->work_experience = $file5;
        }else{
            $student->work_experience = $student->work_experience;
        }



        if ($request->hasFile('cv')) 
        {
            $file6 = $request->first_name.'-'.time().'.'.$request->cv->extension();
            $request->cv->storeAs('/student/document/', $file6, 'my_files');
            $student->cv = $file6;
        }else{
            $student->cv = $student->cv;
        }


        if ($request->hasFile('personal_statement')) 
        {
            $file7 = $request->first_name.'-'.time().'.'.$request->personal_statement->extension();
            $request->personal_statement->storeAs('/student/document/', $file7, 'my_files');
            $student->personal_statement = $file7;
        }else{
            $student->personal_statement = $student->personal_statement;
        }


        if ($request->hasFile('any_other_supporting_documents')) 
        {
            $file8 = $request->first_name.'-'.time().'.'.$request->any_other_supporting_documents->extension();
            $request->any_other_supporting_documents->storeAs('/student/document/', $file8, 'my_files');
            $student->any_other_supporting_documents = $file8;
        }else{
            $student->any_other_supporting_documents = $student->any_other_supporting_documents;
        }

        $student->save();

        Notification('<b>'.auth::user()->name.'</b> has update <b>'.$request->first_name.' '.$request->last_name.'</b> Student', 'Admin');
        return redirect('/agent/student')->with('flash_message_success', 'Student Update Successfully...');
    }
    
}
