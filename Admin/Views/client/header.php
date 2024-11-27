<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css" integrity="sha512-9xKTRVabjVeZmc+GUW8GgSmcREDunMM+Dt/GrzchfN8tkwHizc5RP4Ok/MXFFy5rIjJjzhndFScTceq5e6GvVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            margin: 0px;
            padding: 0px;
        }
        .header{
            width: 1500px;
            background-color: #F2F4F7;
            margin: 0px auto;
        }
        header{
            width: 100%;
            height: 100px;
            display: flex;
        }
        .logo img{
            width: 270px;
            height: 110px;
            margin-left: 30px;
        }
        form{
            line-height: 90px;
            margin-left: 150px;
        }
        form input{
            width: 600px;
            height: 40px;
            border: 0;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding-left: 5px;
            position: relative;
            outline: none;
            color: #868181;
        }
        form input:focus {
            border: none; /* Khi nhấn vào input, border sẽ mất */
        }
        form i{
            position: absolute;
            top: 40px;
            left: 1040px;
            color: #7A0EFF;
        }
        .icon{
            line-height: 95px;
            margin-left: 170px;
        }
        .icon i{
            color: #24305E;
            font-size: 17px;
        }
        /* Định dạng menu cha */
        nav .menu {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            background-color: #24305E;
            transition: 0.5s;
        }
        nav .menu-item {
            position: relative;
            margin: 0 30px;
            transition: 0.5s;
        }
        nav .menu-item a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            line-height: 60px;
            font-family: sans-serif;
            padding: 0 10px;
            display: block;
            transition: 0.5s;
        }
        /* Định dạng menu con */
        nav .submenu {
            display: none; /* Ẩn menu con */
            position: absolute;
            top: 100%; /* Hiển thị dưới menu cha */
            left: 0;
            list-style: none;
            padding: 5px 0;
            margin: 0;
            background-color: #F2F4F7;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            min-width: 250px;
            transition: 0.5s;
        }
        nav .submenu li a {
            text-decoration: none;
            color: #24305E;
            font-size: 14px;
            padding: 0px 20px;
            display: block;
            transition: 0.5s;
        }
        nav .submenu li a:hover {
            background-color: #24305E;
            color: white;
        }
        /* Hiển thị menu con khi hover vào menu cha */
        nav .menu-item:hover .submenu {
            display: block;
        }
        .icon a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <section class="header">
        <header>
            <div class="logo">
                <a href="?act=/"><img src="./img/logo.png" alt=""></a>
            </div>
            <form action="">
                <input type="text" placeholder="Bạn đang tìm gì .....">
                <i class="fa-solid fa-magnifying-glass"></i>
            </form>
            <div class="icon">
                <?php
                    if(isset($_SESSION['user']) && ($_SESSION['user'])){
                ?>
                <a href="?act=chitietUser&id=<?= $_SESSION['user']['id_taikhoan'] ?>"><i class="fa-solid fa-user"></i><?= $_SESSION['user']['username'] ?></a>
                <?php
                    }
                    else{
                ?>
                <a href="?act=dangnhap"><i class="fa-solid fa-user"></i> Đăng nhập</a> 
                <?php
                    }
                ?>
                <i class="fa-solid fa-cart-shopping"></i> Giỏ hàng
            </div>
        </header>
        <nav>
            <ul class="menu">
                <?php foreach 
                    ($listDanhmuc as $danhmuc) {
                ?>
                    <li class="menu-item">
                        <a href="?act=listSanphamDanhMucMe&id=<?= $danhmuc['ma_danhmuc'] ?>"><?= $danhmuc['ten_danhmuc'] ?></a>
                    <?php
                        $danhmuc_me = $danhmuc['ma_danhmuc'];
                        $DanhmucNav = $this->danhmuccon->listNav($danhmuc_me);
                    ?>
                        <ul class="submenu">
                            <?php foreach ($DanhmucNav as $danhmuccon){ ?>
                                <li><a href="?act=listsanphamDanhmuc&id=<?= $danhmuccon['id_danhmuc_con'] ?>"><?= $danhmuccon['ten_danhmuc_con'] ?></a></li>
                            <?php } ?>
                        </ul>
                    <?php  ?>
                    </li>
                <?php 
                    } 
                ?>
            </ul>
        </nav>
    </section>
</body>
</html>