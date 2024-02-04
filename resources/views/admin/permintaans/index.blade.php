@extends('layouts.admin')

@section('content')
    <div style="margin-bottom: 10px;" class="row">
    @if (auth()->user()->role == 'user' && count($permintaans) < 1)
        
        <div class="col-lg-12" style="margin-bottom: 10px;">
            <a class="btn btn-success" href="{{ route('dashboard.permintaans.create') }}">
                Add Permintaan Lamaran
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
            List Permintaan Lamaran
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-Permintaan">
                    <thead>
                        <tr>
                            <th class="no-export" width="10">No</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Link CV</th>
                            <th>Link Berkas-berkas</th>
                            <th>Status</th>
                            <th>Setuju Kontrak</th>
                            <th>Tanggal Melamar</th>
                            <th class="no-export">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permintaans as $key => $permintaan)
                            <tr data-entry-id="{{ $permintaan->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $permintaan->nama ?? '' }}</td>
                                <td>{{ $permintaan->jenis_kelamin ?? '' }}</td>
                                <td>{{ $permintaan->alamat ?? '' }}</td>
                                <td>
                                    <a href="https://{{ $permintaan->cv ?? '' }}">
                                    {{ $permintaan->cv ?? '' }}
                                    </a>
                                </td>
                                <td>
                                    <a href="https://{{ $permintaan->berkas ?? '' }}">
                                    {{ $permintaan->berkas ?? '' }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    @if ($permintaan->status == 'terkirim')
                                        <span class="badge badge-info">Terkirim</span>
                                    @elseif ($permintaan->status == 'test')
                                        <span class="badge badge-warning">Test</span>
                                    @elseif ($permintaan->status == 'interview')
                                        <span class="badge badge-warning">Interview</span>
                                    @elseif ($permintaan->status == 'ttd')
                                        <span class="badge badge-warning">Tanda Tangan Kontrak</span>
                                    @else
                                    @endif
                                </td>
                                <td>{{ $permintaan->setuju_kontrak == '1' ? 'Ya' : 'Tidak' }}</td>
                                <td>{{ $permintaan->created_at ? \Carbon\Carbon::parse($permintaan->created_at)->format('Y-m-d') : '' }}</td>
                                <td>
                                    <a class="btn btn-xs btn-info" href="{{ route('dashboard.permintaans.edit', $permintaan->id) }}">
                                        Edit
                                    </a>
                                    @if (auth()->user()->role != 'user')
                                    <form action="{{ route('dashboard.permintaans.destroy', $permintaan->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                    @endif
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

            let table = $('.datatable-Permintaan:not(.ajaxTable)').DataTable({ buttons: dtButtons });

            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
            });
        });
    </script>
@endsection
