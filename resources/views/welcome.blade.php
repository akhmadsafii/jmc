@extends('layout.main')
@section('content')
    @push('styles')
        <style>
            body {
                background-color: #f8f9fa;
            }

            .jumbotron {
                background-color: #007bff;
                color: #fff;
                border-radius: 10px;
                padding: 30px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .display-4 {
                font-size: 48px;
                font-weight: bold;
                margin-bottom: 30px;
            }

            .lead {
                font-size: 24px;
                font-weight: 500;
                margin-bottom: 40px;
            }

            .btn-primary {
                font-size: 20px;
                font-weight: bold;
                padding: 15px 30px;
                border-radius: 8px;
            }

            .btn-primary:hover {
                background-color: #0056b3;
            }
        </style>
    @endpush
    <div class="text-center mt-5">
        <div class="jumbotron">
            <h1 class="display-4 mb-4">Selamat Datang di Aplikasi Kependudukan</h1>
            <p class="lead">Mari mulai petualangan Anda dalam mengelola data kependudukan dengan mudah dan efisien.</p>
            <a href="{{ route('report.index') }}" class="btn btn-primary btn-lg">Get Started</a>
        </div>
    </div>
@endsection
