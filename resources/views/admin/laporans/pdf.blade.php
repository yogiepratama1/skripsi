<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kartu Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 12px;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Striped Rows */
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }
    </style>
</head>
<body>
    <h1>Laporan Kartu Pendaftaran</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telp</th>
                <th>Agama</th>
                <th>TTL</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Kode Pos</th>
                <th>Nama Keluarga</th>
                <th>Nomor Kartu Keluarga</th>
                <th>Jumlah Anak</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($formulirPendaftarans as $formulirPendaftaran)
            <tr>
                <td>{{ $formulirPendaftaran->id ?? '' }}</td>
                <td>{{ $formulirPendaftaran->nama ?? '' }}</td>
                <td>{{ $formulirPendaftaran->email ?? '' }}</td>
                <td>{{ $formulirPendaftaran->telp ?? '' }}</td>
                <td>{{ $formulirPendaftaran->agama ?? '' }}</td>
                <td>{{ $formulirPendaftaran->ttl ?? '' }}</td>
                <td>{{ $formulirPendaftaran->jenis_kelamin === 1 ? 'Laki-laki' : 'Perempuan' }}</td>
                <td>{{ $formulirPendaftaran->alamat ?? '' }}</td>
                <td>{{ $formulirPendaftaran->kode_pos ?? '' }}</td>
                <td>{{ $formulirPendaftaran->nama_keluarga ?? '' }}</td>
                <td>{{ $formulirPendaftaran->nomor_kartu_keluarga ?? '' }}</td>
                <td>{{ $formulirPendaftaran->jumlah_anak ?? '' }}</td>
                @if ($formulirPendaftaran->status == 1)
                    <td>Menunggu Konfirmasi</td>
                @elseif ($formulirPendaftaran->status == 2)
                    <td>Diproses</td>
                @elseif ($formulirPendaftaran->status == 3)
                    <td>Disetujui</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
