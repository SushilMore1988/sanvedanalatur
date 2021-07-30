<?php

namespace App\Http\Controllers;
use App\Models\Caste;
use App\Models\DisabilityType;
// use App\Models\MartialStatus;
use App\Models\Divyang;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Exports\ExportCaste;
use App\Exports\ExportEducation;
use App\Exports\ExportGovermentScheme;
use App\Exports\ExportMartialStatus;
use Illuminate\Support\Facades\DB;

class AhwalController extends Controller
{
    public function caste()
    {
        $disabilityTypes = DisabilityType::all();
        $castes = Caste::all();
        return view('ahwal.caste', compact('disabilityTypes', 'castes'));
    }
    public function export() 
    {
        return Excel::download(new ExportCaste, 'Caste.xlsx');
    }

    public function education()
    {
        $disabilityTypes = DisabilityType::all();
        $educations = [
             'Illiterate',
             'Primary',
             'Middle/Higher Primary',
             'Senior Secondary',
             'Higher Secondary',
             'Diploma',
             'Graduate',
             'PG Diploma',
             'Post Graduate',
             'Doctorate'];
        return view('ahwal.education', compact('disabilityTypes', 'educations'));
    }
    public function exports() 
    {
        return Excel::download(new ExportEducation, 'Education.xlsx');
    }

    public function maritalStatus()
    {
        $disabilityTypes = DisabilityType::all();
        $maritalStatus = [
            'Married',
            'Unmarried',
            'Widow',
            'Divorced',
            'Divorced & Widower',
        ];
        return view('ahwal.marital-status', compact('disabilityTypes', 'maritalStatus'));
    }
    public function exportd() 
    {
        return Excel::download(new ExportMartialStatus, 'MartialStatus.xlsx');
    }
    public function povertyLine()
    {
        $disabilityTypes = DisabilityType::all();
        $castes = Caste::all();
        return view('ahwal.poverty-line', compact('disabilityTypes', 'castes'));
    }
    public function stPass()
    {
        $disabilityTypes = DisabilityType::all();
        $castes = Caste::all();
        return view('ahwal.st-pass', compact('disabilityTypes', 'castes'));
    }
    public function govScheme()
    {
        $disabilityTypes = DisabilityType::all();
        $castes = Caste::all();
        return view('ahwal.gov-scheme', compact('disabilityTypes', 'castes'));
    }
    public function exporte() 
    {
        return Excel::download(new ExportGovermentScheme, 'GovermentScheme.xlsx');
    }

    public function personalToilet()
    {
        $disabilityTypes = DisabilityType::all();
        $castes = Caste::all();
        return view('ahwal.personal-toilet', compact('disabilityTypes', 'castes'));
    }
    public function home()
    {
        $disabilityTypes = DisabilityType::all();
        $castes = Caste::all();
        return view('ahwal.home', compact('disabilityTypes', 'castes'));
    }
}