<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Str;

class ProvinceRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            'slug' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nama',
            'status' => 'Status',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Kolom :attribute harus diisi.',
            'string' => 'Kolom :attribute harus berupa string.',
            'max' => 'Kolom :attribute maksimal :max karakter.',
            'in' => 'Kolom :attribute harus bernilai 0 atau 1.',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->name) . '-' . Str::random(5),
        ]);
    }
}
