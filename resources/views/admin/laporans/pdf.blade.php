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
    <h2 style="text-align: center;">Daftar Absensi Siswa</h2>
    <table class="table table-bordered table-striped table-hover datatable datatable-Permintaan">
                    <thead>
                        <tr>
                            <th width="10">No</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Eskul</th>
                            <th>Tanggal</th>
                            <th>Absen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($laporans as $index => $laporan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $laporan->user->name }}</td>
                            <td>{{ $laporan->kelas }}</td>
                            <td>{{ $laporan->absensi->asset->name }}</td>
                            <td>{{ $laporan->absensi->waktu_dan_jam }}</td>
                            <td>{{ $laporan->status }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
</body>
</html>
