@if ($absensis->count() > 0)
    <h2>Detail Data ({{ $status }})</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Group Piket</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($absensis as $absensi)
                <tr>
                    <td>{{ $absensi->anggota->nama }}</td>
                    <td>{{ $absensi->anggota->jabatan }}</td>
                    <td>{{ $absensi->anggota->jadwal->kode_piket }}</td>
                    <td>{{ $absensi->keterangan ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Tidak ada data untuk status {{ $status }} pada tanggal tersebut.</p>
@endif
