@extends('admin.head')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Pegawai</h5>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Pegawai</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama', $pegawai->nama) }}">
                            @error('nama')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jabatan_id" class="form-label">Jabatan</label>
                            <select class="form-select" id="jabatan_id" name="jabatan_id" required>
                                @foreach($jabatans as $jabatan)
                                    <option value="{{ $jabatan->id }}" {{ $pegawai->jabatan_id == $jabatan->id ? 'selected' : '' }}>
                                        {{ $jabatan->nama_jabatan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="b-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" id="deskripsi" value="{{ old('deskripsi', $pegawai->deskripsi) }}">
                            @error('deskripsi')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto (Opsional)</label>
                            <input type="file" name="foto" class="form-control" id="foto">
                            <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                            @error('foto')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        @if ($pegawai->foto)
                        <div class="mb-3">
                            <label for="current_foto" class="form-label">Foto Saat Ini</label><br>
                            <img src="{{ asset('storage/' . $pegawai->foto) }}" alt="Foto Pegawai" width="100">
                        </div>
                        @endif

                        <button type="submit" class="btn btn-primary">Perbarui Pegawai</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="py-6 px-6 text-center">
        <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
                class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a href="https://themewagon.com/" target="_blank"
                class="pe-1 text-primary text-decoration-underline">ThemeWagon</a></p>
    </div>
</div>