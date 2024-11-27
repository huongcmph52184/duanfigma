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
            margin: 0px;
            padding: 0px;
        }
        .Danhmuc{
            width: 1500px;
            margin: 0px auto;
            display: flex;
            background-color: #eef3f7;
        }
        .button{
            margin-top: 30px;
        }
        .conten{
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
    <section class="Danhmuc">
        <?php require_once "../Admin/header.php"; ?>
        <section class="conten">
            <div class="list">
                <i class="fa-solid fa-list"></i>
            </div>
            <div class="button" style="display: flex; margin-bottom: 30px;">
                <h1>Cập nhập danh mục</h1>
                <a style="margin-top: 20px; margin-left: 690px;" href="?act=listDanhmuc"><button type="button" class="btn btn-success"><i class="fa-solid fa-list"></i> Danh sách</button></a> 
            </div>
            <?php
                if(isset($_SESSION['update'])){
                    echo "<div class='alert alert-success'>" . $_SESSION['update'] ."</div>";
                    unset($_SESSION['update']);
                }
            ?>
            <form action="?act=postupdateDanhmuc&id=<?= $Danhmuc['ma_danhmuc'] ?>" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nhập tên danh mục</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tenDanhmuc" value="<?= isset($Danhmuc['ten_danhmuc']) ? $Danhmuc['ten_danhmuc'] : '' ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Chọn ảnh danh mục</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="anhDanhmuc">
                    <img src="<?= $Danhmuc['anh_danhmuc'] ?>" alt="" width="90" height="90">
                </div>
                <section class="button" style="margin-top: 20px; display: flex;">
                    <input type="submit" value="Sửa đổi" name="update"  style="width: 100px; height: 40px; border-radius: 5px; border: 0; background-color: #0dcaf0; color: #000;">
                    <button type="reset" style="margin-left: 10px;" class="btn btn-danger">Nhập lại</button>
                </section>
            </form>
        </section>
    </section>
</body>
</html>