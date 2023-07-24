@extends('layout.main')
@section('content')
    @include('component.datatable')
    <div class="row mb-3">
        <div class="col-md-6">
            <h2>{{ session('title') }}</h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('district.form') }}" class="btn btn-primary mb-3">
                Tambah
            </a>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-4">
            <label for="provinceFilter" class="form-label">Filter Berdasarkan Provinsi</label>
            <select id="provinceFilter" class="form-control">
                <option value="">Pilih Provinsi</option>
                @foreach ($provinces as $province)
                    <option value="{{ $province->slug }}">{{ $province->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label for="minPopulation" class="form-label">Jumlah Penduduk (Minimal)</label>
            <input type="number" id="minPopulation" class="form-control" min="0" step="1"
                placeholder="Minimal Penduduk">
        </div>
        <div class="col-md-4">
            <label for="maxPopulation" class="form-label">Jumlah Penduduk (Maksimal)</label>
            <input type="number" id="maxPopulation" class="form-control" min="0" step="1"
                placeholder="Maksimal Penduduk">
        </div>
    </div>

    <table class="table table-hover" id="table-list">
        <thead>
            <tr>
                <th>#</th>
                <th>Kabupaten</th>
                <th>Provinsi</th>
                <th>Populasi</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    @push('scripts')
        <script>
            $(function() {
                var table = $('#table-list').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    ajax: {
                        url: "",
                        data: function(d) {
                            d.province = $('#provinceFilter').val();
                            d.min_population = $('#minPopulation').val();
                            d.max_population = $('#maxPopulation').val();
                        }
                    },
                    columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        className: 'align-middle'
                    }, {
                        data: 'name',
                        name: 'name',
                    }, {
                        data: 'province_name',
                        name: 'provinces.name',
                    }, {
                        data: 'population',
                        name: 'population',
                        render: function(data, type, row) {
                            if (type === 'display' || type === 'filter') {
                                return formatNumber(data);
                            }
                            return data;
                        },
                    }, {
                        data: 'status',
                        name: 'status',
                    }, {
                        data: 'action',
                        name: 'action',
                        className: 'text-center'
                    }, ]
                });


                $('#provinceFilter, #minPopulation, #maxPopulation').on('change input', function() {
                    table.draw();
                });

                function formatNumber(number) {
                    return new Intl.NumberFormat().format(number);
                }
            });
        </script>
    @endpush
@endsection
