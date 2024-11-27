<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css" integrity="sha512-9xKTRVabjVeZmc+GUW8GgSmcREDunMM+Dt/GrzchfN8tkwHizc5RP4Ok/MXFFy5rIjJjzhndFScTceq5e6GvVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .nho1{
            margin-top: -45px;
        }
       .nho1> input{
        width: 15px;
        height: 14px;
        margin-left: 390px;
       }
       .username{
        margin-left: 390px;
        margin-top: -20px;
       }
       .username> input{
        width: 400px;
       }
       .password{
        margin-left: 390px;
        margin-top: -20px;
       }
       .password> input{
        width: 400px;
       }
       .li1> a{
        margin-top: 200px;
       }
       .quenmk{
        margin-left: 140px;
        margin-top: 200px;
       }
       .nho2 >input{
        width: 150px;
        background-color: #24305E;
        color: white;
       }
       .nho2 >input:hover{
       background-color: green;
        
       }
       .nho2{
        margin-left: 525px;
        margin-top: -30px;
       }
       .anh2{
        margin-left: 800px;
        margin-top: -10px;
       }
       .anh1{
        margin-left: 650px;
        margin-top: -70px;
       }
       .dk{
        margin-left: 630px;
       }
       .dk> a{
        color: red;
       }
       .form-2{
        width: 1500px;
        margin: 0px auto;
       }
    </style>
</head>
<body>
    <section class="form-2">
        <?php include("./Views/client/header.php"); ?>
            <div class="user-pass">
                <img style="margin-left: 615px;" src="./img/logo.png" width="270" height="110" alt="">
                <p style="text-align: center; margin-top: -5px ">High Tech</p>
                <h1 style="text-align: center; margin-top: -10px;">Đăng Nhập</h1>
                <?php
                    if (isset($_SESSION['erron'])) {
                        echo "<div style='color: red; text-align: center; margin-top: 10px;'>" . $_SESSION['erron'] . "</div>";
                        unset($_SESSION['erron']); // Xóa thông báo sau khi hiển thị
                    }
                ?>
                <form id="form" class="dangnhap" action="?act=post-dangnhap" method="POST">
                    <div class="username">
                        <input type="text" id="name" name="username" placeholder="*Nhập số điện thoại hoặc email*"  required>
                    </div>
                    <div class="password">
                        
                        <input type="password" id="pass" name="password" placeholder="*Nhập mật khẩu*" required>
                    </div>
                    <div class="nho">
                        <div class="nho1">
                            <input type="checkbox" value="Ghi nhớ tài khoản"> Ghi nhớ tài khoản ?
                            <a class="quenmk" href="">Quên mật khẩu ?</a>
                        </div>
                        <div class="nho2">
                            <input type="submit" name="dangnhap" value="Đăng nhập">
                        </div>
                    </div>
                </form>
                <div class="mb-links">
                    <p style="text-align: center; margin-top:-10px">Hoặc</p>
                    <div>
                        <img class="anh2" src="./img/fb.png" width="35" height="35" alt=""> 
                    </div>
                        <img class="anh1" src="./img/gg.png" width="75" height="75" alt=""> <br>
                    <div class="dk">
                       Bạn chưa có tài khoản?<a href="?act=dangky">Đăng Ký Ngay</a>
                    </div>
                
                </div>
            </div>
        </section>
        <?php include("./Views/client/footer.php"); ?>
</body>
</html>