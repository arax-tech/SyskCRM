<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;


class AuthUserController extends Controller
{
    public function dashboard()
    {
        error_reporting(0);
    	return view('user.dashboard');
    }

    public function profile(Request $request)
    {
        if ($request->isMethod('POST'))
        {

            // dd($request->all());
            $user = User::find(Auth::user()->id);
            
            $user->name = $request->name;
            $user->email = $request->email;
            $user->company_name = $request->company_name;
            $user->mobile = $request->mobile;
            $user->website = $request->website;


            if ($request->hasFile('profile')) 
            {
                error_reporting(0);
                unlink(public_path().'/assets/profile/'.$user->image);


                $file1 = 'user-'.time().'.'.$request->profile->extension();
                $request->profile->storeAs('/profile/', $file1, 'my_files');
                $user->image = $file1;
            }
            else
            {
                $user->image = $user->image;
            }


            
            $user->save();
            return redirect()->back()->with('flash_message_success', 'Profile Update Successfully');

        }
        return view('user.profile');
    }

    public function view_profile($id)
    {
        $user = User::find($id);
        
        return view('profile', compact('user'));
    }

    public function edit_profile()
    {
        return view('user.edit-profile');
    }



    public function update_profile(Request $request)
    {
        // dd($request->all());
        $user = User::find(Auth::user()->id);
        
        $user->name = $request->name;
        $user->display_name = $request->display_name;
        $user->company_name = $request->company_name;
        $user->company_type = $request->company_type;
        $user->about = $request->about;
        $user->contact_person = $request->contact_person;
        $user->designation = $request->designation;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->office_number = $request->office_number;
        
        $user->address1 = $request->address1;
        $user->address2 = $request->address2;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->country = $request->country;
        $user->pincode = $request->pincode;
        $user->registration_number = $request->registration_number;
        $user->gst_number = $request->gst_number;
        $user->bank_name = $request->bank_name;
        $user->branch_name = $request->branch_name;
        $user->account_name = $request->account_name;
        $user->account_number = $request->account_number;
        $user->ifsc = $request->ifsc;
        
        if ($request->hasFile('profile')) 
        {
            error_reporting(0);
            unlink(public_path().'/assets/profile/'.$user->image);


            $file1 = 'user-'.time().'.'.$request->profile->extension();
            $request->profile->storeAs('/profile/', $file1, 'my_files');
            $user->image = $file1;
        }
        else
        {
            $user->image = $user->image;
        }

        if (auth::user()->role == "Ally"){
            
            $user->geographies = $request->geographies;
            $user->industries = $request->industries;
            $user->designations = $request->designations;
            $user->ideal_product = $request->ideal_product;
            $user->offers = $request->offers;

            if ($request->hasFile('appeal_video'))
            {
                $file1 = 'appeal-video-'.time().'.'.$request->appeal_video->extension();
                $request->appeal_video->storeAs('/user/videos/', $file1, 'my_files');
                $user->appeal_video = $file1;
            }else
            {
                $user->appeal_video = $user->appeal_video;
            }
        }

        
        $user->save();
        return redirect()->back()->with('flash_message_success', 'Profile Update Successfully');

    }

    

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('flash_message_success', 'Logout Successfully...');
    }
}
