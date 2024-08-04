@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Detail Pelatihan
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $permintaan->id }}</td>
                    </tr>
                    <tr>
                        <th>Judul</th>
                        <td>{{ $permintaan->judul }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $permintaan->deskripsi }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Pelatihan</th>
                        <td>{{ $permintaan->tanggal_pelatihan ? \Carbon\Carbon::parse($permintaan->tanggal_pelatihan)->format('Y-m-d H:i') : 'Belum Ditentukan' }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ $permintaan->status }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h4>Peserta</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kehadiran</th>
                        <th>Feedback</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permintaan->peserta as $peserta)
                        <tr>
                            <td>{{ $peserta->user->name }}</td>
                            <td>
                                @if($peserta->kehadiran)
                                    Hadir
                                @else
                                    Tidak Hadir
                                @endif
                            </td>
                            <td>{{ $peserta->feedback ?? 'Tidak ada feedback' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="form-group">
            <a class="btn btn-default" href="{{ route('dashboard.permintaans.index') }}">
                Kembali ke Daftar
            </a>
        </div>
    </div>
</div>

@endsection
