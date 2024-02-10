@extends('layouts.admin')

@section('content')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12" style="margin-bottom: 10px;">
        <a class="btn btn-success" href="{{ route('dashboard.perencanaans.create') }}">
            Add perencanaan
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        List Perencanaan Desain
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Permintaan">
                <thead>
                    <tr>
                        <th class="no-export" width="10">No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Link Desain</th>
                        <th>Status</th>
                        <th class="no-export">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($perencanaans as $key => $perencanaan)
                    <tr data-entry-id="{{ $perencanaan->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $perencanaan->nama ?? '' }}</td>
                        <td>{{ $perencanaan->deskripsi ?? '' }}</td>
                        <td>{{ $perencanaan->desain ?? '' }}</td>
                        <td class="text-center">
                            @if ($perencanaan->status == 'tidaksetuju')
                            <span class="badge badge-info">Tidak Setuju</span>
                            @elseif ($perencanaan->status == 'setuju')
                            <span class="badge badge-success">Setuju</span>
                            @else
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-xs btn-info" href="{{ route('dashboard.perencanaans.edit', $perencanaan->id) }}">
                                Edit
                            </a>
                            @if ($perencanaan->status == 'tidaksetuju')
                            <form action="{{ route('dashboard.perencanaans.destroy', $perencanaan->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
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