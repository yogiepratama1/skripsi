@extends('layouts.admin')

@section('content')
<div style="margin-bottom: 10px;" class="row">

    <div class="col-lg-12" style="margin-bottom: 10px;">
        <a class="btn btn-success" href="{{ route('dashboard.assets.create') }}">
            Tambah Pengembalian Barang
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        List Pengembalian Barang
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Permintaan">
                <thead>
                    <tr>
                        <th width="10">No</th>
                        <th>Spesifikasi</th>
                        <th>Alasan</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pengembalians as $key => $pengembalian)
                    <tr data-entry-id="{{ $pengembalian->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pengembalian->barang->spesifikasi ?? '' }}</td>
                        <td>{{ $pengembalian->alasan ?? '' }}</td>
                        <td class="text-center">
                            @if ($pengembalian->status == 'pending')
                            <span class="badge badge-info">Pending</span>
                            @elseif ($pengembalian->status == 'setuju')
                            <span class="badge badge-success">Setuju</span>
                            @else
                            @endif
                        </td>
                        <td>
                            @if (auth()->user()->role == 'direktur' && $pengembalian->status == 'pending')
                            <a class="btn btn-xs btn-info" href="{{ route('dashboard.assets.disetujuidirektur', $pengembalian->id) }}">
                                Setuju
                            </a>
                            @endif
                            @if ($pengembalian->status == 'pending')
                            <a class="btn btn-xs btn-info" href="{{ route('dashboard.assets.edit', $pengembalian->id) }}">
                                Edit
                            </a>
                            <form action="{{ route('dashboard.assets.destroy', $pengembalian->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
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