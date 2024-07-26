@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12" style="margin-bottom: 15px;">
            <a class="btn btn-success" href="{{ route('dashboard.assets.create') }}">
                Tambah Barang
            </a>
        <div>
    </div>
<div class="card">
    <div class="card-header">
        List Barang
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Asset">
                <thead>
                    <tr>
                        <th width="10"></th>
                        <th>Id</th>
                        <th>Name</th>
                        <!-- <th>Harga</th> -->
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <!-- <th>Jenis</th>
                        <th>Merek</th> -->
                        <th>&nbsp;</th>
                        @if (auth()->user()->role == 'user')                            
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($assets as $key => $asset)
                        <tr data-entry-id="{{ $asset->id }}">
                            <td></td>
                            <td>{{ $asset->id ?? '' }}</td>
                            <td>{{ $asset->name ?? '' }}</td>
                            <td>{{ $asset->deskripsi ?? '' }}</td>
                            <td>
                                {{ number_format($asset->harga, 0, ',', '.') ?? ''  }}
                            </td>
                            <!-- <td>{{ $asset->status->name ?? '' }}</td> -->
                            <!-- <td>{{ $asset->merek ?? '' }}</td> -->
                            <td>
                                    <a class="btn btn-xs btn-info" href="{{ route('dashboard.assets.edit', $asset->id) }}">
                                        Edit
                                    </a>
                                    <form action="{{ route('dashboard.assets.destroy', $asset->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                    </form>
                            </td>
                            @if (auth()->user()->role == 'user')
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
  let table = $('.datatable-Asset:not(.ajaxTable)').DataTable({ buttons: dtButtons });
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
  });
});

</script>
@endsection
