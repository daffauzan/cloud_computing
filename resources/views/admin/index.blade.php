<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <title>Mahasiswa | Index</title>
</head>

<body>
    <div class="container">
        <div class="top-actions">
            <h1>Data Mahasiswa</h1>
            <a href="{{ route('mahasiswa.create') }}">Tambah Mahasiswa</a>
        </div>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NRP</th>
                    <th>Email</th>
                    <th>Telp</th>
                    <th>Jurusan</th>
                    <th>Foto</th>
                    <th>Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $mahasiswa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mahasiswa->nama }}</td>
                        <td>{{ $mahasiswa->nrp }}</td>
                        <td>{{ $mahasiswa->email }}</td>
                        <td>{{ $mahasiswa->telp }}</td>
                        <td>{{ $mahasiswa->jurusan }}</td>
                        <td>
                            @if($mahasiswa->foto)
                                <img src="{{ asset('storage/' . $mahasiswa->foto) }}" alt="Foto {{ $mahasiswa->nama }}" class="foto">
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $mahasiswa->created_at?->format('Y-m-d') }}</td>
                        <td class="actions">
                            <a href="{{ route('mahasiswa.show', $mahasiswa->id) }}">Lihat</a>
                            <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}">Edit</a>
                            <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST" onsubmit="return confirm('Hapus data {{ $mahasiswa->nama }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="empty-row">
                        <td colspan="9">Belum ada data mahasiswa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>