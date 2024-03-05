<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentInfo;
use App\Exports\ExportStudentInfo;

use App\Setting;
use App\Agent;
use App\Course;
use App\Interview;
use App\Student;
use App\Comment;
use App\User;
use Auth;
use DB;

class CommonController extends Controller
{

    public function comment(Request $request)
    {
        // dd($request->all());
        $comment = new Comment();
        $comment->user_id = auth::user()->id;
        $comment->application_id = $request->application_id;
        $comment->comment = $request->comment;

        if ($request->hasFile('documentInput')){
            $file1 = 'document-'.time().'.'.$request->documentInput->extension();
            $request->documentInput->storeAs('/document/', $file1, 'my_files');
            $comment->document = $file1;
        }
        $comment->save();
        return response()->json('Comment Successfully...');
        
    }

    public function getState($id)
    {
        $states = DB::table('states')->where('country_id',$id)->pluck('name','id');
        return json_encode($states);
    }

    public function getCommnets($id)
    {
        error_reporting(0);

        $comments = DB::table('comments')
           ->join('users', 'comments.user_id', '=', 'users.id')
           ->select('comments.*','users.name', 'users.image', 'users.designation')
           ->where('comments.application_id', '=', $id)
           ->get();
        return response()->json($comments);
    }

    public function getCity(Request $request)
    {
        $cities = DB::table('cities')->where('state_id',$request->stateId)->pluck('name','id');
        return json_encode($cities);
    }



    public function schedule_interview(Request $request)
    {
        // dd($request->all());
        $intervew = new Interview();
        $intervew->creator = auth::user()->id;
        $intervew->interview_type = $request->interview_type;
        $intervew->student_id = $request->student_id;
        $intervew->date_and_time = $request->date_and_time;
        $intervew->remarks = $request->remarks;
        $intervew->status = $request->status;
        $intervew->save();
        return redirect()->back()->with('flash_message_success','Interview Create Successfully...');
    }

    public function schedule_interview_udpate(Request $request, $id)
    {
        // dd($request->all());
        $intervew = Interview::find($id);
        $intervew->interview_type = $request->interview_type;
        $intervew->student_id = $request->student_id;
        $intervew->date_and_time = $request->date_and_time;
        $intervew->remarks = $request->remarks;
        $intervew->status = $request->status;
        $intervew->save();
        return redirect()->back()->with('flash_message_success','Interview Update Successfully...');
    }

    public function update_status(Request $request, $id)
    {
        Notification('<b>'.auth::user()->name.'</b> has update admission status to <b>'.$request->admission_status.'</b>', 'Agent');
        // dd($request->all());
        $student = Student::find($id);
        $student->application_status = $request->application_status;
        $student->admission_status = $request->admission_status;
        $student->visa_status = $request->visa_status;
        $student->enrolment_status = $request->enrolment_status;
        $student->save();
        return redirect()->back()->with('flash_message_success','Status Update Successfully...');
    }

    public function shortlist(Request $request)
    {
        $courses = Course::whereIn('id', $request->shortlist)->get();
        return view('common.shortlist.index', compact('courses'));
    }


    public function export() 
    {
        return Excel::download(new StudentInfo, 'student.xlsx');

    }

    public function export_student() 
    {
        return Excel::download(new ExportStudentInfo, 'student.xlsx');

    }

    public function setting(Request $request)
    {
        $setting = Setting::find(1);
        if ($request->isMethod('POST'))
        {
            // dd($request->all());
            $setting = Setting::find(1);
            $setting->facebook = $request->facebook;
            $setting->youtube = $request->youtube;
            $setting->google_plus = $request->google_plus;
            $setting->twitter = $request->twitter;
            $setting->instagram = $request->instagram;
            $setting->pinterest = $request->pinterest;


            if ($request->hasFile('logo')){
                $file1 = 'logo-'.time().'.'.$request->logo->extension();
                $request->logo->storeAs('/logo/', $file1, 'my_files');
                $setting->logo = $file1;
            }else{
                $setting->logo = $setting->logo;
            }

            if ($request->hasFile('login_background')){
                $file1 = 'login_background-'.time().'.'.$request->login_background->extension();
                $request->login_background->storeAs('/login_background/', $file1, 'my_files');
                $setting->login_background = $file1;
            }else{
                $setting->login_background = $setting->login_background;
            }
            $setting->save();
            return redirect()->back()->with('flash_message_success','Setting Update Successfully...');

        }
        return view('common.setting', compact('setting'));
    }
}
