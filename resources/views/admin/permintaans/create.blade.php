@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Buat Permintaan Reservasi
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.permintaans.store') }}" enctype="multipart/form-data">
            @csrf
            @if (auth()->user()->role == 'frontdesk')
            <div class="form-group">
                <label class="required" for="user_id">Akun Pelanggan</label>
                <select class="form-control select2 {{ $errors->has('user_id') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach ($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->id }}" {{ old('user_id') ==  $pelanggan->id ? 'selected' : '' }}>{{ $pelanggan->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('pelanggan'))
                <span class="text-danger">{{ $errors->first('pelanggan') }}</span>
                @endif
            </div>
            @endif

            <div class="form-group">
                <label class="required" for="nama_pelanggan">Nama Pelanggan</label>
                <input class="form-control {{ $errors->has('nama_pelanggan') ? 'is-invalid' : '' }}" type="text" name="nama_pelanggan" id="nama_pelanggan" required>
                @if($errors->has('nama_pelanggan'))
                <span class="text-danger">{{ $errors->first('nama_pelanggan') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required" for="motor">Motor</label>
                <input class="form-control {{ $errors->has('motor') ? 'is-invalid' : '' }}" type="text" name="motor" id="motor" required>
                @if($errors->has('motor'))
                <span class="text-danger">{{ $errors->first('motor') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required" for="nomor_polisi">Nomor Polisi</label>
                <input class="form-control {{ $errors->has('nomor_polisi') ? 'is-invalid' : '' }}" type="text" name="nomor_polisi" id="nomor_polisi" required>
                @if($errors->has('nomor_polisi'))
                <span class="text-danger">{{ $errors->first('nomor_polisi') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="alamat">Keluhan</label>
                <textarea class="form-control {{ $errors->has('keluhan') ? 'is-invalid' : '' }}" name="keluhan" id="keluhan" rows="3" required></textarea>
                @if($errors->has('keluhan'))
                <span class="text-danger">{{ $errors->first('keluhan') }}</span>
                @endif
            </div>

            @if (auth()->user()->role != 'user')
            <div class="form-group">
                <label class="required" for="nama_frontdesk">Nama Front Desk</label>
                <input class="form-control {{ $errors->has('nama_frontdesk') ? 'is-invalid' : '' }}" type="text" name="nama_frontdesk" id="nama_frontdesk" required>
                @if($errors->has('nama_frontdesk'))
                <span class="text-danger">{{ $errors->first('nama_frontdesk') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required" for="biaya_service">Biaya Service</label>
                <input class="form-control {{ $errors->has('biaya_service') ? 'is-invalid' : '' }}" type="text" name="biaya_service" id="biaya_service" required>
                @if($errors->has('biaya_service'))
                <span class="text-danger">{{ $errors->first('biaya_service') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="status">Status</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value="reservasi" {{ old('status') == 'reservasi' ? 'selected' : '' }}>Reservasi</option>
                    <option value="sparepart_ready" {{ old('status') == 'sparepart_ready' ? 'selected' : '' }}>Sparepart Tersedia</option>
                    <option value="sparepart_not_ready" {{ old('status') == 'sparepart_not_ready' ? 'selected' : '' }}>Sparepart Tidak Tersedia</option>
                    <option value="mekanik" {{ old('status') == 'mekanik' ? 'selected' : '' }}>Diperbaiki Mekanik</option>
                    <option value="gudang" {{ old('status') == 'gudang' ? 'selected' : '' }}>Sparepart Sedang Diperiksa Gudang</option>
                    <option value="ttd" {{ old('status') == 'ttd' ? 'selected' : '' }}>Tanda Tangan Kontrak</option>
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