@extends('layout.main')
@section('content')
    @push('styles')
        <style>
            #provinceSelect {
                width: 200px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            .chartjs-render-monitor {
                margin-top: 20px;
            }
        </style>
    @endpush
    <h1 id="populationTitle">Jumlah Populasi Berdasarkan Provinsi</h1>
    <div>
        <h5>Total Jumlah Populasi: <span id="totalPopulation" class="text-primary font-weight-bold">0</span></h5>
    </div>
    <div class="mb-3">
        <label for="provinceSelect">Pilih Provinsi:</label>
        <select id="provinceSelect" class="form-control">
            <option value="">Semua Provinsi</option>
            @foreach ($provinces as $province)
                <option value="{{ $province->id }}">{{ $province->name }}</option>
            @endforeach
        </select>
    </div>
    <canvas id="populationChart" width="400" height="200"></canvas>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            $(function() {
                var populationChart;

                function loadChart(provinceId = null) {
                    $.ajax({
                        url: "{{ route('report.get_district') }}/" + provinceId,
                        method: "GET",
                        success: function(data) {
                            var labels = [];
                            var populations = [];
                            data.forEach(function(district) {
                                labels.push(district.name);
                                populations.push(district.population);
                            });

                            var ctx = document.getElementById('populationChart').getContext('2d');
                            if (populationChart) {
                                populationChart.destroy();
                            }
                            populationChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: labels,
                                    datasets: [{
                                        label: 'Jumlah Populasi',
                                        data: populations,
                                        backgroundColor: 'rgba(75, 192, 192, 0.7)', // Ganti warna dataset
                                        borderColor: 'rgba(75, 192, 192, 1)',
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    },
                                    plugins: {
                                        datalabels: {
                                            anchor: 'end',
                                            align: 'top',
                                            color: '#007bff',
                                            font: {
                                                weight: 'bold'
                                            }
                                        }
                                    }
                                }
                            });

                            var totalPopulation = populations.reduce((total, num) => total + num, 0);
                            $('#totalPopulation').text(formatNumber(totalPopulation));
                            var provinceName = provinceId ? $('#provinceSelect option:selected').text() :
                                'Semua Provinsi';
                            $('#populationTitle').text('Jumlah Populasi Berdasarkan Provinsi ' +
                                provinceName);
                        }
                    });
                }
                loadChart('');
                $('#provinceSelect').on('change', function() {
                    var selectedProvince = $(this).val();
                    loadChart(selectedProvince);
                });

                function formatNumber(number) {
                    return new Intl.NumberFormat().format(number);
                }
            });
        </script>
    @endpush
@endsection
