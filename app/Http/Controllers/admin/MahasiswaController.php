<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    // tampilkan semua data
    public function index()
    {
        $data = Mahasiswa::latest()->get();
        return view('admin.index', compact('data'));
    }

    // form tambah
    public function create()
    {
        return view('admin.create');
    }

    // simpan data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nrp' => 'required|unique:mahasiswa',
            'email' => 'required|email|unique:mahasiswa',
            'telp' => 'required|unique:mahasiswa',
            'jurusan' => 'required',
            'foto' => 'nullable|image'
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('mahasiswa', 'public');
        }

        Mahasiswa::create($validated);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    // detail
    public function show(string $id)
    {
        $data = Mahasiswa::findOrFail($id);
        return view('admin.show', compact('data'));
    }

    // form edit
    public function edit(string $id)
    {
        $data = Mahasiswa::findOrFail($id);
        return view('admin.edit', compact('data'));
    }

    // update
    public function update(Request $request, string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required',
            'nrp' => 'required|unique:mahasiswa,nrp,' . $id,
            'email' => 'required|email|unique:mahasiswa,email,' . $id,
            'telp' => 'required|unique:mahasiswa,telp,' . $id,
            'jurusan' => 'required',
            'foto' => 'nullable|image'
        ]);

        if ($request->hasFile('foto')) {
            if ($mahasiswa->foto) {
                Storage::disk('public')->delete($mahasiswa->foto);
            }

            $validated['foto'] = $request->file('foto')->store('mahasiswa', 'public');
        }

        $mahasiswa->update($validated);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data berhasil diupdate');
    }

    // hapus
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        if ($mahasiswa->foto) {
            Storage::disk('public')->delete($mahasiswa->foto);
        }

        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data berhasil dihapus');
    }
}