<!DOCTYPE html>
<html>
<head>
    <title>Exported PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Rata-Rata Penjualan Aksesoris</h2>

    <table>
        <thead>
            <tr>
                <th>Aksesoris</th>
                <th>Rata-Rata Penjualan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($averageHargaByAssetCategory as $assetCategory => $averageHarga)
                <tr>
                    <td>{{ $assetCategory }}</td>
                    <td style="text-align: end;">{{ number_format($averageHarga, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
