<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body{
            padding: 0;
            margin: 0;
        }
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
        table th{
            text-align: center;
            height: 30px;
        }
        table td{
            text-align: center;
            height: 50px;
            line-height: 50px;
        }
        .pagination{
            width: 100%;
            justify-content: center;
            align-items: center;
            list-style: none;
        }
        .page-item{
            margin: 0 8px;
        }
        .page-link{
            border-radius: 5px;
            min-width: 40px;
            height: 30px;
            line-height: 15px;
            text-align: center;
        }
        .button__pagination{
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <section class="layout">
        <?php require_once "../Admin/header.php"; ?>
        <section class="contenDanhmuc" style="width: 80%; margin-left: 10px;">
            <div class="list">
                <i class="fa-solid fa-list"></i>
            </div>
            <form action="?act=listDanhmuccon" method="POST">
                <input type="text" name="keyword" placeholder="Bạn cần tìm gì..." style="width: 300px; border-radius: 10px; height: 35px; border: 0.5 solid gray; padding-left: 10px;">
                <select name="ma_danhmuc_me" id="" style="width: 200px; height: 35px; border-radius: 10px;">
                    <option value="0" selected>Danh mục mẹ</option>
                    <?php
                        foreach($listDanhmuc as $Danhmuc){
                    ?>
                    <option value="<?= $Danhmuc['ma_danhmuc'] ?>"><?= $Danhmuc['ten_danhmuc'] ?></option>
                    <?php
                        }
                    ?>
                </select>
                <input type="submit" name="go" value="Tìm kiếm" style="width: 100px; border-radius: 10px; height: 35px; border: 0.5 solid gray; background-color: #fff;">
                <a href="?act=createDanhmuccon" style="margin-left: 420px;"><button type="button" class="btn btn-primary"><i class="fa-solid fa-plus"></i>Thêm mới</button></a> 
            </form>
            <article>
                <?php
                    
                                    
                    
                    // Hiển thị dữ liệu
                ?>  
                    <table class="table table-striped">
                    <tr>
                        <th>Mã Danh Mục Con</th>
                        <th>Tên Danh Mục Con</th>
                        <th>Ảnh Danh Mục Con</th>
                        <th>Mã Danh Mục Mẹ</th>
                        <th>Thao tác</th>
                    </tr>
                    <?php
                        foreach ($listDanhmuccon as $DanhmucCon){
                    ?>
                    <tr>
                        <td><?= $DanhmucCon['id_danhmuc_con'] ?></td>
                        <td><?= $DanhmucCon['ten_danhmuc_con'] ?></td>
                        <td><img src="<?= $DanhmucCon['anh_danhmuc_con'] ?>" alt="" width="50" height="50"></td>
                        <td><?= $DanhmucCon['ma_danhmuc_me'] ?></td>
                        <td>
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này')" href="?act=deleteDanhmuccon&id=<?= $DanhmucCon['id_danhmuc_con'] ?>"><i class="fa-solid fa-trash" style="color: red;"></i></a></button> 
                            <a href="?act=updateDanhmuccon&id=<?= $DanhmucCon['id_danhmuc_con'] ?>"><i class="fa-solid fa-pen-to-square"></i></a></button>
                        </td>
                    </tr> 
                    <?php
                        }
                    ?>
                    </table>
            </article>
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?= $i === $page ? 'active' : '' ?>">
                            <a class="page-link" href="?act=listDanhmuccon&page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        </section>
    </section>
</body>
</html>