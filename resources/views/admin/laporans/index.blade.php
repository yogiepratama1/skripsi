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
                        <th>Nama Pelanggan</th>
                        <th>Nama Front Desk</th>
                        <th>Motor</th>
                        <th>Nomor Polisi</th>
                        <th>Keluhan</th>
                        <th>Biaya Service</th>
                        <th>Status</th>
                        <!-- <th>Tanggal Reservasi</th>
                        <th>Tanggal Diproses</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($laporans as $key => $permintaan)
                    <tr data-entry-id="{{ $permintaan->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $permintaan->nama_pelanggan ?? '' }}</td>
                        <td>{{ $permintaan->nama_frontdesk ?? '' }}</td>
                        <td>{{ $permintaan->motor ?? '' }}</td>
                        <td>{{ $permintaan->nomor_polisi ?? '' }}</td>
                        <td>{{ $permintaan->keluhan ?? '' }}</td>
                        <td>Rp{{ number_format($permintaan->biaya_service, 2, ',', '.') }}</td>
                        <td class="text-center">
                            @if ($permintaan->status == 'mekanik')
                            <span class="badge badge-info">Diperbaiki Mekanik</span>
                            @elseif ($permintaan->status == 'mekanik_selesai')
                            <span class="badge badge-info">Selesai Diperbaiki Mekanik</span>
                            @elseif ($permintaan->status == 'gudang')
                            <span class="badge badge-warning">Sparepart Sedang Diperiksa Gudang</span>
                            @elseif ($permintaan->status == 'sparepart_ready')
                            <span class="badge badge-info">Sparepart Tersedia</span>
                            @elseif ($permintaan->status == 'sparepart_not_ready')
                            <span class="badge badge-danger">Sparepart Tidak Tersedia</span>
                            @elseif ($permintaan->status == 'selesai')
                            <span class="badge badge-success">Selesai</span>
                            @else
                            <span class="badge badge-info">Menunggu frontdesk</span>
                            @endif
                        </td>
                        <!-- <td>{{ $permintaan->created_at ? \Carbon\Carbon::parse($permintaan->created_at)->format('Y-m-d') : '' }}</td>
                        <td>{{ $permintaan->tanggal_diproses ? \Carbon\Carbon::parse($permintaan->tanggal_diproses)->format('Y-m-d') : '' }}</td> -->
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