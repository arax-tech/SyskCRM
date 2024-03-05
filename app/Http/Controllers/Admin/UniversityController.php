<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\University;
use App\Agent;
use App\User;
use Auth;
use DB;

class UniversityController extends Controller
{
    public function index()
    {
        Check('UniversityView');
        $universities = University::get();
        return view('admin.university.index', compact('universities'));
    }

    public function create ()
    {
        Check('UniversityCreate');
        $countries = DB::table('countries')->get();
        return view('admin.university.create', compact('countries'));
    }
    public function store(Request $request)
    {
    	// dd($request->all());
        $university = new University();
        $university->name = $request->name;
        $university->description = $request->description;
        $university->add_line_one = $request->add_line_one;
        $university->add_line_two = $request->add_line_two;
        $university->country = $request->country;
        $university->state = $request->state;
        $university->city = $request->city;
        $university->zip = $request->zip;

        if ($request->hasFile('logo')) 
        {
            $file1 = 'logo-'.time().'.'.$request->logo->extension();
            $request->logo->storeAs('/university/logo/', $file1, 'my_files');
            $university->logo = $file1;
        }


        $university->save();
        return redirect('/admin/university')->with('flash_message_success','University Create Successfully...');
    }

    public function view($id)
    {
        $university = University::find($id);
        return view('common.university.view',compact('university'));
    }

    public function edit($id)
    {
        Check('UniversityUpdate');
        $countries = DB::table('countries')->get();
        $university = University::find($id);
        return view('admin.university.edit',compact('university', 'countries'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $university = University::find($id);
        $university->name = $request->name;
        $university->description = $request->description;
        $university->add_line_one = $request->add_line_one;
        $university->add_line_two = $request->add_line_two;
        $university->country = $request->country;
        $university->state = $request->state;
        $university->city = $request->city;
        $university->zip = $request->zip;

        if ($request->hasFile('logo')) 
        {
            error_reporting(0);
            unlink(public_path().'/backend/university/logo/'.$university->logo);

            $file1 = 'logo-'.time().'.'.$request->logo->extension();
            $request->logo->storeAs('/university/logo/', $file1, 'my_files');
            $university->logo = $file1;
        }else{
            $university->logo = $university->logo;
        }


        $university->save();
        return redirect('/admin/university')->with('flash_message_success','University Update Successfully...');
    }



    public function delete($id)
    {
        Check('UniversityDelete');
        // dd($request->all());
        $university = University::find($id);

        error_reporting(0);
        unlink(public_path().'/backend/university/logo/'.$university->logo);

        $university->delete();
        return redirect('/admin/university')->with('flash_message_success','University Delete Successfully...');
    }

}
