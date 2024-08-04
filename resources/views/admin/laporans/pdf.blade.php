<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>PDF Export</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
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
            background-color: #f2f2f2; /* Odd row stripe color */
        }

        tr:nth-child(even) {
            background-color: #ffffff; /* Even row stripe color */
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">List Pelatihan dan Kehadiran</h2>
    <table>
        <thead>
            <tr>
                            <th width="10">No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Pelatihan</th>
                            <th>Jumlah Peserta</th>
                            <th>Peserta Hadir</th>
                            <th>Status</th>
            </tr>
        </thead>
        <tbody>
        @foreach($laporans as $key => $permintaan)
                        <tr data-entry-id="{{ $permintaan->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $permintaan->judul }}</td>
                            <td>{{ $permintaan->deskripsi }}</td>
                            <td>{{ $permintaan->tanggal_pelatihan }}</td>
                            <td>{{ $permintaan->peserta->count() }}</td>
                            <td>{{ $permintaan->peserta->where('kehadiran', 'Hadir')->count() }}</td>
                            <td>
                                {{ $permintaan->status }}
                            </td>
                        </tr>
                    @endforeach
        </tbody>
    </table>
</body>
</html>
