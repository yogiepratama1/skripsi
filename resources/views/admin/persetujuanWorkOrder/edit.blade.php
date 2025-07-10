@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Penugasan Teknisi
    </div>

    @if(session('errorMessage'))
        <div class="alert alert-{{ session('custom_type', 'info') }}">
            {{ session('errorMessage') }}
        </div>
    @endif

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.penugasan-teknisi.update', $workOrderAssignee->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="work_order_id">Pilih Work Order</label>
                <select class="form-control {{ $errors->has('work_order_id') ? 'is-invalid' : '' }}" name="work_order_id" id="work_order_id" disabled>
                    <option value="">-- Pilih Work Order --</option>
                    @foreach($workOrders as $wo)
                        <option value="{{ $wo->id }}" {{ (old('work_order_id', $workOrderAssignee->work_order_id) == $wo->id) ? 'selected' : '' }}>
                            {{ $wo->code ?? 'WO#' . $wo->id }}
                        </option>
                    @endforeach
                </select>
                <input type="hidden" name="work_order_id" value="{{ $workOrderAssignee->work_order_id }}">
                @if($errors->has('work_order_id'))
                    <span class="text-danger">{{ $errors->first('work_order_id') }}</span>
                @endif
            </div>
            
            <div class="form-group">
                <label for="assignee_ids">Pilih Teknisi</label>
                <select class="form-control select2 {{ $errors->has('assignee_ids') ? 'is-invalid' : '' }}" name="assignee_ids[]" id="assignee_ids" multiple>
                    @foreach($teknisi as $t)
                        <option value="{{ $t->id }}" 
                            {{ (collect(old('assignee_ids', $workOrderAssignee->assignee_ids))->contains($t->id)) ? 'selected' : '' }}>
                            {{ $t->name }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('assignee_ids'))
                    <span class="text-danger">{{ $errors->first('assignee_ids') }}</span>
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