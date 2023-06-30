@extends('layout.home')
@section('title','Data Pegawai')
@section('content')
    <h1 class="text-center m-3">Data Pegawai</h1>
    <div class="container">
        <a href={{ route('pegawai.create') }} class="btn btn-primary">Tambah Data</a>
        <x:notify-messages />

        <div class="row">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $data as $row )
                    <tr>
                      <th scope="row">{{ $row->id }}</th>
                      <td>{{ $row->name }}</td>
                      @if ($row->gender=="male")
                          <td>Laki-Laki</td>
                        @else
                        <td>Perempuan</td>

                      @endif
                      <td>{{ $row->phone_number }}</td>
                      <td><img src="{{ asset('img_pegawai/'.$row->image) }}" style="width: 50px;" alt=""></td>
                      <td>
                          <a href={{ route('pegawai.show',$row->id) }} class="btn btn-info">Detail</a>
                          <a href={{ route('pegawai.edit',$row->id) }} class="btn btn-warning">Update</a>
                          {{-- <button type="button" class="btn btn-danger">Delete</button> --}}
                          <!-- Button trigger modal -->
                        {{-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $row->id }}">
                            Delete
                        </button> --}}
                        <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-name="{{ $row->name }}">
                            Delete
                        </a>
                      </td>
                    </tr>
  
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal{{ $row->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Hapus Data Pegawai</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            Anda yakin ingin menghapus data <strong>{{ $row->name }}</strong>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                            <a href={{ route('pegawai.delete',$row->id) }} class="btn btn-danger">Yes</a>
                            </div>
                        </div>
                        </div>
                    </div>

                    <script>
                        $('.delete').click( function () {
                            var employeeName=$(this).attr('data-name');
                            var employeeId=$(this).attr('data-id');
                            swal({
                                title: "Apakah kamu yakin?",
                                text: "Kamu akan menghapus data pegawai "+employeeName,
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                            })
                            .then((willDelete) => {
                            if (willDelete) {
                                window.location="pegawai/delete/"+employeeId
                                swal("Data "+employeeName+" sudah terhapus!", {
                                icon: "success",
                                });
                            } else {
                                swal("Data tidak jadi dihapus!  ");
                            }
                            });
                        })
                    </script>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection