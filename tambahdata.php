<?php

    $koneksi = mysqli_connect("localhost","root","","informatik");

    if(!$koneksi)
    {
        die('Koneksi Gagal' .mysqli_connect_error());
    }
    //else
    //{
    //    echo "Koneksi berhasil!!!!";
    //}

    if(isset($_POST['submit']))
    {
        $nama = $_POST["nama"];
        $nim = $_POST["nim"];
        $jurusan = $_POST["jurusan"];
        $alamat = $_POST["alamat"];
        
        $file = $_FILES['foto']['name'];
        $namafile = date('DMY_Hm') . '_' . $file;
        $temp = $_FILES['foto']['tmp_name'];
        $folder = 'image/';
        $path = $folder . $file;

        if(move_uploaded_file($temp, $path))
        {
            $query = "INSERT INTO mahasiswa (foto,nama,nim,jurusan,alamat) VALUES ('$namafile', '$nama', '$nim', '$jurusan', '$alamat')";

            mysqli_query($koneksi, $query);

            if(mysqli_affected_rows($koneksi) > 0)
            {
                echo "
                <script>
                    alert('Data Berhasil Ditambahkan!');
                    document.location.href='datamahasiswa.php';
                </script>
                ";
            }
            else{
                echo "
                <script>
                    alert('Data Gagal Ditambahkan!');
                    document.location.href='datamahasiswa.php';
                </script>
                ";
            }
        }

    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nama">Nama :</label>
        <input type="text" name="nama" id="nama" required /><br>
        <label for="nim">NIM :</label>
        <input type="text" name="nim" id="nim" required /><br>
        <label for="jurusan">Jurusan :</label>
        <input type="text" name="jurusan" id="jurusan" required /><br>
        <label for="alamat">Alamat :</label>
        <input type="text" name="alamat" id="alamat" required /><br>
        <label>Upload Foto :</label>
        <input type="file" name="foto" required /><br>
        <button type="submit" name="submit">Tambah</button>
    </form>
</body>
</html>