<?php
    session_start();

    if(isset($_SESSION["login"]))
    {
      header("Location: datamahasiswa.php");
      exit;
    }
    
    require 'function.php';

    $error = false;

    if(isset($_POST["login"]))
    {
      $username = $_POST["username"];
      $password = $_POST["password"];

      $query = "SELECT *FROM user WHERE username='$username'";

      $result = mysqli_query($koneksi, $query);

      $user = mysqli_fetch_assoc($result);

      if(mysqli_num_rows($result) > 0)
      {
        if(password_verify($password, $user["password"]))
        {
          $_SESSION["login"] = $user["id"];

          header("Location: datamahasiswa.php");
          exit;
        }
      }

      $error = true;
    }
?>



<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LOGIN | WEB INFORMATIKA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </head>

  <body>
    <h1 style="text-align: left;">LOGIN</h1>
    <?php if($error) : ?>
      <p style="color: red;">Username/Password SALAH!</p>
    <?php endif ?>
    <form action="" method="post" enctype="multipart/form-data">
      <label for="username"> <u>Username</u></label><br />
      <input type="text" name="username" placeholder="username" /><br /><br />

      <label for="password">Password</label><br />
      <input type="password" name="password" placeholder="password" /><br /><br />

      <button type="submit" name="login">Login</button>
    </form>

    <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
  </body>
</html>
