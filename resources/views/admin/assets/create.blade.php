@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Tambah Produk
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('dashboard.assets.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Produk</label>
                    <input required type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga Produk</label>
                    <input required type="number" class="form-control" name="harga" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
