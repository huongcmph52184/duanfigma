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
                <h1>Danh sách dung lượng sản phẩm</h1>
                <a style="margin-top: 20px; margin-left: 450px;" href="?act=createDungluong"><button type="button" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Thêm mới</button></a>
            </div>
            <article>
                <form action="?act=listdungluong" method="POST">
                    <input type="text" name="keyword" placeholder="Bạn cần tìm gì ..." class="keyword" style="width: 300px; border-radius: 10px; height: 35px;">
                    <select name="ma_sp" style="width: 250px; height: 35px;border-radius: 10px;">
                        <option value="0" selected>Sản phẩm</option>
                        <?php 
                            foreach($listSP as $Sanpham){
                        ?>
                        <option value="<?= $Sanpham['ma_sp'] ?>"><?= $Sanpham['ten_sp'] ?></option>
                        <?php 
                            }
                        ?>
                    </select>
                    <input type="submit" name="go" value="Go" style="width: 60px; font-family: sans-serif; border-radius: 10px; height: 35px;">
                </form>
                <table class="table table-striped" style="margin-top: 30px">
                    <tr>
                        <th>Mã dung lượng</th>
                        <th>Tên dung lượng </th>
                        <th>ID Sản phẩm</th>
                        <th>Hành Động</th>
                    </tr>
                    <?php 
                        foreach($listDungluong as $dungluong){
                    ?>
                    <tr>
                        <td><?= $dungluong['id_dungluong'] ?></td>
                        <td><?= $dungluong['ten_dungluong'] ?></td>
                        <td><?= $dungluong['ma_sanpham'] ?></td>
                        <td>
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="a1" href="?act=deleteDungluong&id=<?= $dungluong['id_dungluong'] ?>"><i class="fa-solid fa-trash" style="color: red;"></i></a> 
                            <a href="?act=updateDungluong&id=<?= $dungluong['id_dungluong'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
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