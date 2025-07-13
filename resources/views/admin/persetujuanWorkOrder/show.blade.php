@extends('layouts.admin')

@section('content')
<div class="card shadow-sm">
    <div class="card-header text-black d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Detail Evaluasi Work Order</h5>
    </div>

    <div class="card-body">
        {{-- Info Work Order --}}
        <div class="row mb-2">
            <div class="col-md-6">
                <h6 class="text-muted">Lokasi</h6>
                <p>{{ $workOrderEvaluation->workOrder->location ?? '-' }}</p>

                <h6 class="text-muted">Jenis Instalasi</h6>
                <p>{{ $workOrderEvaluation->workOrder->installation_type ?? '-' }}</p>
            </div>
        </div>

        {{--  File Bertanda Tangan --}}
        <h6 class="text-muted">File Bertanda Tangan</h6>
        <div class="mb-4">
            @if($workOrderEvaluation->workOrder->customer_signed_file_path)
                <a href="{{ asset('storage/' . $workOrderEvaluation->workOrder->customer_signed_file_path) }}" target="_blank">
                    {{ basename($workOrderEvaluation->workOrder->customer_signed_file_path) }}
                </a>
            @else
                <p class="text-muted">Tidak ada file yang diunggah.</p>
            @endif
        </div>

        {{-- Foto Pekerjaan --}}
        <h6 class="text-muted">Dokumentasi Pekerjaan</h6>
        <div class="row mb-4">
            @if($workOrderEvaluation->image_paths)
                @foreach($workOrderEvaluation->image_paths as $path)
                    <div class="col-md-3 col-6 mb-3">
                        <img src="{{ asset('storage/' . $path) }}" class="img-fluid img-thumbnail shadow-sm" alt="Foto Pekerjaan">
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <p class="text-muted">Tidak ada foto yang diunggah.</p>
                </div>
            @endif
        </div>

        {{-- Form Setujui / Revisi hanya untuk Supervisor --}}
        @if(
            ($workOrderEvaluation->status == 'Revisi' && auth()->user()->role == 'quality_control') ||
            ($workOrderEvaluation->status == 'Menunggu Evaluasi QC' && auth()->user()->role == 'quality_control') ||
            ($workOrderEvaluation->status == 'Menunggu Persetujuan Supervisor' && auth()->user()->role == 'supervisor')
        )
        <form id="approvalForm" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="notes">Catatan Evaluasi</label>
                <textarea name="notes" id="notes" rows="3" class="form-control">{{ old('notes', $workOrderEvaluation->notes) }}</textarea>
                <small class="form-text text-muted">Wajib diisi jika ingin melakukan revisi.</small>
            </div>

            <div class="mt-4 d-flex">
                <button type="submit" class="btn btn-success mr-3" onclick="submitApproval('setujui')">Setujui</button>
                <button type="submit" class="btn btn-warning text-white" onclick="submitApproval('revisi')">Revisi</button>
            </div>
        </form>
        @endif
    </div>
</div>
@endsection

@section('scripts')
@parent
<script>
    function submitApproval(action) {
        event.preventDefault();
        const form = document.getElementById('approvalForm');
        const notes = document.getElementById('notes');

        if (action === 'revisi' && notes.value.trim() === '') {
            alert('Catatan revisi wajib diisi.');
            notes.focus();
            return;
        }

        if (action === 'setujui') {
            form.action = "{{ route('dashboard.persetujuan-work-order.setujui', $workOrderEvaluation->id) }}";
        } else {
            form.action = "{{ route('dashboard.persetujuan-work-order.revisi', $workOrderEvaluation->id) }}";
        }

        form.submit();
    }
</script>
@endsection
