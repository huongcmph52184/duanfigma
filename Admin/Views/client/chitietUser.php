<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .layout{
            width: 1500px;
            margin: 0px auto;
        }
        .User{
            width: 100%;
        }
        .User h2{
            text-align: center;
            margin-top: 40px;
            font-weight: 600;
            font-family: 'Inter';
        }
        .User form{
            text-align: center;
            margin: 0px;
            padding: 0px;
        }
        .Avatar{
            text-align: center;
        }
        .Avatar img{
            width: 150px;
            height: 140px;
            border-radius: 50%;
        }
        .logout{
            text-align: center;
            display: flex;
            justify-content: center;
            margin-top: 40px;
            margin-bottom: 100px;
        }
        .dangxuat{
            margin-right: 330px;
        }
        .dangxuat a{
            text-decoration: none;
            font-size: 18px;
            color: red;
        }
        .update a{
            text-decoration: none;
            font-size: 18px;
            color: #24305E;
        }
    </style>
</head>
<body>
    <section class="layout">
        <?php include("./Views/client/header.php"); ?>
        <div class="User">
            <?php
                if(isset($_SESSION['user']) && ($_SESSION['user'])){
            ?>
            <h2>Chi tiết tài khoản</h2>
            <div class="Avatar">    
                <img src="<?= $_SESSION['user']['Avartar'] ?>" alt="">
            </div>
            <form action="">
                <div class="username">
                    <input type="text" name="username" value="<?= $_SESSION['user']['username'] ?>">
                </div>
                <div class="password">    
                    <input type="text"  name="password" value="<?= $_SESSION['user']['password'] ?>">
                </div>
                <div class="password">    
                    <input type="text" name="sdt" value="<?= $_SESSION['user']['Sdt'] ?>">
                </div>
                <div class="password">    
                    <input type="text" name="Address" value="<?= $_SESSION['user']['Diachi_lienhe'] ?>">
                </div>
                <div class="password">    
                    <input type="text" name="email"value="<?= $_SESSION['user']['Email'] ?>">
                </div>
            </form>
            <div class="logout">
                <div class="dangxuat">
                    <a href="?act=dangxuat"><i class="fa-solid fa-right-from-bracket"></i> Đăng Xuất</a>
                </div>
                <div class="update">
                    <a href="?act=updateUser&id=<?= $_SESSION['user']['id_taikhoan'] ?>"><i class="fa-regular fa-pen-to-square"></i> Cập nhập tài khoản</a>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </section>
    <?php include("./Views/client/footer.php"); ?>
</body>
</html>