<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\District;
use App\Models\Mahanagarpalika;
use App\Models\MahanagarpalikaWardNumber;
use App\Models\Nagarparishad;
use App\Models\NagarparishadWardNumber;
use App\Models\State;
use App\Models\Taluka;
use App\Models\Village;
use App\Models\Zone;

class AreaController extends Controller
{
    public function index($area)
    {
        $areas = null;
        switch ($area) {
            case 'country':
                $areas = Country::all();
                break;

            case 'state':
                $areas = State::all();
                break;

            case 'district':
                $areas = District::all();
                break;

            case 'taluka':
                $areas = Taluka::all();
                break;

            case 'mahanagarpalika':
                $areas = Mahanagarpalika::all();
                break;

            case 'mahanagarpalikaWardNumber':
                $areas = MahanagarpalikaWardNumber::all();
                break;

            case 'zone':
                $areas = Zone::all();
                break;

            case 'nagarparishad':
                $areas = Nagarparishad::all();
                break;

            case 'nagarparishadWardNumber':
                $areas = NagarparishadWardNumber::all();
                break;

            case 'city':
                $areas = City::all();
                break;

            case 'village':
                $areas = Village::all();
                break;
            
            default:
                abort(404);
                break;
        }
        return view('area.index', compact('areas', 'area'));
    }

    public function create($area)
    {
        return view('area.create', compact('area'));
    }
}