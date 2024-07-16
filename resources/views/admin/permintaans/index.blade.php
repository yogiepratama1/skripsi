@extends('layouts.admin')

@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12" style="margin-bottom: 10px;">
            <a class="btn btn-success" href="{{ route('dashboard.permintaans.create') }}">
                Add Penyidikan
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            List Penyidikan 
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-Permintaan">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Penyidik</th>
                            <th>Tersangka</th>
                            <th>Kelengkapan Berkas</th>
                            <th>Tanggal dibuat</th>
                            <th>Detail</th>
                            <th class="no-export">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permintaans as $key => $permintaan)
                            <tr>
                                <td>{{ $permintaan->id }}</td>
                                <td>{{ $permintaan->nama_penyidik }}</td>
                                <td>{{ $permintaan->nama_tersangka }}</td>
                                <td>{{ $permintaan->kelengkapan ? 'Lengkap' : 'Tidak Lengkap' }}</td>
                                <td>{{ $permintaan->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('dashboard.permintaans.show', $permintaan->id) }}">Detail</a>
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('dashboard.permintaans.edit', $permintaan->id) }}">Edit</a>
                                    <form action="{{ route('dashboard.permintaans.destroy', $permintaan->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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
