@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('dashboard.pembayarans.create') }}">
                Add Pembayaran
            </a>
        </div>
    </div>
<div class="card">
    <div class="card-header">
         List Pembayaran
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Pembayaran">
                <thead>
                    <tr>
                        <th width="10"></th>
                        <th>ID</th>
                        <th>Permintaan</th>
                        <th>Tanggal Bayar</th>
                        <th>Harga Dibayar</th>
                        <th>Sudah Bayar</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pembayarans as $key => $pembayaran)
                        <tr data-entry-id="{{ $pembayaran->id }}">
                            <td></td>
                            <td>{{ $pembayaran->id ?? '' }}</td>
                            <td>{{ $pembayaran->permintaan->nama_pelanggan ?? '' }}</td>
                            <td>{{ $pembayaran->tanggal_bayar ?? '' }}</td>
                            <td>{{ $pembayaran->harga_dibayar ?? '' }}</td>
                            <td>{{ App\Models\Pembayaran::SUDAH_BAYAR_RADIO[$pembayaran->sudah_bayar] ?? '' }}</td>
                            <td>
                                    <a class="btn btn-xs btn-info" href="{{ route('dashboard.pembayarans.edit', $pembayaran->id) }}">Edit</a>

                                    <form action="{{ route('dashboard.pembayarans.destroy', $pembayaran->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                    </form>
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
        let table = $('.datatable-Pembayaran:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        });

    })
</script>
@endsection
