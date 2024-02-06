@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Permintaan Reservasi
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.permintaans.update', [$permintaan->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if (auth()->user()->role == 'mekanik' ||auth()->user()->role == 'gudang')
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
            @endif

            @if (auth()->user()->role == 'user' || auth()->user()->role == 'frontdesk')
            <div class="form-group">
                <label class="required" for="nama_pelanggan">Nama Pelanggan</label>
                <input class="form-control {{ $errors->has('nama_pelanggan') ? 'is-invalid' : '' }}" type="text" name="nama_pelanggan" id="nama_pelanggan" required value="{{ $permintaan->nama_pelanggan }}">
                @if($errors->has('nama_pelanggan'))
                <span class="text-danger">{{ $errors->first('nama_pelanggan') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required" for="motor">Motor</label>
                <input class="form-control {{ $errors->has('motor') ? 'is-invalid' : '' }}" type="text" name="motor" id="motor" required value="{{ $permintaan->motor }}">
                @if($errors->has('motor'))
                <span class="text-danger">{{ $errors->first('motor') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required" for="nomor_polisi">Nomor Polisi</label>
                <input class="form-control {{ $errors->has('nomor_polisi') ? 'is-invalid' : '' }}" type="text" name="nomor_polisi" id="nomor_polisi" required value="{{ $permintaan->nomor_polisi }}">
                @if($errors->has('nomor_polisi'))
                <span class="text-danger">{{ $errors->first('nomor_polisi') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="alamat">Keluhan</label>
                <textarea class="form-control {{ $errors->has('keluhan') ? 'is-invalid' : '' }}" name="keluhan" id="keluhan" rows="3" required>{{ $permintaan->keluhan }}</textarea>
                @if($errors->has('keluhan'))
                <span class="text-danger">{{ $errors->first('keluhan') }}</span>
                @endif
            </div>
            @endif

            @if (auth()->user()->role == 'frontdesk')
            <div class="form-group">
                <label class="required" for="nama_frontdesk">Nama Front Desk</label>
                <input class="form-control {{ $errors->has('nama_frontdesk') ? 'is-invalid' : '' }}" type="text" name="nama_frontdesk" id="nama_frontdesk" required value="{{ $permintaan->nama_frontdesk }}">
                @if($errors->has('nama_frontdesk'))
                <span class="text-danger">{{ $errors->first('nama_frontdesk') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required" for="biaya_service">Biaya Service</label>
                <input class="form-control {{ $errors->has('biaya_service') ? 'is-invalid' : '' }}" type="number" name="biaya_service" id="biaya_service" value="{{ $permintaan->biaya_service }}" placeholder="isi jika sparepart ready">
                @if($errors->has('biaya_service'))
                <span class="text-danger">{{ $errors->first('biaya_service') }}</span>
                @endif
            </div>
            <div class="form-group">
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
            @endif

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

@endsection