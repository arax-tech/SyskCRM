@php
	error_reporting(0);
	use App\University;
	$countries = DB::table('countries')->get();
	$campuses = DB::table('campuses')->get();
	$intakes = DB::table('intakes')->get();
	foreach ($campuses as $key => $value)
	{
	    $university = University::find($value->university_id);
	    $campuses[$key]->university_id = $university->id;
	    $campuses[$key]->university_name = $university->name;
	}
@endphp

<form method="post" action="">
    <div class="row">
        

        <div class="col-lg-4 mb-2">
            <div class="mb-3">
                <label class="text-label form-label">By Date Range </label>
                <input class="form-control input-daterange-datepicker" type="text" name="daterange">
            </div>
        </div>

        <div class="col-lg-4 mb-2">
            <div class="mb-3">
                <label class="text-label form-label">Country </label>
                <select class="form-control select2" name="country_id" required>
                    <option selected disabled value="">Select Country</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-4 mb-2">
            <div class="mb-3">
                <label class="text-label form-label">Campus/University </label>
                <select class="form-control select2" name="campus_id" required>
                    <option selected disabled value="">Choose...</option>
                    @foreach ($campuses as $campus)
                    <option value="{{ $campus->id }}">{{ $campus->name }} | {{ $campus->university_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-4 mb-2">
            <div class="mb-3">
                <label class="text-label form-label">Intake </label>
                <select name="intake"  id="intake" class="form-control select2" >
                    <option selected disabled value="">Select Country</option>
                    @foreach($intakes as $intake)
                        <option value="{{ $intake->id }}">{{ $intake->month }} {{ $intake->year }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-lg-4 mb-2">
            <div class="mb-3">
                <label class="text-label form-label">Status </label>
                <select class="form-control" name="application_status">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option value="Pending">Pending</option>
                    <option value="Accepted">Accepted</option>
                    <option value="Rejected">Rejected</option>
                </select>
            </div>
        </div>

      

        <div class="col-lg-4 mb-2">
            <div class="mb-3">
                <label class="text-label form-label">Keyword </label>
                <input type="text" name="keyword" class="form-control">
            </div>
        </div>
        

        
        
    </div>
    
</form>

