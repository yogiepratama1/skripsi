@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.permintaan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('dashboard.permintaans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.permintaan.fields.id') }}
                        </th>
                        <td>
                            {{ $permintaan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permintaan.fields.user') }}
                        </th>
                        <td>
                            {{ $permintaan->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permintaan.fields.barang') }}
                        </th>
                        <td>
                            {{ $permintaan->barang->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permintaan.fields.nama_pelanggan') }}
                        </th>
                        <td>
                            {{ $permintaan->nama_pelanggan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permintaan.fields.alamat_pelanggan') }}
                        </th>
                        <td>
                            {{ $permintaan->alamat_pelanggan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('dashboard.permintaans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection