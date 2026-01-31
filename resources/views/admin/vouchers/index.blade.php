@extends('admin.layout')

@section('content')
<div class="container">
    <h2>Manajemen Voucher</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.vouchers.create') }}" class="btn btn-primary mb-3">
    + Tambah Voucher
</a>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Tipe</th>
                <th>Nilai</th>
                <th>Kuota</th>
                <th>Expired</th>
                <th>Status</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vouchers as $v)
            <tr>
                <td><strong>{{ $v->code }}</strong></td>
                <td>{{ strtoupper($v->type) }}</td>
                <td>
                    {{ $v->type === 'fixed' ? 'Rp '.number_format($v->value) : $v->value.'%' }}
                </td>
                <td>{{ $v->quota }}</td>
                <td>{{ $v->expired_at }}</td>
                <td>
                    <span class="badge {{ $v->is_active ? 'bg-success' : 'bg-secondary' }}">
                        {{ $v->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.vouchers.edit', $v->id) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ url('/admin/vouchers/'.$v->id.'/toggle') }}"
                          method="POST" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-info btn-sm">
                            {{ $v->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                        </button>
                    </form>

                    <form action="{{ route('admin.vouchers.destroy', $v->id) }}"
                          method="POST" style="display:inline;"
                          onsubmit="return confirm('Yakin hapus voucher ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
