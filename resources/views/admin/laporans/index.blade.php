@extends('layouts.admin')
@section('content')
<div style="margin-bottom: 10px;" class="row">
    <form action="{{ route('dashboard.laporans.create') }}" method="POST">
        @csrf
        <div class="col-lg-12">
            Start Date
            <input type="date" name="start" id="" required>
            End Date
            <input type="date" name="end" id="" required>
            <button type="submit" class="btn btn-success">
                Export Laporan
            </button>
        </div>
    </form>
</div>

<div class="card">
    <div class="card-header">
        Laporan List
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Permintaan">
                <thead>
                    <tr>
                        <th width="10">No</th>
                        <th>Spesifikasi</th>
                        <th>Alasan</th>
                        <th>Hasil Laporan</th>
                        <th>Tanggal Laporan</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($laporans as $key => $pengembalian)
                    <tr data-entry-id="{{ $pengembalian->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pengembalian->barang->spesifikasi ?? '' }}</td>
                        <td>{{ $pengembalian->alasan ?? '' }}</td>
                        <td>{{ $pengembalian->laporan->hasillaporan ?? '' }}</td>
                        <td>{{ $pengembalian->created_at ?? '' }}</td>
                        <td class="text-center">
                            @if ($pengembalian->status == 'pending')
                            <span class="badge badge-info">Pending</span>
                            @elseif ($pengembalian->status == 'setuju')
                            <span class="badge badge-success">Setuju</span>
                            @else
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-xs btn-info" href="{{ route('dashboard.laporans.edit', $pengembalian->id) }}">
                                Edit Hasil Laporan
                            </a>
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
    $(function() {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

        $.extend(true, $.fn.dataTable.defaults, {
            orderCellsTop: true,
            order: [
                [1, 'desc']
            ],
            pageLength: 100,
        });

        let table = $('.datatable-Laporan:not(.ajaxTable)').DataTable({
            buttons: dtButtons
        });

        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        });
    });
</script>
@endsection