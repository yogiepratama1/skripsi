@extends('layouts.admin')

@section('content')
    @if (auth()->user()->role == 'koordinator')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('dashboard.penugasan-teknisi.create') }}">
                Tugaskan Teknisi
            </a>
        </div>
    </div>
    @endif

    @if(session('successMessage'))
    <div class="alert alert-{{ session('custom_type', 'success') }}">
        {{ session('successMessage') }}
    </div>
@endif

    <div class="card">
        <div class="card-header">
            Daftar Penugasan Teknisi 
        </div>

        @if(session('errorMessage'))
        <div class="alert alert-{{ session('custom_type', 'info') }}">
            {{ session('errorMessage') }}
        </div>
    @endif

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-Permintaan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Kode Work Order</th>
                            <th>Tanggal Instalasi</th>
                            <th>Tanggal Mulai Pekerjaan</th>
                            <th>Status Work Order</th>
                            <th>Nama Teknisi</th>
                            <th>Catatan dari QC/Supervisor</th>
                            <th class="no-export">Aksi</th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach($workOrderAssignees as $assignee)
                            <tr data-entry-id="{{ $assignee->id }}">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $assignee->code ?? '-' }}</td>
                                <td>{{ $assignee->workOrder->code ?? '-' }}</td>
                                <td>{{ $assignee->workOrder->installation_date ? \Carbon\Carbon::parse($assignee->workOrder->installation_date)->format('Y-m-d') : '-' }}</td>
                                <td>{{ $assignee->workOrder->start_date ? \Carbon\Carbon::parse($assignee->workOrder->start_date)->format('Y-m-d') : '-' }}</td>
                                <td>{{ $assignee->workOrder->status ?? '-'}} ({{ $assignee->workOrder->evaluation->status ?? '-' }}) </td>
                                <td>{{ $assignee->assigneeNames ?? '-' }}</td>
                                <td>{{ $assignee->workOrder->evaluation->notes ?? '-' }}</td>
                                <td>
                                    @if ($assignee->workOrder->status == 'Belum Dimulai')
                                    <form action="{{ route('dashboard.penugasan-teknisi.mulai', $assignee->id) }}" method="POST" onsubmit="return confirm('Mulai Pekerjaan?');" style="display: inline-block;">
                                        @csrf
                                        <input type="submit" class="btn btn-xs btn-success" value="Mulai Pekerjaan">
                                    </form>
                                    <a class="btn btn-xs btn-info" href="{{ route('dashboard.penugasan-teknisi.edit', $assignee->id) }}">
                                        Edit
                                    </a>
                                    {{-- @if (auth()->user()->role == 'koordinator')
                                        
                                    <form action="{{ route('dashboard.penugasan-teknisi.destroy', $assignee->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                    </form>
                                    @endif --}}
                                    @endif
                                    @if (($assignee->workOrder->status == 'Dalam Proses' || $assignee->workOrder->evaluation?->status == 'Revisi') && auth()->user()->role == 'teknisi')
                                    <a class="btn btn-xs btn-info" href="{{ route('dashboard.penugasan-teknisi.selesaikan', $assignee->id) }}">
                                        Selesaikan Pekerjaan
                                    </a>
                                    @endif
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
