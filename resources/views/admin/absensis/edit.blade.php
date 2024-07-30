@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Edit Absensi
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('dashboard.absensis.update', $absensi->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="asset_id">Eskul</label>
                    <select name="asset_id" class="form-control" required>
                        @foreach($assets as $asset)
                            <option value="{{ $asset->id }}" {{ $asset->id == $absensi->asset_id ? 'selected' : '' }}>{{ $asset->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="waktu_dan_jam">Waktu dan Jam</label>
                    <input required type="datetime-local" class="form-control" name="waktu_dan_jam" value="{{ $absensi->waktu_dan_jam }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
