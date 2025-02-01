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
    <h2 style="text-align: center;">List Sponsorship</h2>
    <table>
        <thead>
            <tr>
                <th width="10">No</th>
                <th>Nama Klien</th>
                            <th>Nama Acara</th>
                            <th>Tanggal Acara</th>
                            <th>Kebutuhan Sponsorhip</th>
                            <th>Anggaran</th>
                            <th>Status</th>
                            <th>Status Acara</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporans as $index => $laporan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $laporan->nama_pelanggan }}</td>
                            <td>{{ $laporan->alamat_pelanggan }}</td>
                            <td>{{ \Carbon\Carbon::parse($laporan->tanggal_bayar)->format('Y-m-d') }}</td>
                            <td>{{ $laporan->keluhan }}</td>
                            <td>{{ number_format(is_numeric($laporan->motor) ? $laporan->motor : 0, 0, ',', '.') ?? ''  }} </td>
                            <td>
                                @switch($laporan->status)
                                    @case(0)
                                        Not Verified
                                        @break
                                    @case(1)
                                        Verified
                                        @break
                                    @case(2)
                                        Menunggu Pembayaran
                                        @break
                                    @case(3)
                                        Selesai
                                        @break
                                @endswitch
                            </td>
                            <td>
                                @switch($laporan->status_acara)
                                    @case(0)
                                        Not Started
                                        @break
                                    @case(1)
                                    Ongoing
                                        @break
                                    @case(2)
                                    Completed
                                        @break
                                    @case(3)
                                        Selesai
                                        @break
                                @endswitch
                            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
