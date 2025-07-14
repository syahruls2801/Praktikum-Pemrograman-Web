<?php

    require 'function.php';

    if(isset($_POST["submit"]))
    {
        $message = register($_POST);

        if($message === "Register Berhasil")
        {
            echo "
            <script>
                alert('". addslashes($message) . "');
                document.location.href = 'login.php';
            </script>
        ";
        }
        else
        {
            echo "
            <script>
                alert('". addslashes($message) . "');
                document.location.href = 'register.php';
            </script>
        ";
        }

    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Web Informatika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>
<body style="padding: 0 400px;">
    <h1>Register</h1>
    <div class="card mb-3" style="background-color:darkmagenta; color:whitesmoke">
        <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <label for="password1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password1" placeholder="Password" required>
            </div>
            <div class="mb-3">
                <label for="password2" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi Password" required>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>