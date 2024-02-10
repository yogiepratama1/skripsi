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
                        <th class="no-export" width="10">No</th>
                        <th>Nama</th>
                        <th>Link Desain</th>
                        <th>Jumlah</th>
                        <th>Harga per pc</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($laporans as $key => $permintaan)
                    <tr data-entry-id="{{ $permintaan->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $permintaan->nama ?? '' }}</td>
                        <td>{{ $permintaan->desain->desain ?? '' }}</td>
                        <td>{{ $permintaan->jumlah ?? '' }}</td>
                        <td>Rp{{ number_format($permintaan->harga, 2, ',', '.') }}</td>
                        <td class="text-center">
                            @if ($permintaan->status == 'belum_diproduksi')
                            <span class="badge badge-info">Belum diproduksi</span>
                            @elseif ($permintaan->status == 'diproduksi')
                            <span class="badge badge-info">Diproduksi</span>
                            @elseif ($permintaan->status == 'produksi_selesai')
                            <span class="badge badge-info">Produksi Selesai</span>
                            @elseif ($permintaan->status == 'packing')
                            <span class="badge badge-info">Sedang Dipacking</span>
                            @elseif ($permintaan->status == 'ready')
                            <span class="badge badge-success">Ready</span>
                            @else
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