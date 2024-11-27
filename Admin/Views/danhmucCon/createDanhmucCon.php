<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
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
            <div class="list-title" style="display: flex">
                <h1>Thêm mới danh mục con</h1>
                <a href="?act=listDanhmuccon" style="margin-left: 600px; margin-top: 10px"><button type="button" class="btn btn-success"><i class="fa-solid fa-list"></i>Danh sách</button></a> 
            </div>
            <?php
                if(isset($_SESSION['create'])){
                    echo "<div class='alert alert-success'>" . $_SESSION['create'] ."</div>";
                    unset($_SESSION['create']);
                }
            ?>
            <form action="?act=postcreateDanhmuccon" method="POST" enctype="multipart/form-data">
                <label for="exampleInputPassword1" class="form-label"  style="margin-left: 5px; display: flex;">Danh mục mẹ <p style="color: red; margin-left: 5px;">(*)</p></label>
                <select name="ma_danhmuc_me" id="" class="form-select" aria-label="Default select example">
                    <option value="0" selected>Danh mục</option>
                    <?php
                        foreach($listDanhmuc as $Danhmuc){
                    ?>
                    <option value="<?= $Danhmuc['ma_danhmuc'] ?>"><?= $Danhmuc['ten_danhmuc'] ?></option>
                    <?php
                       }
                    ?>
                </select> <br>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nhập tên danh mục con</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tenDanhmucCon">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Chọn ảnh danh mục Con</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="anhDanhmucCon">
                </div>
                <section class="button" style="margin-top: 20px; display: flex;">
                    <input type="submit" value="Thêm mới" name="Themmoi" style="width: 100px; height: 40px; border-radius: 5px; border: 0; background-color: #0dcaf0;">
                    <button type="reset" style="margin-left: 10px;" class="btn btn-secondary">Nhập lại</button>
                </section>
            </form>
        </section>
    </section>
</body>
</html>