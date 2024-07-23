@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('dashboard.laporans.create') }}">
                Export Laporan
            </a>
        </div>
    </div>
    <!-- @if (auth()->user()->role == 'bendahara')        
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-info" href="{{ route('dashboard.laporans.create-average') }}">
                Export Rata-Rata Penjualan Aksesoris
            </a>
        </div>
    </div>
    @endif -->

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
                            <th>Nama Pelanggan</th>
                            <th>Motor</th>
                            <th>Keluhan</th>
                            <th>Harga</th>
                            <th>Tanggal Servis</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($laporans as $index => $laporan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $laporan->nama_pelanggan }}</td>
                            <td>{{ $laporan->motor }}</td>
                            <td>{{ $laporan->keluhan }}</td>
                            <td>{{ $laporan->harga }}</td>
                            <td>{{ $laporan->created_at->format('d/m/Y') }}</td>
                            <td>
                            @switch($laporan->status)
                                    @case(0)
                                        Menunggu Konfirmasi
                                        @break
                                    @case(1)
                                        Diproses
                                        @break
                                    @case(2)
                                        Menunggu Pembayaran
                                        @break
                                    @case(3)
                                        Selesai
                                        @break
                                @endswitch

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
