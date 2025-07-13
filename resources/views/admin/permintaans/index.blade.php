@extends('layouts.admin')

@section('content')
    @if (auth()->user()->role == 'koordinator')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('dashboard.permintaans.create') }}">
                Buat Work Order
            </a>
        </div>
    </div>
    @endif

    <div class="card">
        <div class="card-header">
            Daftar Work Order 
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-Permintaan">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama Pelanggan</th>
                            <th>Status</th>
                            <th>Estimasi Durasi</th>
                            <th>Lokasi</th>
                            <th>Tanggal Instalasi</th>
                            <th>Tipe Instalasi</th>
                            <th class="no-export">Aksi</th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach($workOrders as $workOrder)
                            <tr data-entry-id="{{ $workOrder->id }}">
                                <td>{{ $workOrder->code ?? '-' }}</td>
                                <td>{{ $workOrder->customer->name ?? '-' }}</td>
                                <td>{{ $workOrder->status }}</td>
                                <td>{{ $workOrder->estimated_duration ?? '-' }} Jam</td>
                                <td>{{ $workOrder->location }}</td>
                                <td>{{ \Carbon\Carbon::parse($workOrder->installation_date)->format('Y-m-d') }}</td>
                                <td>{{ $workOrder->installation_type }}</td>
                                <td>
                                    @if ($workOrder->status == 'Belum Dimulai' && auth()->user()->role == 'koordinator')
                                    <a class="btn btn-xs btn-info" href="{{ route('dashboard.permintaans.edit', $workOrder->id) }}">
                                        Edit
                                    </a>
                                    <form action="{{ route('dashboard.permintaans.destroy', $workOrder->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                    </form>
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
