<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
        table th{
            text-align: center;
        }
        table td{
            text-align: center;
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
                <h1>Danh sách danh mục</h1>
                <a style="margin-top: 20px; margin-left: 680px;" href="?act=createDanhmuc"><button type="button" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Thêm mới</button></a>
            </div>
            <article>
                <table class="table table-striped">
                    <tr>
                        <th>Mã Danh Mục</th>
                        <th>Tên Danh Mục</th>
                        <th>Ảnh Danh Mục</th>
                        <th>Hành Động</th>
                    </tr>
                    <?php 
                        foreach($listDanhmuc as $Danhmuc){
                    ?>
                    <tr>
                        <td><?= $Danhmuc['ma_danhmuc'] ?></td>
                        <td><?= $Danhmuc['ten_danhmuc'] ?></td>
                        <td><img src="<?= $Danhmuc['anh_danhmuc'] ?>" alt="" width="50" height="50"></td>
                        <td>
                            <a class="a1" href="?act=deleteDanhmuc&id=<?= $Danhmuc['ma_danhmuc'] ?>"><i class="fa-solid fa-trash" style="color: red;"></i></a> 
                            <a href="?act=updateDanhmuc&id=<?= $Danhmuc['ma_danhmuc'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                    </tr> 
                    <?php 
                    } 
                    ?>
                </table> 
            </article>
        </section>
    </section>
</body>
</html>