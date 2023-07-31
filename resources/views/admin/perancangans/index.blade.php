@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        Promo 
    </div>
            @if ($count < 1)
                <div class="card-body">
                    <div class="alert alert-info">
                        Belum Ada Promo
                    </div>
                    @if (auth()->user()->role == 'sales')
                        <a class="btn btn-success" href="{{ route('dashboard.perancangans.create', $permintaan->id) }}">
                            Tambah Promo
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
                                <th>Promo</th>
                                <th>Tanggal Promo</th>
                                @if (auth()->user()->role != 'user')                                    
                                <th>Action</th>
                                @endif

                            </tr>
                        </thead>
                        <tbody>
                            <tr data-entry-id="{{ $perancangan->id }}">
                                <!-- <td>{{ $perancangan->id ?? '' }}</td> -->
                                <td>{{ $perancangan->promo ?? '' }}</td>
                                <td>{{ $perancangan->tanggal_promo ? \Carbon\Carbon::parse($perancangan->tanggal_promo)->format('Y-m-d') : '' }}</td>
                                @if (auth()->user()->role != 'user')                                    
                                <td>
                                    <a class="btn btn-xs btn-info" href="{{ route('dashboard.perancangans.edit', $perancangan->id) }}">
                                        Edit
                                    </a>
                                        <form action="{{ route('dashboard.perancangans.destroy', $perancangan->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                        </form>
                                </td>
                                @endif
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
