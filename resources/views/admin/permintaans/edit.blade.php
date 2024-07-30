@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Edit Permintaan
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('dashboard.permintaans.update', $permintaan->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_siswa">Nama Siswa</label>
                    <input type="text" class="form-control" name="nama_siswa" value="{{ $permintaan->nama_siswa }}" required>
                </div>
                <!-- <div class="form-group">
                    <label for="alamat_siswa">Alamat Siswa</label>
                    <input type="text" class="form-control" name="alamat_siswa" value="{{ $permintaan->alamat_siswa }}" required>
                </div> -->
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" class="form-control" name="kelas" value="{{ $permintaan->kelas }}" required>
                </div>
                <div class="form-group">
                    <label for="eskul">Eskul</label>
                    <select multiple class="form-control select2" name="eskul[]" required>
                        @foreach ($assets as $eskul)
                            <option value="{{ $eskul->name }}" {{ in_array($eskul->name, json_decode($permintaan->eskul)) ? 'selected' : '' }}>{{ $eskul->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
