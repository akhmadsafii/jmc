<?php

namespace App\Http\Requests;

use App\Models\Province;
use Illuminate\Foundation\Http\FormRequest;
use Str;
use Illuminate\Validation\Rule;

class DistrictRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // dd($this->all);
        return [
            'province_id' => ['required'],
            'name' => 'required|string|max:255',
            'population' => 'required|numeric|min:0',
            'status' => 'required|in:0,1',
            'slug' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'province_id.required' => 'Kolom Provinsi harus diisi.',
            'name.required' => 'Kolom Nama Kabupaten harus diisi.',
            'name.string' => 'Kolom Nama Kabupaten harus berupa teks.',
            'name.max' => 'Kolom Nama Kabupaten maksimal 255 karakter.',
            'population.required' => 'Kolom Jumlah Penduduk harus diisi.',
            'population.numeric' => 'Kolom Jumlah Penduduk harus berupa angka.',
            'population.min' => 'Kolom Jumlah Penduduk harus bernilai minimal 0.',
            'status.required' => 'Kolom Status harus diisi.',
            'status.in' => 'Kolom Status harus berisi 0 atau 1.',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->name) . '-' . Str::random(5),
        ]);
        $province = Province::where('slug', $this->input('province_id'))->first();
        if ($province) {
            $this->merge([
                'province_id' => $province->id,
            ]);
        }
    }
}
