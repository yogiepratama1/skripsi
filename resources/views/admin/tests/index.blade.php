@extends('layouts.admin')

@section('content')
<div style="margin-bottom: 10px;" class="row">
    @if (auth()->user()->role == 'barista')
    <div class="col-lg-12" style="margin-bottom: 10px;">
        <a class="btn btn-success" href="{{ route('dashboard.variables.create') }}">
            Add Menu
        </a>
    </div>
    <div class="col-lg-12" style="margin-bottom: 10px;">
        <a class="btn btn-success" href="{{ route('dashboard.variables.hitung') }}">
            Hitung Hasil Perhitungan SAW
        </a>
    </div>
    @endif
    <!-- <div class="col-lg-12">
            <a class="btn btn-warning" href="{{ route('dashboard.asset-categories.index') }}">
                List Aksesoris
            </a>
        </div> -->
</div>

<div class="card">
    <div class="card-header">
        List Menu dan Nilai Variable
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-variable">
                <thead>
                    <tr>
                        <th class="no-export" width="10">No</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Porsi</th>
                        <th>Rasa</th>
                        <th>Harga</th>
                        @if(auth()->user()->role != 'user')
                        <th>Hasil</th>
                        @endif
                        <th class="no-export">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($variables as $key => $variable)
                    <tr data-entry-id="{{ $variable->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $variable->nama ?? '' }}</td>
                        <td>{{ $variable->jenis }}</td>
                        <td>{{ $variable->porsi }}</td>
                        <td>{{ $variable->rasa }}</td>
                        <td>{{ $variable->harga }}</td>
                        @if (auth()->user()->role != 'user')
                        <td>{{ $variable->hasil }}</td>
                        @endif
                        <td>
                            @if (auth()->user()->role == 'barista')
                            <a class="btn btn-xs btn-info" href="{{ route('dashboard.variables.edit', $variable->id) }}">
                                Edit
                            </a>
                            <form action="{{ route('dashboard.variables.destroy', $variable->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                @method('DELETE')
                                @csrf
                                <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                            </form>
                            @endif
                            @if (auth()->user()->role == 'user')
                            <a class="btn btn-xs btn-info" href="{{ route('dashboard.variables.edit', $variable->id) }}">
                                Isi Nilai Variable
                            </a>
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

        let table = $('.datatable-variable:not(.ajaxTable)').DataTable({
            buttons: dtButtons
        });

        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        });
    });
</script>
@endsection