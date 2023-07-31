@extends('layouts.admin')

@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('dashboard.permintaans.create') }}">
                Add Permintaan
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            List Permintaan 
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-Permintaan">
                    <thead>
                        <tr>
                            <th class="no-export" width="10">No</th>
                            <th>ID</th>
                            <th>User</th>
                            <th>Barang</th>
                            <th>Merek</th>
                            <th>Jenis</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat Pelanggan</th>
                            <th class="no-export">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permintaans as $key => $permintaan)
                            <tr data-entry-id="{{ $permintaan->id }}">
                                <td></td>
                                <td class="text-center">{{ $permintaan->id ?? '' }}</td>
                                <td>{{ $permintaan->user->name ?? '' }}</td>
                                <td>{{ $permintaan->barang->name ?? '' }}</td>
                                <td>{{ $permintaan->barang->category->name ?? '' }}</td>
                                <td>{{ $permintaan->barang->status->name ?? '' }}</td>
                                <td>{{ $permintaan->nama_pelanggan ?? '' }}</td>
                                <td>{{ $permintaan->alamat_pelanggan ?? '' }}</td>
                                <td>

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
