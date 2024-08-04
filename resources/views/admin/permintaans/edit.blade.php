@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Permintaan
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.permintaans.update', [$permintaan->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="required" for="judul">Judul</label>
                <input class="form-control {{ $errors->has('judul') ? 'is-invalid' : '' }}" type="text" name="judul" id="judul" value="{{ old('judul', $permintaan->judul) }}" required>
                @if($errors->has('judul'))
                    <span class="text-danger">{{ $errors->first('judul') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="deskripsi">Deskripsi</label>
                <textarea class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" name="deskripsi" id="deskripsi" rows="3" required>{{ old('deskripsi', $permintaan->deskripsi) }}</textarea>
                @if($errors->has('deskripsi'))
                    <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="tanggal_pelatihan">Tanggal Pelatihan</label>
                <input class="form-control {{ $errors->has('tanggal_pelatihan') ? 'is-invalid' : '' }}" type="datetime-local" name="tanggal_pelatihan" id="tanggal_pelatihan" value="{{ old('tanggal_pelatihan', $permintaan->tanggal_pelatihan ? \Carbon\Carbon::parse($permintaan->tanggal_pelatihan)->format('Y-m-d\TH:i') : '') }}" required>
                @if($errors->has('tanggal_pelatihan'))
                    <span class="text-danger">{{ $errors->first('tanggal_pelatihan') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="peserta">Peserta</label>
                <select name="peserta[]" id="peserta" class="form-control select2" multiple>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ in_array($user->id, old('peserta', $permintaan->peserta->pluck('user_id')->toArray())) ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" >
                    <option value="Disetujui" {{ old('status', $permintaan->status == 'Disetujui') ? 'selected' : '' }}>Disetujui</option>
                    <option value="Pelatihan Berlangsung" {{ old('status', $permintaan->status == 'Pelatihan Berlangsung') ? 'selected' : '' }}>Pelatihan Berlangsung</option>
                    <option value="Pelatihan Selesai" {{ old('status', $permintaan->status == 'Pelatihan Selesai') ? 'selected' : '' }}>Pelatihan Selesai</option>
            </select>
            </div>

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
