@extends('layout.main')
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2>{{ session('title') }}</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('province.update', ['id' => isset($province) ? $province->id : null]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Provinsi</label>
                    <input type="text" class="form-control" name="name" required
                        value="{{ isset($province) ? old('name', $province->name) : old('name') }}">
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">
                        <option value="1"
                            {{ isset($province) && $province->status == 1 && old('status') == 1 ? 'selected' : '' }}>Aktif
                        </option>
                        <option value="0"
                            {{ isset($province) && $province->status == 0 && old('status') == 0 ? 'selected' : '' }}>Non
                            Aktif</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center">
                    <a href="{{ route('province.index') }}" class="btn btn-danger btn-lg">Kembali</a>
                    <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
