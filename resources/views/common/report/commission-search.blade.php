@php
	error_reporting(0);
	use App\University;
	$campuses = DB::table('campuses')->get();
	$intakes = DB::table('intakes')->get();
	foreach ($campuses as $key => $value)
	{
	    $university = University::find($value->university_id);
	    $campuses[$key]->university_id = $university->id;
	    $campuses[$key]->university_name = $university->name;
	}


    $agents = DB::table('users')->where('role', 'Agent')->get();
    $courses = DB::table('courses')->get();
@endphp

<form method="post" action="">
    <div class="row">
        

        <div class="col-lg-3 mb-2">
            <div class="mb-3">
                <label class="text-label form-label">By Date Range </label>
                <input class="form-control input-daterange-datepicker" type="text" name="daterange" >
            </div>
        </div>

        <div class="col-lg-3 mb-2">
            <div class="mb-3">
                <label class="text-label form-label">Agents </label>
                <select class="form-control select2" name="country_id" required>
                    <option selected disabled value="">Select Agent</option>
                    @foreach($agents as $agent)
                        <option value="{{ $agent->id }}">{{ $agent->name }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-3 mb-2">
            <div class="mb-3">
                <label class="text-label form-label">Campus / University </label>
                <select class="form-control select2" name="campus_id" required>
                    <option selected disabled value="">Choose...</option>
                    @foreach ($campuses as $campus)
                    <option value="{{ $campus->id }}">{{ $campus->name }} | {{ $campus->university_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

     

        <div class="col-lg-3 mb-2">
            <div class="mb-3">
                <label class="text-label form-label">Status </label>
                <select name="status" class="form-control">
                    <option value="Pending">Pending</option>
                    <option value="Approved">Approved</option>
                    <option value="Rejected">Rejected</option>
                </select>
            </div>
        </div>

      

        

        
        
    </div>
    
</form>

