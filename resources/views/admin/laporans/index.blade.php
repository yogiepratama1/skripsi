@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            {{-- Tampilkan error/info message jika ada --}}
            @if(session('errorMessage'))
                <div class="alert alert-{{ session('custom_type', 'info') }}">
                    {{ session('errorMessage') }}
                </div>
            @endif

            <form action="{{ route('dashboard.laporans.create-list') }}" method="POST" class="form-inline" style="display: inline-block;">
                @csrf
                <div class="form-group mb-2">
                    <label for="start_date" class="mr-2">Tanggal Mulai</label>
                    <input type="date" name="start_date" id="start_date" class="form-control mr-2" required>
                </div>
                <div class="form-group mb-2">
                    <label for="end_date" class="mr-2">Tanggal Selesai</label>
                    <input type="date" name="end_date" id="end_date" class="form-control mr-2" required>
                </div>
                <button type="submit" class="btn btn-success mb-2">
                    Export Daftar Laporan
                </button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Daftar Work Order 
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-Permintaan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Pelanggan</th>
                            <th>Status</th>
                            <th>Estimasi Durasi</th>
                            <th>Lokasi</th>
                            <th>Tipe Instalasi</th>
                            <th>Tanggal Selesai</th>
                            <th class="no-export">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($workOrders as $workOrder)
                            <tr data-entry-id="{{ $workOrder->id }}">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $workOrder->code ?? '-' }}</td>
                                <td>{{ $workOrder->customer->name ?? '-' }}</td>
                                <td>{{ $workOrder->status }}</td>
                                <td>{{ $workOrder->estimated_duration ?? '-' }} Jam</td>
                                <td>{{ $workOrder->location }}</td>
                                <td>{{ $workOrder->installation_type }}</td>
                                <td>{{ $workOrder->evaluation->approved_at ? $workOrder->evaluation->approved_at->format('d-m-Y H:i') : '-' }}</td>
                                <td>
                                    <form action="{{ route('dashboard.laporans.create-detail', $workOrder->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            Export Detail
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [[1, 'desc']],
                pageLength: 50,
            });

            let table = $('.datatable-Permintaan:not(.ajaxTable)').DataTable({ buttons: dtButtons });

            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
            });
        });
    </script>
@endsection