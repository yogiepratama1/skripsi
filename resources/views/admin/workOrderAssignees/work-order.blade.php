<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Work Order PT Graha Artha</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 14px;
      margin: 20px;
      color: #000;
    }
    .container {
      border: 1px solid #000;
      padding: 20px;
      max-width: 700px;
      margin: auto;
    }

    .kop-surat {
      text-align: center;
      margin-bottom: 10px;
    }

    .kop-surat img {
      width: 100px;
      height: auto;
      margin-bottom: 5px;
    }

    .kop-surat h1 {
      margin: 0;
      font-size: 22px;
      text-transform: uppercase;
    }

    .kop-surat p {
      margin: 2px 0;
      font-size: 12px;
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
    }
    .section {
      margin-bottom: 15px;
    }
    .label {
      font-weight: bold;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }
    td {
      padding: 5px;
      vertical-align: top;
    }
    .signature {
      margin-top: 40px;
    }
    .signature td {
      height: 80px;
    }
    .footer {
      font-size: 12px;
      margin-top: 20px;
      color: #666;
    }
    .line-bold {
      border-top: 2px solid #000;
      margin-top: 10px;
    }

    .line-thin {
      border-top: 1px solid #000;
      margin-bottom: 30px;
    }

  </style>
</head>
<body>
  <div class="container">
    <!-- Kop Surat -->
    <div class="kop-surat">
      @php
          $logoPath = public_path('logo-perusahaan.png');
          $logoData = '';
          if (file_exists($logoPath)) {
              $logoType = pathinfo($logoPath, PATHINFO_EXTENSION);
              $logoData = 'data:image/' . $logoType . ';base64,' . base64_encode(file_get_contents($logoPath));
          }
      @endphp
      <img src="{{ $logoData }}" alt="Logo Perusahaan" style="width:100px; height:auto; margin-bottom:5px;">      <h1>PT Graha Artha</h1>
      <p>Jl. Gn. Sahari 12 No.16 No. 2 A, Kota Jakarta Pusat</p>
      <p>Telepon: (021) 6499967 | Email: info@grahartha.co.id</p>
    </div>
    <div class="line-bold"></div>
    <div class="line-thin"></div>

    <!-- Judul Dokumen -->
    <h2 style="text-align:center; margin-bottom: 30px;">Work Order</h2>

    <div class="section">
      <span class="label">Kode. Work Order:</span> {{ $workOrder->code }}<br>
      <span class="label">Tanggal Instalasi:</span> {{ \Carbon\Carbon::parse($workOrder->installation_date)->format('Y-m-d') }}<br>
    </div>

    <div class="section">
      <span class="label">Data Pelanggan</span>
      <table>
        <tr>
          <td class="label">Nama</td>
          <td>: {{ $workOrder->customer->name }}</td>
        </tr>
        <tr>
          <td class="label">Alamat</td>
          <td>: {{ $workOrder->customer->location }}</td>
        </tr>
        <tr>
          <td class="label">No. Telepon</td>
          <td>: {{ $workOrder->customer->phone }}</td>
        </tr>
      </table>
    </div>

    <div class="section">
      <span class="label">Detail Pekerjaan</span>
      <table>
        <tr>
          <td class="label">Lokasi Pekerjaan</td>
          <td>: {{ $workOrder->location }}</td>
        </tr>
        <tr>
          <td class="label">Jenis Instalasi</td>
          <td>: {{ $workOrder->installation_type }}</td>
        </tr>
        <tr>
          <td class="label">Estimasi Waktu</td>
          <td>: {{ $workOrder->estimated_duration }} Jam</td>
        </tr>
      </table>
    </div>

    <div class="section">
      <span class="label">Dibuat Oleh:</span> Koordinator PT Graha Artha<br>
      <span class="label">Nama Koordinator:</span> {{ $workOrder->coordinator->name }}<br>
    </div>

    <div class="section signature">
      <table>
        <tr>
          <td>
            Tanda Tangan Pelanggan:<br><br><br><br><br>
            ______________________<br><br>
            ({{ $workOrder->customer->name }})
          </td>
        </tr>
      </table>
    </div>

    <div class="footer">
      * Work Order ini dibuat otomatis dari sistem PT Graha Artha. Jika Anda tidak merasa mengajukan permintaan ini, silakan hubungi customer service kami.
    </div>
  </div>
</body>
</html>
