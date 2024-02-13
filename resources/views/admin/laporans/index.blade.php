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
        Rekomendasi Menu
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-variable">
                <thead>
                    <tr>
                        <th class="no-export" width="10">Peringkat</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Hasil</th>
                        <th>Harga Menu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($laporans as $key => $variable)
                    <tr data-entry-id="{{ $variable->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $variable->nama ?? '' }}</td>
                        <td>{{ $variable->jenis }}</td>
                        <td>{{ $variable->hasil }}</td>
                        <td>{{ $variable->harga_menu }}</td>
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