@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Tambah Eskul
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('dashboard.assets.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Eskul</label>
                    <input required type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea required class="form-control" name="deskripsi" required></textarea>
                </div>
                <div class="form-group">
                    <label for="waktu_dan_jam">Waktu dan Jam</label>
                    <input required type="datetime-local" class="form-control" name="waktu_dan_jam" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
