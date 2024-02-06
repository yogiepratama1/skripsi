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
    <h2 style="text-align: center;">List Permintaan Lamaran</h2>
    <h2 style="text-align: center;">{{ $start }} - {{ $end }}</h2>
    <table>
        <thead>
            <tr>
                <th width="10">No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Setuju Kontrak</th>
                <th>Tanggal Melamar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporans as $key => $permintaan)
            <tr data-entry-id="{{ $permintaan->id }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $permintaan->nama ?? '' }}</td>
                <td>{{ $permintaan->jenis_kelamin ?? '' }}</td>
                <td>{{ $permintaan->alamat ?? '' }}</td>
                <td class="text-center">
                    @if ($permintaan->status == 'terkirim')
                    <span class="badge badge-info">Terkirim</span>
                    @elseif ($permintaan->status == 'test')
                    <span class="badge badge-warning">Test</span>
                    @elseif ($permintaan->status == 'interview')
                    <span class="badge badge-warning">Interview</span>
                    @elseif ($permintaan->status == 'ttd')
                    <span class="badge badge-warning">Tanda Tangan Kontrak</span>
                    @else
                    @endif
                </td>
                <td>{{ $permintaan->setuju_kontrak == '1' ? 'Ya' : 'Tidak' }}</td>
                <td>{{ $permintaan->created_at ? \Carbon\Carbon::parse($permintaan->created_at)->format('Y-m-d') : '' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>