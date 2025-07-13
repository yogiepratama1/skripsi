<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Work Order</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background: #fff;
            color: #222;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 700px;
            margin: 32px auto;
            background: #fff;
            border: 1px solid #000;
            padding: 32px 36px;
        }
        h2 {
            text-align: center;
            margin-bottom: 24px;
            color: #000;
            font-size: 1.6em;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .section-title {
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 10px;
            color: #000;
            font-size: 1.08em;
            border-bottom: 1px solid #000;
            padding-bottom: 3px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 14px;
        }
        td {
            padding: 7px 8px;
            vertical-align: top;
            font-size: 1em;
            border: 1px solid #000;
        }
        td.label {
            width: 180px;
            font-weight: bold;
            background: #f8f8f8;
            color: #000;
        }
        td.value {
            background: #fff;
            color: #000;
        }
        /* Style for photo page */
        .photo-page {
            page-break-before: always;
            padding: 32px 36px;
            max-width: 700px;
            margin: 0 auto;
        }
        .photo-title {
            font-weight: bold;
            font-size: 1.08em;
            margin-bottom: 18px;
            color: #000;
            border-bottom: 1px solid #000;
            padding-bottom: 3px;
            text-align: center;
        }
        .photo-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 20px 20px;
        }
        .photo-table td {
            text-align: center;
            vertical-align: top;
            border: none;
            padding: 0;
        }
        .photo-table img {
            max-width: 300px;
            max-height: 220px;
            border: 1.5px solid #888;
            margin-bottom: 8px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Work Order PT Graha Artha</h2>
        <table>
            <tr>
                <td class="label">No. Work Order</td>
                <td class="value">{{ $workOrder->code ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Tanggal Instalasi</td>
                <td class="value">{{ \Carbon\Carbon::parse($workOrder->installation_date)->format('Y-m-d')   }}</td>
            </tr>
        </table>

        <div class="section-title">Data Pelanggan</div>
        <table>
            <tr>
                <td class="label">Nama</td>
                <td class="value">{{ $workOrder->customer->name ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Alamat</td>
                <td class="value">{{ $workOrder->customer->location ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">No. Telepon</td>
                <td class="value">{{ $workOrder->customer->phone ?? '-' }}</td>
            </tr>
        </table>

        <div class="section-title">Detail Pekerjaan</div>
        <table>
            <tr>
                <td class="label">Lokasi Pekerjaan</td>
                <td class="value">{{ $workOrder->location ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Jenis Instalasi</td>
                <td class="value">{{ $workOrder->installation_type ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Estimasi Waktu</td>
                <td class="value">
                    @if($workOrder->estimated_duration)
                        {{ $workOrder->estimated_duration }} Jam
                    @else
                        -
                    @endif
                </td>
            </tr>
            <tr>
                <td class="label">Tanggal Selesai</td>
                <td class="value">
                    {{ $workOrder->evaluation->approved_at ? $workOrder->evaluation->approved_at->format('Y-m-d') : '-' }}
                </td>
            </tr>
        </table>
    </div>

    @if(!empty($workOrder->evaluation->image_paths) && is_array($workOrder->evaluation->image_paths))
    <div class="photo-page">
        <div class="photo-title">Foto Dokumentasi</div>
        <table class="photo-table">
            <tr>
            @foreach($workOrder->evaluation->image_paths as $i => $img)
                <td>
                    <img src="{{ asset('storage/'.$img) }}" alt="Foto Dokumentasi">
                </td>
                @if(($i + 1) % 2 == 0 && $i + 1 < count($workOrder->evaluation->image_paths))
            </tr><tr>
                @endif
            @endforeach
            </tr>
        </table>
    </div>
    @endif
</body>
</html>