<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    public function index() {
        $pegawai = Pegawai::all();
        return view('pegawai.index', compact('pegawai'));
    }

    public function create() {
        $jabatans = Jabatan::all();
        return view('pegawai.create', compact('jabatans'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'jabatan_id' => 'required|exists:jabatan,id',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        // Simpan foto di public/storage/foto
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto', 'public');
        } else {
            $path = null;
        }
    
        Pegawai::create([
            'nama' => $request->nama,
            'jabatan_id' => $request->jabatan_id,
            'deskripsi' => $request->deskripsi,
            'foto' => $path
        ]);
    
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan.');
    }    

    public function edit(Pegawai $pegawai) {
        $jabatans = Jabatan::all();
        return view('pegawai.edit', compact('pegawai', 'jabatans'));
    }

    public function update(Request $request, Pegawai $pegawai) {
        $request->validate([
            'nama' => 'required',
            'jabatan_id' => 'required|exists:jabatan,id',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($pegawai->foto) {
                Storage::disk('public')->delete($pegawai->foto);
            }
            // Simpan foto baru di public/storage/foto
            $path = $request->file('foto')->store('foto', 'public');
        } else {
            $path = $pegawai->foto;
        }
    
        $pegawai->update([
            'nama' => $request->nama,
            'jabatan_id' => $request->jabatan_id,
            'deskripsi' => $request->deskripsi,
            'foto' => $path
        ]);
    
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diperbarui.');
    }
    
    public function destroy(Pegawai $pegawai) {
        if ($pegawai->foto) {
            Storage::delete($pegawai->foto);
        }

        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus.');
    }
}
