<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;

class ReportController extends Controller
{
    public function index()
    {
        session()->put('title', 'Laporan Penduduk');
        $provinces = Province::where('status', 1)->get();
        return view('reports.report', compact('provinces'));
    }

    public function getDistricts($province = null)
    {
        $query = District::query();

        if ($province) {
            $query->where('province_id', $province);
        }

        $districts = $query->select('id', 'name', 'population')->where('status', 1)->get();
        return response()->json($districts);
    }
}
