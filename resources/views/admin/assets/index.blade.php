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
            <table class="table table-bordered table-striped table-hover datatable datatable-Barang">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama Penyidik</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!$assets->isEmpty())
                    @foreach($assets as $key => $barang)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $barang->id }}</td>
                            <td>{{ $barang->permintaan->nama_penyidik }}</td>
                            <td>{{ $barang->barang }}</td>
                            <td>{{ $barang->jumlah }}</td>
                            <td>
                                @if ($barang->status == 0)
                                    Disetujui
                                @elseif ($barang->status == 1)
                                    Diproses
                                @elseif ($barang->status == 2)
                                    Siap Diambil
                                @elseif ($barang->status == 3)
                                    Diterima
                                @endif
                            </td>
                            <td>
                                @if ($barang->status == 2 && auth()->user()->role == 'penyidik')
                                    <a class="btn btn-success" href="{{ route('dashboard.assets.terimabarang', $barang->id) }}">Terima Barang</a>                                    
                                @endif
                                <a class="btn btn-warning" href="{{ route('dashboard.assets.edit', $barang->id) }}">Edit</a>
                                <form action="{{ route('dashboard.assets.destroy', $barang->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @endif

                </tbody>
            </table>
        </div>
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
  let table = $('.datatable-Barang:not(.ajaxTable)').DataTable({ buttons: dtButtons });
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
  });
});

</script>
@endsection
