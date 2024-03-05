@php
    error_reporting(0);
    

    $applicationId = $_REQUEST['id'];
    // dd($applicationId);
    
    $application = DB::table('applications')->where('id', $applicationId)->first();
    $student = DB::table('students')->where('id', $application->student_id)->first();
    $campus = DB::table('campuses')->where('id', $application->campus_id)->first();
    $university = DB::table('universities')->where('id', $campus->university_id)->first();
    $course = DB::table('courses')->where('id', $application->course_id)->first();
    $intake = DB::table('intakes')->where('id', $application->intake_id)->first();
    


    $country = DB::table('countries')->where('id', $university->country)->first();
    $state = DB::table('states')->where('id', $university->state)->first();
    $city = DB::table('cities')->where('id', $university->city)->first();




@endphp

<table>
    <tr style="vertical-align: middle; padding: 10px">
        <th style="border: 1px solid #000; font-weight: bolder; font-size: 16px; text-align: center;" colspan="3"><h4>Application Overview</h4></th>
        <th style="border: 1px solid #000; font-weight: bolder; font-size: 16px; text-align: center;" colspan="3"><h4>Applied Student Overview</h4></th>
        <th style="border: 1px solid #000; font-weight: bolder; font-size: 16px; text-align: center;" colspan="3"><h4>Applied Course Overview</h4></th>
    </tr>


    <tr>
        <th>Application ID</th>
        <td style="text-align: left;">{{ $application->id }}</td>
        
        <td></td>
        
        <th>Full Name</th>
        <th>{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</th>
        <td></td>
        <td>Course Name</td>
        <td>{{ $course->course_name }}</td>
    </tr>


    <tr>
        <td>Application Status</td>
        <td>{{ $student->application_status }}</td>

        <td></td>

        <td>Reg No</td>
        <td style="text-align: left;">{{ $student->registration_number }}</td>

        <td></td>
        <td>Tuition fee </td>
        <td>{{ $course->fee_and_commission_currency }} {{ $course->tuition_fee }}</td>
    </tr>


    <tr>
        <td>Visa Status</td>
        <td>{{ $student->visa_status }}</td>

        <td></td>

        <td>Email</td>
        <td>{{ $student->email_address }}</td>

        <td></td>
        <td>Aommission Amount </td>
        <td>{{ $course->fee_and_commission_currency }} {{ $course->commission_fee }}</td>
    </tr>


    <tr>
        <td>Campus Name</td>
        <td>{{ $campus->name }}</td>

        <td></td>

        <td>Phone</td>
        <td>{{ $student->contact_number }}</td>

        <td></td>
        <td>Application Fee </td>
        <td>{{ $course->fee_and_commission_currency }} {{ $course->application_fee }}</td>
    </tr>


    <tr>
        <td>University Name</td>
        <td>{{ $university->name }}</td>

        <td></td>

        <td>Gender</td>
        <td>{{ $student->gender }}</td>

        <td></td>
        <td>Duration</td>
        <td>{{ $course->duration }}</td>
    </tr>


    <tr>
        <td></td>
        <td></td>
        <td></td>

        <td>Date of Birth</td>
        <td>{{ $student->date_of_birth }}</td>

        <td></td>
        <td>Intake </td>
        <td>{{ $intake->month }} {{ $intake->year }}</td>
    </tr>


    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>

        <td></td>
        <td>Year </td>
        <td style="text-align: left;">{{ $application->year }}</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>

        <th style="border: 1px solid #000; font-weight: bolder; font-size: 13px; text-align: center;" colspan="3"><h6>Student Education Information</h6></th>

        <td>Degree </td>
        <td>{{ $course->degree_type }}</td>
    </tr>


    <tr>
        <td></td>
        <td></td>
        <td></td>

        <th style="font-weight: bolder; font-size: 12px;" colspan="3"><h6>Qualification 1</h6></th>

        <td>Study Field </td>
        <td>{{ $course->study_field }}</td>
    </tr>

    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>


    <tr>
        <td></td>
        <td></td>
        <td></td>

        <td>Course Title</td>
        <td>{{ $student->qualification1_course_title }}</td>
    </tr>


    <tr>
        <td></td>
        <td></td>
        <td></td>

        <td>Course Level</td>
        <td>{{ $student->qualification1_course_level }}</td>
    </tr>


    <tr>
        <td></td>
        <td></td>
        <td></td>

        <td>Course Duration</td>
        <td>{{ $student->qualification1_course_duration }}</td>
    </tr>


    <tr>
        <td></td>
        <td></td>
        <td></td>

        <td>University or Organisation</td>
        <td>{{ $student->qualification1_university_or_organisation }}</td>
    </tr>


    <tr>
        <td></td>
        <td></td>
        <td></td>

        <td>Medium of education</td>
        <td>{{ $student->qualification1_medium_of_education }}</td>
    </tr>


    <tr>
        <td></td>
        <td></td>
        <td></td>

        <td>Grade</td>
        <td>{{ $student->qualification1_grade }}</td>
    </tr>


    <tr>
        <td></td>
        <td></td>
        <td></td>

        <td>Year of passing</td>
        <td style="text-align: left;">{{ $student->qualification1_year_of_passing }}</td>
    </tr>


    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td></td>
        <td></td>
        <td></td>

        <th style="font-weight: bolder; font-size: 12px;" colspan="3"><h6>Qualification 2</h6></th>
    </tr>

    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

    
    <tr>
        <td></td>
        <td></td>
        <td></td>

        <td>Course Title</td>
        <td>{{ $student->qualification2_course_title }}</td>
    </tr>


    <tr>
        <td></td>
        <td></td>
        <td></td>

        <td>Course Level</td>
        <td>{{ $student->qualification2_course_level }}</td>
    </tr>


    <tr>
        <td></td>
        <td></td>
        <td></td>

        <td>Course Duration</td>
        <td>{{ $student->qualification2_course_duration }}</td>
    </tr>


    <tr>
        <td></td>
        <td></td>
        <td></td>

        <td>University or Organisation</td>
        <td>{{ $student->qualification2_university_or_organisation }}</td>
    </tr>


    <tr>
        <td></td>
        <td></td>
        <td></td>

        <td>Medium of education</td>
        <td>{{ $student->qualification2_medium_of_education }}</td>
    </tr>


    <tr>
        <td></td>
        <td></td>
        <td></td>

        <td>Grade</td>
        <td>{{ $student->qualification2_grade }}</td>
    </tr>


    <tr>
        <td></td>
        <td></td>
        <td></td>

        <td>Year of passing</td>
        <td style="text-align: left;">{{ $student->qualification2_year_of_passing }}</td>
    </tr>

    
</table>