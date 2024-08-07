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
    <h2 style="text-align: center;">Daftar Pemesanan</h2>
    <table class="table table-bordered table-striped table-hover datatable datatable-Permintaan">
                    <thead>
                    <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Jumlah</th>
                            <th>Produk</th>
                            <th>Tanggal Pemesanan</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($laporans as $permintaan)
                            <tr data-entry-id="{{ $permintaan->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $permintaan->nama_pelanggan }}</td>
                                <td>{{ $permintaan->email_pelanggan }}</td>
                                <td>{{ $permintaan->alamat_pelanggan }}</td>
                                <td>{{ $permintaan->jumlah }}</td>
                                <td>{{ $permintaan->produk }}</td>
                                <td>{{ $permintaan->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
</body>
</html>
