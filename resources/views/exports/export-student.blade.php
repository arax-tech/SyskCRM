@php
    error_reporting(0);
    

    $studentId = $_REQUEST['id'];
    // dd($applicationId);
    
    $student = DB::table('students')->where('id', $studentId)->first();
    $campus = DB::table('campuses')->where('id', $student->campus_id)->first();
    $university = DB::table('universities')->where('id', $campus->university_id)->first();
    $course = DB::table('courses')->where('id', $student->course_id)->first();
    $intake = DB::table('intakes')->where('id', $student->intake_id)->first();
    

    error_reporting(0);
    $nationality = DB::table('countries')->where('id', $student->nationality)->first();

    $country = DB::table('countries')->where('id', $university->country)->first();
    $state = DB::table('states')->where('id', $university->state)->first();
    $city = DB::table('cities')->where('id', $university->city)->first();




@endphp

<table>
    <tr style="vertical-align: middle; padding: 10px">
        <th style="border: 1px solid #000; font-weight: bolder; font-size: 16px; text-align: center;" colspan="3"><h4>Student Information</h4></th>
    </tr>


    <tr>        
        <th>Full Name</th>
        <th>{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</th>
    </tr>


    <tr>
        <td>Reg No</td>
        <td style="text-align: left;">{{ $student->registration_number }}</td>
    </tr>


    <tr>
        <td>Email</td>
        <td>{{ $student->email_address }}</td>
    </tr>


    <tr>
        <td>Phone</td>
        <td>{{ $student->contact_number }}</td>
    </tr>


    <tr>
        <td>Gender</td>
        <td>{{ $student->gender }}</td>
    </tr>


    <tr>
        <td>Date of Birth</td>
        <td>{{ $student->date_of_birth }}</td>
    </tr>
    <tr>
        <td>Nationality</td>
        <td>{{ $nationality->name }}</td>
    </tr>
    <tr>
        <td>Passport Number</td>
        <td style="text-align: left;">{{ $student->passport_number }}</td>
    </tr>


    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <th style="border: 1px solid #000; font-weight: bolder; font-size: 13px; text-align: center;" colspan="3"><h6>Student Education Information</h6></th>
    </tr>


    <tr>

        <th style="font-weight: bolder; font-size: 12px;" colspan="3"><h6>Qualification 1</h6></th>

    </tr>

    <tr>
        <td></td>
        <td></td>
    </tr>


    <tr>
        
        <td>Course Title</td>
        <td>{{ $student->qualification1_course_title }}</td>
    </tr>


    <tr>
        
        <td>Course Level</td>
        <td>{{ $student->qualification1_course_level }}</td>
    </tr>


    <tr>
        
        <td>Course Duration</td>
        <td>{{ $student->qualification1_course_duration }}</td>
    </tr>


    <tr>
        
        <td>University or Organisation</td>
        <td>{{ $student->qualification1_university_or_organisation }}</td>
    </tr>


    <tr>
        
        <td>Medium of education</td>
        <td>{{ $student->qualification1_medium_of_education }}</td>
    </tr>


    <tr>
        
        <td>Grade</td>
        <td>{{ $student->qualification1_grade }}</td>
    </tr>


    <tr>
        
        <td>Year of passing</td>
        <td style="text-align: left;">{{ $student->qualification1_year_of_passing }}</td>
    </tr>


    <tr>
        
        <td></td>
        <td></td>
    </tr>

    <tr>
        <th style="font-weight: bolder; font-size: 12px;" colspan="3"><h6>Qualification 2</h6></th>
    </tr>

    <tr>
        
        <td></td>
        <td></td>
    </tr>

    
    <tr>
        
        <td>Course Title</td>
        <td>{{ $student->qualification2_course_title }}</td>
    </tr>


    <tr>
        
        <td>Course Level</td>
        <td>{{ $student->qualification2_course_level }}</td>
    </tr>


    <tr>
        
        <td>Course Duration</td>
        <td>{{ $student->qualification2_course_duration }}</td>
    </tr>


    <tr>
        
        <td>University or Organisation</td>
        <td>{{ $student->qualification2_university_or_organisation }}</td>
    </tr>


    <tr>
        
        <td>Medium of education</td>
        <td>{{ $student->qualification2_medium_of_education }}</td>
    </tr>


    <tr>
        
        <td>Grade</td>
        <td>{{ $student->qualification2_grade }}</td>
    </tr>


    <tr>
        
        <td>Year of passing</td>
        <td style="text-align: left;">{{ $student->qualification2_year_of_passing }}</td>
    </tr>









    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <th style="border: 1px solid #000; font-weight: bolder; font-size: 13px; text-align: center;" colspan="3"><h6>Emergency Contact Info</h6></th>
    </tr>

    <tr>
        <td></td>
        <td></td>
    </tr>


    <tr>
        <td>Contact name</td>
        <td>{{ $student->emergency_contact_name }}</td>
    </tr>
    <tr>
        <td>Contact relationship</td>
        <td>{{ $student->emergency_contact_relationship }}</td>
    </tr>
    <tr>
        <td>Contact number</td>
        <td style="text-align: left;">{{ $student->emergency_contact_number }}</td>
    </tr>





    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <th style="border: 1px solid #000; font-weight: bolder; font-size: 13px; text-align: center;" colspan="3"><h6>Address Info</h6></th>
    </tr>


    <tr>

        <th style="font-weight: bolder; font-size: 12px;" colspan="3"><h6>Permanent Address</h6></th>

    </tr>

    <tr>
        <td></td>
        <td></td>
    </tr>


    <tr>
        <td>Address line one</td>
        <td>{{ $student->permanent_address_line_one }}</td>
    </tr>
    <tr>
        <td>Address line two</td>
        <td>{{ $student->permanent_address_line_two }}</td>
    </tr>
    <tr>
        @php
            error_reporting(0);
            $address_country = DB::table('countries')->where('id', $student->permanent_address_country)->first();
        @endphp
        <td>Address country</td>
        <td>{{ $address_country->name }}</td>
    </tr>
    <tr>
        <td>Address state</td>
        <td>{{ $student->permanent_address_state }}</td>
    </tr>
    <tr>
        <td>Address city</td>
        <td>{{ $student->permanent_address_city }}</td>
    </tr>
    <tr>
        <td>Address pincode</td>
        <td>{{ $student->permanent_address_pincode }}</td>
    </tr>



    <tr>
        <td></td>
        <td></td>
    </tr>

    <tr>

        <th style="font-weight: bolder; font-size: 12px;" colspan="3"><h6>Communication Address</h6></th>

    </tr>

    <tr>
        <td></td>
        <td></td>
    </tr>


    <tr>
        <td>Address line one</td>
        <td>{{ $student->communication_address_line_one }}</td>
    </tr>
    <tr>
        <td>Address line two</td>
        <td>{{ $student->communication_address_line_two }}</td>
    </tr>
    @php
        error_reporting(0);
        $address_country1 = DB::table('countries')->where('id', $student->communication_address_country)->first();
    @endphp
    <tr>
        <td>Address country</td>
        <td>{{ $address_country1->name }}</td>
    </tr>
    <tr>
        <td>Address state</td>
        <td>{{ $student->communication_address_state }}</td>
    </tr>
    <tr>
        <td>Address city</td>
        <td>{{ $student->communication_address_city }}</td>
    </tr>
    <tr>
        <td>Address pincode</td>
        <td>{{ $student->communication_address_pincode }}</td>
    </tr>


    
</table>