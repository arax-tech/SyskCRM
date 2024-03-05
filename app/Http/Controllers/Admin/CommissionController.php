<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Commission;
use App\Application;

class CommissionController extends Controller
{
    public function index()
    {
    	Check('CommissionView');
        $commissions = Commission::get();
        return view('admin.commission.index', compact('commissions'));
    }

    public function store(Request $request)
    {
    	$commission = new Commission();
        $commission->from_university = $request->from_university;
        $commission->deducted_commision = $request->deducted_commision;
    	$commission->agent_id = $request->agent_id;
    	$commission->course_id = $request->course_id;
    	$commission->commission_amount = $request->commission_amount;
        $commission->status = $request->status;
    	$commission->university_status = $request->university_status;
    	$commission->save();
    	return redirect()->back()->with('flash_message_success','Commission Create Successfully...');

    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
    	$commission = Commission::find($id);
        $commission->from_university = $request->from_university;
        $commission->deducted_commision = $request->deducted_commision;
    	$commission->agent_id = $request->agent_id;
    	$commission->course_id = $request->course_id;
    	$commission->commission_amount = $request->commission_amount;
    	$commission->status = $request->status;
        $commission->university_status = $request->university_status;
    	$commission->save();
    	return redirect()->back()->with('flash_message_success','Commission Update Successfully...');

    }

    public function delete($id)
    {
    	Commission::find($id)->delete();
    	return redirect()->back()->with('flash_message_success','Commission Delete Successfully...');

    }


    

}
