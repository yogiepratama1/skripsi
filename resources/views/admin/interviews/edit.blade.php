@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Permintaan
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.perencanaans.update', [$interview->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @if (auth()->user()->role != 'direktur')
            <div class="form-group">
                <label class="required" for="jumlah">jumlah</label>
                <input value="{{ $interview->jumlah }}" class="form-control {{ $errors->has('jumlah') ? 'is-invalid' : '' }}" type="number" name="jumlah" id="jumlah" required>
                @if($errors->has('jumlah'))
                <span class="text-danger">{{ $errors->first('jumlah') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="spesifikasi">Spesifikasi</label>
                <input value="{{ $interview->spesifikasi }}" type="text" class="form-control {{ $errors->has('spesifikasi') ? 'is-invalid' : '' }}" name="spesifikasi" id="spesifikasi">
                @if($errors->has('spesifikasi'))
                <span class="text-danger">{{ $errors->first('spesifikasi') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="deskripsi">Keterangan</label>
                <input value="{{ $interview->deskripsi }}" type="text" class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" name="deskripsi" id="deskripsi">
                @if($errors->has('deskripsi'))
                <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                @endif
            </div>
            @endif

            @if (auth()->user()->role == 'direktur')
            <div class="form-group">
                <label class="required" for="catatan_direktur">Catatan Direktur</label>
                <input value="{{ $interview->catatan_direktur }}" type="text" class="form-control {{ $errors->has('catatan_direktur') ? 'is-invalid' : '' }}" name="catatan_direktur" id="catatan_direktur">
                @if($errors->has('catatan_direktur'))
                <span class="text-danger">{{ $errors->first('catatan_direktur') }}</span>
                @endif
            </div>
            @endif
            <!-- <div class="form-group">
                <label class="required" for="desain">Link Desain</label>
                <input value="{{ $interview->desain }}" type="text" class="form-control {{ $errors->has('desain') ? 'is-invalid' : '' }}" name="desain" id="desain">
                @if($errors->has('desain'))
                <span class="text-danger">{{ $errors->first('desain') }}</span>
                @endif
            </div>

            @if (auth()->user()->role == 'cofounder')
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