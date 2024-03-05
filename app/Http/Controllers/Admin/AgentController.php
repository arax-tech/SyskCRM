<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\University;
use App\Agent;
use App\User;
use Auth;


class AgentController extends Controller
{
    public function index()
    {
        Check('AgentView');
        $universities = University::get();
        return view('admin.agent.index', compact('universities'));
    }

    public function view($id)
    {
        error_reporting(0);
        $agent = User::find($id);
        return view('admin.agent.view', compact('agent'));
    }

    public function update (Request $request, $id)
    {
        // dd($request->all());

        $agent = User::find($id);
        $agent->name = $request->name;
        $agent->email = $request->email;
        if ($request->password) {
            $agent->password = Hash::make($request->password);
        }
        
    

        $agent->status = $request->status;

        if ($request->hasFile('profile')) 
        {
            $file1 = 'agent-'.time().'.'.$request->profile->extension();
            $request->profile->storeAs('/profile/', $file1, 'my_files');
            $agent->image = $file1;
        }else{
            $agent->image = $agent->image;
        }

        $agent->save();
        return redirect()->back()->with('flash_message_success','Agent Update Successfully...');
        

    }   

    public function update_status(Request $request, $id)
    {
        Check('AgentUpdate');
        // dd($randPassword);
        $agent = Agent::find($id);
        // $agent->status = $request->status;
        // dd($agent);

        if ($request->status == 1)
        {
            
            $randPassword = rand(2800,3200);

            $user = New User();
            $user->rm_id = $request->rm_id;
            $user->agent_id = null;
            $user->table_id = $agent->id;
            $user->name = $agent->agent_company_name;
            $user->email = $agent->email;

            $check0 = User::where('email', $agent->email)->count();
            if ($check0 > 0)
            {
                return redirect()->back()->with('flash_message_success','Agent Email Already Taken...');            
            }


            $user->services_offered_to_students = $agent->services_offered_to_students;
            $user->status = 1;
            $user->password = Hash::make($randPassword);
            $user->role = 'Agent';
            $user->permissions = "All,AgentView,AgentCreate,AgentUpdate,AgentDelete,StudentView,StudentCreate,ApplicationView,ApplicationCreate,SearchProgramView,CommissionView";
            $user->new = 1;
            $user->save();


            $details = [
                    'status' => 1,
                    'name' => $agent->agent_company_name,
                    'password' => $randPassword,
                ];
               
            Mail::to($agent->email)->send(new \App\Mail\AgentStatusUpdate($details));



        }else{
            $details = [
                    'status' => 0,
                    'name' => $agent->agent_company_name,
                ];
               
            Mail::to($agent->email)->send(new \App\Mail\AgentStatusUpdate($details));
        }

        $agent->status = 1;
        $agent->save();
        return redirect()->back()->with('flash_message_success','Account Activate Successfully...');

    }


    public function universities(Request $request, $id)
    {
        // dd($id);
        // dd($request->all());
        Check('AgentUpdate');
        $agent = User::find($id);
        $agent->universities = implode(",", $request->universities);
        $agent->save();
        return redirect()->back()->with('flash_message_success','Universities Access Updated Successfully...');

    }



    public function delete($id)
    {
        // dd($id);
        Check('AgentDelete');
        $user = User::where('id',$id)->count();
        if ($user == 0){
            Agent::find($id)->delete();
        }else{
            User::find($id)->delete();
        }
        return redirect()->back()->with('flash_message_success','Account Delete Successfully...');

    }
}
