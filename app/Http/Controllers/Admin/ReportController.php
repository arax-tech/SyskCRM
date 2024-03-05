<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Country;
use App\State;
use App\User;
use Auth;


class ReportController extends Controller
{
    public function index()
    {
        error_reporting(0);
        return view('admin.report.index');
    }

    public function country_store(Request $request)
    {
        $country = New Country();
        $country->name = $request->country;
        $country->save();
        return redirect()->back()->with('flash_message_success','Country Create Successfully...');
    }


    public function country_update (Request $request, $id)
    {
        $country = Country::find($id);
        $country->name = $request->country;
        $country->save();
        return redirect()->back()->with('flash_message_success','Country Update Successfully...');
    }

    public function country_delete($id)
    {
        Country::find($id)->delete();
        return redirect()->back()->with('flash_message_success','Country Delete Successfully...');
    }








    public function state_store(Request $request)
    {
        $state = New State();
        $state->country_id = $request->country_id;
        $state->name = $request->name;
        $state->save();
        return redirect()->back()->with('flash_message_success','State Create Successfully...');
    }


    public function state_udpate(Request $request, $id)
    {
        $state = State::find($id);
        $state->country_id = $request->country_id;
        $state->name = $request->name;
        $state->save();
        return redirect()->back()->with('flash_message_success','State Update Successfully...');
    }

    public function state_delete($id)
    {
        State::find($id)->delete();
        return redirect()->back()->with('flash_message_success','State Delete Successfully...');
    }



    
}
