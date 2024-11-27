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
            margin: 0px;
            padding: 0px;
        }
        .Sanpham{
            width: 1500px;
            margin: 0px auto;
            display: flex;
            background-color: #eef3f7;
        }
        .thongtin{
            text-align: justify;
            width: 250px;
            font-size: 12px;
        }
        table{
            margin-top: 20px;
        }
        table th{
            text-align: center;
        }
        table td{
            text-align: center;
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
    </style>
</head>
<body>
    <section class="Sanpham">
        <?php require_once "../Admin/header.php"; ?>
        <section class="contenDanhmuc">
          
                <div class="list">
                    <i class="fa-solid fa-list"></i>
                </div>
                <h1>Danh sách Tài Khoản</h1>
                
                <table class="table table-striped">
                    <tr>
                        <th>Mã Tài Khoản</th>
                        <th>Tên Tài Khoản</th>
                        <th>Password</th>
                        <th>Avatar</th>
                        <th>Số Điện Thoại</th>
                        <th>Email</th>
                        <th>Địa Chỉ</th>
                        <th>Hành Động</th>
                    </tr>
                    <?php 
                   
                        foreach($Listtaikhoan as $taikhoan){ 
                           
                    ?>
                    <tr>
                        <td><?= $taikhoan['id_taikhoan'] ?></td>
                        <td><?= $taikhoan['username'] ?></td>
                        <td><?= $taikhoan['password'] ?></td>
                        <td><img src="<?= $taikhoan['Avartar'] ?>" width="100px" height="100px" alt=""></td>
                        <td><?= $taikhoan['Sdt'] ?></td>
                        <td><?= $taikhoan['Diachi_lienhe'] ?></td>
                        <td><?= $taikhoan['Email'] ?></td>
                        <td>
                            <a href="?act=eyeSanpham&id=<?= $taikhoan['id_taikhoan'] ?>"><i class="fa-solid fa-eye"></i></a>
                            <a onclick = "return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không ?')" href="?act=deleteTk&id=<?= $taikhoan['id_taikhoan'] ?>"><i class="fa-solid fa-trash" style="color: red;"></i> </a> 
                            <a href="?act=updateSanpham&id=<?= $taikhoan['id_taikhoan'] ?>"><i class="fa-solid fa-pen-to-square"></i> </a>
                        </td>
                    </tr> 
                    <?php 
                    } 
                    ?>
                </table>
       
        </section>
    </section>
</body>
</html>