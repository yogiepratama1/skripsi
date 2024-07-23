@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Detail Permintaan
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
                        <th>Nama Pelanggan</th>
                        <td>{{ $permintaan->nama_pelanggan }}</td>
                    </tr>
                    <tr>
                        <th>Alamat Pelanggan</th>
                        <td>{{ $permintaan->alamat_pelanggan }}</td>
                    </tr>
                    <tr>
                        <th>Motor</th>
                        <td>{{ $permintaan->motor }}</td>
                    </tr>
                    <tr>
                        <th>Keluhan</th>
                        <td>{{ $permintaan->keluhan }}</td>
                    </tr>
                    <tr>
                        <th>Spareparts</th>
                        <td>{{ $permintaan->spareparts }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @switch($permintaan->status)
                                @case(0)
                                    Menunggu Konfirmasi
                                    @break
                                @case(1)
                                    Diproses
                                    @break
                                @case(2)
                                    Menunggu Pembayaran
                                    @break
                                @case(3)
                                    Selesai
                                    @break
                            @endswitch
                        </td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>{{ $permintaan->harga }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Bayar</th>
                        <td>{{ $permintaan->tanggal_bayar ? \Carbon\Carbon::parse($permintaan->tanggal_bayar)->format('Y-m-d') : 'Belum Bayar' }}</td>
                    </tr>
                    <tr>
                        <th>Bukti Pembayaran</th>
                        <td>
                            @if($permintaan->bukti_pembayaran)
                            <a href="{{ asset($permintaan->bukti_pembayaran) }}" target="_blank">Lihat Bukti Pembayaran</a>
                            @else
                                Tidak Ada Bukti Pembayaran
                            @endif
                        </td>
                    </tr>
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