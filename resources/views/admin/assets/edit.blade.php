@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Edit Produk
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('dashboard.assets.update', $asset->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nama Produk</label>
                    <input required type="text" class="form-control" name="name" value="{{ $asset->name }}" required>
                </div>
                <div class="form-group">
                    <label for="name">Harga Produk</label>
                    <input required type="number" class="form-control" name="name" value="{{ $asset->harga }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
