@extends('layouts.admin')

@section('content')
    <div style="margin-bottom: 10px;" class="row">
    @if (auth()->user()->role != 'user')        
    <div class="col-lg-12" style="margin-bottom: 10px;">
        <a class="btn btn-success" href="{{ route('dashboard.tests.create') }}">
            Add Test Pelamaran
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
            List Test Pelamar
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-test">
                    <thead>
                        <tr>
                            <th class="no-export" width="10">No</th>
                            <th>Nama</th>
                            <th>Tanggal Test</th>
                            <th>Hasil</th>
                            <th class="no-export">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tests as $key => $test)
                            <tr data-entry-id="{{ $test->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $test->user->name ?? '' }}</td>
                                <td>{{ $test->created_at ? \Carbon\Carbon::parse($test->created_at)->format('Y-m-d') : '' }}</td>
                                <td>{{ $test->hasil ?? '' }}</td>
                                @if (auth()->user()->role != 'user')                                    
                                <td>
                                    <a class="btn btn-xs btn-info" href="{{ route('dashboard.tests.edit', $test->id) }}">
                                        Edit
                                    </a>
                                    <form action="{{ route('dashboard.tests.destroy', $test->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
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
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [[1, 'desc']],
                pageLength: 100,
            });

            let table = $('.datatable-test:not(.ajaxTable)').DataTable({ buttons: dtButtons });

            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
            });
        });
    </script>
@endsection
