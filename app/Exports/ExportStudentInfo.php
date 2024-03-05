<?php 
namespace App\Exports;



use App\Student;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportStudentInfo implements FromView
{
    public function view(): View
    {
        return view('exports.export-student', [
            'students' => Student::all()
        ]);
    }
}