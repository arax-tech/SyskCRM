<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Product;
use Auth;
use Image;
class AgancyController extends Controller
{
    public function index()
    {
        error_reporting(0);
        $users = User::orderBy('id', 'DESC')->get();
        return view('agent.agancy.index', compact('users'));
        

    }



    public function profile($id)
    {
        $user = User::find($id);
        // dd($user);
        $products = Product::where('user_id', $id)->paginate(9);
        // dd($products);
        return view('user.user.profile', compact('user', 'products'));
    }


    public function store (Request $request)
    {
        // dd($request->all());

        /*Check Email*/
        $user_count = User::where('email',$request->email)->count();
        if ($user_count>0)
        {
            return redirect()->back()->with('flash_message_error','Email is Already Taken Please Use Another Email...');
        }

        $user = New User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->verification_code = null;
        $user->isVerified = 1;

        if ($request->hasFile('profile')) 
        {
            $file1 = 'user-'.time().'.'.$request->profile->extension();
            $request->profile->storeAs('/profile/', $file1, 'my_files');
            $user->image = $file1;
        }
        else
        {
            $user->image = '';
        }

        $user->save();

        return redirect()->back()->with('flash_message_success', 'User Create Successfully...');
    }
   

    public function update (Request $request, $id)
    {
        // dd($request->all());

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->status = $request->status;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->role = $request->role;

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
        return redirect()->back()->with('flash_message_success', 'User Update Successfully...');
    }

    

    public function delete($id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('flash_message_success', 'User Delete Successfully...');
    }
    
}
