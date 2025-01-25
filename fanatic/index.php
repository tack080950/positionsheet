<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh; /* ให้สูงเต็มหน้าจอ */
            display: flex;
            justify-content: center; /* จัดให้อยู่กลางในแนวนอน */
            align-items: center; /* จัดให้อยู่กลางในแนวตั้ง */
            background-color: #f8f9fa; /* เพิ่มพื้นหลังสีอ่อน */
        }

        .container {
            max-width: 600px; /* จำกัดความกว้างของแบบฟอร์ม */
        }

        .bg-light {
            border-radius: 10px; /* เพิ่มความโค้งมน */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* เพิ่มเงาเพื่อให้ดูโดดเด่น */
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 bg-light text-dark">
            <div class="text-center alert alert-primary h4" role="alert">
                สมัครสมาชิก
            </div>

            <form method="POST" action="insert_register.php">
                ชื่อ <input type="text" name="firstname" class="form-control" required>
                นามสกุล <input type="text" name="lastname" class="form-control" required>
                เบอร์โทรศัพท์ <input type="number" name="phone" maxlength="10" class="form-control" required>
                Username <input type="text" name="username" maxlength="10" class="form-control" required>
                Password <input type="password" name="password" maxlength="10" class="form-control" required>
                <br>
                <input type="submit" name="submit" value="บันทึก" class="btn btn-primary">
                <input type="reset" name="cancel" value="ยกเลิก" class="btn btn-danger">
                <br><br>
                <a href="login.php">Login</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>