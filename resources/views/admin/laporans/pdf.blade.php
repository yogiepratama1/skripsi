<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #008000; /* Less bright green color */
            color: white; /* White text */
            text-align: center;
        }
        
        h1 {
            text-align: center;
        }
        
        tr {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Laporan Pelanggan dan Promo</h1>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Promo</th>
                    <th>Tanggal Promo</th>
                    <th>Kepuasan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permintaans as $permintaan)                                
                <tr data-entry-id="{{ $permintaan->id }}">
                    <td class="text-center">{{ $permintaan->id ?? '' }}</td>
                    <td>{{ $permintaan->nama ?? '' }}</td>
                    <td>{{ $permintaan->alamat ?? '' }}</td>
                    <td>{{ $permintaan->no_hp ?? '' }}</td>
                    <td>{{ $permintaan->barang ?? '' }}</td>
                    <td>{{ $permintaan->jumlah ?? '' }}</td>
                    <td>{{ number_format($permintaan->total_harga ?? 0, 0, ',', '.') }}</td>
                    @if ($permintaan->perancangan != null)
                                <td>{{ $permintaan->perancangan->promo ?? '' }}</td>
                                <td>{{ $permintaan->perancangan->tanggal_promo ? \Carbon\Carbon::parse($permintaan->perancangan->tanggal_promo)->format('Y-m-d') : '' }}</td>
                                @else
                                <td></td>                                    
                                <td></td>                                    
                                @endif
                    <td>{{ $permintaan->kepuasan ?? '' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
