<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Product;
use Auth;
use Image;
class AgentsController extends Controller
{
    public function index()
    {
        Check('AgentView');
        error_reporting(0);
        $agents = User::whereNotNull('agent_id')->where(['role' => 'Agent', 'agent_id' => auth::user()->id])->get();
        return view('agent.agent.index', compact('agents'));
    }

    public function create ()
    {
        Check('AgentCreate');
        return view('agent.agent.create');
    }




    public function store (Request $request)
    {
        // dd($request->all());

        $user_count = User::where('email',$request->email)->count();
        if ($user_count>0)
        {
            return redirect()->back()->with('flash_message_error','Email is Already Taken Please Use Another Email...');
        }

        $agent = new User();
        $agent->agent_id = auth::user()->id;
        $agent->name = $request->name;
        $agent->email = $request->email;
        $agent->designation = $request->designation;
        $agent->password = Hash::make($request->password);
        
        if ($request->permissions == null)
        {
            $agent->permissions = null;
        }else{
            $agent->permissions = implode(",", $request->permissions);
        }

        $agent->role = 'Agent';
        $agent->status = $request->status;

        if ($request->hasFile('profile')) 
        {
            $file1 = 'agent-'.time().'.'.$request->profile->extension();
            $request->profile->storeAs('/profile/', $file1, 'my_files');
            $agent->image = $file1;
        }

        $agent->save();
        return redirect('/agent/agent')->with('flash_message_success','Agent Create Successfully...');
    }
   
    public function edit($id)
    {
        Check('AgentUpdate');
        $agent = User::find($id);
        return view('agent.agent.edit', compact('agent'));
    }
    public function update (Request $request, $id)
    {
        // dd($request->all());

        $agent = User::find($id);
        $agent->name = $request->name;
        $agent->email = $request->email;
        $agent->designation = $request->designation;
        if ($request->password) {
            $agent->password = Hash::make($request->password);
        }
        
        if ($request->permissions == null)
        {
            $agent->permissions = null;
        }else{
            $agent->permissions = implode(",", $request->permissions);
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
        return redirect('/agent/agent')->with('flash_message_success','Agent Update Successfully...');
        

    }   

    

    public function delete($id)
    {
        Check('AgentDelete');
        User::find($id)->delete();
        return redirect()->back()->with('flash_message_success', 'Agent Delete Successfully...');
    }
    
}
