<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body{
            margin: 0px;
            padding: 0px;
        }
        .layout{
            width: 1500px;
            margin: 0px auto;
            background-color: #F2F4F7;
        }
        .Product_news{
            width: 100%;
            height: 500px;
            margin-top: 0px;
            overflow: hidden;
        }
        .Product_news h1{
            font-family: 'Inter';
            font-weight: 600;
            border-bottom: 5px solid #6633FA; 
            width: 200px;
            margin-top: 10px;
        }
        .product_one{
            min-width: 250px;
            height: 370px;
            position: relative;
            background-color: #fff;
            margin: 0px 15px;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.5s;
            animation: zoomEffect 1s ease-in-out;
        }
        @keyframes zoomEffect {
            from {
                transform: scale(1.1);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }
        .product_one:hover .img_product img{
            transform: scale(1.05);
        }
        .product_two{
            min-width: 250px;
            height: 370px;
            position: relative;
            background-color: #fff;
            margin: 0px 15px;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.5s;
            animation: zoomEffect 1s ease-in-out;
        }
        .product_two:hover .img_product img{
            transform: scale(1.05);
        }
        .img_product{
            overflow: hidden;
            margin-top: 5px;
            text-align: center;
        }
        .img_product img{
            transition: 0.5s;
            width: 200px;
            height: 190px;
            margin-top: 40px;
        }
        .title_product h3{
            font-weight: 600;
            font-family: 'Inter';
            font-size: 17px;
            margin-left: 20px;
            margin-bottom: 3px;
        }
        .Price p{
            color: red;
            font-family: 'Inter';
            font-size: 16px;
            font-weight: 400;
            margin-top: 0px;
            margin-left: 20px;
            margin-bottom: 10px;
        }
        .tragop button{
            width: 100px;
            height: 30px;
            border-radius: 10px;
            border: 1px solid #6633FA;
            font-family: 'Inter';
            font-size: 14px;
            font-weight: 600;
            color: #6633FA;
            position: absolute;
            top: 0px;
            right: 0px;
            background-color: #fff;
        }
        .box-product{
            width: 94%;
            margin: 0px auto;
            display: flex;
            overflow: hidden;
        }
        .box-product .left{
            position: absolute;
            top: 170px;
            left: 5px;
            font-size: 22px;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background-color: #fff;
            text-align: center;
            line-height: 48px;
            color: #B3B3B3;
        }
        .box-product .right{
            position: absolute;
            top: 170px;
            right: 0px;
            width: 48px;
            height: 48px;
            font-size: 22px;
            border-radius: 50%;
            background-color: #fff;
            text-align: center;
            line-height: 48px;
            color: #B3B3B3;
        }
        .Xemchitiet{
            margin-left: 20px;
            margin-top: 0px;
        }
        .Xemchitiet a{
            text-decoration: none;
            color: #0500FF;
            font-family: 'Inter';
            font-size: 15px;
            font-weight: 500;
        }
        .box-lon{
            width: 100%;
            position: relative;
        }
        .box-lon i{
            position: absolute;
            cursor: pointer;
        }
        .box-lon .left{
            top: 170px;
            left: 20px;
            font-size: 26px;
            color: #B3B3B3;
        }
        .box-lon .right{
            top: 170px;
            right: 20px;
            font-size: 26px;
            color: #B3B3B3;
        }
        .button1{
            width: 40px;
            height: 40px;
            border-radius: 50% 50%;
            margin-left: 40px;
            font-size: 34px;
            border: 0px;
            color: #CCCCCC;
            transition: 0.5s;
            background: 0;
            text-align: center;
            background-color: #D1EEEE;
        }
        .button2{   
            text-align: center;
            width: 40px;
            height: 40px;   
            border-radius: 50% 50%;     
            transition: 0.5s;
            color: #CCCCCC;
            font-size: 34px;
            background-color: #D1EEEE;
            border: 0px;
            margin-left: 1360px;
            cursor: pointer;
        }
        .button1:hover{
            cursor: pointer;
            color: white;
        }
        .button2:hover{
            cursor: pointer;
            color: white;
        } 
        .Product3 h1{
            font-family: 'Inter';
            font-weight: 600;
            border-bottom: 5px solid #6633FA; 
            width: 250px;
            margin-top: 10px;
        }
        .box-dienthoai{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
            width: 100%;
            grid-gap: 20px;
        }
        .Product4 h1{
            font-family: 'Inter';
            font-weight: 600;
            border-bottom: 5px solid #6633FA; 
            width: 250px;
            margin-top: 30px;
        }
        .banner3{
            margin-top: 50px;
            width: 1500px;
            height: 400px;
        }
        .doisong{
            width: 1500px;
            height: 800px;
            margin-top: 20px;
            border-radius: 10px;
        }
        .doisong h1{
            font-family: 'Inter';
            font-weight: 600;
            border-bottom: 5px solid #6633FA; 
            width: 250px;
            padding-top: 30px;
        }
        .banner4 img{
            width: 100%;
        }
        .backbanner6{
            width: 100%;
            height: 400px;
            margin-top: 20px;
            background-color: #fff;
            border-radius: 15px;
        }
        .backbanner6 h1{
            font-family: 'Inter';
            font-weight: 600;
            border-bottom: 5px solid #6633FA; 
            width: 250px;
            padding-top: 20px;
        }
       .sp1{
            width: 340px;
            height: 280px;
            border-radius: 15px;
            border: 1px solid #B3B3B3;
            margin-left: 20px;
            float: left;
            margin-left: 25px;
            cursor: pointer;
            text-align: center;
        }
        .sp1> img{
            width: 96%;
            height: 190px;
            border-radius: 15px;
            margin-top: 3px;
            margin-left: 3px;
        }
        .sp1 h3{
            width: 97%;
            margin-left: 10px;     
        }
    </style>
</head>
<body>
    <section class="layout">
        <?php include("./Views/client/header.php"); ?>
        <?php include("./Views/client/slideshows/slideShows.php"); ?>
        <div class="Product_news">
            <h1>Sản phẩm mới</h1>
            <div id="product_items" class="box-lon">
                <i id="next2" class="fa-solid fa-chevron-left left"></i>
                <i id="next" class="fa-solid fa-chevron-right right"></i>
                <div id="box-product" class="box-product">
                    <?php 
                        $productList = $this->detailModel->listClient();
                        foreach($productList as $product){
                            // lấy tên sản phẩm
                            $id_sp = $product['id_sanpham'];
                            $ten_sp = $this->SanphamModel->getByNameProducts($id_sp);
                            // lấy dung lượng
                            $id_dungluong = $product['id_dungluong_sp'];
                            $ten_dungluong = $this->dungluongModel->getByNameDungluong($id_dungluong);
                            // lấy giá sản phẩm
                            $id_price = $product['id_price'];
                            $value_price = $this->priceModel->getByNamePrice($id_price);
                    ?>
                    <div class="product_one">
                        <div class="img_product">
                            <img src="<?= $product['image_url'] ?>" alt="">
                        </div>
                        <div class="title_product">
                            <h3><?= $ten_sp['ten_sp'] ?> <?= $ten_dungluong['ten_dungluong'] ?></h3>
                        </div>
                        <div class="Price">
                            <p><?= $value_price['price'] ?> đ</p> 
                        </div>
                        <div class="Xemchitiet">
                            <a href="?act=ChitietProduct&id=<?= $product['id_sp_chitiet'] ?>">Xem chi tiết</a>
                        </div>
                        <div class="tragop">
                            <button>Trả góp 0%</button>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <img style="margin-top: 30px; margin-left: 5px;" src="./img/banner2.jpg" width="1490" height="500">
        <div class="Product3">
            <h1 style="margin-left: 10px;">Điện thoại nổi bật</h1>
            <div id="product_items" class="box-dienthoai">    
                <div id="" class="box-dienthoai">
                    <?php 
                        $id_danhmuc = 7;
                        $listDienthoai = $this->clientModel->listDienthoai($id_danhmuc); 
                        foreach($listDienthoai as $dienthoai){
                            $id_sp = $dienthoai['ma_sp'];
                            $listDienthoaiDetail = $this->clientModel->ListDienthoaiDetail($id_sp);
                        }
                        foreach($listDienthoaiDetail as $dienthoai){
                        // lấy tên sản phẩm
                        $id_sp = $dienthoai['id_sanpham'];
                        $ten_sp = $this->SanphamModel->getByNameProducts($id_sp);
                        // lấy dung lượng
                        $id_dungluong = $dienthoai['id_dungluong_sp'];
                        $ten_dungluong = $this->dungluongModel->getByNameDungluong($id_dungluong);
                        // lấy giá sản phẩm
                        $id_price = $dienthoai['id_price'];
                        $value_price = $this->priceModel->getByNamePrice($id_price);
                    ?>
                    <div class="product_two">
                        <div class="img_product">
                            <img src="<?= $dienthoai['image_url'] ?>" alt="">
                        </div>
                        <div class="title_product">
                            <h3><?= $ten_sp['ten_sp'] ?> <?= $ten_dungluong['ten_dungluong'] ?></h3>
                        </div>
                        <div class="Price">
                            <p><?= $value_price['price'] ?> đ</p> 
                        </div>
                        <div class="Xemchitiet">
                            <a href="">Xem chi tiết</a>
                        </div>
                        <div class="tragop">
                            <button>Trả góp 0%</button>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <img class="banner3" src="./img/banner3.png" alt="" width="1490" height="500">
        <div class="Product4">
            <h1 style="margin-left: 10px;">Laptop nổi bật</h1>
            <div id="product_items" class="box-dienthoai">    
                <div id="" class="box-dienthoai">
                    <?php 
                        $id_danhmuc = 8;
                        $listLaptop = $this->clientModel->listLaptop($id_danhmuc); 
                        foreach($listLaptop as $laptop){
                            $id_sp = $laptop['ma_sp'];
                            $listLaptopDetail = $this->clientModel->ListLaptopDetail($id_sp);
                        }    
                        foreach($listLaptopDetail as $laptop){
                        // lấy tên sản phẩm
                        $id_sp = $laptop['id_sanpham'];
                        $ten_sp = $this->SanphamModel->getByNameProducts($id_sp);
                        // lấy dung lượng
                        $id_dungluong = $laptop['id_dungluong_sp'];
                        $ten_dungluong = $this->dungluongModel->getByNameDungluong($id_dungluong);
                        // lấy giá sản phẩm
                        $id_price = $laptop['id_price'];
                        $value_price = $this->priceModel->getByNamePrice($id_price);
                    ?>
                    <div class="product_two">
                        <div class="img_product">
                            <img src="<?= $laptop['image_url'] ?>" alt="">
                        </div>
                        <div class="title_product">
                            <h3><?= $ten_sp['ten_sp'] ?> <?= $ten_dungluong['ten_dungluong'] ?></h3>
                        </div>
                        <div class="Price">
                            <p><?= $value_price['price'] ?> đ</p> 
                        </div>
                        <div class="Xemchitiet">
                            <a href="">Xem chi tiết</a>
                        </div>
                        <div class="tragop">
                            <button>Trả góp 0%</button>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="doisong">
            <h1 style="margin-left: 10px; margin-top: 30px;">ĐỜI SỐNG HIỆN ĐẠI</h1>
            <div class="banner4">
                <img src="./img/33.jpg" alt="">
                <img src="./img/44.png" alt="">
            </div>
        </div>
        <div class="backbanner6">
            <h1 style="margin-left: 10px;">TIN CÔNG NGHỆ</h1>
            <div class="sp1">
                <img src="./img/sp1.jpg" alt="">
                <h3>Oppo Find X8 - đối thủ của iPhone 16 với giá 23 triệu đồng</h3>
            </div>
            <div class="sp1">
                <img src="./img/sp2.jpg" alt="">
                <h3>Trải nghiệm cá nhân trong không gian đa thiết bị của Samsung
                </h3>
            </div>
            <div class="sp1">
                <img src="./img/sp3.jpg" alt="">
                <h3>Oppo mang dòng Find X trở lại Việt Nam sau hai năm</h3>
            </div>
            <div class="sp1">
                <img src="./img/sp4.jpg" alt="">
                <h3>5 thương hiệu dẫn đầu bình chọn Sơ loại Tech Awards 2024</h3>
            </div>
        </div>
    </section>
    <?php include("./Views/client/footer.php"); ?>
    <script src="./Views/client/slideshows/homeClient.js"></script>
</body>
</html>