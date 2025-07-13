@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Work Order
    </div>

    @if(session('errorMessage'))
        <div class="alert alert-{{ session('custom_type', 'info') }}">
            {{ session('errorMessage') }}
        </div>
    @endif

    <div class="card-body">
        <form method="POST" action="{{ route("dashboard.permintaans.update", [$workOrder->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama Pelanggan</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $workOrder->customer->name) }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="phone">Nomor HP Pelanggan</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $workOrder->customer->phone) }}">
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="location">Lokasi</label>
                <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" type="text" name="location" id="location" value="{{ old('location', $workOrder->customer->location) }}">
                @if($errors->has('location'))
                    <span class="text-danger">{{ $errors->first('location') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="installation_date">Tanggal Instalasi</label>
                <input class="form-control {{ $errors->has('installation_date') ? 'is-invalid' : '' }}" type="date" name="installation_date" id="installation_date" value="{{ old('installation_date', $workOrder->installation_date ? \Carbon\Carbon::parse($workOrder->installation_date)->format('Y-m-d') : '') }}">
                @if($errors->has('installation_date'))
                    <span class="text-danger">{{ $errors->first('installation_date') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="estimated_duration">Estimasi Durasi (Jam)</label>
                <input class="form-control {{ $errors->has('estimated_duration') ? 'is-invalid' : '' }}" type="number" name="estimated_duration" id="estimated_duration" value="{{ old('estimated_duration', $workOrder->estimated_duration) }}">
                @if($errors->has('estimated_duration'))
                <span class="text-danger">{{ $errors->first('estimated_duration') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="location">Lokasi</label>
                <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" type="text" name="location" id="location" value="{{ old('location', $workOrder->location) }}">
                @if($errors->has('location'))
                <span class="text-danger">{{ $errors->first('location') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    @foreach($workOrderStatuses as $status)
                        <option value="{{ $status }}" {{ (old('status', $workOrder->status) == $status) ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="instalation_type">Tipe Instalasi</label>
                <select class="form-control {{ $errors->has('instalation_type') ? 'is-invalid' : '' }}" name="instalation_type" id="instalation_type">
                    @foreach($installationTypes as $instalation_type)
                        <option value="{{ $instalation_type }}" {{ (old('instalation_type', $workOrder->instalation_type) == $instalation_type) ? 'selected' : '' }}>{{ $instalation_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('instalation_type'))
                    <span class="text-danger">{{ $errors->first('instalation_type') }}</span>
                @endif
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