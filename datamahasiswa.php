<?php
    session_start();

    if(!isset($_SESSION["login"]))
    {
        header("Location: login.php");
        exit;
    }

    require "function.php";
    $query = "SELECT * From mahasiswa";
    $rows = tampildata($query); 
    //$nama = "Suripto"
    //$nama2 = "Aris";

    //echo "Hello World $nama" . "$nama2";
    

    //echo $nama;

    //$koneksi = mysqli_connect("localhost","root","","informatik");

    //if(!$koneksi)
    //{
    //    die('Koneksi Gagal' .mysqli_connect_error());
    //}
    //else
    //{
    //    echo "Koneksi berhasil!!!!"; //
    //}

    //$result = mysqli_query($koneksi,"SELECT * FROM mahasiswa");

    // echo $result; //
    //var_dump($result); //

    /// Ambil data di lemari kemudian kasih ke aku caranya gini

    // mysqli_fetch_row() -> array number
    // mysqli_fetch_assoc() ->
    // mysqli_fetch_array()
    // mysqli_fetch_object()

    //$mhs = mysqli_fetch_row($result);
    
    //var_dump($mhs); //

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1 align="center">Data Mahasiswa</h1>
    <nav>
        <ul style="list-style-type: none; text-align: center; padding: 0;">
            <li style="display: inline; margin:0 15px; text-decoration: none;">
                <a href="index.php">Home</a>
            </li>
            <li style="display: inline; margin:0 15px; text-decoration: none;">
                <a href="#about">About</a>
            </li>
            <li style="display: inline; margin:0 15px; text-decoration: none;">
                <a href="service.html">Service</a>
            </li>
            <li style="display: inline; margin:0 15px; text-decoration: none;">
                <a href="#contact">Contact Us</a>
            </li>
            <li style="display: inline; margin:0 15px; text-decoration: none;">
                <a href="logout.php">Log Out</a>
            </li>
            <li style="display: inline; margin:0 15px; text-decoration: none;">
                <a href="datamahasiswa.php">Data</a>
            </li>
        </ul>
    </nav>
    
    <h1>Data Mahasiswa</h1>
    <a href="tambahdata.php">
        <button style="background-color: green; cursor:pointer; margin-bottom:12px;">
            Tambah Data
        </button>
    </a>
    <table border="1" cellspacing="0" cellpadding="10px">
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1;
        foreach ($rows as $mhs) { ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <img src="image/mhs/<?= $mhs['foto']; ?>" alt="<?= $mhs['nama']; ?>" width="120px" />
                </td>
                <td><?= $mhs["nama"]; ?></td>
                <td><?= $mhs["nim"]; ?></td>
                <td><?= $mhs["jurusan"]; ?></td>
                <td><?= $mhs["alamat"]; ?></td>
                <td>
                    <a href="hapusdata.php/?id=<?=$mhs["id"] ?>"  onclick="return confirm('Yaquuueeenn?')"> Hapus</a> |
                    <a href="ubahdata.php/?id=<?=$mhs["id"] ?>"> Edit</a>
                </td>

            </tr>
        <?php $i++;
        } ?>
    </table>
</body>
</html>