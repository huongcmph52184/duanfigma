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
        .icon{
            margin-left: 0px;
            background-color: #F2F4F7;
        }
        .box_product{
            width: 94%;
            margin: 0px auto;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr; 
        }
        .product_one{
            width: 250px;
            height: 370px;
            position: relative;
            background-color: #fff;
            margin: 0px 15px;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.5s;
            margin: 20px 0px;
        }
        .product_one:hover .img_product img{
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
        .icon_title{
            width: 100%;
            height: 100px;
            display: flex;
        }
        .icon_title i{
            margin-top: 30px;
            font-size: 34px;
            margin-left: 20px;
            color: #6633FA;
        }
        .icon_title h1{
            line-height: 30px;
            margin-left: 20px;
            font-size: 40px;
            font-family: 'Inter';
            font-weight: 600;
        }
    </style>
</head>
<body>
    <section class="layout">
        <?php include("./Views/client/header.php"); ?>
        <div class="icon_title">
            <i class="fa-solid fa-house"></i>
            <h1><?= $ten_danhmuc_con['ten_danhmuc_con'] ?></h1>
        </div>
        <div class="box_product">
            <?php
                foreach($listProductDetail as $productDetail){
                    $id_sp = $productDetail['id_sanpham'];
                    $ten_sp = $this->SanphamModel->getByNameProducts($id_sp);
                    // lấy dung lượng
                    $id_dungluong = $productDetail['id_dungluong_sp'];
                    $ten_dungluong = $this->dungluongModel->getByNameDungluong($id_dungluong);
                    // lấy giá sản phẩm
                    $id_price = $productDetail['id_price'];
                    $value_price = $this->priceModel->getByNamePrice($id_price);
            ?>
                <div class="product_one">
                    <div class="img_product">
                        <img src="<?= $productDetail['image_url'] ?>" alt="">
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
    </section>
</body>
</html>