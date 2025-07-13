@extends('layouts.admin')

@section('content')
    @if(session('successMessage'))
        <div class="alert alert-{{ session('custom_type', 'success') }}">
            {{ session('successMessage') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            Daftar Persetujuan Work Order
        </div>

        @if(session('errorMessage'))
            <div class="alert alert-{{ session('custom_type', 'info') }}">
                {{ session('errorMessage') }}
            </div>
        @endif

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-WorkOrderEvaluations">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Kode Work Order</th>
                            <th>Status</th>
                            <th class="no-export">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($workOrderEvaluations as $evaluation)
                            <tr data-entry-id="{{ $evaluation->id }}">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $evaluation->code ?? '-' }}</td>
                                <td>{{ $evaluation->workOrder->code ?? '-' }}</td>
                                <td>{{ $evaluation->status ?? '-' }}</td>
                                <td>
                                    <a class="btn btn-xs btn-primary" href="{{ route('dashboard.persetujuan-work-order.show', $evaluation->id) }}">
                                        Detail
                                    </a>
                                    {{-- Tambahan aksi lain kalau ada --}}
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

            let table = $('.datatable-WorkOrderEvaluations:not(.ajaxTable)').DataTable({ buttons: dtButtons });

            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
            });
        });
    </script>
@endsection
