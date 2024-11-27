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
                <h1>Danh sách biến thể sản phẩm</h1>
                <a style="margin-top: 20px; margin-left: 520px;" href="?act=createDetail"><button type="button" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Thêm mới</button></a>
            </div>
            <article>
                <form action="?act=listProductDetail" method="POST">
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
                <table class="table table-striped" style="margin-top: 30px;">
                    <tr>
                        <th>ID chi tiết sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Màu sản phẩm</th>
                        <th>Dung lượng</th>
                        <th>Image</th>
                        <th>Số lượng hàng Tồn</th>
                        <th>Hành động</th>
                    </tr>
                    <?php 
                        foreach($listDetail as $detail){
                            // lấy tên sp
                            $id_sp = $detail['id_sanpham'];
                            $ten_sp = $this->SanphamModel->getByNameProducts($id_sp);
                            // lấy giá trị của price
                            $id_price = $detail['id_price'];
                            $value_price = $this->priceModel->getByNamePrice($id_price);
                            // lấy tên màu
                            $id_mau = $detail['id_mausp'];
                            $nameColor = $this->mausacModel->getNameByColor($id_mau);
                            // lấy dung lượng
                            $id_dungluong = $detail['id_dungluong_sp'];
                            $ten_dungluong = $this->dungluongModel->getByNameDungluong($id_dungluong);
                    ?>
                    <tr>
                        <td><?= $detail['id_sp_chitiet'] ?></td>
                        <td><?= $ten_sp['ten_sp'] ?> <?= $ten_dungluong['ten_dungluong'] ?></td>
                        <td><?= $value_price['price'] ?> VND</td>
                        <td><?= $nameColor['ten_mau'] ?></td>
                        <td><?= $ten_dungluong['ten_dungluong'] ?></td>
                        <td><img src="<?= $detail['image_url'] ?>" alt="" width="50" height="50"></td>
                        <td><?= $detail['soluong_hang'] ?></td>
                        <td>
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')" class="a1" href="?act=deleteDetail&id=<?= $detail['id_sp_chitiet'] ?>"><i class="fa-solid fa-trash" style="color: red;"></i></a> 
                            <a href="?act=updateDetail&id=<?= $detail['id_sp_chitiet'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
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
                            <a class="page-link" href="?act=listProductDetail&page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        </section>
    </section>
</body>
</html>