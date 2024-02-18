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
    <h2 style="text-align: center;">List Laporan</h2>
    <h2 style="text-align: center;">{{ $start }} - {{ $end }}</h2>
    <table>
        <thead>
            <tr>
                <th width="10">No</th>
                <th>Spesifikasi</th>
                <th>Alasan</th>
                <th>Hasil Laporan</th>
                <th>Tanggal Laporan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporans as $key => $pengembalian)
            <tr data-entry-id="{{ $pengembalian->id }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pengembalian->barang->spesifikasi ?? '' }}</td>
                <td>{{ $pengembalian->alasan ?? '' }}</td>
                <td>{{ $pengembalian->laporan->hasillaporan ?? '' }}</td>
                <td>{{ $pengembalian->created_at ?? '' }}</td>
                <td class="text-center">
                    @if ($pengembalian->status == 'pending')
                    <span class="badge badge-info">Pending</span>
                    @elseif ($pengembalian->status == 'setuju')
                    <span class="badge badge-success">Setuju</span>
                    @else
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>