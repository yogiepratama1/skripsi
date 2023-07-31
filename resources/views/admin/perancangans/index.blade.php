@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        Perancangan 
    </div>
            @if ($count < 1)
                <div class="card-body">
                    <div class="alert alert-info">
                        Belum Ada Perancangan
                    </div>
                    @if (auth()->user()->role == 'arsitek')
                        <a class="btn btn-success" href="{{ route('dashboard.perancangans.create', $permintaan->id) }}">
                            Tambah Perancangan
                        </a>                        
                    @endif
                </div>
            @else
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-Asset">
                        <thead class="text-center">
                            <tr>
                                <!-- <th>Id</th> -->
                                <th>Bahan Bangunan</th>
                                <th>Sistem Konstruksi</th>
                                <th>Struktur Bangunan</th>
                                <th>Gambar Bangunan</th>
                                <th>Biaya</th>
                                <th>Disetujui</th>
                                <th>Mulai Konstruksi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-entry-id="{{ $perancangan->id }}">
                                <!-- <td>{{ $perancangan->id ?? '' }}</td> -->
                                <td>{{ $perancangan->bahan_bangunan ?? '' }}</td>
                                <td>{{ $perancangan->sistem_konstruksi ?? '' }}</td>
                                <td>{{ $perancangan->struktur_bangunan ?? '' }}</td>
                                <td>
                                    <a href="{{ asset('gambar_bangunan/'.$perancangan->gambar_bangunan) }}" target="_blank">
                                        <img src="{{ asset('gambar_bangunan/'.$perancangan->gambar_bangunan) }}" width="100px">
                                    </a>
                                </td>
                                <td>{{ number_format($perancangan->biaya ?? 0, 0, ',', '.') }}</td>
                                <td>
                                    @if ($perancangan->setuju == 0)
                                        <span class="badge badge-danger">Belum Disetujui</span>
                                    @elseif ($perancangan->setuju == 1)
                                        <span class="badge badge-success">Disetujui</span>
                                    @else
                                        <span class="badge badge-warning">Ditolak</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($perancangan->mulai_konstruksi == 0)
                                        <span class="badge badge-danger">Belum Dimulai</span>
                                    @else
                                        <span class="badge badge-success">Dimulai</span>
                                    @endif
                                </td>
                                <td>
                                    @if (auth()->user()->role == 'user' && $perancangan->setuju != 1)
                                    <a class="btn btn-xs btn-success" href="{{ route('dashboard.perancangans.setujui', $perancangan->id) }}">
                                        Setujui
                                    </a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('dashboard.perancangans.tolak', $perancangan->id) }}">
                                        Tolak
                                    </a>
                                    @elseif (auth()->user()->role == 'sipil' && $perancangan->setuju == 1 && $perancangan->mulai_konstruksi == 0)
                                    <a class="btn btn-xs btn-success" href="{{ route('dashboard.perancangans.mulai', $perancangan->id) }}">
                                        Mulai Konstruksi
                                    </a>
                                    @elseif (auth()->user()->role == 'arsitek' && $perancangan->setuju != 1)
                                    <a class="btn btn-xs btn-info" href="{{ route('dashboard.perancangans.edit', $perancangan->id) }}">
                                        Edit
                                    </a>
                                        @if ($perancangan->setuju != 1)                                        
                                        <form action="{{ route('dashboard.perancangans.destroy', $perancangan->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                        </form>
                                        @endif
                                    @endif
                                </td>
                            </tr>
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
