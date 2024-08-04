@extends('layouts.admin')

@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12" style="margin-bottom: 10px;">
            @if (auth()->user()->role == 'admin')
                <a class="btn btn-success" href="{{ route('dashboard.permintaans.create') }}">
                    Add Pelatihan
                </a>
            @endif
        </div>
    </div>

<div class="card">
    <div class="card-header">
        Daftar Pelatihan
    </div>

    <div class="card-body">
        @if (auth()->user()->role != 'user')            
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Permintaan">
                <thead>
                    <tr>
                        <th width="10">No</th>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Pelatihan</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permintaans as $key => $permintaan)
                        <tr data-entry-id="{{ $permintaan->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $permintaan->id }}</td>
                            <td>{{ $permintaan->judul }}</td>
                            <td>{{ $permintaan->deskripsi }}</td>
                            <td>{{ $permintaan->tanggal_pelatihan }}</td>
                            <td>
                                {{ $permintaan->status }}
                                <!-- @switch($permintaan->status)
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
                                @endswitch -->
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('dashboard.permintaans.show', $permintaan->id) }}">
                                    Detail
                                </a>
                                @if (auth()->user()->role == 'recruitment' && $permintaan->status == 'Menunggu Persetujuan')
                                <a class="btn btn-xs btn-info" href="{{ route('dashboard.permintaans.bayar', $permintaan->id) }}">
                                    Setujui
                                </a>
                                @endif
                                <a class="btn btn-xs btn-info" href="{{ route('dashboard.permintaans.edit', $permintaan->id) }}">
                                    Edit
                                </a>
                                @if (auth()->user()->role == 'admin')
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
        @endif

        @if ($showUserTable)
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Permintaan">
                <thead>
                    <tr>
                        <th width="10">No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Pelatihan</th>
                        <th>Feedback Anda</th>
                        <th>Status Kehadiran</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permintaans as $key => $permintaan)
                        <tr data-entry-id="{{ $permintaan->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $permintaan->judul }}</td>
                            <td>{{ $permintaan->deskripsi }}</td>
                            <td>{{ $permintaan->tanggal_pelatihan }}</td>
                            <td>{{ $permintaan->peserta[0]->feedback }}</td>
                            <td>{{ $permintaan->peserta[0]->kehadiran }}</td>
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('dashboard.permintaans.editUser', $permintaan->peserta[0]->id) }}">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
        
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
