<?php

namespace App\Http\Controllers;

use App\Models\Caste;
use App\Models\DisabilityType;
use App\Models\Divyang;
use Illuminate\Support\Facades\DB;

class AhwalController extends Controller
{
    public function caste()
    {
        $disabilityTypes = DisabilityType::all();
        $castes = Caste::all();
        return view('ahwal.caste', compact('disabilityTypes', 'castes'));
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