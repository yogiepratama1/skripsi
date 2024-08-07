@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Edit Pemesanan
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('dashboard.permintaans.update', $permintaan->id) }}">
                @method('PUT')
                @csrf
                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'user')
                    <div class="form-group">
                        <label for="nama_pelanggan">Nama Pelanggan</label>
                        <input type="text" class="form-control" name="nama_pelanggan" value="{{ $permintaan->nama_pelanggan }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email_pelanggan">Email Pelanggan</label>
                        <input type="email" class="form-control" name="email_pelanggan" value="{{ $permintaan->email_pelanggan }}" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat_pelanggan">Alamat Pelanggan</label>
                        <input type="text" class="form-control" name="alamat_pelanggan" value="{{ $permintaan->alamat_pelanggan }}">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" value="{{ $permintaan->jumlah }}" required>
                    </div>
                    <div class="form-group">
                        <label for="produk">Produk</label>
                        <select class="form-control" name="produk[]" required>
                            @foreach ($assets as $asset)
                                <option value="{{ $asset->name }}" {{ $permintaan->produk == $asset->name ? 'selected' : '' }}>{{ $asset->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <div class="form-group">
                        <label for="nama_pelanggan">Nama Pelanggan</label>
                        <input type="text" class="form-control" name="nama_pelanggan" value="{{ $permintaan->nama_pelanggan }}" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="email_pelanggan">Email Pelanggan</label>
                        <input type="email" class="form-control" name="email_pelanggan" value="{{ $permintaan->email_pelanggan }}" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="alamat_pelanggan">Alamat Pelanggan</label>
                        <input type="text" class="form-control" name="alamat_pelanggan" value="{{ $permintaan->alamat_pelanggan }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" value="{{ $permintaan->jumlah }}" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="produk">Produk</label>
                        <select class="form-control" name="produk[]" required disabled>
                            @foreach ($assets as $asset)
                                <option value="{{ $asset->name }}" {{ $permintaan->produk == $asset->name ? 'selected' : '' }}>{{ $asset->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" required>
                        @if(auth()->user()->role == 'kurir' && $permintaan->status == 4)
                            <option value="4" {{ $permintaan->status == 4 ? 'selected' : '' }} disabled>Menunggu Kurir</option>
                            <option value="5" {{ $permintaan->status == 5 ? 'selected' : '' }}>Dikirim Kurir</option>
                        @elseif (auth()->user()->role == 'admin')
                            <option value="1" {{ $permintaan->status == 1 ? 'selected' : '' }}>Diproses</option>
                            <!-- <option value="2" {{ $permintaan->status == 2 ? 'selected' : '' }}>Diproduksi</option> -->
                            @if ($permintaan->status == 3)
                                <option value="3" {{ $permintaan->status == 3 ? 'selected' : '' }} disabled>Produksi Selesai</option>
                                <option value="4" {{ $permintaan->status == 4 ? 'selected' : '' }}>Menunggu Kurir</option>
                            @endif
                        @elseif (auth()->user()->role == 'produksi')
                            <option value="1" {{ $permintaan->status == 1 ? 'selected' : '' }} disabled>Diproses</option>
                            <option value="2" {{ $permintaan->status == 2 ? 'selected' : '' }}>Diproduksi</option>
                            <option value="3" {{ $permintaan->status == 3 ? 'selected' : '' }}>Produksi Selesai</option>
                        @endif
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
