<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <title>Detail Mahasiswa</title>
</head>
<body>
    <div class="container">
        <h1>Detail Mahasiswa</h1>
        <table>
            <tr>
                <th>Nama</th>
                <td>{{ $data->nama }}</td>
            </tr>
            <tr>
                <th>NRP</th>
                <td>{{ $data->nrp }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $data->email }}</td>
            </tr>
            <tr>
                <th>Telp</th>
                <td>{{ $data->telp }}</td>
            </tr>
            <tr>
                <th>Jurusan</th>
                <td>{{ $data->jurusan }}</td>
            </tr>
            <tr>
                <th>Foto</th>
                <td>
                    @if($data->foto)
                        <img src="{{ asset('storage/' . $data->foto) }}" alt="Foto {{ $data->nama }}" class="foto">
                    @else
                        -
                    @endif
                </td>
            </tr>
            <tr>
                <th>Dibuat</th>
                <td>{{ $data->created_at?->format('Y-m-d H:i') }}</td>
            </tr>
        </table>
        <div class="form-actions">
            <button type="button" class="btn btn-secondary" onclick="window.location='{{ route('mahasiswa.index') }}'">Kembali ke daftar Mahasiswa</button>
        </div>
    </div>
</body>
</html>
