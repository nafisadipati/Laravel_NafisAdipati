@extends('layouts.app')

@section('content')
<h1>Data Rumah Sakit</h1>

<form action="{{ route('hospitals.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nama Rumah Sakit</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="address" name="address" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Telepon</label>
        <input type="text" class="form-control" id="phone" name="phone" required>
    </div>
    <button type="submit" class="btn btn-success">Tambah Rumah Sakit</button>
</form>

<table class="table table-striped mt-4">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($hospitals as $hospital)
        <tr>
            <td>{{ $hospital->id }}</td>
            <td>{{ $hospital->name }}</td>
            <td>{{ $hospital->address }}</td>
            <td>{{ $hospital->email }}</td>
            <td>{{ $hospital->phone }}</td>
            <td>
                <button data-id="{{ $hospital->id }}" class="btn btn-danger btn-sm delete">Hapus</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('.delete').click(function() {
            var patientId = $(this).data('id');
            if (confirm('Yakin ingin menghapus data ini?')) {
                $.ajax({
                    url: '/hospitals/' + patientId,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        alert(response.success);
                        location.reload();
                    }
                });
            }
        });
    });
</script>
@endsection
