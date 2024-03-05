<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Auth;


class StaffController extends Controller
{
    public function index()
    {
        Check('StaffView');
        $admins = User::where('role', 'Admin')->get();
        return view('admin.staff.index', compact('admins'));
    }

    public function create()
    {
        Check('StaffCreate');
        return view('admin.staff.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());


        $user_count = User::where('email',$request->email)->count();
        if ($user_count>0)
        {
            return redirect()->back()->with('flash_message_error','Email is Already Taken Please Use Another Email...');
        }

        $staff = new User();
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->designation = $request->designation;
        $staff->phone = $request->phone;
        $staff->password = Hash::make($request->password);
        
        
        if ($request->designation == "Admin Manager") {
            $staff->permissions = "All,StaffView,StaffCreate,StaffUpdate,StaffDelete,AgentView,AgentUpdate,AgentDelete,StudentView,StudentCreate,StudentUpdate,StudentUpdateValidation,StudentUpdateInfo,StudentAddInterviewAndTraning,StudentUpdateInterviewPreparation,StudentUpdatePreCASofferInterview,StudentUpdateInterviewTraning,StudentUpdateVisaDetail,StudentUpdateSettlementDetail,StudentUpdateSFEDetail,StudentUpdateInternalTraning,StudentUpdateFee,StudentUpdateStatus,StudentDelete,IntakeView,IntakeCreate,IntakeUpdate,IntakeDelete,CourseView,CourseCreate,CourseUpdate,CourseDelete,ApplicationView,ApplicationUpdate,ApplicationDelete,CommissionView,CommissionCreate,CommissionUpdate,CommissionDelete,OfferfView,OfferfCreate,OfferfUpdate,OfferfDelete,UniversityView,UniversityCreate,UniversityUpdate,UniversityDelete,CampusView,CampusCreate,CampusUpdate,CampusDelete,ReportView,StateCityView,StateCityCreate,StateCityUpdate,StateCityDelete,SettingView,SettingUpdate";
        }else if ($request->designation == "Super Admin") {
            $staff->permissions = "All,StaffView,StaffCreate,StaffUpdate,StaffDelete,AgentView,AgentUpdate,AgentDelete,StudentView,StudentCreate,StudentUpdate,StudentUpdateValidation,StudentUpdateInfo,StudentAddInterviewAndTraning,StudentUpdateInterviewPreparation,StudentUpdatePreCASofferInterview,StudentUpdateInterviewTraning,StudentUpdateVisaDetail,StudentUpdateSettlementDetail,StudentUpdateSFEDetail,StudentUpdateInternalTraning,StudentUpdateFee,StudentUpdateStatus,StudentDelete,IntakeView,IntakeCreate,IntakeUpdate,IntakeDelete,CourseView,CourseCreate,CourseUpdate,CourseDelete,ApplicationView,ApplicationUpdate,ApplicationDelete,CommissionView,CommissionCreate,CommissionUpdate,CommissionDelete,OfferfView,OfferfCreate,OfferfUpdate,OfferfDelete,UniversityView,UniversityCreate,UniversityUpdate,UniversityDelete,CampusView,CampusCreate,CampusUpdate,CampusDelete,ReportView,StateCityView,StateCityCreate,StateCityUpdate,StateCityDelete,SettingView,SettingUpdate";
        }
        else if ($request->designation == "Student Counsellor") {
            $staff->permissions = "StudentView,CourseView,ApplicationView";
        }else{
            
            $staff->permissions = "StudentView,StudentCreate,StudentUpdate,CourseView,CourseCreate,CourseUpdate,ApplicationView,ApplicationUpdate";
        }


        $staff->role = 'Admin';
        $staff->status = $request->status;

        if ($request->hasFile('profile')) 
        {
            $file1 = 'staff-'.time().'.'.$request->profile->extension();
            $request->profile->storeAs('/profile/', $file1, 'my_files');
            $staff->image = $file1;
        }

        $staff->save();
        return redirect('/admin/staff')->with('flash_message_success','Staff Create Successfully...');
        

    }   


    public function edit ($id)
    {
        Check('StaffUpdate');
        $staff = User::find($id);
        return view('admin.staff.edit', compact('staff'));
    }

    
    public function update(Request $request, $id)
    {
        // dd($request->all());

        $staff = User::find($id);
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->phone = $request->phone;
        $staff->designation = $request->designation;
       
        $staff->permissions = implode(",", $request->permissions);
        
        if ($request->password) {
            $staff->password = Hash::make($request->password);
        }

        $staff->status = $request->status;

        if ($request->hasFile('profile')) 
        {
            $file1 = 'user-'.time().'.'.$request->profile->extension();
            $request->profile->storeAs('/profile/', $file1, 'my_files');
            $staff->image = $file1;
        }else{
            $staff->image = $staff->image;
        }

        $staff->save();
        // return redirect()->back()->with('flash_message_success','Staff Update Successfully...');
        return redirect('/admin/staff')->with('flash_message_success','Staff Update Successfully...');
        

    }   



    public function delete($id)
    {
        Check('StaffDelete');
        // dd($randPassword);
        User::find($id)->delete();
        return redirect()->back()->with('flash_message_success','Staff Delete Successfully...');

    }
}
