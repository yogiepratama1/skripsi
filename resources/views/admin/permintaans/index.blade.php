@extends('layouts.admin')

@section('content')
    <div style="margin-bottom: 10px;" class="row">
        @if (auth()->user()->role == 'user' || auth()->user()->role == 'officer_services')        
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('dashboard.permintaans.create') }}">
                Add Permintaan Overtime
            </a>
        </div>
        @endif
    </div>

    <div class="card">
        <div class="card-header">
            List Overtime 
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-Permintaan">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>No Hp</th>
                            <th>Pangkat</th>
                            <th>Jabatan</th>
                            <th>Tanggal Lembur</th>
                            <th>Jam Lembur</th>
                            <th>Disetujui Karyawan</th>
                            <th>Disetujui Officer Supplies</th>
                            <th>Disetujui Manager</th>
                            <th class="no-export">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permintaans as $key => $permintaan)
                            <tr data-entry-id="{{ $permintaan->id }}">
                                <td class="text-center">{{ $permintaan->id ?? '' }}</td>
                                <td>{{ $permintaan->nama ?? '' }}</td>
                                <td>{{ $permintaan->no_hp ?? '' }}</td>
                                <td>{{ $permintaan->pangkat ?? '' }}</td>
                                <td>{{ $permintaan->jabatan ?? '' }}</td>
                                <td>{{ $permintaan->tanggal_lembur ? \Carbon\Carbon::parse($permintaan->tanggal_lembur)->format('Y-m-d') : '' }}</td>
                                <td>{{ $permintaan->jam_lembur ?? '' }}</td>
                                <td>{{ $permintaan->disetujui_karyawan ? 'Disetujui' : 'Tidak' }}</td>
                                <td>{{ $permintaan->disetujui_officer_supplies ? 'Disetujui' : 'Tidak' }}</td>
                                <td>{{ $permintaan->disetujui_manager ? 'Disetujui' : 'Tidak' }}</td>
                                @if ($permintaan->disetujui_semua == false)                                
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
                                @else
                                <td></td>
                                @endif
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
