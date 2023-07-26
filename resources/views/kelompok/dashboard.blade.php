@extends('layouts.admin.master')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Dashboard
                    </div>
                    <h2 class="page-title">
                        Dashboard Pimpinan Kelompok
                    </h2>
                </div>


                <div class="page-body">
                    <div class="container-xl">
                        <div class="row row-cards">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="container text-center">
                                        <img src="{{ asset('assets/img/logos.png') }}" width="300px" alt="">
                                    </div>
                                    <h2 class="text-center mt-5 text-decoration-none"><a
                                            href="{{ route('show.submit') }}">Klik Untuk Submit
                                            Absensi</a></h2>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endsection
