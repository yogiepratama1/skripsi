@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Selesaikan Pekerjaan
    </div>

    @if(session('errorMessage'))
        <div class="alert alert-{{ session('custom_type', 'info') }}">
            {{ session('errorMessage') }}
        </div>
    @endif

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.penugasan-teknisi.selesaikan', $workOrderAssignee->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Upload File Bertanda Tangan --}}
            <div class="form-group mt-3">
                <label for="customer_signed_file">Upload File Bertanda Tangan (PDF)</label>
                <input type="file" class="form-control {{ $errors->has('customer_signed_file') ? 'is-invalid' : '' }}" name="customer_signed_file" id="customer_signed_file" accept=".pdf">
                @if($errors->has('customer_signed_file'))
                    <span class="text-danger">{{ $errors->first('customer_signed_file') }}</span>
                @endif
            </div>

            @php
            $signedFile = $workOrderAssignee->workOrder->customer_signed_file_path ?? null;
            @endphp
            @if($signedFile)
                <div class="mt-2">
                    <strong>Preview File:</strong>
                    <a href="{{ asset('storage/' . $signedFile) }}" target="_blank">
                        {{ basename($signedFile) }}
                    </a>
                </div>
            @endif


            {{-- Upload Foto Baru --}}
            <div class="form-group">
                <label for="images">Masukan Foto</label>
                <input type="file" class="form-control {{ $errors->has('images') ? 'is-invalid' : '' }}" name="images[]" id="images" multiple accept="image/*">
                @if($errors->has('images'))
                    <span class="text-danger">{{ $errors->first('images') }}</span>
                @endif
            </div>

            {{-- Preview Foto --}}
            <div class="form-group mt-3">
                <label>Preview Foto:</label>
                <div id="preview-container" class="d-flex flex-wrap gap-2">
                    {{-- Foto Lama --}}
                    @php
                        $oldImages = $workOrderAssignee->workOrder->evaluation->image_paths ?? null;
                    @endphp

                    @if($oldImages)
                        @foreach($oldImages as $path)
                            <div class="mr-2 mb-2">
                                <img src="{{ asset('storage/' . $path) }}" class="img-thumbnail" style="max-width: 150px; max-height: 150px;" alt="Foto Lama">
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="form-group mt-4">
                <button class="btn btn-danger" type="submit">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
@parent
<script>
    document.getElementById('images').addEventListener('change', function(event) {
        const previewContainer = document.getElementById('preview-container');

        // Optional: Kosongin preview baru (tapi jangan hapus foto lama)
        // Buat ID unik buat pembeda
        const newPreviewId = 'new-preview-section';

        // Hapus preview baru sebelumnya jika ada
        const existingNewPreview = document.getElementById(newPreviewId);
        if (existingNewPreview) {
            existingNewPreview.remove();
        }

        // Bikin container preview baru
        const newPreview = document.createElement('div');
        newPreview.id = newPreviewId;
        newPreview.className = 'd-flex flex-wrap gap-2 mt-2';

        Array.from(event.target.files).forEach(file => {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'img-thumbnail mr-2 mb-2';
                    img.style.maxWidth = '150px';
                    img.style.maxHeight = '150px';
                    newPreview.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });

        previewContainer.appendChild(newPreview);
    });
</script>
@endsection
