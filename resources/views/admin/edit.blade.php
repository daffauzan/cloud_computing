<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <title>Edit Mahasiswa</title>
</head>
<body>
    <div class="container">
        <h1>Edit Mahasiswa</h1>

        @if ($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('mahasiswa.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $data->nama) }}" required>
            </div>

            <div class="form-group">
                <label for="nrp">NRP</label>
                <input type="text" id="nrp" name="nrp" value="{{ old('nrp', $data->nrp) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $data->email) }}" required>
            </div>

            <div class="form-group">
                <label for="telp">Telp</label>
                <input type="text" id="telp" name="telp" value="{{ old('telp', $data->telp) }}" required>
            </div>

            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input type="text" id="jurusan" name="jurusan" value="{{ old('jurusan', $data->jurusan) }}" required>
            </div>

            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" id="foto" name="foto" accept="image/*">
                @if($data->foto)
                    <p>Foto saat ini:</p>
                    <img src="{{ asset('storage/' . $data->foto) }}" alt="Foto {{ $data->nama }}" class="foto">
                @endif
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-secondary" onclick="window.location='{{ route('mahasiswa.index') }}'">Batal</button>
            </div>
        </form>
    </div>
</body>
</html>
