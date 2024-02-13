@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Nilai Bobot
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.bobots.update', [$bobot->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- @if (auth()->user()->role == 'mekanik' ||auth()->user()->role == 'gudang')
            <div class="form-group">
                <label class="required" for="status">Status</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    @if (auth()->user()->role == 'mekanik')
                    <option value="mekanik" {{ old('status') == 'mekanik' ? 'selected' : '' }}>Diperbaiki Mekanik</option>
                    <option value="mekanik_selesai" {{ old('status') == 'mekanik_selesai' ? 'selected' : '' }}>Selesai Diperbaiki Mekanik</option>
                    @elseif(auth()->user()->role == 'gudang')
                    <option value="gudang" {{ old('status') == 'gudang' ? 'selected' : '' }}>Sparepart Sedang Diperiksa Gudang</option>
                    <option value="sparepart_ready" {{ old('status') == 'sparepart_ready' ? 'selected' : '' }}>Sparepart Tersedia</option>
                    <option value="sparepart_not_ready" {{ old('status') == 'sparepart_not_ready' ? 'selected' : '' }}>Sparepart Tidak Tersedia</option>
                    @endif
                </select>
                @if($errors->has('status'))
                <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
            </div>
            @endif -->

            <div class="form-group">
                <label class="required" for="nama">Nama</label>
                <input disabled class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" required value="{{ $bobot->nama }}">
                @if($errors->has('nama'))
                <span class="text-danger">{{ $errors->first('nama') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="jenis">Jenis</label>
                <input class="form-control {{ $errors->has('jenis') ? 'is-invalid' : '' }}" type="text" name="jenis" id="jenis" value="{{ $bobot->jenis }}" placeholder="isi jika sparepart ready">
                @if($errors->has('jenis'))
                <span class="text-danger">{{ $errors->first('jenis') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="nilai">Nilai Bobot</label>
                <input class="form-control {{ $errors->has('nilai') ? 'is-invalid' : '' }}" type="number" name="nilai" id="nilai" value="{{ $bobot->nilai }}" placeholder="isi jika sparepart ready">
                @if($errors->has('nilai'))
                <span class="text-danger">{{ $errors->first('nilai') }}</span>
            </div>
            <!-- <div class="form-group">
                <label class="required" for="status">Status</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    @if (auth()->user()->role == 'mekanik')
                    <option value="mekanik" {{ old('status') == 'mekanik' ? 'selected' : '' }}>Diperbaiki Mekanik</option>
                    @elseif(auth()->user()->role == 'gudang')
                    <option value="gudang" {{ old('status') == 'gudang' ? 'selected' : '' }}>Sparepart Sedang Diperiksa Gudang</option>
                    @elseif(auth()->user()->role == 'frontdesk')
                    <option value="reservasi" {{ old('status') == 'reservasi' ? 'selected' : '' }}>Reservasi</option>
                    <option value="sparepart_ready" {{ old('status') == 'sparepart_ready' ? 'selected' : '' }}>Sparepart Tersedia</option>
                    <option value="sparepart_not_ready" {{ old('status') == 'sparepart_not_ready' ? 'selected' : '' }}>Sparepart Tidak Tersedia</option>
                    <option value="mekanik" {{ old('status') == 'mekanik' ? 'selected' : '' }}>Diperbaiki Mekanik</option>
                    <option value="gudang" {{ old('status') == 'gudang' ? 'selected' : '' }}>Sparepart Sedang Diperiksa Gudang</option>
                    <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    @endif
                </select>
                @if($errors->has('status'))
                <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
            </div>
            @endif -->

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

@endsection