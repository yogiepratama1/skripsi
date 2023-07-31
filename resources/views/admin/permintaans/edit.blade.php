@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Permintaan
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.permintaans.update', $permintaan->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Add below -->
            <div class="form-group">
                <label for="nama">Nama</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ $permintaan->nama }}">
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="no_hp">Nomor HP</label>
                <input class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}" type="text" name="no_hp" id="no_hp" value="{{ $permintaan->no_hp }}">
                @if($errors->has('no_hp'))
                    <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="pangkat">Pangkat</label>
                <input class="form-control {{ $errors->has('pangkat') ? 'is-invalid' : '' }}" type="text" name="pangkat" id="pangkat" value="{{ $permintaan->pangkat }}">
                @if($errors->has('pangkat'))
                    <span class="text-danger">{{ $errors->first('pangkat') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input class="form-control {{ $errors->has('jabatan') ? 'is-invalid' : '' }}" type="text" name="jabatan" id="jabatan" value="{{ $permintaan->jabatan }}">
                @if($errors->has('jabatan'))
                    <span class="text-danger">{{ $errors->first('jabatan') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="tanggal_lembur">Tanggal Lembur</label>
                <input class="form-control date {{ $errors->has('tanggal_lembur') ? 'is-invalid' : '' }}" type="text" name="tanggal_lembur" id="tanggal_lembur" value="{{ $permintaan->tanggal_lembur }}">
                @if($errors->has('tanggal_lembur'))
                    <span class="text-danger">{{ $errors->first('tanggal_lembur') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="jam_lembur">Jam Lembur</label>
                <input class="form-control {{ $errors->has('jam_lembur') ? 'is-invalid' : '' }}" type="number" name="jam_lembur" id="jam_lembur" value="{{ $permintaan->jam_lembur }}">
                @if($errors->has('jam_lembur'))
                    <span class="text-danger">{{ $errors->first('jam_lembur') }}</span>
                @endif
            </div>

            @if (auth()->user()->role == 'user')                
            <div class="form-group">
                <label for="disetujui_karyawan">Disetujui Karyawan</label><br>
                <input type="checkbox" name="disetujui_karyawan" id="disetujui_karyawan" value="1" {{ $permintaan->disetujui_karyawan ? 'checked' : '' }}>
            </div>
            @endif

            @if (auth()->user()->role == 'officer_supplies') 
            @if ($permintaan->disetujui_karyawan == true)                
            <div class="form-group">
                <label for="disetujui_officer_supplies">Disetujui Officer Supplies</label><br>
                <input type="checkbox" name="disetujui_officer_supplies" id="disetujui_officer_supplies" value="1" {{ $permintaan->disetujui_officer_supplies ? 'checked' : '' }}>
            </div>
            @else
            <div class="form-group">
                <label for="disetujui_officer_supplies">Disetujui Officer Supplies</label><br>
                <input disabled type="checkbox" name="disetujui_officer_supplies" id="disetujui_officer_supplies" value="1" {{ $permintaan->disetujui_officer_supplies ? '' : '' }}>Menunggu persetujuan karyawan
            </div>
            @endif
            @endif

            @if (auth()->user()->role == 'manager')                
            @if ($permintaan->disetujui_officer_supplies == true)                
            <div class="form-group">
                <label for="disetujui_manager">Disetujui Manager</label><br>
                <input type="hidden" name="disetujui_semua" value="1">
                <input type="checkbox" name="disetujui_manager" id="disetujui_manager" value="1" {{ $permintaan->disetujui_manager ? 'checked' : '' }}>
            </div>
            @else
            <div class="form-group">
                <label for="disetujui_manager">Disetujui Manager</label><br>
                <input disabled type="checkbox" name="disetujui_manager" id="disetujui_manager" value="1" {{ $permintaan->disetujui_manager ? '' : '' }}>Menunggu persetujuan officer supplies
            @endif
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
