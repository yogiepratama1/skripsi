@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Tambah Pemesanan
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('dashboard.permintaans.store') }}">
                @csrf
                <div class="form-group">
                    <label for="nama_pelanggan">Nama Pelanggan</label>
                    <input type="text" class="form-control" name="nama_pelanggan" required>
                </div>
                <div class="form-group">
                    <label for="email_pelanggan">Email Pelanggan</label>
                    <input type="email" class="form-control" name="email_pelanggan" required>
                </div>
                <div class="form-group">
                    <label for="alamat_pelanggan">Alamat Pelanggan</label>
                    <input type="text" class="form-control" name="alamat_pelanggan">
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" required>
                </div>
                <div class="form-group">
                    <label for="produk">Produk</label>
                    <select class="form-control" name="produk[]" required>
                        @foreach ($assets as $asset)
                            <option value="{{ $asset->name }}">{{ $asset->name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" required>
                        <option value="0">Menunggu Persetujuan</option>
                        <option value="1">Diproses</option>
                        <option value="2">Diproduksi</option>
                        <option value="3">Produksi Selesai</option>
                        <option value="4">Menunggu Kurir</option>
                        <option value="5">Dikirim Kurir</option>
                    </select>
                </div> -->
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
