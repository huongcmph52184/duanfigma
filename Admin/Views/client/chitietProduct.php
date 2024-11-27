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
        .box_product{
            width: 100%;
        }
        .product{
            width: 100%;
            display: flex;
        }
        .title-product h1{
            font-family: 'Inter';
            font-weight: 600;
            font-size: 26px;
            padding-left: 40px;
        }
        .product-image img{
            width: 480px;
            height: 450px;
            padding-left: 40px;
        }
        .conten_product{
            padding-top: 60px;
            padding-left: 100px;
        }
        .price-product p{
            color: red;
            font-family: 'Inter';
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 30px;
        }
        .mau{
            display: flex;
        }
        .mau_button h1{
            font-family: 'Inter';
            font-weight: 600;
            font-size: 24px;
        }
        .mau_button button{
            margin: 0px 30px;
            border-radius: 10px;
            min-width: 180px;
            justify-content: center;
            align-items: center;
            display: flex;
            text-align: center;
            border: 0;
            height: 50px;
            background-color: #fff;
            cursor: pointer;
            transition: border 0.5s ease,
        }
        .mau_button button:hover{
            border: 1px solid #6633FA;
        }
        .dungluong_button{
            margin-top: 30px;
        }
        .dungluong_button h1{
            font-family: 'Inter';
            font-weight: 600;
            font-size: 24px;
        }
        .dungluong_button button{
            margin: 0px 30px;
            border-radius: 10px;
            min-width: 100px;
            height: 50px;
            border: 0;
            background-color: #fff;
            cursor: pointer;
            transition: border 0.5s ease,
        }
        .dungluong_button button:hover{
            border: 1px solid #6633FA;
        }
        button img{
            width: 40px;
        }
        .title_decision{
            width: 1020px;
            margin-top: 50px;
            padding-left: 20px;
        }
        .title_decision h1{
            text-align: center;
            height: 50px;
            background-color: #EBEBEB;
            line-height: 50px;
            border-radius: 10px 10px 0px 0px;
            font-size: 22px;
        }
        .product_decision{
            width: 1020px;
            clear: both;
            text-align: center;
        }
        .product_decision p{
            width: 100%;
            text-align: center;
        }
        .dathang{
            margin-top: 50px;
        }
        .dathang i{
            width: 55px;
            height: 44px;
            border: 1px solid #FF0101;
            border-radius: 10px;
            line-height: 44px;
            text-align: center;
            font-size: 24px;
            color: #FF0101;
            cursor: pointer;
        }
        .dathang button{
            width: 320px;
            height: 45px;
            border-radius: 10px;
            line-height: 45px;
            font-size: 18px;
            font-family: 'Inter';
            font-weight: 600;
            background-color: #F87676;
            color: white;
            border: 0; 
            margin-left: 50px;
            cursor: pointer;
            transition: 0.5s;
        }
        .dathang button:hover{
            background-color: #F87676;
        }
    </style>
</head>
<body>
    <section class="layout">
        <?php include("./Views/client/header.php"); ?>
        <div class="box_product">
            <?php
                foreach ($sanphamChitiet as $sanpham){
                    // lấy toàn bộ màu và dung lượng
                    $mauSP = $this->clientModel->mauSP($id_sp);
                    $dungluongSP = $this->clientModel->dungluongSP($id_sp);
                    // lấy tên sản phẩm
                    $id_sp = $sanpham['id_sanpham'];
                    $ten_sp = $this->SanphamModel->getByNameProducts($id_sp);
                    // lấy dung lượng
                    $id_dungluong = $sanpham['id_dungluong_sp'];
                    $ten_dungluong = $this->dungluongModel->getByNameDungluong($id_dungluong);
                    // lấy giá sản phẩm
                    $id_price = $sanpham['id_price'];
                    $value_price = $this->priceModel->getByNamePrice($id_price);
            ?>
            <div class="product">
                <div class="header_product">
                    <div class="title-product">
                        <h1><?= $ten_sp['ten_sp'] ?> <?= $ten_dungluong['ten_dungluong'] ?></h1>
                    </div>
                    <div class="product-image">
                        <img src="<?= $sanpham['image_url'] ?>" alt="">
                    </div>
                </div>
                <div class="conten_product">
                    <div class="price-product">
                        <p><?= $value_price['price'] ?></p>
                    </div>
                    <div class="mau_button">
                        <h1>Lựa chọn màu</h1>
                        <div class="mau">
                            <?php
                                foreach($mauSP as $mau){
                            ?>
                            <button 
                                type="submit" 
                                name="mau" 
                                value="<?= $mau['ten_mau'] ?>">
                                <img src="<?= $mau['anh_mau'] ?>" alt="" width="40" height="40"> <p><?= $mau['ten_mau'] ?></p> 
                            </button>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <div class="dungluong_button">
                        <h1>Lựa chọn phiên bản</h1>
                        <?php
                            foreach($dungluongSP as $dungluong){
                        ?>
                        <button 
                            type="submit" 
                            name="dungluong" 
                            value="<?= $dungluong['ten_dungluong'] ?>">
                            <?= $dungluong['ten_dungluong'] ?>
                        </button>
                        <?php
                            }
                        ?>
                    </div>
                    <input type="hidden" name="id_sanpham_chitiet" value="<?= $id_sp_ct ?>">
                    <div class="dathang">
                        <i class="fa-solid fa-cart-plus"></i>
                        <button>Mua ngay</button>
                    </div>
                </div>
            </div>
            <div class="title_decision">
                <h1><i class="fa-solid fa-file"></i> Thông tin sản phẩm</h1>
                <div class="product_decision">
                    <p>
                        <?= $ten_sp['mota_sanpham'] ?>
                    </p>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </section>
</body>
</html>