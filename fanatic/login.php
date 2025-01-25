<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .error-message {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="login-container">
                <h5 class="text-center mb-4">Login</h5>
                <form method="POST" action="login_check.php">
                    <div class="mb-3">
                        <input type="text" name="username" class="form-control" required placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" required placeholder="Password">
                    </div>
                    <?php
                    if(isset($_SESSION["Error"])){
                        echo '<div class="error-message">' . $_SESSION["Error"] . '</div>';
                    }
                    ?>
                    <div class="d-grid">
                        <input type="submit" name="submit" value="Login" class="btn btn-primary">
                    </div>
                </form>
                <div class="text-center mt-3">
                    <a href="index.php">สมัครสมาชิก</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap JS -->
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
