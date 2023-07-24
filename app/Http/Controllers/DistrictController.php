<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Alert;
use App\Http\Requests\DistrictRequest;
use App\Models\District;
use App\Models\Province;

class DistrictController extends Controller
{
    public function index(Request $request)
    {
        session()->put('title', 'Daftar Kabupaten');
        $provinces = Province::where('status', 1)->get();
        if ($request->ajax()) {
            $data = District::select('districts.*', 'provinces.name as province_name')
                ->join('provinces', 'districts.province_id', '=', 'provinces.id');
            if ($request->has('province') && $request->province != null) {
                $data = $data->where('provinces.slug', $request->province);
            }
            if ($request->has('min_population') && $request->min_population != null) {
                $data = $data->where('districts.population', '>=', $request->min_population);
            }

            if ($request->has('max_population') && $request->max_population != null) {
                $data = $data->where('districts.population', '<=', $request->max_population);
            }
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $alert = "return confirm('Apa kamu yakin?')";
                    return '<div class="btn-group" role="group" aria-label="Actions">
                    <a href="' . route('district.form', $row['slug']) . '" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="' . route('district.delete', $row['id']) . '" onclick="' . $alert . '" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i> Delete
                    </a>
                </div>';
                })
                ->editColumn('status', function ($row) {
                    $class = ($row['status'] == 1) ? 'success' : 'danger';
                    $text = ($row['status'] == 1) ? 'Aktif' : 'Tidak Aktif';
                    return '<span class="badge badge-pill badge-' . $class . '">' . $text . '</span>';
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        return view('districts.district', compact('provinces'));
    }

    public function form($slug = null)
    {
        session()->put('title', $slug ? 'Edit Kabupaten' : 'Tambah Kabupaten');
        $provinces = Province::where('status', 1)->get();
        // dd(District::with('province')->where('slug', $slug)->firstOrFail());
        return view('districts.form', [
            'district' => $slug ? District::with('province')->where('slug', $slug)->firstOrFail() : null,
            'provinces' => $provinces
        ]);
    }

    public function update(DistrictRequest $request, $id = null)
    {
        $data = $request->validated();
        if (!$id) {
            $id =  uniqid();
        }
        District::updateOrCreate(['id' => $id], $data);
        Alert::success('Sukses!', 'Berhasil menyimpan atau mengupdate data');
        return redirect()->route('district.index');
    }

    public function delete($id)
    {
        $district = District::findOrFail($id);
        $district->delete();
        Alert::success('Sukses!', 'Berhasil menghapus data');
        return redirect()->back();
    }
}
