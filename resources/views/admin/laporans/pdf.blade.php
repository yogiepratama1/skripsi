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
            background-color: #c0e4f1; /* Blue-ish color for thead */
            text-align: center; /* Center align thead text */
        }

        tbody td {
            text-align: center; /* Center align tbody text */
        }

        .badge {
            padding: 6px 12px;
            font-size: 12px;
            border-radius: 4px;
        }

        .badge-success {
            background-color: #28a745; /* Green for 'Yes' */
            color: #ffffff;
        }

        .badge-danger {
            background-color: #dc3545; /* Red for 'No' */
            color: #ffffff;
        }

        .card-header{
            font-size: 36px;
            margin-bottom: 20px;
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
    <div class="card-header" style="text-align: center;">
        List Laporan Overtime
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>No Hp</th>
                        <th>Pangkat</th>
                        <th>Jabatan</th>
                        <th>Tanggal Lembur</th>
                        <th>Jam Lembur</th>
                        <th>Jenis Kerja</th>
                        <th>Disetujui Karyawan</th>
                        <th>Disetujui Officer Supplies</th>
                        <th>Disetujui Manager</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permintaans as $permintaan)
                        <tr data-entry-id="{{ $permintaan->id }}">
                            <td>{{ $permintaan->id ?? '' }}</td>
                            <td>{{ $permintaan->nama ?? '' }}</td>
                            <td>{{ $permintaan->no_hp ?? '' }}</td>
                            <td>{{ $permintaan->pangkat ?? '' }}</td>
                            <td>{{ $permintaan->jabatan ?? '' }}</td>
                            <td>{{ $permintaan->tanggal_lembur ? \Carbon\Carbon::parse($permintaan->tanggal_lembur)->format('Y-m-d') : '' }}</td>
                            <td>{{ $permintaan->jam_lembur ?? '' }}</td>
                            <td>{{ $permintaan->jenis_kerja ?? '' }}</td>
                            <td>
                                @if ($permintaan->disetujui_karyawan)
                                    <span class="badge badge-success">Disetujui</span>
                                @else
                                    <span class="badge badge-danger">Belum Disetujui</span>
                                @endif
                            </td>
                            <td>
                                @if ($permintaan->disetujui_officer_supplies)
                                    <span class="badge badge-success">Disetujui</span>
                                @else
                                    <span class="badge badge-danger">Belum Disetujui</span>
                                @endif
                            </td>
                            <td>
                                @if ($permintaan->disetujui_manager)
                                    <span class="badge badge-success">Disetujui</span>
                                @else
                                    <span class="badge badge-danger">Belum Disetujui</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
