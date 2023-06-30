@extends('layout.home')
@section('title','Data Pegawai')
@section('content')
    <h1 class="text-center m-3">Data Pegawai</h1>
    <div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong style="display: inline-block; width: 125px;">Nama</strong> : {{ $employee->name }}</li>
                    <li class="list-group-item"><strong style="display: inline-block; width: 125px;">Jenis Kelamin</strong> : {{ $employee->gender }}</li>
                    <li class="list-group-item"><strong style="display: inline-block; width: 125px;">Nomor Telepon</strong> : {{ $employee->phone_number }}</li>
                    <li class="list-group-item"><strong style="display: inline-block; width: 125px;">Gambar</strong> : <img src="{{asset('img_pegawai/'. $employee->image) }}" style="width: 100px;" alt="Gambar Pegawai"> </li>
                    <a href={{ route('pegawai') }} class="btn btn-primary">Back</a>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection