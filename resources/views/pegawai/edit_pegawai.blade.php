@extends('layout.home')
@section('title','Data Pegawai')
@section('content')
    <h1 class="text-center m-3">Update Data Pegawai</h1>
    <div class="container">
        <div class="row">
              <form action="{{ route('pegawai.update',$employee->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="name" class="form-label">Nama:</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$employee->name  }}">
                </div>
                
                <div class="mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin:</label>
                    <select class="form-select" required aria-label="Select gender" id="gender" name="gender">
                        {{-- <option value="">Pilih jenis kelamin</option> --}}
                        <option value="male" {{ $employee->gender == 'male' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="female" {{ $employee->gender == 'female' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Masukan foto:</label>
                    <input type="file" class="form-control" name="image" id="image" > 
                    
                    @if (strlen($employee->image)>0)
                    <img src="{{ asset('img_pegawai/'.$employee->image) }}" class="m-3" style="width: 150px;" alt="Image employee">
                    @endif   
                </div>
                
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Nomor Telepon:</label>
                    <input type="number" 
                    class="form-control" 
                    name="phone_number" id="phone_number" 
                    value="{{$employee->phone_number  }}"
                    maxlength="13">
                    @if ($errors->has('phone_number'))
                        <div class="alert alert-danger mt-1 p-1">{{ $errors->first('phone_number') }}</div>
                    @endif
                </div>
            
                <button type="submit" class="btn btn-primary">Update Pegawai</button>
            </form>
            
        </div>
    </div>
@endsection