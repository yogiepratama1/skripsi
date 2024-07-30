@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        @if (auth()->user()->role == 'gurupiket')
        <div class="col-lg-12" style="margin-bottom: 15px;">
            <a class="btn btn-success" href="{{ route('dashboard.absensis.create') }}">
                Tambah Absensi
            </a>
        </div>
        @endif
    </div>
    <div class="card">
        <div class="card-header">
            List Absensi
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-Absensi">
                    <thead>
                        <tr>
                            <!-- <th width="10"></th> -->
                            <th>Id</th>
                            <th>Eskul</th>
                            <th>Waktu dan Jam</th>
                            @if (auth()->user()->role == 'user')
                            <th>Status Absensi</th>
                            @endif
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($absensis as $absensi)
                            <tr data-entry-id="{{ $absensi->id }}">
                                <!-- <td></td> -->
                                <td>{{ $absensi->id }}</td>
                                <td>{{ $absensi->asset->name }}</td>
                                <td>{{ $absensi->waktu_dan_jam }}</td>
                                @if (auth()->user()->role == 'user')
                                <td>{{ $absensi->absenSiswa[0]->status ?? 'A' }}</td>
                                @endif
                                <td>
                                    @if (auth()->user()->role == 'user')

                                    <a class="btn btn-xs btn-info" href="{{ route('dashboard.absensis.absen', $absensi->id) }}">
                                            Absen
                                    </a>
                                    @endif
                                    @if (auth()->user()->role == 'gurupiket')
                                    
                                    <a class="btn btn-xs btn-info" href="{{ route('dashboard.absensis.edit', $absensi->id) }}">
                                            Edit
                                    </a>
                                    <form action="{{ route('dashboard.absensis.destroy', $absensi->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
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
        let table = $('.datatable-Absensi:not(.ajaxTable)').DataTable({ buttons: dtButtons });
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        });
    });
</script>
@endsection
