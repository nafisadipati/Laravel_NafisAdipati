<!-- resources/views/patients/index.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Data Pasien</h1>

<!-- Form Input Pasien -->
<form action="{{ route('patients.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nama Pasien</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Pasien" required>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Alamat Pasien" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">No Telepon</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="No Telepon" required>
    </div>
    <div class="mb-3">
        <label for="hospital_id" class="form-label">Rumah Sakit</label>
        <select class="form-select" id="hospital_id" name="hospital_id" required>
            @foreach($hospitals as $hospital)
                <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Tambah Pasien</button>
</form>

<!-- Filter Berdasarkan Rumah Sakit -->
<div class="my-3">
    <label for="hospitalFilter" class="form-label">Filter Berdasarkan Rumah Sakit</label>
    <select id="hospitalFilter" class="form-select">
        <option value="">Pilih Rumah Sakit</option>
        @foreach($hospitals as $hospital)
            <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
        @endforeach
    </select>
</div>

<!-- Tabel Pasien -->
<table class="table table-striped" id="patientsTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Rumah Sakit</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($patients as $patient)
        <tr>
            <td>{{ $patient->id }}</td>
            <td>{{ $patient->name }}</td>
            <td>{{ $patient->address }}</td>
            <td>{{ $patient->phone }}</td>
            <td>{{ $patient->hospital->name }}</td>
            <td>
                <button class="btn btn-danger btn-sm delete" data-id="{{ $patient->id }}">Hapus</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('.delete').click(function() {
            var patientId = $(this).data('id');
            if (confirm('Yakin ingin menghapus pasien ini?')) {
                $.ajax({
                    url: '/patients/' + patientId,
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

        $('#hospitalFilter').change(function() {
            var hospitalId = $(this).val();
            $.ajax({
                url: 'patients/filter',
                type: 'GET',
                data: { hospital_id: hospitalId },
                success: function(data) {
                    var rows = '';
                    data.forEach(function(patient) {
                        var hospitalName = patient.hospital ? patient.hospital.name : 'Tidak Diketahui';
                        rows += '<tr><td>' + patient.name + '</td><td>' + patient.address + '</td><td>' + patient.phone + '</td><td>' + hospitalName + '</td><td><button class="btn btn-danger btn-sm delete" data-id="' + patient.id + '">Hapus</button></td></tr>';
                    });
                    $('#patientsTable tbody').html(rows);
                }
            });
        });

    });
</script>
@endsection
