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
    <h1>Daftar Laporan Work Order</h1>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Pelanggan</th>
                    <th>Status</th>
                    <th>Estimasi Durasi</th>
                    <th>Lokasi</th>
                    <th>Tipe Instalasi</th>
                    <th>Tanggal Selesai</th>
                </tr>
            </thead>
                <tbody>
                    @foreach($workOrders as $workOrder)
                        <tr data-entry-id="{{ $workOrder->id }}">
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $workOrder->code ?? '-' }}</td>
                            <td>{{ $workOrder->customer->name ?? '-' }}</td>
                            <td>{{ $workOrder->status }}</td>
                            <td>{{ $workOrder->estimated_duration ?? '-' }} Jam</td>
                            <td>{{ $workOrder->location }}</td>
                            <td>{{ $workOrder->installation_type }}</td>
                            <td>{{ $workOrder->evaluation->approved_at ? $workOrder->evaluation->approved_at->format('d-m-Y H:i') : '-' }}</td>
                            <td>
                                {{-- Aksi lain jika diperlukan --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</body>

</html>
