<?php require_once "./mvc/core/libs.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php public_patch('css/register.css') ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>Đăng kí</title>
    <style>
        *{
            background-image: url(<?php public_patch('./img/banner/bg-01.jpg') ?>);
        }
    </style>
</head>
<body>
    <div class="container">
        <center><h2>Trang đăng kí admin</h2></center>
        <form action="<?php echo add_customer; ?>" method="POST">
            <input type="text" class="email" name="username" placeholder="email">
            <br />
            <input type="text" class="pwd" name="password" placeholder="password">
        
            <center><a href="<?php echo login ?>" class="link">Bạn đã có tài khoản?</a></center>
            <br />
            <button class="register" type="submit">
                <span>Đăng ký</span>
            </button>
            <center id="close"><a href="<?php echo APP_URL ?>" > <i class="fa-solid fa-house"></i> Trở về trang chủ</a></center>
        </form>
    </div>
    <?php
        if(isset($_COOKIE['message'])){
            $message = $_COOKIE['message'];
            setcookie('message', '', time()-1, '/');
            echo "<script>alert('$message');</script>";
        }
    ?>
</body>
</html>