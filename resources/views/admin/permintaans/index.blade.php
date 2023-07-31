@extends('layouts.admin')

@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('dashboard.permintaans.create') }}">
                Add Pendataan
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            List Pendataan 
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-Permintaan">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>Barang</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Promo</th>
                            <th class="no-export">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permintaans as $key => $permintaan)
                            <tr data-entry-id="{{ $permintaan->id }}">
                                <td class="text-center">{{ $permintaan->id ?? '' }}</td>
                                <td>{{ $permintaan->nama ?? '' }}</td>
                                <td>{{ $permintaan->alamat ?? '' }}</td>
                                <td>{{ $permintaan->no_hp ?? '' }}</td>
                                <td>{{ $permintaan->barang ?? '' }}</td>
                                <td>{{ $permintaan->jumlah ?? '' }}</td>
                                <td>{{ number_format($permintaan->total_harga ?? 0, 0, ',', '.') }}</td>
                                <td>
                                    <a class="btn btn-xs btn-success" href="{{ route('dashboard.permintaans.perancangan', $permintaan->id) }}">
                                        Promo
                                    </a>
                                </td>
                                <td>
                                    @if (auth()->user()->role == 'user' && $permintaan->kepuasan == null)                                        
                                    <a class="btn btn-xs btn-info" href="{{ route('dashboard.permintaans.kepuasan', $permintaan->id) }}">
                                        Nilai Kepuasan
                                    </a>
                                    @endif
                                    <a class="btn btn-xs btn-info" href="{{ route('dashboard.permintaans.edit', $permintaan->id) }}">
                                        Edit
                                    </a>
                                    <form action="{{ route('dashboard.permintaans.destroy', $permintaan->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
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
