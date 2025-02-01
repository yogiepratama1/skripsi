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
                        <th>Nama Klien</th>
                        <td>{{ $permintaan->nama_pelanggan }}</td>
                    </tr>
                    <tr>
                        <th>Nama Acara</th>
                        <td>{{ $permintaan->alamat_pelanggan }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Acara</th>
                        <td> {{ \Carbon\Carbon::parse($permintaan->tanggal_bayar)->format('Y-m-d') }}</td>
                    </tr>
                    <tr>
                        <th>Kebutuhan Sponsorhip</th>
                        <td>{{ $permintaan->keluhan }}</td>
                    </tr>
                    <tr>
                        <th>Anggaran</th>
                        <td>{{ number_format(is_numeric($permintaan->motor) ? $permintaan->motor : 0, 0, ',', '.') ?? ''  }}</td>
                    </tr>
                    <tr>
                        <th>Link Dokumen Proposal</th>
                        <td>{{ $permintaan->nomor_polisi }}</td>
                    </tr>
                    <!-- <tr>
                        <th>Spareparts</th>
                        <td>{{ $permintaan->spareparts }}</td>
                    </tr> -->
                    <tr>
                        <th>Status</th>
                        <td>
                            @switch($permintaan->status)
                                @case(0)
                                    Not Verified
                                    @break
                                @case(1)
                                    Verified
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
                        <th>Status Acara</th>
                        <td>
                            @switch($permintaan->status_acara)
                                @case(0)
                                    Not Started
                                    @break
                                @case(1)
                                    Completed
                                    @break
                                @case(2)
                                    Completed
                                    @break
                            @endswitch
                        </td>
                    </tr>
                    <!-- <tr>
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
                    </tr> -->
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