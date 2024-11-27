<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .layout{
            width: 1500px;
            margin: 0px auto;
            display: flex;
            background-color: #eef3f7;
        }
        form{
            margin-top: 30px;
            margin-bottom: 30px;
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
<section class="layout">
        <?php require_once "../Admin/header.php"; ?>
        <section class="conten" style="width: 80%; margin-left: 10px;">
            <div class="list">
                <i class="fa-solid fa-list"></i>
            </div>
            <h1>Cập nhập danh mục con</h1>
            <?php
                if(isset($_SESSION['update'])){
                    echo "<div class='alert alert-success'>" . $_SESSION['update'] ."</div>";
                    unset($_SESSION['update']);
                }
            ?>
            <form action="?act=postupdateDanhmuccon&id=<?= $danhmucCon['id_danhmuc_con'] ?>" method="POST" enctype="multipart/form-data">
                <label for="exampleInputPassword1" class="form-label">Danh mục mẹ</label>
                <select name="ma_danhmuc_me" id="" style="border-radius: 10px; height: 35px; width: 200px;">
                    <option value="0" selected>Tất cả</option>
                    <?php
                        foreach($listDanhmuc as $Danhmuc){
                    ?>
                    <option value="<?= $Danhmuc['ma_danhmuc'] ?>"><?= $Danhmuc['ten_danhmuc'] ?></option>
                    <?php
                       }
                    ?>
                </select>
                <a href="?act=listDanhmuccon"  style="margin-left: 740px"><button type="button" class="btn btn-success"><i class="fa-solid fa-list"></i>Danh sách</button></a> 
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nhập tên danh mục con</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="danhmucCon" value="<?= isset($danhmucCon['ten_danhmuc_con']) ? $danhmucCon['ten_danhmuc_con'] : '' ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Chọn ảnh danh mục Con</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="anhDanhmucCon">
                    <img src="<?= $danhmucCon['anh_danhmuc_con'] ?>" alt="" width="100" height="100">
                </div>
                <section class="button" style="margin-top: 20px; display: flex;">
                    <input type="submit" value="Cập nhập" name="update" style="width: 100px; height: 40px; border-radius: 5px; border: 0; background-color: #0dcaf0;">
                    <button style="margin-left: 10px;" type="reset" class="btn btn-secondary">Nhập lại</button>
                </section>
            </form>
        </section>
    </section>
</body>
</html>