<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\User;
class Wizard extends Component
{

	public $currentStep = 1;
    public $recruitment_type, $agent_company_name, $company_registration_number, $year_of_establishment, $company_type, $address_line_1, $address_line_2, $city, $state, $country, $pincode, $website, $email, $contact_number, $company_registration_document_evidence, $contact_first_name, $contact_last_name, $contact_gender, $contact_nationality, $contract_email_address, $contract_contact_number, $contact_identity_proof_front, $contact_identity_proof_back, $services_offered_to_students, $do_you_charge_students_for_any_of_the_services, $provide_details, $ref1_university_or_nstitution_name, $ref1_country, $ref1_contact_person, $ref1_designation, $ref1_email_address, $ref1_contact_number, $ref1_years_of_working_relation, $ref2_university_or_nstitution_name, $ref2_country, $ref2_contact_person, $ref2_designation, $ref2_email_address, $ref2_contact_number, $ref2_years_of_working_relation;




    public $successMessage = '';


    public function render()
    {
        return view('livewire.wizard');
    }



    public function firstStepSubmit()
       {
           $validatedData = $this->validate([
               'recruitment_type' => 'required',
               'agent_company_name' => 'required',
               'year_of_establishment' => 'required',
               'company_type' => 'required',
               'address_line_1' => 'required',
               'city' => 'required',
               'state' => 'required',
               'country' => 'required',
               'pincode' => 'required',
               'website' => 'required',
               'email' => 'required',
               'contact_number' => 'required',
           ]);
     
           $this->currentStep = 2;
       }
      
       /**
        * Write code on Method
        *
        * @return response()
        */
       public function secondStepSubmit()
       {
           $validatedData = $this->validate([
               'contact_first_name' => 'required',
               'contact_last_name' => 'required',
               'contact_gender' => 'required',
               'contact_nationality' => 'required',
               'contract_email_address' => 'required',
               'contract_contact_number' => 'required',
               
           ]);
      
           $this->currentStep = 3;
       }

       public function thirdStepSubmit()
       {
           $validatedData = $this->validate([
               'services_offered_to_students' => 'required',
           ]);
      
           $this->currentStep = 4;
       }
      
       /**
        * Write code on Method
        *
        * @return response()
        */
       public function submitForm()
       {
           User::create([
               'recruitment_type' => $this->recruitment_type,
               'agent_company_name' => $this->agent_company_name,
               'company_registration_number' => $this->company_registration_number,
           ]);
      
           $this->successMessage = 'Agent Created Successfully.';
      
           $this->clearForm();
      
           $this->currentStep = 1;
       }
      
       /**
        * Write code on Method
        *
        * @return response()
        */
       public function back($step)
       {
           $this->currentStep = $step;    
       }
      
       /**
        * Write code on Method
        *
        * @return response()
        */
       public function clearForm()
       {
           $this->name = '';
           $this->amount = '';
           $this->description = '';
           $this->stock = '';
           $this->status = 1;
       }
}
