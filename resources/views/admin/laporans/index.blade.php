@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
        @if($laporans->isNotEmpty())
            <a class="btn btn-success" href="{{ route('dashboard.laporans.create') }}">
                Export Laporan
            </a>
        @else
            <button class="btn btn-success" disabled>Export Laporan</button>
        @endif
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
                                <th>No</th>
                                <th>Nama Penyidik</th>
                                <th>Tersangka</th>
                                <th>Kelengkapan Berkas</th>
                                <th>Permintaan Barang</th>
                                <th>Status Barang</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($laporans as $key => $permintaan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $permintaan->nama_penyidik }}</td>
                                    <td>{{ $permintaan->nama_tersangka }}</td>
                                    <td>{{ $permintaan->kelengkapan ? 'Lengkap' : 'Tidak Lengkap' }}</td>
                                    @foreach ($permintaan->barangs as $barang)                                        
                                    <td>{{ $barang->barang }}</td>
                                    @endforeach
                                    <td>
                                        @if ($permintaan->barangs[0]->status == 0)
                                            Disetujui
                                        @elseif ($permintaan->barangs[0]->status == 1)
                                            Diproses
                                        @elseif ($permintaan->barangs[0]->status == 2)
                                            Siap Diambil
                                        @elseif ($permintaan->barangs[0]->status == 3)
                                            Diterima
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
