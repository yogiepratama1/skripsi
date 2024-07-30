@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Tambah Pendaftaran
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('dashboard.permintaans.store') }}">
                @csrf
                <div class="form-group">
                    <label for="nama_siswa">Nama Siswa</label>
                    <input type="text" class="form-control" name="nama_siswa" required>
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" class="form-control" name="kelas" required>
                </div>
                <div class="form-group">
                    <label for="eskul">Eskul</label>
                    <select multiple class="form-control select2" name="eskul[]" required>
                        @foreach ($assets as $eskul)
                            <option value="{{ $eskul->name }}">{{ $eskul->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection