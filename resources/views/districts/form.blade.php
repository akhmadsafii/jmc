@extends('layout.main')
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2>{{ session('title') }}</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('district.update', ['id' => isset($district) ? $district->id : null]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Pilih Provinsi</label>
                    {{-- {{ dd($district->province->slug) }} --}}
                    <select name="province_id" class="form-control">
                        <option value="" selected disabled>Pilih Provinsi</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->slug }}" {{ isset($district) && $district->province->slug == $province->slug ? 'selected' : '' }}>{{ $province->name }}</option>
                        @endforeach
                    </select>
                    @error('province_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Nama Kabupaten</label>
                    <input type="text" class="form-control" name="name" required
                        value="{{ isset($district) ? old('name', $district->name) : old('name') }}">
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="status">Jumlah Penduduk</label>
                        <input type="number" name="population" class="form-control" value="{{ isset($district) ? old('population', $district->population) : old('population') }}">
                        @error('population')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="status">Status</label>
                        <select name="status" class="form-control">
                            <option value="1"
                                {{ isset($district) && $district->status == 1 && old('status') == 1 ? 'selected' : '' }}>
                                Aktif
                            </option>
                            <option value="0"
                                {{ isset($district) && $district->status == 0 && old('status') == 0 ? 'selected' : '' }}>Non
                                Aktif</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{ route('district.index') }}" class="btn btn-danger btn-lg">Kembali</a>
                    <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
