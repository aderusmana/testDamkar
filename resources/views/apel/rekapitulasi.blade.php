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
                                    <h1>Rekapitulasi Data</h1>
                                    <form action="{{ route('rekapitulasi') }}" method="get" style="text-align: end">
                                        @csrf
                                        <label for="tanggal">Tanggal:</label>
                                        <input type="date" name="tanggal" required>
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </form>
                                    <h2>Rekapitulasi Absensi</h2>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Piket Hadir</td>
                                                <td>
                                                    <a href="#" class="total-status"
                                                        data-status="Piket Hadir">{{ $totalPiketHadir }}</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Cadangan Piket</td>
                                                <td>
                                                    <a href="#" class="total-status"
                                                        data-status="Cadangan Piket">{{ $totalCadanganPiket }}</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Lepas Piket</td>
                                                <td>
                                                    <a href="#" class="total-status"
                                                        data-status="Lepas Piket">{{ $totalLepasPiket }}</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tidak Hadir</td>
                                                <td>
                                                    <a href="#" class="total-status"
                                                        data-status="Tidak Hadir">{{ $totalIzinSakit }}</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="detail-table">
                                        <!-- Detail data akan ditampilkan disini setelah diklik -->
                                    </div>
                                </div>
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
        const totalStatusLinks = document.querySelectorAll('.total-status');
        const detailTable = document.querySelector('.detail-table');

        totalStatusLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                const status = this.dataset.status;
                const tanggal = document.querySelector('input[name="tanggal"]').value;
                const url = `/get-detail/${status}?tanggal=${tanggal}`;

                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        detailTable.innerHTML = data;
                    });
            });
        });
    });
</script>
