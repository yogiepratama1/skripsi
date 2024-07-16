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
    <h2 style="text-align: center;">List Penyidikan Dan Permitaan Barang</h2>
    <table>
    <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Penyidik</th>
                                <th>Tersangka</th>
                                <th>Kelengkapan Berkas</th>
                                <th>Permintaan Barang</th>
                                <th>Status Barang</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($laporans as $key => $permintaan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $permintaan->nama_penyidik }}</td>
                                    <td>{{ $permintaan->nama_tersangka }}</td>
                                    <td>{{ $permintaan->kelengkapan ? 'Lengkap' : 'Tidak Lengkap' }}</td>
                                    @foreach ($permintaan->barangs as $barang)                                        
                                    <td>{{ $barang->barang }}</td>
                                    @endforeach
                                    <td>
                                        @if ($permintaan->barangs[0]->status == 0)
                                            Disetujui
                                        @elseif ($permintaan->barangs[0]->status == 1)
                                            Diproses
                                        @elseif ($permintaan->barangs[0]->status == 2)
                                            Siap Diambil
                                        @elseif ($permintaan->barangs[0]->status == 3)
                                            Diterima
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>    </table>
</body>
</html>
