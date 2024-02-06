<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PDF Export</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th.no-export {
            display: none;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            background-color: #3490dc;
            color: white;
            text-align: center;
        }

        tr:nth-child(odd) {
            background-color: #f2f2f2;
            /* Odd row stripe color */
        }

        tr:nth-child(even) {
            background-color: #ffffff;
            /* Even row stripe color */
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">List Service</h2>
    <h2 style="text-align: center;">{{ $start }} - {{ $end }}</h2>
    <table>
        <thead>
            <tr>
                <th class="no-export" width="10">No</th>
                <th>Nama Pelanggan</th>
                <th>Nama Front Desk</th>
                <th>Motor</th>
                <th>Nomor Polisi</th>
                <th>Keluhan</th>
                <th>Biaya Service</th>
                <th>Status</th>
                <!-- <th>Tanggal Reservasi</th>
                        <th>Tanggal Diproses</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach($laporans as $key => $permintaan)
            <tr data-entry-id="{{ $permintaan->id }}">
                <td>{{ $permintaan->nama_pelanggan ?? '' }}</td>
                <td>{{ $permintaan->nama_frontdesk ?? '' }}</td>
                <td>{{ $permintaan->motor ?? '' }}</td>
                <td>{{ $permintaan->nomor_polisi ?? '' }}</td>
                <td>{{ $permintaan->keluhan ?? '' }}</td>
                <td>Rp{{ number_format($permintaan->biaya_service, 2, ',', '.') }}</td>
                <td class="text-center">
                    @if ($permintaan->status == 'mekanik')
                    <span class="badge badge-info">Diperbaiki Mekanik</span>
                    @elseif ($permintaan->status == 'mekanik_selesai')
                    <span class="badge badge-info">Selesai Diperbaiki Mekanik</span>
                    @elseif ($permintaan->status == 'gudang')
                    <span class="badge badge-warning">Sparepart Sedang Diperiksa Gudang</span>
                    @elseif ($permintaan->status == 'sparepart_ready')
                    <span class="badge badge-info">Sparepart Tersedia</span>
                    @elseif ($permintaan->status == 'sparepart_not_ready')
                    <span class="badge badge-danger">Sparepart Tidak Tersedia</span>
                    @elseif ($permintaan->status == 'selesai')
                    <span class="badge badge-success">Selesai</span>
                    @else
                    <span class="badge badge-info">Menunggu frontdesk</span>
                    @endif
                </td>
                <!-- <td>{{ $permintaan->created_at ? \Carbon\Carbon::parse($permintaan->created_at)->format('Y-m-d') : '' }}</td>
                        <td>{{ $permintaan->tanggal_diproses ? \Carbon\Carbon::parse($permintaan->tanggal_diproses)->format('Y-m-d') : '' }}</td> -->
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>