<?php 
namespace App\Exports;



use App\Student;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StudentInfo implements FromView
{
    public function view(): View
    {
        return view('exports.studentinfo', [
            'students' => Student::all()
        ]);
    }
}