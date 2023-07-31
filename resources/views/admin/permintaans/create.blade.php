@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Permintaan Overtime
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.permintaans.store') }}" enctype="multipart/form-data">
            @csrf
            @if (auth()->user()->role == 'officer_services')                
            <div class="form-group">
                <label for="user_id">Pilih Karyawan</label>
                <select required class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $entry->id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
            </div>
            @endif

            <!-- Add below -->
            <div class="form-group">
                <label for="nama">Nama</label>
                <input required class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama') }}">
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="no_hp">Nomor HP</label>
                <input required class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}" type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') }}">
                @if($errors->has('no_hp'))
                    <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="pangkat">Pangkat</label>
                <input required class="form-control {{ $errors->has('pangkat') ? 'is-invalid' : '' }}" type="text" name="pangkat" id="pangkat" value="{{ old('pangkat') }}">
                @if($errors->has('pangkat'))
                    <span class="text-danger">{{ $errors->first('pangkat') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input required class="form-control {{ $errors->has('jabatan') ? 'is-invalid' : '' }}" type="text" name="jabatan" id="jabatan" value="{{ old('jabatan') }}">
                @if($errors->has('jabatan'))
                    <span class="text-danger">{{ $errors->first('jabatan') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="tanggal_lembur">Tanggal Lembur</label>
                <input required class="form-control date {{ $errors->has('tanggal_lembur') ? 'is-invalid' : '' }}" type="text" name="tanggal_lembur" id="tanggal_lembur" value="{{ old('tanggal_lembur') }}">
                @if($errors->has('tanggal_lembur'))
                    <span class="text-danger">{{ $errors->first('tanggal_lembur') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="jam_lembur">Jam Lembur</label>
                <input required class="form-control {{ $errors->has('jam_lembur') ? 'is-invalid' : '' }}" type="number" name="jam_lembur" id="jam_lembur" value="{{ old('jam_lembur') }}">
                @if($errors->has('jam_lembur'))
                    <span class="text-danger">{{ $errors->first('jam_lembur') }}</span>
                @endif
            </div>

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
