<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Application;
use App\User;
use Auth;


class AgentController extends Controller
{
    public function dashboard()
    {
        error_reporting(0);
        $PendingApplication = Application::where('status', 'Pending')->where('agent_id', auth::user()->id)->count();
        $AcceptedApplication = Application::where('status', 'Accepted')->where('agent_id', auth::user()->id)->count();
        $RejectedApplication = Application::where('status', 'Rejected')->where('agent_id', auth::user()->id)->count();
        $PaidApplication = Application::where('payment_status', 'Paid')->where('agent_id', auth::user()->id)->count();
        $UnPaidApplication = Application::where('payment_status', 'UnPaid')->where('agent_id', auth::user()->id)->count();
        return view('agent.dashboard', compact('PendingApplication', 'AcceptedApplication', 'RejectedApplication', 'PaidApplication', 'UnPaidApplication'));
    }

    public function profile(Request $request)
    {
        if ($request->isMethod('POST'))
        {

            // dd($request->all());
            $agent = User::find(Auth::user()->id);
            
            $agent->name = $request->name;
            $agent->email = $request->email;

            if ($request->hasFile('profile')) 
            {
                error_reporting(0);
                unlink(public_path().'/backend/profile/'.$agent->image);


                $file1 = 'admin-'.time().'.'.$request->profile->extension();
                $request->profile->storeAs('/profile/', $file1, 'my_files');
                $agent->image = $file1;
            }
            else
            {
                $agent->image = $agent->image;
            }


            
            $agent->save();  
            return redirect()->back()->with('flash_message_success', 'Profile Update Successfully');

        }
        return view('agent.profile');
    }

    public function universities_request(Request $request)
    {
        $agent = User::find(auth::user()->id);
        $agent->universities_request = implode(",", $request->universities_request);
        $agent->save();
        return redirect()->back()->with('flash_message_success','Universities Requested Successfully...');
    }
    public function bank_info(Request $request)
    {
        
        // dd($request->all());
        $agent = User::find(Auth::user()->id);
        
        $agent->bank_name = $request->bank_name;
        $agent->bank_address = $request->bank_address;
        $agent->institution_number = $request->institution_number;
        $agent->transit_number = $request->transit_number;
        $agent->account_number = $request->account_number;
        $agent->swift_code = $request->swift_code;
        $agent->comments = $request->comments;
        $agent->save();  
        return redirect()->back()->with('flash_message_success', 'Bank Info Update Successfully');

        
    }



    public function services(Request $request)
    {
        
        // dd($request->all());
        $agent = User::find(auth::user()->id);
        $agent->services_offered_to_students = implode(",", $request->services_offered_to_students);
        $agent->save();  
        return redirect()->back()->with('flash_message_success', 'Services Update Successfully');

        
    }

  


    

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('flash_message_success', 'Logout Successfully...');
    }
}
