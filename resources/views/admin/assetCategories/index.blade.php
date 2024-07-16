@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        List Penyidikan
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-AssetCategory">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Nama Penyidik
                        </th>
                        <th>
                            Tersangka
                        </th>
                        <th>
                            Detail
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assetCategories as $key => $assetCategory)
                        <tr>
                            <td>
                                {{ $assetCategory->id ?? '' }}
                            </td>
                            <td>
                                {{ $assetCategory->name ?? '' }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('dashboard.penyidikan.show', $assetCategory->id) }}">
                                    Detail
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('dashboard.penyidikan.edit', $assetCategory->id) }}">
                                    Edit
                                </a>
                                <form action="{{ route('dashboard.penyidikan.destroy', $assetCategory->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [[1, 'desc']],
                pageLength: 100,
            });

            let table = $('.datatable-AssetCategory:not(.ajaxTable)').DataTable({ buttons: dtButtons });

            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
            });
        });
    </script>
@endsection