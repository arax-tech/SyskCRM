<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Country;
use App\State;
use App\City;
use App\User;
use Auth;


class StateAndCityController extends Controller
{
    public function index()
    {
        error_reporting(0);
        return view('admin.state-and-city.index');
    }








    public function state_store(Request $request)
    {
        // dd($request->all());
        $state = New State();
        $state->country_id = $request->country_id;
        $state->name = $request->name;
        $state->save();
        return redirect()->back()->with('flash_message_success','State Create Successfully...');
    }

    public function city_store(Request $request)
    {
        // dd($request->all());
        $city = New City();
        $city->country_id = $request->country;
        $city->state_id = $request->state;
        $city->name = $request->name;
        $city->save();
        return redirect()->back()->with('flash_message_success','City Create Successfully...');
    }



    
}
