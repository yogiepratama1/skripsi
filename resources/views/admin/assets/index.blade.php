@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
    @if (auth()->user()->role == 'user')
        Permintaan Anda
    @else 
        List Permintaan
        @if (auth()->user()->role == 'admin')
        <a class="btn btn-success" href="{{ route('dashboard.formulirPendaftarans.create') }}">
                        Tambah Permintaan
                    </a>
        @endif
    @endif
    </div>
    @if (auth()->user()->role == 'user')
            @if ($count < 1)
                <div class="card-body">
                    <div class="alert alert-info">
                        Anda belum membuat permintaan
                    </div>
                    <a class="btn btn-success" href="{{ route('dashboard.formulirPendaftarans.create') }}">
                        Tambah Permintaan
                    </a>
                </div>
            @else
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-Asset">
                        <thead>
                            <tr>
                                <!-- <th>Id</th> -->
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
                            <tr data-entry-id="{{ $formulirPendaftarans->id }}">
                                <!-- <td>{{ $formulirPendaftarans->id ?? '' }}</td> -->
                                <td>{{ $formulirPendaftarans->nama ?? '' }}</td>
                                <td>{{ $formulirPendaftarans->email ?? '' }}</td>
                                <td>{{ $formulirPendaftarans->telp ?? '' }}</td>
                                <td>{{ $formulirPendaftarans->agama ?? '' }}</td>
                                <td>{{ $formulirPendaftarans->ttl ?? '' }}</td>
                                <td>{{ $formulirPendaftarans->jenis_kelamin ?? '' }}</td>
                                <td>{{ $formulirPendaftarans->alamat ?? '' }}</td>
                                <td>{{ $formulirPendaftarans->kode_pos ?? '' }}</td>
                                <td>{{ $formulirPendaftarans->nama_keluarga ?? '' }}</td>
                                <td>{{ $formulirPendaftarans->nomor_kartu_keluarga ?? '' }}</td>
                                <td>{{ $formulirPendaftarans->jumlah_anak ?? '' }}</td>
                                <td>
                                    @if($formulirPendaftarans->status == 1)
                                        <span class="badge badge-warning">Menunggu Konfirmasi</span>
                                    @elseif ($formulirPendaftarans->status == 2)
                                        <span class="badge badge-info">Diproses</span>
                                    @else
                                        <span class="badge badge-success">Disetujui</span>
                                    @endif
                                </td>
                                <td>
                                    @if($formulirPendaftarans->status == 3)
                                    <a class="btn btn-success btn-sm" href="{{ route('dashboard.formulirPendaftarans.cetakKartu', $formulirPendaftarans->id) }}">
                                            Lihat Kartu
                                        </a>
                                    @elseif ($formulirPendaftarans->status == 1)
                                        <a class="btn btn-info btn-sm" href="{{ route('dashboard.formulirPendaftarans.edit', $formulirPendaftarans->id) }}">
                                            Edit
                                        </a>
                                        <form action="{{ route('dashboard.formulirPendaftarans.destroy', $formulirPendaftarans->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    @else
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
    @endif
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
