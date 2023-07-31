@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('dashboard.laporans.create') }}">
                Export Laporan
            </a>
        </div>
    </div>
<div class="card">
    <div class="card-header">
        List Laporan Overtime
    </div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover datatable datatable-Asset">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>No Hp</th>
                    <th>Pangkat</th>
                    <th>Jabatan</th>
                    <th>Tanggal Lembur</th>
                    <th>Jam Lembur</th>
                    <th>Jenis Kerja</th>
                    <th>Disetujui Karyawan</th>
                    <th>Disetujui Officer Supplies</th>
                    <th>Disetujui Manager</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permintaans as $permintaan)                                
                <tr data-entry-id="{{ $permintaan->id }}">
                    <td class="text-center">{{ $permintaan->id ?? '' }}</td>
                    <td>{{ $permintaan->nama ?? '' }}</td>
                    <td>{{ $permintaan->no_hp ?? '' }}</td>
                    <td>{{ $permintaan->pangkat ?? '' }}</td>
                    <td>{{ $permintaan->jabatan ?? '' }}</td>
                    <td>{{ $permintaan->tanggal_lembur ? \Carbon\Carbon::parse($permintaan->tanggal_lembur)->format('Y-m-d') : '' }}</td>
                    <td>{{ $permintaan->jam_lembur ?? '' }}</td>
                    <td>{{ $permintaan->jenis_kerja ?? '' }}</td>
                    <td>
                        @if ($permintaan->disetujui_karyawan)
                            <span class="badge badge-success">Disetujui</span>
                        @else
                            <span class="badge badge-danger">Belum Disetujui</span>
                        @endif
                    </td>
                    <td>
                        @if ($permintaan->disetujui_officer_supplies)
                            <span class="badge badge-success">Disetujui</span>
                        @else
                            <span class="badge badge-danger">Belum Disetujui</span>
                        @endif
                    </td>
                    <td>
                        @if ($permintaan->disetujui_manager)
                            <span class="badge badge-success">Disetujui</span>
                        @else
                            <span class="badge badge-danger">Belum Disetujui</span>
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
    $(document).ready(function() {
        $('.datatable-Asset').DataTable({
            // Add other datatable options or customization here
        });
    });
</script>
@endsection
