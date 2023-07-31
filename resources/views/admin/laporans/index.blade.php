@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('dashboard.laporans.create') }}">
                Export Laporan
            </a>
        </div>
    </div>
<div class="card">
    <div class="card-header">
        Laporan List
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Laporan">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Permintaan</th>
                        <th>Nama Pelanggan</th>
                        <th>Alamat Pelanggan</th>
                        <th>Harga</th>
                        <th>Sudah Dikirim</th>
                        <th>Sudah Bayar</th>
                        <th>Tanggal Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($laporans as $key => $laporan)
                        <tr data-entry-id="{{ $laporan->id }}">
                            <td>{{ $laporan->id ?? '' }}</td>
                            <td>{{ $laporan->permintaan->barang->name ?? '' }}</td>
                            <td>{{ $laporan->permintaan->nama_pelanggan ?? '' }}</td>
                            <td>{{ $laporan->permintaan->alamat_pelanggan ?? '' }}</td>
                            <td>Rp. {{ number_format($laporan->permintaan->barang->harga ?? 0, 0, ',', '.') }}</td>
                            <td>{{ $laporan->permintaan->sudah_dikirim ? 'Ya' : 'Belum' }}</td>
                            <td>{{ $laporan->permintaan->pembayaran?->sudah_bayar ? 'Ya' : 'Belum' }}</td>
                            <td>{{ $laporan->permintaan->pembayaran?->tanggal_bayar ?? '' }}</td>
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
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

        $.extend(true, $.fn.dataTable.defaults, {
            orderCellsTop: true,
            order: [[ 1, 'desc' ]],
            pageLength: 100,
        });

        let table = $('.datatable-Laporan:not(.ajaxTable)').DataTable({ buttons: dtButtons });

        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        });
    });

</script>
@endsection
