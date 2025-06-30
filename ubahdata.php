<?php

    require "function.php";

    $id = $_GET["id"];

    $query = "SELECT *FROM mahasiswa WHERE id = $id";
    
    $mhs = tampildata($query)[0];

    if(isset($_POST['submit']))
    {
        if (ubahdata($_POST, $id) > 0 )
        {
            echo "
            <script>
                alert('Data Berhasil Diperbaharui!');
                document.location.href='../datamahasiswa.php';
            </script>
            ";
        }
        else
        {
            echo "
            <script>
                alert('Data Gagal Diperbaharui!');
                document.location.href='../datamahasiswa.php';
            </script>
            ";
        }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
</head>
<body>
    <h1>Ubah Data Mahasiswa</h1>

    <div class="card mx-auto mt-4" style="width: 22rem;">
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required value="<?= $mhs ["nama"] ?>">
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" required value="<?= $mhs ["nim"] ?>">
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" required value="<?= $mhs ["jurusan"] ?>">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required value="<?= $mhs ["alamat"] ?>">
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Upload Foto</label>
                <input class="form-control" type="file" id="foto" name="foto" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-100">Tambah</button>
        </form>
    </div>
</div>

</body>
</html>