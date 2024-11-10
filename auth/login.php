<?php
require_once "../_config/config.php";

if (isset($_SESSION['user'])) {
    echo "<script>window.location='" . base_url() . "'</script>";
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Login - Rumah Sakit</title>
        <!-- Bootstrap Core CSS -->
        <link href="<?= base_url(); ?>/_assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <style>
            body {
                background-image: url('path_to_your_background_image.jpg');
                /* Ganti dengan path gambar latar belakang */
                background-size: cover;
                background-position: center;
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .login-container {
                background: rgba(255, 255, 255, 0.8);
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
                width: 400px;
            }

            .input-group-addon {
                background-color: #007bff;
                color: white;
            }

            .btn-primary {
                background-color: #007bff;
                border: none;
            }

            .btn-primary:hover {
                background-color: #0056b3;
            }
        </style>
    </head>

    <body>
        <div class="login-container animate__animated animate__fadeIn">
            <h2 class="text-center text-primary">Login ke Sistem</h2>
            <?php
            if (isset($_POST['login'])) {
                $user = trim(mysqli_real_escape_string($con, $_POST['user']));
                $pass = sha1(trim(mysqli_real_escape_string($con, $_POST['pass'])));

                $sql_login = mysqli_query($con, "SELECT * FROM tb_user WHERE username = '$user' AND password = '$pass'") or die(mysqli_error($con));
                if (mysqli_num_rows($sql_login) > 0) {
                    $_SESSION['user'] = $user;
                    echo "<script>window.location='" . base_url() . "'</script>";
                } else { ?>
                    <div class="alert alert-danger alert-dismissable" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Login gagal!</strong> Username / Password salah
                    </div>
            <?php
                }
            }
            ?>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <span class="input-group-addon"><i class="fas fa-user"></i></span>
                    <input type="text" name="user" class="form-control" placeholder="Username" required="" autofocus="">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-addon"><i class="fas fa-lock"></i></span>
                    <input type="password" name="pass" class="form-control" placeholder="Password" required="">
                </div>
                <div class="input-group">
                    <input type="submit" name="login" class="btn btn-primary btn-block" value="Login">
                </div>
            </form>
        </div>

        <script src="<?= base_url('_assets/js/jquery.js'); ?>"></script>
        <script src="<?= base_url('_assets/js/bootstrap.min.js'); ?>"></script>
    </body>

    </html>

<?php } ?>