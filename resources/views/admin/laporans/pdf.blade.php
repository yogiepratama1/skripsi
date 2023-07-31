<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan List</title>
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
    <h1>Laporan List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Permintaan</th>
                <th>Nama Pelanggan</th>
                <th>Alamat Pelanggan</th>
                <th>Harga</th>
                <th>Sudah Dikirim</th>
                <th>Sudah Bayar</th>
                <th>Tanggal Bayar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporans as $key => $laporan)
                <tr data-entry-id="{{ $laporan->id }}">
                    <td>{{ $laporan->id ?? '' }}</td>
                    <td>{{ $laporan->permintaan->barang->name ?? '' }}</td>
                    <td>{{ $laporan->permintaan->nama_pelanggan ?? '' }}</td>
                    <td>{{ $laporan->permintaan->alamat_pelanggan ?? '' }}</td>
                    <td>Rp. {{ number_format($laporan->permintaan->barang->harga ?? 0, 0, ',', '.') }}</td>
                    <td>{{ $laporan->permintaan->sudah_dikirim ? 'Ya' : 'Belum' }}</td>
                    <td>{{ $laporan->permintaan->pembayaran?->sudah_bayar ? 'Ya' : 'Belum' }}</td>
                    <td>{{ $laporan->permintaan->pembayaran?->tanggal_bayar ?? '' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
