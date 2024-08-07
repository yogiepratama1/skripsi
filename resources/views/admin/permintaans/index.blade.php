@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        @if (auth()->user()->role == 'user')
        <div class="col-lg-12" style="margin-bottom: 15px;">
            <a class="btn btn-success" href="{{ route('dashboard.permintaans.create') }}">
                Tambah Pemesanan
            </a>
        </div>
        @endif
    </div>
    <div class="card">
        <div class="card-header">
            List Pemesanan
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-Permintaan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Jumlah</th>
                            <th>Produk</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permintaans as $permintaan)
                            <tr data-entry-id="{{ $permintaan->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $permintaan->nama_pelanggan }}</td>
                                <td>{{ $permintaan->email_pelanggan }}</td>
                                <td>{{ $permintaan->alamat_pelanggan }}</td>
                                <td>{{ $permintaan->jumlah }}</td>
                                <td>{{ $permintaan->produk }}</td>
                                <td>
                                    @switch($permintaan->status)
                                        @case(0)
                                            Menunggu Persetujuan
                                            @break
                                        @case(1)
                                            Diproses
                                            @break
                                        @case(2)
                                            Diproduksi
                                            @break
                                        @case(3)
                                            Produksi Selesai
                                            @break
                                        @case(4)
                                            Menunggu Kurir
                                            @break
                                        @case(5)
                                            Dikirim Kurir
                                            @break
                                    @endswitch
                                </td>
                                <td>
                                    @if (auth()->user()->role == 'admin' && $permintaan->status == 0)
                                    <a class="btn btn-xs btn-info" href="{{ route('dashboard.permintaans.setujui', $permintaan->id) }}">
                                        Setujui
                                    </a>
                                    @endif
                                    <a class="btn btn-xs btn-info" href="{{ route('dashboard.permintaans.edit', $permintaan->id) }}">
                                        Edit
                                    </a>
                                    @if (auth()->user()->role == 'admin' || auth()->user()->role == 'user')
                                    <form action="{{ route('dashboard.permintaans.destroy', $permintaan->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
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
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

        $.extend(true, $.fn.dataTable.defaults, {
            orderCellsTop: true,
            order: [[ 1, 'desc' ]],
            pageLength: 100,
        });
        let table = $('.datatable-Permintaan:not(.ajaxTable)').DataTable({ buttons: dtButtons });
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        });
    });
</script>
@endsection
