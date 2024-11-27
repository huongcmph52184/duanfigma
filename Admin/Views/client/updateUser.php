<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
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
        .Avatar input{
            width: 600px;
            height: 40px;
            margin: 0px auto;
        }
    </style>
</head>
<body>
    <section class="layout">
        <?php include("./Views/client/header.php"); ?>
        <div class="User">
            <h2>Cập nhập thông tin tài khoản</h2>
            <?php
                if(isset($_SESSION['update'])){
                    echo "<div class='alert alert-success'>" . $_SESSION['update'] ."</div>";
                    unset($_SESSION['update']);
                }
            ?>
            <form action="?act=postUpdateUser&id=<?= $_SESSION['user']['id_taikhoan'] ?>" method="POST" enctype="multipart/form-data">
                <div class="username">
                    <input type="text" name="username" value="<?= $_SESSION['user']['username'] ?>">
                </div>
                <div class="password">    
                    <input type="text"  name="password" value="<?= $_SESSION['user']['password'] ?>">
                </div>
                <div class="Avatar">  
                    <input type="file" class="form-control" id="exampleInputPassword1" name="image" width="600px" height="40px">  
                    <img src="<?= $_SESSION['user']['Avartar'] ?>" alt="">
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
                <input class="submit" type="submit" name="update" value="Cập nhập">
            </form>
        </div>
    </section>
    <?php include("./Views/client/footer.php"); ?>
</body>
</html>