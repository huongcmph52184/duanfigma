<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <style>
        body{
            margin: 0px;
            padding: 0px;
        }
        .layoutAdmin{
            width: 1500px;
            margin: 0px auto;
            display: flex;
            background-color: #eef3f7;
        }
        .menu{
            width: 20%;
            background-color: #30383b;
            min-height: 1200px;
            box-shadow: 5px 0 10px #D3D3D3;
        }
        nav{
            width: 100%;
        }
        nav ul{
            padding: 0;
        }
        nav ul li{
            margin-bottom: 10px;
            list-style: none;
        }
        nav ul li a{
            text-decoration: none;
            font-size: 16px;
            font-family: sans-serif;
            font-weight: 500;
            color: #fff;
            height: 30px;
            display: flex;
            align-items: center;
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 15px;
            padding-bottom: 15px;
            transition: 0.5s;
        }
        nav ul li a:hover{
            background-color: #555555;
            text-decoration: none;
            color: white;
        }
        nav ul li ul {
            display: none;
            background-color: #40474a; /* Optional: Adjust submenu background */
            transition: all 0.5s ease;
        }
        i, svg{
            margin-right: 10px;
        }
        .admin{
            width: 100%;
            display: flex;
            height: 80px;
            border-bottom: 1px solid white;
        }
        .image_admin img{
            margin-left: 20px;
            margin-top: 10px;
            width: 70px;
            height: 60px;
            background-color: #fff;
            border-radius: 50%;
            cursor: pointer;
        }
        .title_admin h2{
            line-height: 80px;
            margin-left: 20px;
            color: #fff;
            margin-top: 0px;
        }
        .left{
            margin-left: 90px;
        }
        .rotate{
            transform: rotate(90deg);
            transition: transform 0.5s ease-in-out;
        }
        article{
            width: 80%;
            margin-left: 10px;
        }
        .list{
            width: 100%;
            background-color: #fff;
            height: 80px;
        }
        .list i{
            margin-left: 10px;
            line-height: 80px;
            font-size: 22px;
        }
    </style>
</head>
<body>
    <section class="layoutAdmin">
    <div class="menu">
        <div class="admin">
            <div class="image_admin">
                <a href="?act=homeAdmin"><img src="img/logo.png" alt=""></a>
            </div>
            <div class="title_admin">
                <h2>Admin</h2>
            </div>
        </div>
            <nav>
                <ul id="dropdown">
                    <li>
                        <a href="?act=homeAdmin"><i class="fa-solid fa-house"></i> Trang chủ</a>
                    </li>
                    <li><a href="" style="font-size: 17px"><i class="fa-solid fa-bars-progress"></i> Quản lý</a></li>
                    <li>
                        <a style="padding-left: 15px;" style="font-size: 16px;" href="#"><i class="fa-solid fa-list"></i>Quản lý Danh mục<i class="fa-solid fa-angle-left left"></i></a>
                        <ul style="width: 100%;">
                            <li><a style="padding-left: 35px;" href="?act=listDanhmuc"> Danh mục mẹ</a></li>
                            <li><a style="padding-left: 35px;" href="?act=listDanhmuccon"> Danh mục con</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" style="padding-left: 15px; font-size: 16px"><i class="fa-solid fa-headphones"></i> Quản lý Sản phẩm <i class="fa-solid fa-angle-left left"></i></a>
                        <ul style="width: 100%;transition: 0.5s ease-out;">
                            <li><a style="padding-left: 35px;" href="?act=listSanpham"><i class="fa-brands fa-apple"></i> Danh sách sản phẩm</a></li>
                            <li><a style="padding-left: 35px;" href="?act=listmausac"><i class="fa-solid fa-palette"></i> Danh sách màu sắc sản phẩm</a></li>
                            <li><a style="padding-left: 35px;" href="?act=listdungluong"><i class="fa-solid fa-database"></i> Danh sách dung lượng sản phẩm</a></li>
                            <li><a style="padding-left: 35px;" href="?act=listpriceProduct"><i class="fa-solid fa-money-bill"></i> Danh sách giá sản phẩm</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="" style="padding-left: 15px; font-size: 16px"><i class="fa-solid fa-users"></i>Quản lý tài khoản</a>
                    </li>
                    <li>
                        <a href="" style="padding-left: 15px; font-size: 16px"><i class="fa-solid fa-comment"></i>Quản lý bình luận</a>
                    </li>
                    <li>
                        <a href="" style="padding-left: 15px; font-size: 16px"><i class="fa-solid fa-chart-simple"></i> Thống kê</a>
                    </li>
                    <li>
                        <a href="" style="padding-left: 15px;  font-size: 16px"> <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                </svg > Quản lý đơn hàng</a>
                    </li>
                </ul>
                <script language="javascript">
                    var menu_c = document.querySelectorAll("#dropdown > li");
                    for (var i = 0; i < menu_c.length; i++) {
                        menu_c[i].addEventListener('click', function(event){
                            event.stopPropagation();
                            var submenu = this.querySelector("ul");
                            var arrowIcon = this.querySelector(".fa-angle-left")
                            if (submenu) {
                                if (submenu.style.display === "block"){
                                    submenu.style.display = "none"; //ẩn menu
                                    arrowIcon.classList.remove("rotate");
                                }
                                else{
                                    var allSubmenu = document.querySelectorAll("#dropdown > li > ul");
                                    var allArows =  document.querySelectorAll("#dropdown .fa-angle-left");
                                    for (var j = 0; j < allSubmenu.length; j++) {
                                        allSubmenu[j].style.display = "none";
                                        allArows[j].classList.remove("rotate");
                                    }
                                    submenu.style.display = "block";
                                    arrowIcon.classList.add("rotate");
                                }
                            }
                        });
                        document.addEventListener('click', function(){
                            var allSubmenu = document.querySelectorAll("#dropdown > li > ul");
                            var allArows =  document.querySelectorAll("#dropdown .fa-angle-left");
                            for (var j = 0; j <  allSubmenu.length; j++) {
                                allSubmenu[j].style.display = "none";
                                allArows[j].classList.remove("rotate");
                            }
                        });
                    }
                </script>

            </nav>
        </div>
    </div>
        <article>
            <div class="list">
                <i class="fa-solid fa-list"></i>
            </div>
            <h1>Chào mừng đến với trang quản lí Admin <i class="fa-solid fa-user-tie"></i></h1>
        </article>
    </section>
</body>
</html>