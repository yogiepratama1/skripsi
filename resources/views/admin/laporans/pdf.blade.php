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
    <h2 style="text-align: center;">List Barang</h2>
    <h2 style="text-align: center;">{{ $start }} - {{ $end }}</h2>
    <table>
        <thead>
            <tr>
                <th class="no-export" width="10">No</th>
                <th>Nama</th>
                <th>Link Desain</th>
                <th>Jumlah</th>
                <th>Harga per pc</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporans as $key => $permintaan)
            <tr data-entry-id="{{ $permintaan->id }}">
                <td>{{ $permintaan->nama ?? '' }}</td>
                <td>{{ $permintaan->desain->desain ?? '' }}</td>
                <td>{{ $permintaan->jumlah ?? '' }}</td>
                <td>Rp{{ number_format($permintaan->harga, 2, ',', '.') }}</td>
                <td class="text-center">
                    @if ($permintaan->status == 'belum_diproduksi')
                    <span class="badge badge-info">Belum diproduksi</span>
                    @elseif ($permintaan->status == 'diproduksi')
                    <span class="badge badge-info">Diproduksi</span>
                    @elseif ($permintaan->status == 'produksi_selesai')
                    <span class="badge badge-info">Produksi Selesai</span>
                    @elseif ($permintaan->status == 'packing')
                    <span class="badge badge-info">Sedang Dipacking</span>
                    @elseif ($permintaan->status == 'ready')
                    <span class="badge badge-success">Ready</span>
                    @else
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>