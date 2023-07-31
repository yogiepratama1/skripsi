@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        List Jenis
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-AssetStatus">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assetStatuses as $key => $assetStatus)
                        <tr data-entry-id="{{ $assetStatus->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $assetStatus->id ?? '' }}
                            </td>
                            <td>
                                {{ $assetStatus->name ?? '' }}
                            </td>
                            <td>
                                @can('asset_status_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('dashboard.asset-statuses.show', $assetStatus->id) }}">
                                        View
                                    </a>
                                @endcan

                                    <a class="btn btn-xs btn-info" href="{{ route('dashboard.asset-statuses.edit', $assetStatus->id) }}">
                                        Edit
                                    </a>

                                    <form action="{{ route('dashboard.asset-statuses.destroy', $assetStatus->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                    </form>

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
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('asset_status_delete')
  let deleteButtonTrans = 'Delete'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('dashboard.asset-statuses.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('No rows selected')

        return
      }

      if (confirm('Are you sure?')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-AssetStatus:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
