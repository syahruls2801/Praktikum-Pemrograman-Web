<?php
    session_start();

    if(!isset($_SESSION["login"]))
    {
        header("Location: login.php");
        exit;
    }
    
    require 'function.php';

    $id = $_GET["id"];

    if (hapusdata($id) > 0)
    {
        echo "
        <script>
            alert('Data Berhasil Dihapus!');
            document.location.href='../datamahasiswa.php';
        </script>
        ";
    }
    else
    {
        echo "
            <script>
                alert('Data Gagal Dihapus!');
                document.location.href='../datamahasiswa.php';
            </script>
            ";
    }


?>