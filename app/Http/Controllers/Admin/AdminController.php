<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Application;
use App\User;
use Auth;


class AdminController extends Controller
{
    public function dashboard()
    {
        error_reporting(0);
        $PendingApplication = Application::where('status', 'Pending')->count();
        $AcceptedApplication = Application::where('status', 'Accepted')->count();
        $RejectedApplication = Application::where('status', 'Rejected')->count();
        $PaidApplication = Application::where('payment_status', 'Paid')->count();
        $UnPaidApplication = Application::where('payment_status', 'UnPaid')->count();
        return view('admin.dashboard', compact('PendingApplication', 'AcceptedApplication', 'RejectedApplication', 'PaidApplication', 'UnPaidApplication'));
    }

    public function profile(Request $request)
    {
        if ($request->isMethod('POST'))
        {

            // dd($request->all());
            $admin = User::find(Auth::user()->id);
            
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->phone = $request->phone;

            if ($request->hasFile('profile')) 
            {
                error_reporting(0);
                unlink(public_path().'/backend/profile/'.$admin->image);


                $file1 = 'admin-'.time().'.'.$request->profile->extension();
                $request->profile->storeAs('/profile/', $file1, 'my_files');
                $admin->image = $file1;
            }
            else
            {
                $admin->image = $admin->image;
            }


            
            $admin->save();  
            return redirect()->back()->with('flash_message_success', 'Profile Update Successfully');

        }
        return view('admin.profile');
    }

  


    

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('flash_message_success', 'Logout Successfully...');
    }
}
