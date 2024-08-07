@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        @if (auth()->user()->role == 'admin')
        <div class="col-lg-12" style="margin-bottom: 15px;">
            <a class="btn btn-success" href="{{ route('dashboard.assets.create') }}">
                Tambah Produk
            </a>
        </div>
        @endif
    </div>
    <div class="card">
        <div class="card-header">
            List Produk
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-Eskul">
                    <thead>
                        <tr>
                            <th width="10"></th>
                            <th>Name</th>
                            <th>Harga</th>
                            @if (auth()->user()->role == 'admin')
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($assets as $eskul)
                            <tr data-entry-id="{{ $eskul->id }}">
                                <td></td>
                                <td>{{ $eskul->name }}</td>
                                <td>Rp{{ number_format($eskul->harga, 2, ",", ".") }}</td>
                                @if (auth()->user()->role == 'admin')
                                <td>
                                    <a class="btn btn-xs btn-info" href="{{ route('dashboard.assets.edit', $eskul->id) }}">
                                        Edit
                                    </a>
                                    <form action="{{ route('dashboard.assets.destroy', $eskul->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                    </form>
                                </td>
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
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

        $.extend(true, $.fn.dataTable.defaults, {
            orderCellsTop: true,
            order: [[ 1, 'desc' ]],
            pageLength: 100,
        });
        let table = $('.datatable-Eskul:not(.ajaxTable)').DataTable({ buttons: dtButtons });
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        });
    });
</script>
@endsection
