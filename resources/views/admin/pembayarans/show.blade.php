@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pembayaran.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('dashboard.pembayarans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pembayaran.fields.id') }}
                        </th>
                        <td>
                            {{ $pembayaran->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pembayaran.fields.permintaan') }}
                        </th>
                        <td>
                            {{ $pembayaran->permintaan->nama_pelanggan ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pembayaran.fields.tanggal_bayar') }}
                        </th>
                        <td>
                            {{ $pembayaran->tanggal_bayar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pembayaran.fields.harga_dibayar') }}
                        </th>
                        <td>
                            {{ $pembayaran->harga_dibayar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pembayaran.fields.sudah_bayar') }}
                        </th>
                        <td>
                            {{ App\Models\Pembayaran::SUDAH_BAYAR_RADIO[$pembayaran->sudah_bayar] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('dashboard.pembayarans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection