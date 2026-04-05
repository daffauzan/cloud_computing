<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <div class="container">
        <h1>Tambah Mahasiswa</h1>

        @if ($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required>
            </div>

            <div class="form-group">
                <label for="nrp">NRP</label>
                <input type="text" id="nrp" name="nrp" value="{{ old('nrp') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="telp">Telp</label>
                <input type="text" id="telp" name="telp" value="{{ old('telp') }}" required>
            </div>

            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select id="jurusan" name="jurusan" required>
                    <option value="" disabled selected>Pilih jurusan</option>
                    <option value="Informatika" {{ old('jurusan') == 'Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
                    <option value="Sistem Informasi" {{ old('jurusan') == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
                    <option value="Teknik Elektro" {{ old('jurusan') == 'Teknik Elektro' ? 'selected' : '' }}>Teknik Elektro</option>
                    <option value="Teknik Mesin" {{ old('jurusan') == 'Teknik Mesin' ? 'selected' : '' }}>Teknik Mesin</option>
                </select>
            </div>

            <div class="form-group">
                <label for="foto">Foto (Opsional)</label>
                <input type="file" id="foto" name="foto" accept="image/*">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" onclick="window.location='{{ route('mahasiswa.index') }}'">Batal</button>
            </div>
        </form>
    </div>
</body>
</html>