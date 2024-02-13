@extends('layouts.admin')

@section('content')
<div style="margin-bottom: 10px;" class="row">
    <!-- @if (auth()->user()->role == 'user' || auth()->user()->role == 'frontdesk')
    <div class="col-lg-12" style="margin-bottom: 10px;">
        <a class="btn btn-success" href="{{ route('dashboard.permintaans.create') }}">
            Add Reservasi Service
        </a>
    </div>
    @endif -->

    <!-- <div class="col-lg-12">
            <a class="btn btn-warning" href="{{ route('dashboard.asset-categories.index') }}">
                List Aksesoris
            </a>
        </div> -->
</div>

<div class="card">
    <div class="card-header">
        List Nilai Bobot
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Permintaan">
                <thead>
                    <tr>
                        <th class="no-export" width="10">No</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Nilai</th>
                        <th class="no-export">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bobots as $key => $bobot)
                    <tr data-entry-id="{{ $bobot->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $bobot->nama ?? '' }}</td>
                        <td>{{ $bobot->jenis }}</td>
                        <td>{{ $bobot->nilai }}</td>
                        <td>
                            <a class="btn btn-xs btn-info" href="{{ route('dashboard.bobots.edit', $bobot->id) }}">
                                Edit
                            </a>
                            <!-- @if ($bobot->status == 'reservasi')
                            @if (auth()->user()->role == 'user' || auth()->user()->role == 'frontdesk')
                            <form action="{{ route('dashboard.permintaans.destroy', $bobot->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                @method('DELETE')
                                @csrf
                                <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                            </form>
                            @endif
                            @endif -->
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