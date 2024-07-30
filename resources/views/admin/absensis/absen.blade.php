@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Status Absensi
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('dashboard.absensis.update.absen', $absensi->id) }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Eskul</label>
                    <input type="text" class="form-control" name="name" value="{{ $absensi->asset->name }}" disabled>
                </div>
                <div class="form-group">
                    <label for="status">Status Absensi</label>
                    <select name="status" class="form-control" required>
                        <option value="H">H</option>
                        <option value="I">I</option>
                        <option value="S">S</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
