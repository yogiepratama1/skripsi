<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #f5f5f5;
            padding: 10px;
            font-weight: bold;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
        }

        .card-text {
            margin-bottom: 10px;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
        }

        .badge-warning {
            background-color: #ffc107;
            color: #000;
        }

        .badge-info {
            background-color: #17a2b8;
            color: #fff;
        }

        .badge-success {
            background-color: #28a745;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            Kartu Pendaftaran
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Informasi Pendaftar</h5>
                            <p class="card-text"><strong>Nama:</strong> <?php echo $formulirPendaftaran->nama ?? ''; ?></p>
                            <p class="card-text"><strong>Email:</strong> <?php echo $formulirPendaftaran->email ?? ''; ?></p>
                            <p class="card-text"><strong>Telp:</strong> <?php echo $formulirPendaftaran->telp ?? ''; ?></p>
                            <p class="card-text"><strong>Agama:</strong> <?php echo $formulirPendaftaran->agama ?? ''; ?></p>
                            <p class="card-text"><strong>TTL:</strong> <?php echo $formulirPendaftaran->ttl ?? ''; ?></p>
                            <p class="card-text"><strong>Jenis Kelamin:</strong> <?php echo $formulirPendaftaran->jenis_kelamin ?? ''; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Informasi Keluarga Pendaftar</h5>
                            <p class="card-text"><strong>Alamat:</strong> <?php echo $formulirPendaftaran->alamat ?? ''; ?></p>
                            <p class="card-text"><strong>Kode Pos:</strong> <?php echo $formulirPendaftaran->kode_pos ?? ''; ?></p>
                            <p class="card-text"><strong>Nama Keluarga:</strong> <?php echo $formulirPendaftaran->nama_keluarga ?? ''; ?></p>
                            <p class="card-text"><strong>Nomor Kartu Keluarga:</strong> <?php echo $formulirPendaftaran->nomor_kartu_keluarga ?? ''; ?></p>
                            <p class="card-text"><strong>Jumlah Anak:</strong> <?php echo $formulirPendaftaran->jumlah_anak ?? ''; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Status</h5>
                    <p class="card-text">
                        <?php if ($formulirPendaftaran->status == 1): ?>
                            <span class="badge badge-warning">Menunggu Konfirmasi</span>
                        <?php elseif ($formulirPendaftaran->status == 2): ?>
                            <span class="badge badge-info">Diproses</span>
                        <?php else: ?>
                            <span class="badge badge-success">Disetujui</span>
                        <?php endif; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
