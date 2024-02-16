@extends('layouts.admin')

@section('content')
<div style="margin-bottom: 10px;" class="row">
    @if (auth()->user()->role != 'direktur')

    <div class="col-lg-12" style="margin-bottom: 10px;">
        <a class="btn btn-success" href="{{ route('dashboard.perencanaans.create') }}">
            Add Permintaan
        </a>
    </div>
    @endif
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
                        <th>Jumlah</th>
                        <th>Spesifikasi</th>
                        <th>Keterangan</th>
                        <th>Catatan Direktur</th>
                        <th>Tanggal Disetujui Direktur</th>
                        <th>Status Staff</th>
                        <th>Status Direktur</th>
                        <th class="no-export">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permintaans as $key => $permintaan)
                    <tr data-entry-id="{{ $permintaan->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $permintaan->jumlah ?? '' }}</td>
                        <td>{{ $permintaan->spesifikasi ?? '' }}</td>
                        <td>{{ $permintaan->deskripsi ?? '' }}</td>
                        <td>{{ $permintaan->catatan_direktur ?? '' }}</td>
                        <td>{{ $permintaan->tanggal_disetujui_direktur ?? '' }}</td>
                        <td class="text-center">
                            @if ($permintaan->status == 'pending')
                            <span class="badge badge-info">Pending</span>
                            @elseif ($permintaan->status == 'setuju')
                            <span class="badge badge-success">Setuju</span>
                            @else
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($permintaan->status_direktur == 'pending')
                            <span class="badge badge-info">Pending</span>
                            @elseif ($permintaan->status_direktur == 'setuju')
                            <span class="badge badge-success">Setuju</span>
                            @else
                            @endif
                        </td>
                        <td>
                            @if ($permintaan->status == 'pending' && auth()->user()->role == 'staff')
                            <a class="btn btn-xs btn-info" href="{{ route('dashboard.perencanaans.staffsetuju', $permintaan->id) }}">
                                Setujui
                            </a>
                            @endif
                            @if ($permintaan->status == 'setuju' && $permintaan->status_direktur == 'pending' && auth()->user()->role == 'direktur')
                            <a class="btn btn-xs btn-info" href="{{ route('dashboard.perencanaans.direktursetuju', $permintaan->id) }}">
                                Setujui
                            </a>
                            <a class="btn btn-xs btn-info" href="{{ route('dashboard.perencanaans.edit', $permintaan->id) }}">
                                Edit
                            </a>
                            @endif
                            @if ($permintaan->status == 'pending')
                            @if (auth()->user()->role != 'direktur')
                            <a class="btn btn-xs btn-info" href="{{ route('dashboard.perencanaans.edit', $permintaan->id) }}">
                                Edit
                            </a>
                            @endif

                            <form action="{{ route('dashboard.perencanaans.destroy', $permintaan->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
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
    $(function() {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);

        $.extend(true, $.fn.dataTable.defaults, {
            orderCellsTop: true,
            order: [
                [1, 'desc']
            ],
            pageLength: 100,
        });

        let table = $('.datatable-Permintaan:not(.ajaxTable)').DataTable({
            buttons: dtButtons
        });

        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        });
    });
</script>
@endsection