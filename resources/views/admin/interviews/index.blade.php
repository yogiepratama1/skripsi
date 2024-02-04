@extends('layouts.admin')

@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12" style="margin-bottom: 10px;">
            <a class="btn btn-success" href="{{ route('dashboard.interviews.create') }}">
                Add Interview
            </a>
        </div>
        <!-- <div class="col-lg-12">
            <a class="btn btn-warning" href="{{ route('dashboard.asset-categories.index') }}">
                List Aksesoris
            </a>
        </div> -->
    </div>

    <div class="card">
        <div class="card-header">
            List Permintaan Interview
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-Permintaan">
                    <thead>
                        <tr>
                            <th class="no-export" width="10">No</th>
                            <th>Nama</th>
                            <th>Interviewer</th>
                            <th>Penampilan</th>
                            <th>Kesopanan</th>
                            <th>Komunikasi</th>
                            <th>Daya Tangkap</th>
                            <th>Hasil</th>
                            <th>Tanggal Interview</th>
                            <th class="no-export">Action</th>
                        </tr>
                    </thead> 
                    <tbody>
                        @foreach($interviews as $key => $interview)
                            <tr data-entry-id="{{ $interview->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $interview->user->name ?? '' }}</td>
                                <td>{{ $interview->interviewer ?? '' }}</td>
                                <td>{{ $interview->penampilan ?? '' }}</td>
                                <td>{{ $interview->kesopanan ?? '' }}</td>
                                <td>{{ $interview->komunikasi ?? '' }}</td>
                                <td>{{ $interview->daya_tangkap ?? '' }}</td>
                                <td>{{ $interview->hasil ?? '' }}</td>
                                <td>{{ $interview->tanggal ? \Carbon\Carbon::parse($interview->tanggal)->format('Y-m-d') : '' }}</td>
                                @if (auth()->user()->role != 'user')                                    
                                <td>
                                    <a class="btn btn-xs btn-info" href="{{ route('dashboard.interviews.edit', $interview->id) }}">
                                        Edit
                                    </a>
                                    @if (auth()->user()->role != 'user')
                                    <form action="{{ route('dashboard.interviews.destroy', $interview->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                    @endif
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
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [[1, 'desc']],
                pageLength: 100,
            });

            let table = $('.datatable-Permintaan:not(.ajaxTable)').DataTable({ buttons: dtButtons });

            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
            });
        });
    </script>
@endsection
