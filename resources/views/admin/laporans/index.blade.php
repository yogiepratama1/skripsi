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
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No Hp</th>
                                <th>Barang</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Promo</th>
                                <th>Tanggal Promo</th>
                                <th>Kepuasan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permintaans as $permintaan)                                
                            <tr data-entry-id="{{ $permintaan->id }}">
                            <td class="text-center">{{ $permintaan->id ?? '' }}</td>
                                <td>{{ $permintaan->nama ?? '' }}</td>
                                <td>{{ $permintaan->alamat ?? '' }}</td>
                                <td>{{ $permintaan->no_hp ?? '' }}</td>
                                <td>{{ $permintaan->barang ?? '' }}</td>
                                <td>{{ $permintaan->jumlah ?? '' }}</td>
                                <td>{{ number_format($permintaan->total_harga ?? 0, 0, ',', '.') }}</td>
                                @if ($permintaan->perancangan != null)
                                <td>{{ $permintaan->perancangan->promo ?? '' }}</td>
                                <td>{{ $permintaan->perancangan->tanggal_promo ? \Carbon\Carbon::parse($permintaan->perancangan->tanggal_promo)->format('Y-m-d') : '' }}</td>
                                @else
                                <td></td>                                    
                                <td></td>                                    
                                @endif
                                <td>{{ $permintaan->kepuasan ?? '' }}</td>
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
