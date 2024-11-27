<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        .Danhmuc{
            width: 1500px;
            margin: 0px auto;
            display: flex;
            background-color: #eef3f7;
        }
        .contenDanhmuc{
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
        a i{
            transition: 0.5s;
        }
        .a1 i:hover{
            color: #EE7C6B;
        }
    </style>
</head>
<body>
    <section class="Danhmuc">
        <?php require_once "../Admin/header.php"; ?>
        <section class="contenDanhmuc">
            <div class="list">
                <i class="fa-solid fa-list"></i>
            </div>
            <div class="button" style="display: flex; margin-bottom: 30px;">
                <h1>Cập nhập màu sắc sản phẩm</h1>
                <a style="margin-top: 20px; margin-left: 530px;" href="?act=listmausac"><button type="button" class="btn btn-success"><i class="fa-solid fa-list"></i> Danh sách</button></a>
            </div>
            <article>
                <?php
                    if(isset($_SESSION['update'])){
                        echo "<div class='alert alert-success'>" . $_SESSION['update'] ."</div>";
                        unset($_SESSION['update']);
                    }
                ?>
                <form action="?act=postupdateMausanpham&id=<?= $mausac['id_mau'] ?>" method="POST" enctype="multipart/form-data">
                    <label for="" class="form-label"  style="margin-left: 5px; display: flex; margin-bottom: 0px">Sản phẩm <p style="color: red; margin-left: 5px;">(*)</p></label> 
                    <select name="ma_sanpham" class="form-select" aria-label="Default select example">
                        <option value="0" selected>Chọn sản phẩm</option>
                        <?php foreach($listSP as $sanpham) { ?>
                            <option value="<?= $sanpham['ma_sp'] ?>"><?= $sanpham['ten_sp'] ?></option>
                        <?php } ?>
                    </select>
                <div class="mb-3" style="margin-top: 20px">
                    <label for="exampleInputEmail1" class="form-label" style="margin-left: 5px; display: flex; margin-bottom: 0px">Nhập tên màu <p style="color: red; margin-left: 5px;">(*)</p></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tenmau" value="<?= isset($mausac['ten_mau']) ? $mausac['ten_mau'] : '' ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label" style="margin-left: 5px; display: flex; margin-bottom: 0px">Chọn ảnh màu <p style="color: red; margin-left: 5px;">(*)</p></label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="anhmau">
                    <img src="<?= $mausac['anh_mau'] ?>" alt="" width="60" height="60">
                </div>
                <section class="button" style="margin-top: 20px; display: flex;">
                    <input type="submit" value="Cập nhập" name="Themmoi" style="width: 100px; height: 40px; border-radius: 5px; border: 0; background-color: #0dcaf0;">
                    <button type="reset" style="margin-left: 10px;" class="btn btn-secondary">Nhập lại</button>
                </section>
            </form>
            </article>
        </section>
    </section>
</body>
</html>