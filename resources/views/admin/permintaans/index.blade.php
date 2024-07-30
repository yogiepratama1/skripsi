@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        @if (auth()->user()->role == 'user')
        <div class="col-lg-12" style="margin-bottom: 15px;">
            <a class="btn btn-success" href="{{ route('dashboard.permintaans.create') }}">
                Tambah Pendaftaran
            </a>
        </div>
        @endif
    </div>
    <div class="card">
        <div class="card-header">
            List Pendaftaran
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-Permintaan">
                    <thead>
                        <tr>
                            <!-- <th width="10"></th> -->
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Eskul</th>
                            <th>Diterima</th>
                            @if (auth()->user()->role == 'user')
                            <th>&nbsp;</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permintaans as $permintaan)
                            <tr data-entry-id="{{ $permintaan->id }}">
                                <!-- <td></td> -->
                                <!-- <td>{{ $permintaan->id }}</td> -->
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $permintaan->nama_siswa }}</td>
                                <!-- <td>{{ $permintaan->alamat_siswa }}</td> -->
                                <td>{{ $permintaan->kelas }}</td>
                                <td>{{ $permintaan->eskul }}</td>
                                <td>{{ $permintaan->disetujui == 1 ? "Diterima" : "Belum Diterima" }}</td>
                                <td>
                                    @if (auth()->user()->role == 'pembinaosis')
                                    @if ($permintaan->disetujui == 0)

                                    <a class="btn btn-xs btn-info" href="{{ route('dashboard.permintaans.setujui', $permintaan->id) }}">
                                        Setujui
                                    </a>
                                    @endif
                                    @endif
                                    @if ($permintaan->disetujui == 0)
                                    <a class="btn btn-xs btn-info" href="{{ route('dashboard.permintaans.edit', $permintaan->id) }}">
                                        Edit
                                    </a>
                                    @endif
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
