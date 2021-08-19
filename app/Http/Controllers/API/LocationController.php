<?php

namespace App\Http\Controllers\API;

use App\Models\Province;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Regency;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function provinces(Request $request)
    {
        return Province::all();
    }

    public function regencies(Request $request, $provinces_id)
    {
        return Regency::where('province_id', $provinces_id)->get();
    }
    public function districts(Request $request, $districts_id)
    {
        return District::where('regency_id', $districts_id)->get();
    }
}
