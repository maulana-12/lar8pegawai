@extends('layout.home')
@section('title','Data Pegawai')
@section('content')
    <h1 class="text-center m-3">Tambah Data Pegawai</h1>
    <x:notify-messages />
    <div class="container">
        <div class="row">
              <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label for="name" class="form-label">Nama:</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
                
                <div class="mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin:</label>
                    <select class="form-select" required aria-label="Select gender" id="gender" name="gender">
                        <option selected>Pilih jenis kelamin</option>
                        <option value="male">Laki-Laki</option>
                        <option value="female">Perempuan</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Nomor Telepon:</label>
                    <input type="number" class="form-control" name="phone_number" id="phone_number" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Masukan gambar:</label>
                    <input type="file" class="form-control" name="image" id="image" required>
                </div>
            
                <button type="submit" class="btn btn-primary">Tambah Pegawai</button>
            </form>
            
        </div>
    </div>
@endsection