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
        Laporan List
    </div>

    <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-Asset">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telp</th>
                                <th>Agama</th>
                                <th>TTL</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Kode Pos</th>
                                <th>Nama Keluarga</th>
                                <th>Nomor Kartu Keluarga</th>
                                <th>Jumlah Anak</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($formulirPendaftarans as $formulirPendaftaran)                                
                            <tr data-entry-id="{{ $formulirPendaftaran->id }}">
                                <td>{{ $formulirPendaftaran->id ?? '' }}</td>
                                <td>{{ $formulirPendaftaran->nama ?? '' }}</td>
                                <td>{{ $formulirPendaftaran->email ?? '' }}</td>
                                <td>{{ $formulirPendaftaran->telp ?? '' }}</td>
                                <td>{{ $formulirPendaftaran->agama ?? '' }}</td>
                                <td>{{ $formulirPendaftaran->ttl ?? '' }}</td>
                                <td>{{ $formulirPendaftaran->jenis_kelamin ?? '' }}</td>
                                <td>{{ $formulirPendaftaran->alamat ?? '' }}</td>
                                <td>{{ $formulirPendaftaran->kode_pos ?? '' }}</td>
                                <td>{{ $formulirPendaftaran->nama_keluarga ?? '' }}</td>
                                <td>{{ $formulirPendaftaran->nomor_kartu_keluarga ?? '' }}</td>
                                <td>{{ $formulirPendaftaran->jumlah_anak ?? '' }}</td>
                                <td>
                                    @if($formulirPendaftaran->status == 1)
                                        <span class="badge badge-warning">Menunggu Konfirmasi</span>
                                    @elseif ($formulirPendaftaran->status == 2)
                                        <span class="badge badge-info">Diproses</span>
                                    @else
                                        <span class="badge badge-success">Disetujui</span>
                                    @endif
                                </td>
                                <td>
                                    @if($formulirPendaftaran->status == 3)
                                        <a class="btn btn-success btn-sm" href="{{ route('dashboard.formulirPendaftarans.cetakKartu', $formulirPendaftaran->id) }}">
                                            Lihat Kartu
                                        </a>
                                    @elseif ($formulirPendaftaran->status == 1)
                                        @if (auth()->user()->role != 'user')
                                        <a class="btn btn-success btn-sm" href="{{ route('dashboard.formulirPendaftarans.proses', $formulirPendaftaran->id) }}">
                                            Proses
                                        </a>
                                        @endif
                                        <a class="btn btn-info btn-sm" href="{{ route('dashboard.formulirPendaftarans.edit', $formulirPendaftaran->id) }}">
                                            Edit
                                        </a>
                                        <form action="{{ route('dashboard.formulirPendaftarans.destroy', $formulirPendaftaran->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                                        </form>
                                    @else
                                    @if (auth()->user()->role != 'user')
                                        <a class="btn btn-info btn-sm" href="{{ route('dashboard.formulirPendaftarans.setujui', $formulirPendaftaran->id) }}">
                                            Setujui
                                        </a>
                                        @endif
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
