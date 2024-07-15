<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Pakar</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('template'); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('template'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('template'); ?>/dist/css/adminlte.min.css">
</head>
<style>
    body {
        font-family: 'Times New Roman', serif;
        color: black;
        background-color: #19E9F7;
       
    }

    .login-box {
        width: 360px;
        margin: 7% auto;
    }

    .card {
        border: 1px solid #28a745;
        /* Green border */
        border-radius: 10px;
    }

    .login-card-body {
        background-color: #d4edda;
        /* Light green background */
        border-top: 5px solid #28a745;
        /* Darker green top border */
        border-radius: 10px;
    }

    .login-logo h3 {
        color: #155724;
        /* Darker green text */
    }

    .btn-primary {
        background-color: #28a745;
        /* Green button */
        border-color: #28a745;
    }

    .btn-primary:hover {
        background-color: #218838;
        /* Darker green on hover */
        border-color: #1e7e34;
    }
</style>

<body class="hold-transition login-page" style="background-color: #19E9F7;">
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <div class="login-logo">
                    <img src="<?= base_url('template'); ?>/dist/img/asdp.png" alt="Admin Image" style="width: 100px; height: 100px;">
                    <br>
                    <h3>Silahkan Login</h3>
                </div>
                <!-- <p class="login-box-msg">Fajril for DRRA</p> -->

                <form action="<?= base_url('Auth/login'); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="username" name="username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="<?= base_url('template'); ?>/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url('template'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('template'); ?>/dist/js/adminlte.min.js"></script>
</body>

</html>