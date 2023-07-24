<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProvinceRequest;
use App\Models\Province;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Alert;

class ProvinceController extends Controller
{
    public function index(Request $request)
    {
        session()->put('title', 'Daftar Provinsi');
        if ($request->ajax()) {
            $data = Province::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $alert = "return confirm('Apa kamu yakin?')";
                    return '<div class="btn-group" role="group" aria-label="Actions">
                    <a href="' . route('province.form', $row['slug']) . '" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="' . route('province.delete', $row['id']) . '" onclick="' . $alert . '" class="btn btn-danger btn-sm">
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
        return view('provinces.province');
    }

    public function form($slug = null)
    {
        session()->put('title', $slug ? 'Edit Provinsi' : 'Tambah Provinsi');

        return view('provinces.form', [
            'province' => $slug ? Province::where('slug', $slug)->firstOrFail() : null
        ]);
    }

    public function update(ProvinceRequest $request, $id = null)
    {
        $data = $request->validated();
        if (!$id) {
            $id =  uniqid();
        }
        Province::updateOrCreate(['id' => $id], $data);
        Alert::success('Sukses!', 'Berhasil menyimpan atau mengupdate data');
        return redirect()->route('province.index');
    }

    public function delete($id)
    {
        $province = Province::findOrFail($id);
        $province->delete();
        Alert::success('Sukses!', 'Berhasil menghapus data');
        // Helper::toast('Berhasil menghapus data', 'success');
        return redirect()->back();
    }
}
