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
    <h2 style="text-align: center;">List Rekomendasi Menu</h2>
    <h2 style="text-align: center;">{{ $start }} - {{ $end }}</h2>
    <table>
        <thead>
            <tr>
                <th width="10">Peringkat</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Hasil</th>
                <th>Harga Menu</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporans as $key => $variable)
            <tr data-entry-id="{{ $variable->id }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $variable->nama ?? '' }}</td>
                <td>{{ $variable->jenis }}</td>
                <td>{{ $variable->hasil }}</td>
                <td>{{ $variable->harga_menu }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>