@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Buat Perencanaan Desain
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.perencanaans.store') }}" enctype="multipart/form-data">
            @csrf
            @if (auth()->user()->role == 'staff')
            <div class="form-group">
                <label class="required" for="user_id">User</label>
                <select class="form-control select2 {{ $errors->has('user_id') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $user)
                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('user_id'))
                <span class="text-danger">{{ $errors->first('user_id') }}</span>
                @endif
            </div>
            @endif

            <div class="form-group">
                <label class="required" for="jumlah">jumlah</label>
                <input class="form-control {{ $errors->has('jumlah') ? 'is-invalid' : '' }}" type="number" name="jumlah" id="jumlah" required>
                @if($errors->has('jumlah'))
                <span class="text-danger">{{ $errors->first('jumlah') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="spesifikasi">Spesifikasi</label>
                <input type="text" class="form-control {{ $errors->has('spesifikasi') ? 'is-invalid' : '' }}" name="spesifikasi" id="spesifikasi">
                @if($errors->has('spesifikasi'))
                <span class="text-danger">{{ $errors->first('spesifikasi') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="deskripsi">Keterangan</label>
                <input type="text" class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" name="deskripsi" id="deskripsi">
                @if($errors->has('deskripsi'))
                <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                @endif
            </div>

            <!-- @if (auth()->user()->role == 'cofounder')
            <div class="form-group">
                <label class="required" for="status">Status</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value="setuju" {{ old('status') == 'setuju' ? 'selected' : '' }}>Setuju</option>
                    <option value="tidaksetuju" {{ old('status') == 'tidaksetuju' ? 'selected' : '' }}>Tidak Setuju</option>
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