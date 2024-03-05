<div>
	@if(!empty($successMessage))
	<div class="alert alert-success">
		{{ $successMessage }}
	</div>
	@endif
	<div class="stepwizard">
		<div class="stepwizard-row setup-panel">
			<div class="stepwizard-step">
				<a href="#step-1" type="button" class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-primary' }}">1</a>
				<p>Step 1</p>
			</div>
			<div class="stepwizard-step">
				<a href="#step-2" type="button" class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}">2</a>
				<p>Step 2</p>
			</div>
			<div class="stepwizard-step">
				<a href="#step-3" type="button" class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }}">3</a>
				<p>Step 3</p>
			</div>
			<div class="stepwizard-step">
				<a href="#step-4" type="button" class="btn btn-circle {{ $currentStep != 4 ? 'btn-default' : 'btn-primary' }}" disabled="disabled">4</a>
				<p>Step 4</p>
			</div>
		</div>
	</div>
	<div class="row setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
		


		<div class="row ">
		    <div class="col-lg-3 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Recruitment Type <span class="text-danger">*</span></label>
		            <select class="form-control" wire:model="recruitment_type">

		                <option selected disabled value="">Choose...</option>
		                <option value="International"
		                @if (old('recruitment_type') == "International")
		                    selected 
		                @endif
		                >International</option>
		                <option value="Local"
		                @if (old('recruitment_type') == "Local")
		                    selected 
		                @endif
		                >Local</option>
		            </select>
		            @error('recruitment_type') <span class="text-danger">{{ $message }}</span> @enderror
		        </div>
		    </div>
		    <div class="col-lg-3 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Agent Company Name <span class="text-danger">*</span></label>
		            <input type="text" wire:model="agent_company_name" class="form-control" value="{{old('agent_company_name')}}">
		            @error('agent_company_name') <span class="text-danger">{{ $message }}</span> @enderror
		        </div>
		    </div>

		     <div class="col-lg-3 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Company Registration Number </label>
		            <input type="text" wire:model="company_registration_number" class="form-control"  value="{{old('company_registration_number')}}">
		            @error('company_registration_number') <span class="text-danger">{{ $message }}</span> @enderror
		        </div>
		    </div>


		    <div class="col-lg-3 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Year of Establishment <span class="text-danger">*</span></label>
		            <input type="text" wire:model="year_of_establishment" class="form-control"  value="{{old('year_of_establishment')}}">
		            @error('year_of_establishment') <span class="text-danger">{{ $message }}</span> @enderror
		        </div>
		    </div>

		    <div class="col-lg-3 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Company Type <span class="text-danger">*</span></label>
		            <select class="form-control" wire:model="company_type">
		            	@error('company_type') <span class="text-danger">{{ $message }}</span> @enderror
		                <option selected disabled value="">Choose...</option>
		                <option value="Private Limited"
		                @if (old('company_type') == "Private Limited")
		                    selected 
		                @endif
		                >Private Limited</option>
		                <option value="Public Limited"
		                @if (old('company_type') == "Public Limited")
		                    selected 
		                @endif
		                >Public Limited</option>
		                <option value="Partnership"
		                @if (old('company_type') == "Partnership")
		                    selected 
		                @endif
		                >Partnership</option>
		                <option value="Freelancer"
		                @if (old('company_type') == "Freelancer")
		                    selected 
		                @endif
		                >Freelancer</option>
		            </select>
		        </div>
		    </div>


		    <div class="col-lg-3 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Address Line 1 <span class="text-danger">*</span></label>
		            <input type="text" wire:model="address_line_1" class="form-control" value="{{old('address_line_1')}}">
		            @error('address_line_1') <span class="text-danger">{{ $message }}</span> @enderror
		        </div>
		    </div>
		    <div class="col-lg-3 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Address Line 2 <span class="text-danger">*</span></label>
		            <input type="text" wire:model="address_line_2" class="form-control" value="{{old('address_line_2')}}">
		            @error('address_line_2') <span class="text-danger">{{ $message }}</span> @enderror
		        </div>
		    </div>

		    <div class="col-lg-3 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Town / City <span class="text-danger">*</span></label>
		            <input type="text" wire:model="city" class="form-control" value="{{old('city')}}">
		            @error('city') <span class="text-danger">{{ $message }}</span> @enderror
		        </div>
		    </div>

		    <div class="col-lg-3 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">State / Region <span class="text-danger">*</span></label>
		            <input type="text" wire:model="state" class="form-control" value="{{old('state')}}">
		            @error('state') <span class="text-danger">{{ $message }}</span> @enderror
		        </div>
		    </div>


		    <div class="col-lg-3 mb-2">
		        <div class="mb-3">
		            @php
		                error_reporting(0);
		                $countries = DB::table('countries')->get();
		            @endphp
		            <label class="text-label form-label">Country <span class="text-danger">*</span></label>

		            <select wire:model="country" class="form-control select2" required>
		            	@error('country') <span class="text-danger">{{ $message }}</span> @enderror
		                <option selected disabled value="">Select Country</option>
		                @foreach($countries as $country)
		                    <option value="{{ $country->name }}"
		                        @if (old('country') == $country->name)
		                            selected 
		                        @endif
		                    >{{ $country->name }} </option>
		                @endforeach
		            </select>


		        </div>
		    </div>

		    <div class="col-lg-3 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Post / Pin Code <span class="text-danger">*</span></label>
		            <input type="text" wire:model="pincode" class="form-control" value="{{old('pincode')}}">
		            @error('pincode') <span class="text-danger">{{ $message }}</span> @enderror
		        </div>
		    </div>

		    <div class="col-lg-3 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">website <span class="text-danger">*</span></label>
		            <input type="text" wire:model="website" class="form-control" value="{{old('website')}}">
		            @error('website') <span class="text-danger">{{ $message }}</span> @enderror
		        </div>
		    </div><div class="col-lg-3 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Email Address <span class="text-danger">*</span></label>
		            <input type="text" wire:model="email" class="form-control" value="{{old('email')}}">
		            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
		        </div>
		    </div>

		    <div class="col-lg-3 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Contact Number <span class="text-danger">*</span></label>
		            <input type="text" wire:model="contact_number" class="form-control" value="{{old('contact_number')}}">
		            @error('contact_number') <span class="text-danger">{{ $message }}</span> @enderror
		        </div>
		    </div>
		    <div class="col-lg-6 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Company Registration Document / Evidence </label>
		            <input type="file" wire:model="company_registration_document_evidence" class="form-control" multiple data-bs-toggle="tooltip" data-bs-placement="top" title="pdf/ word / jpg / png) - upto 4 files each 1mb">
		            @error('company_registration_document_evidence') <span class="text-danger">{{ $message }}</span> @enderror
		        </div>
		    </div>


		    <div class="d-flex align-items-center justify-content-end">
		    	<button class="btn btn-primary nextBtn px-4" wire:click="firstStepSubmit" type="button" >Next</button>
		    </div>




		    
		</div>
	</div>
	<div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
		<div class="row">
		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Main Contact First Name <span class="text-danger">*</span></label>
		            <input type="text" wire:model="contact_first_name" class="form-control" value="{{ old('contact_first_name') }}">
		            @error('contact_first_name')<span class="text-danger">{{ $message }}</span> @enderror
		        </div>
		    </div>
		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Main Contact Last Name <span class="text-danger">*</span></label>
		            <input type="text" wire:model="contact_last_name" class="form-control" value="{{ old('contact_last_name') }}">
		            @error('contact_last_name')<span class="text-danger">{{ $message }}</span> @enderror
		        </div>
		    </div>
		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Gender <span class="text-danger">*</span><</label>
		            <select class="form-control" wire:model="contact_gender">

		                <option selected disabled value="">Choose...</option>
		                <option value="Male"
		                @if (old('contact_gender') == "Male")
		                    selected 
		                @endif
		                >Male</option>
		                <option value="Female"
		                @if (old('contact_gender') == "Female")
		                    selected 
		                @endif
		                >Female</option>
		                <option value="Other"
		                @if (old('contact_gender') == "Other")
		                    selected 
		                @endif
		                >Other</option>
		                <option value="Prefer not to say"
		                @if (old('contact_gender') == "Prefer not to say")
		                    selected 
		                @endif
		                >Prefer not to say</option>
		            </select>
		            @error('contact_gender')<span class="text-danger">{{ $message }}</span> @enderror
		        </div>
		    </div>
		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Nationality <span class="text-danger">*</span></label>
		            <select wire:model="contact_nationality" class="form-control select2" required>
		            	
		                <option selected disabled value="">Select Nationality</option>
		                @foreach($countries as $country)
		                    <option value="{{ $country->name }}"
		                        @if (old('contact_nationality') == $country->name)
		                            selected 
		                        @endif
		                    >{{ $country->name }} </option>
		                @endforeach
		            </select>
		            @error('contact_nationality')<span class="text-danger">{{ $message }}</span> @enderror
		        </div>
		    </div>


		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Email Address <span class="text-danger">*</span></label>
		            <input type="text" wire:model="contract_email_address" class="form-control" value="{{ old('contract_email_address') }}">
		            @error('contract_email_address')<span class="text-danger">{{ $message }}</span> @enderror
		        </div>
		    </div>

		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Contact Number <span class="text-danger">*</span></label>
		            <input type="text" wire:model="contract_contact_number" class="form-control" value="{{ old('contract_contact_number') }}">
		            @error('contract_contact_number')<span class="text-danger">{{ $message }}</span> @enderror
		        </div>
		    </div>
		    <div class="col-lg-6 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Main Contact Identity Proof Front</label>
		            <input type="file" wire:model="contact_identity_proof_front" class="form-control">
		            @error('contact_identity_proof_front')<span class="text-danger">{{ $message }}</span> @enderror
		        </div>
		    </div>

		    <div class="col-lg-6 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Main Contact Identity Proof Back</label>
		            <input type="file" wire:model="contact_identity_proof_back" class="form-control">
		            @error('contact_identity_proof_back')<span class="text-danger">{{ $message }}</span> @enderror
		        </div>
		    </div>

		    <div class="d-flex align-items-center justify-content-between">
			    <button class="btn btn-danger nextBtn px-4" type="button" wire:click="back(1)">Back</button>
			    <button class="btn btn-primary nextBtn px-4" type="button" wire:click="secondStepSubmit">Next</button>
		    </div>
		    
		</div>




	</div>


	<div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
		

		<div class="row">
		
		    <h4>Services offered to students</h4> <br><br>
		    @php
		        error_reporting(0);
		    @endphp

		    @error('services_offered_to_students')<span class="text-danger">{{ $message }}</span> @enderror
		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		           <div class="form-check custom-checkbox ms-1">
		                <input type="checkbox" class="form-check-input" wire:model="services_offered_to_students"  id="Educational Counselling" value="Educational Counselling">
		                <label class="form-check-label" for="Educational Counselling">Educational Counselling</label>
		            </div>
		        </div>
		    </div>

		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		           <div class="form-check custom-checkbox ms-1">
		                <input type="checkbox" class="form-check-input" wire:model="services_offered_to_students"  id="Course Selection" value="Course Selection">
		                <label class="form-check-label" for="Course Selection">Course Selection</label>
		            </div>
		        </div>
		    </div>

		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		           <div class="form-check custom-checkbox ms-1">
		                <input type="checkbox" class="form-check-input" wire:model="services_offered_to_students"  id="University Selection"  value="University Selection">
		                <label class="form-check-label" for="University Selection">University Selection</label>
		            </div>
		        </div>
		    </div>

		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		           <div class="form-check custom-checkbox ms-1">
		                <input type="checkbox" class="form-check-input" wire:model="services_offered_to_students"  id="Offers & Admissions in Universities / Colleges" value="Offers & Admissions in Universities / Colleges">
		                <label class="form-check-label" for="Offers & Admissions in Universities / Colleges">Offers & Admissions in Universities / Colleges</label>
		            </div>
		        </div>
		    </div>

		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		           <div class="form-check custom-checkbox ms-1">
		                <input type="checkbox" class="form-check-input" wire:model="services_offered_to_students"  id="Visa Assistance" value="Visa Assistance">
		                <label class="form-check-label" for="Visa Assistance">Visa Assistance</label>
		            </div>
		        </div>
		    </div>

		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		           <div class="form-check custom-checkbox ms-1">
		                <input type="checkbox" class="form-check-input" wire:model="services_offered_to_students"  id="Scholarship Assistance"  value="Scholarship Assistance">
		                <label class="form-check-label" for="Scholarship Assistance">Scholarship Assistance</label>
		            </div>
		        </div>
		    </div>

		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		           <div class="form-check custom-checkbox ms-1">
		                <input type="checkbox" class="form-check-input" wire:model="services_offered_to_students"  id="Study Abroad Loan Assistance" value="Study Abroad Loan Assistance">
		                <label class="form-check-label" for="Study Abroad Loan Assistance">Study Abroad Loan Assistance</label>
		            </div>
		        </div>
		    </div>

		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		           <div class="form-check custom-checkbox ms-1">
		                <input type="checkbox" class="form-check-input" wire:model="services_offered_to_students"  id="Pre Departure and Post Arrival Services" value="Pre Departure and Post Arrival Services">
		                <label class="form-check-label" for="Pre Departure and Post Arrival Services">Pre Departure and Post Arrival Services</label>
		            </div>
		        </div>
		    </div>

		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		           <div class="form-check custom-checkbox ms-1">
		                <input type="checkbox" class="form-check-input" wire:model="services_offered_to_students"  id="Airport Assistance" value="Airport Assistance">
		                <label class="form-check-label" for="Airport Assistance">Airport Assistance</label>
		            </div>
		        </div>
		    </div>

		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		           <div class="form-check custom-checkbox ms-1">
		                <input type="checkbox" class="form-check-input" wire:model="services_offered_to_students"  id="Accommodation Services"  value="Accommodation Services">
		                <label class="form-check-label" for="Accommodation Services">Accommodation Services</label>
		            </div>
		        </div>
		    </div>

		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		           <div class="form-check custom-checkbox ms-1">
		                <input type="checkbox" class="form-check-input" wire:model="services_offered_to_students"  id="Part Time Job Guidance"  value="Part Time Job Guidance">
		                <label class="form-check-label" for="Part Time Job Guidance">Part Time Job Guidance</label>
		            </div>
		        </div>
		    </div>

		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		           <div class="form-check custom-checkbox ms-1">
		                <input type="checkbox" class="form-check-input" wire:model="services_offered_to_students"  id="Psychometric Testing" value="Psychometric Testing">
		                <label class="form-check-label" for="Psychometric Testing">Psychometric Testing</label>
		            </div>
		        </div>
		    </div>

		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		           <div class="form-check custom-checkbox ms-1">
		                <input type="checkbox" class="form-check-input" wire:model="services_offered_to_students"  id="Entrance Exams- Coaching Classes"  value="Entrance Exams- Coaching Classes">
		                <label class="form-check-label" for="Entrance Exams- Coaching Classes">Entrance Exams- Coaching Classes</label>
		            </div>
		        </div>
		    </div>

		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		           <div class="form-check custom-checkbox ms-1">
		                <input type="checkbox" class="form-check-input" wire:model="services_offered_to_students"  id="English language classes" value="English language classes">
		                <label class="form-check-label" for="English language classes">English language classes</label>
		            </div>
		        </div>
		    </div>

		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		           <div class="form-check custom-checkbox ms-1">
		                <input type="checkbox" class="form-check-input" wire:model="services_offered_to_students"  id="Registration for Entrance and English tests" value="Registration for Entrance and English tests">
		                <label class="form-check-label" for="Registration for Entrance and English tests">Registration for Entrance and English tests</label>
		            </div>
		        </div>
		    </div>

		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		           <div class="form-check custom-checkbox ms-1">
		                <input type="checkbox" class="form-check-input" wire:model="services_offered_to_students"  id="Immigration assistance"  value="Immigration assistance">
		                <label class="form-check-label" for="Immigration assistance">Immigration assistance</label>
		            </div>
		        </div>
		    </div>

		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		           <div class="form-check custom-checkbox ms-1">
		                <input type="checkbox" class="form-check-input" wire:model="services_offered_to_students"  id="Visitor Visas"  value="Visitor Visas">
		                <label class="form-check-label" for="Visitor Visas">Visitor Visas</label>
		            </div>
		        </div>
		    </div>

		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		           <div class="form-check custom-checkbox ms-1">
		                <input type="checkbox" class="form-check-input" wire:model="services_offered_to_students"  id="Overseas Work permits"   value="Overseas Work permits">
		                <label class="form-check-label" for="Overseas Work permits">Overseas Work permits</label>
		            </div>
		        </div>
		    </div>

		    <div class="col-lg-12 mb-2">
		        <div class="mb-3">
		           <div class="form-check custom-checkbox ms-1">
		                <input type="checkbox" class="form-check-input" wire:model="services_offered_to_students"  id="Collaboration Services to Institutions" value="Collaboration Services to Institutions">
		                <label class="form-check-label" for="Collaboration Services to Institutions">Collaboration Services to Institutions</label>
		            </div>
		        </div>
		    </div>




		    <div class="row" id="add_space">
		        <div class="col-lg-12 mb-2">
		            <div class="mb-3">
		                <label class="text-label form-label">Do you charge students for any of the services ?</label>
		                <select name="do_you_charge_students_for_any_of_the_services" class="form-control">
		                    <option selected value="Yes">Yes</option>
		                    <option value="No">No</option>
		                  
		                </select>
		            </div>
		        </div>
		    </div>


		    <div class="row">
		        <div class="col-lg-12 mb-2">
		            <div class="mb-3" id="provide_details">
		                <label class="text-label form-label">Provide details</label>
		                <input name="provide_details" class="form-control"/>
		            </div>
		        </div>
		    </div>


		    <div class="d-flex align-items-center justify-content-between">
			    <button class="btn btn-danger nextBtn px-4" type="button" wire:click="back(2)">Back</button>
			    <button class="btn btn-primary nextBtn px-4" type="button" wire:click="thirdStepSubmit">Next</button>
		    </div>



		</div>


	</div>
	<div class="row setup-content {{ $currentStep != 4 ? 'displayNone' : '' }}" id="step-4">
		<h4>Reference 1 </h4>
		<div class="row">
		    <div class="col-lg-12 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">University / Institution Name</label>
		            <input name="ref1_university_or_nstitution_name" class="form-control"/>
		        </div>
		    </div>
		</div>

		<div class="row">
		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Country</label>
		            <input name="ref1_country" class="form-control"/>
		        </div>
		    </div>
		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Contact Person</label>
		            <input name="ref1_contact_person" class="form-control"/>
		        </div>
		    </div>
		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Designation</label>
		            <input name="ref1_designation" class="form-control"/>
		        </div>
		    </div>
		    
		    
		</div>


		<div class="row">
		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Email Address</label>
		            <input name="ref1_email_address" class="form-control"/>
		        </div>
		    </div>

		    
		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Contact Number</label>
		            <input name="ref1_contact_number" class="form-control"/>
		        </div>
		    </div>
		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Years of working relation</label>
		            <input name="ref1_years_of_working_relation" class="form-control"/>
		        </div>
		    </div>
		    
		</div>



		<br>
		<h4>Reference 2 </h4>
		<div class="row">
		    <div class="col-lg-12 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">University / Institution Name</label>
		            <input name="ref2_university_or_nstitution_name" class="form-control"/>
		        </div>
		    </div>
		</div>

		<div class="row">
		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Country</label>
		            <input name="ref2_country" class="form-control"/>
		        </div>
		    </div>
		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Contact Person</label>
		            <input name="ref2_contact_person" class="form-control"/>
		        </div>
		    </div>
		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Designation</label>
		            <input name="ref2_designation" class="form-control"/>
		        </div>
		    </div>
		    
		    
		</div>


		<div class="row">
		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Email Address</label>
		            <input name="ref2_email_address" class="form-control"/>
		        </div>
		    </div>


		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Contact Number</label>
		            <input name="ref2_contact_number" class="form-control"/>
		        </div>
		    </div>
		    <div class="col-lg-4 mb-2">
		        <div class="mb-3">
		            <label class="text-label form-label">Years of working relation</label>
		            <input name="ref2_years_of_working_relation" class="form-control"/>
		        </div>
		    </div>
		    
		</div>

		<div class="d-flex align-items-center justify-content-between">
			<button class="btn btn-danger nextBtn px-4" type="button" wire:click="back(3)">Back</button>
			<button class="btn btn-success px-4" wire:click="submitForm" type="button">Finish!</button>
		</div>
	</div>
</div>