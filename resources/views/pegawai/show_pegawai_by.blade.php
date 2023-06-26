<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Laravel Notify CSS -->
    @notifyCss
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Data Pegawai</title>
  </head>
  <body>
      <h1 class="text-center m-3">Data Pegawai</h1>
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
                {{-- <p>Nama: {{ $employee->name }}</p>
                <p>Jenis Kelamin: {{ $employee->gender }}</p>
                <p>Nomor Telepon: {{ $employee->phone_number }}</p> --}}
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Nama: {{ $employee->name }}</li>
                    <li class="list-group-item">Jenis Kelamin: {{ $employee->gender }}</li>
                    <li class="list-group-item">Nomor Telepon: {{ $employee->phone_number }}</li>
                  </ul>
            </div>
        </div>
    </div>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    <!-- Laravel Notify JS -->
    @notifyJs
  </body>
</html>