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
    <h2 style="text-align: center;">List Transaksi Servis</h2>
    <table>
        <thead>
            <tr>
                <th width="10">No</th>
                <th>Nama Pelanggan</th>
                <th>Mobil</th>
                <th>Nomor Polisi</th>
                <th>Keluhan</th>
                <th>Harga</th>
                <th>Tanggal Servis</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporans as $index => $laporan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $laporan->nama_pelanggan }}</td>
                <td>{{ $laporan->motor }}</td>
                <td>{{ $laporan->nomor_polisi }}</td>
                <td>{{ $laporan->keluhan }}</td>
                <td>{{ number_format($laporan->harga, 0, ',', '.') ?? ''  }} </td>
                <td>{{ $laporan->created_at->format('d/m/Y') }}</td>
                <td>
                @switch($laporan->status)
                                    @case(0)
                                        Menunggu Konfirmasi
                                        @break
                                    @case(1)
                                        Diproses
                                        @break
                                    @case(2)
                                        Menunggu Pembayaran
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
