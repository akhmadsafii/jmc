@extends('layout.main')
@section('content')
    @include('component.datatable')
    <h2>{{ session('title') }}</h2>
    <a href="{{ route('province.form') }}" class="btn btn-primary mb-3">
        Tambah
    </a>

    <table class="table table-hover" id="table-list">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Provinsi</th>
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
                    ajax: "",
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
                        data: 'status',
                        name: 'status',
                    }, {
                        data: 'action',
                        name: 'action',
                        className: 'text-center'
                    }, ]
                });

                $('#data-search').on('keyup', function() {
                    table.search(this.value).draw();
                });



            });
        </script>
    @endpush
@endsection
