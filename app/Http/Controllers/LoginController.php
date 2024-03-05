<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Agent;
use App\Comment;
use App\User;
use Auth;
use DB;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        if (auth::check())
        {
            return redirect(strtolower(auth::user()->role).'/dashboard');
        }
        if ($request->isMethod("POST"))
        {
            // dd($request->all());
            
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            {
                return redirect(strtolower(auth::user()->role).'/dashboard')->with('flash_message_success', 'Welcome '.auth::user()->name.' !');
            }
            else
            {
                return redirect()->back()->with('flash_message_error', 'Invalid Email OR Password, Please try Again...');
            }           
        }

        

        return view('login');
    }


    public function register(Request $request)
    {
        if (auth::check())
        {
            return redirect('/dashboard');
        }
    	if ($request->isMethod("POST"))
        {
                error_reporting(0);


            $validatedData = $request->validate([
                'agent_company_name' => 'required',
                'company_type' => 'required',
                'address_line_1' => 'required',
                'address_line_2' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'pincode' => 'required',
                'website' => 'required',
                'email' => 'required',
                'contact_number' => 'required',
                'contact_first_name' => 'required',
                'contact_last_name' => 'required',
                'contact_gender' => 'required',
                'contact_nationality' => 'required',
                'contract_email_address' => 'required',
                'contract_contact_number' => 'required',
                // 'services_offered_to_students' => 'required',
            ]);
            // dd($request->all());
            
            /*Check Email*/
            $user_count = Agent::where('email',$request->email)->count();
            if ($user_count>0)
            {
                return redirect()->back()->with('flash_message_error','Email is Already Taken Please Use Another Email...');
            }

            $agent = New Agent();
            $agent->recruitment_type = $request->recruitment_type;
            $agent->agent_company_name = $request->agent_company_name;
            $agent->company_registration_number = $request->company_registration_number;
            $agent->year_of_establishment = $request->year_of_establishment;
            $agent->company_type = $request->company_type;
            $agent->address_line_1 = $request->address_line_1;
            $agent->address_line_2 = $request->address_line_2;
            $agent->city = $request->city;
            $agent->state = $request->state;
            $agent->country = $request->country;
            $agent->pincode = $request->pincode;
            $agent->website = $request->website;
            $agent->email = $request->email;
            $agent->contact_number = $request->contact_number;
            


            if ($request->hasFile('company_registration_document_evidence')) 
            {

                foreach ($request->company_registration_document_evidence as $key => $file) {
                    $time = $key+1 . time();
                    $file1 = 'document-'.$time.'.'.$file->extension();
                    $file->storeAs('/agent/document/', $file1, 'my_files');
                    $images[] = $file1;
                }


                $agent->company_registration_document_evidence = implode(",", $images);

                
            }



            
            $agent->contact_first_name = $request->contact_first_name;
            $agent->contact_last_name = $request->contact_last_name;
            $agent->contact_gender = $request->contact_gender;
            $agent->contact_nationality = $request->contact_nationality;
            $agent->contract_email_address = $request->contract_email_address;
            $agent->contract_contact_number = $request->contract_contact_number;
            

            if ($request->hasFile('contact_identity_proof_front')) 
            {
                $file2 = 'document-'.time().'.'.$request->contact_identity_proof_front->extension();
                $request->contact_identity_proof_front->storeAs('/agent/identity/', $file2, 'my_files');
                $agent->contact_identity_proof_front = $file2;
            }

            if ($request->hasFile('contact_identity_proof_back')) 
            {
                $file3 = 'document-'.time().'.'.$request->contact_identity_proof_back->extension();
                $request->contact_identity_proof_back->storeAs('/agent/identity/', $file3, 'my_files');
                $agent->contact_identity_proof_back = $file3;
            }


            if ($request->services_offered_to_students) {
                $agent->services_offered_to_students = implode(",", $request->services_offered_to_students);
            }
            $agent->do_you_charge_students_for_any_of_the_services = $request->do_you_charge_students_for_any_of_the_services;
            $agent->provide_details = $request->provide_details;
            $agent->ref1_university_or_nstitution_name = $request->ref1_university_or_nstitution_name;
            $agent->ref1_country = $request->ref1_country;
            $agent->ref1_contact_person = $request->ref1_contact_person;
            $agent->ref1_designation = $request->ref1_designation;
            $agent->ref1_email_address = $request->ref1_email_address;
            $agent->ref1_contact_number = $request->ref1_contact_number;
            $agent->ref1_years_of_working_relation = $request->ref1_years_of_working_relation;
            $agent->ref2_university_or_nstitution_name = $request->ref2_university_or_nstitution_name;
            $agent->ref2_country = $request->ref2_country;
            $agent->ref2_contact_person = $request->ref2_contact_person;
            $agent->ref2_designation = $request->ref2_designation;
            $agent->ref2_email_address = $request->ref2_email_address;
            $agent->ref2_contact_number = $request->ref2_contact_number;
            $agent->ref2_years_of_working_relation = $request->ref2_years_of_working_relation;
            
            $agent->save();




            $details = [
                    'agent_company_name' => $request->agent_company_name,
                    'company_registration_number' => $request->company_registration_number,
                    'year_of_establishment' => $request->year_of_establishment,
                    'city' => $request->city,
                    'status' => $request->status,
                    'country' => $request->country,
                    'email' => $request->email,
                    'contact_number' => $request->contact_number,
                ];
               
            // Mail::to('arhamkhaninnocent@gmail.com')->send(new \App\Mail\AgentSugnUp($details));
            Mail::to('sysksolutions@gmail.com')->send(new \App\Mail\AgentSugnUp($details));


            return redirect('/login')->with('flash_message_success', 'Your registration is successful, please wait for a relationship manager to contact you for further process...');
        }

        

    	return view('register');
    }

    public function verify (Request $request)
    {
        $verification_code = $request->code;
        $user = User::where(['verification_code' => $verification_code])->first();
        if ($user != null)
        {
            $user->isVerified = 1;
            $user->save();
            return redirect('/login')->with('flash_message_success','Email Verified Successfully...');
        }
        else
        {
        return redirect('/login')->with('flash_message_error','Invalid Verification Code...');

        }

    }


    public function comment(Request $request)
    {
        // dd($request->all());
        $comment = new Comment();
        $comment->user_id = auth::user()->id;
        $comment->application_id = $request->application_id;
        $comment->comment = $request->comment;

        if ($request->hasFile('documentInput')){
            $file1 = 'document-'.time().'.'.$request->documentInput->extension();
            $request->documentInput->storeAs('/document/', $file1, 'my_files');
            $comment->document = $file1;
        }
        $comment->save();
        return response()->json('Comment Successfully...');
        
    }

    public function getState($id)
    {
        $states = DB::table('states')->where('country_id',$id)->pluck('name','id');
        return json_encode($states);
    }

    public function getCommnets($id)
    {
        error_reporting(0);

        $comments = DB::table('comments')
           ->join('users', 'comments.user_id', '=', 'users.id')
           ->select('comments.*','users.name', 'users.image', 'users.designation')
           ->where('comments.application_id', '=', $id)
           ->get();
        return response()->json($comments);
    }

    public function getCity(Request $request)
    {
        $cities = DB::table('cities')->where('state_id',$request->stateId)->pluck('name','id');
        return json_encode($cities);
    }
}
