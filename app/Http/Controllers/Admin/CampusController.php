<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\University;
use App\Campus;
use App\Agent;
use App\User;
use Auth;
use DB;

class CampusController extends Controller
{
    public function index()
    {
        Check('CampusView');
        $campuses = Campus::get();
        return view('admin.campus.index', compact('campuses'));
    }

    public function create ()
    {
        Check('CampusCreate');
        $universities = University::get();
        $countries = DB::table('countries')->get();
        return view('admin.campus.create', compact('countries', 'universities'));
    }
    public function store(Request $request)
    {
    	// dd($request->all());
        $campus = new Campus();
        $campus->university_id = $request->university;
        $campus->name = $request->name;
        $campus->description = $request->description;
        $campus->add_line_one = $request->add_line_one;
        $campus->add_line_two = $request->add_line_two;
        $campus->country = $request->country;
        $campus->state = $request->state;
        $campus->city = $request->city;
        $campus->zip = $request->zip;

        if ($request->hasFile('logo')) 
        {
            $file1 = 'logo-'.time().'.'.$request->logo->extension();
            $request->logo->storeAs('/university/campus/logo/', $file1, 'my_files');
            $campus->logo = $file1;
        }


        $campus->save();
        return redirect('/admin/campus')->with('flash_message_success','Campus Create Successfully...');
    }

    public function view($id)
    {
        $campus = Campus::find($id);
        return view('admin.campus.view',compact('campus'));
    }

    public function edit($id)
    {
        Check('CampusUpdate');
        $countries = DB::table('countries')->get();
        $universities = University::get();
        $campus = Campus::find($id);
        return view('admin.campus.edit',compact('campus', 'countries', 'universities'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $campus = Campus::find($id);
        $campus->university_id = $request->university;
        $campus->name = $request->name;
        $campus->description = $request->description;
        $campus->add_line_one = $request->add_line_one;
        $campus->add_line_two = $request->add_line_two;
        $campus->country = $request->country;
        $campus->state = $request->state;
        $campus->city = $request->city;
        $campus->zip = $request->zip;

        if ($request->hasFile('logo')) 
        {
            error_reporting(0);
            unlink(public_path().'/backend/university/campus/logo/'.$campus->logo);

            $file1 = 'logo-'.time().'.'.$request->logo->extension();
            $request->logo->storeAs('/university/campus/logo/', $file1, 'my_files');
            $campus->logo = $file1;
        }else{
            $campus->logo = $campus->logo;
        }


        $campus->save();
        return redirect('/admin/campus')->with('flash_message_success','Campus Update Successfully...');
    }



    public function delete($id)
    {
        Check('CampusDelete');
        // dd($request->all());
        $campus = Campus::find($id);

        error_reporting(0);
        unlink(public_path().'/backend/university/campus/logo/'.$university->logo);

        $campus->delete();
        return redirect('/admin/campus')->with('flash_message_success','Campus Delete Successfully...');
    }

}
