@extends('layouts.admin.master')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Absensi
                    </div>
                    <h2 class="page-title">
                        Submit Absensi
                    </h2>
                </div>


                <div class="page-body">
                    <div class="container-xl">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="container">
                                    <h1>Input Absensi</h1>
                                    <form action="{{ route('absensi.store') }}" method="post" id="absensiForm">
                                        @csrf
                                        <label for="tanggal_absen">Tanggal:</label>
                                        <input type="date" name="tanggal_absen" value="{{ date('Y-m-d') }}" required>
                                        <table class="table" border="1px">
                                            <thead>
                                                <tr>
                                                    <th>Nama Anggota</th>
                                                    <th>Jabatan</th>
                                                    <th>Status Piket</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($anggotas as $anggota)
                                                    <tr>
                                                        <td>{{ $anggota->nama }}</td>
                                                        <td>{{ $anggota->jabatan }}</td>
                                                        <td>
                                                            <select name="status[{{ $anggota->id }}]">
                                                                <option value="piket-hadir">Piket Hadir</option>
                                                                <option value="cadangan-piket">Cadangan Piket</option>
                                                                <option value="lepas-piket">Lepas Piket</option>
                                                                <option value="tidak-hadir">Tidak Hadir</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="keterangan[{{ $anggota->id }}]"
                                                                placeholder="Keterangan" disabled>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>

                                    <!-- Card setelah submit -->
                                    <div id="submittedCard" class="card mt-3 hidden-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Absensi Hari Ini Sudah Di-Submit</h5>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endsection


            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const selectStatuses = document.querySelectorAll('select[name^="status"]');
                    const inputKeterangan = document.querySelectorAll('input[name^="keterangan"]');

                    selectStatuses.forEach((select, index) => {
                        select.addEventListener('change', function() {
                            inputKeterangan[index].disabled = this.value !== 'tidak-hadir';
                        });

                        // Trigger the change event initially to disable/enable the input field based on the initial value
                        const event = new Event('change');
                        select.dispatchEvent(event);
                    });
                });
            </script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script>
                $(document).ready(function() {
                    // Periksa apakah absensi sudah di-submit berdasarkan tanggal hari ini
                    $.ajax({
                        type: "GET",
                        url: "/check-absensi-today",
                        success: function(response) {
                            var isSubmitted = response.isSubmitted;

                            if (isSubmitted) {
                                // Jika absensi sudah di-submit, sembunyikan form dan tampilkan card
                                $("#absensiForm").hide();
                                $("#submittedCard").removeClass("hidden-card");
                            } else {
                                // Jika absensi belum di-submit, terapkan event handler untuk form submit
                                $("#absensiForm").show();
                                $("#submittedCard").addClass("hidden-card");
                            }
                        },
                        error: function(error) {
                            console.error("Error:", error);
                        }
                    });
                });
            </script>
