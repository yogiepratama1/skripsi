@extends('layouts.admin')

@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12" style="margin-bottom: 10px;">
            <!-- @if (auth()->user()->role == 'user')
                <a class="btn btn-success" href="{{ route('dashboard.permintaans.create') }}">
                    Add Cuci
                </a>                
            @endif -->
        </div>
    </div>

<div class="card">
    <div class="card-header">
        Daftar Cucian
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Permintaan">
                <thead>
                    <tr>
                        <th width="10">No</th>
                        <th>ID</th>
                        <th>Nama Pelanggan</th>
                        <th>Mobil</th>
                        <th>Nomor Polisi</th>
                        <th>Layanan</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permintaans as $key => $permintaan)
                        <tr data-entry-id="{{ $permintaan->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $permintaan->id }}</td>
                            <td>{{ $permintaan->nama_pelanggan }}</td>
                            <td>{{ $permintaan->motor }}</td>
                            <td>{{ $permintaan->nomor_polisi }}</td>
                            <td>{{ $permintaan->keluhan }}</td>
                            <td>{{ number_format($permintaan->harga, 0, ',', '.') ?? ''  }} </td>
                            <td>
                                @switch($permintaan->status)
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
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('dashboard.permintaans.show', $permintaan->id) }}">
                                    Detail
                                </a>
                                @if (auth()->user()->role == 'user' && $permintaan->status == 2)
                                <a class="btn btn-xs btn-info" href="{{ route('dashboard.permintaans.bayar', $permintaan->id) }}">
                                    Bayar
                                </a>
                                @endif
                                <a class="btn btn-xs btn-info" href="{{ route('dashboard.permintaans.edit', $permintaan->id) }}">
                                    Edit
                                </a>
                                @if (auth()->user()->role == 'user')
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
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [[1, 'desc']],
                pageLength: 100,
            });

            let table = $('.datatable-Permintaan:not(.ajaxTable)').DataTable({ buttons: dtButtons });

            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
            });
        });
    </script>
@endsection
