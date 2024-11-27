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
    <script src="./ckeditor_4.22.1_full (1)\ckeditor/ckeditor.js"></script>
</head>
<body>
    <section class="Sanpham">
        <?php require_once "../Admin/header.php"; ?>
        <section class="contenDanhmuc">
            <article>
                <div class="list">
                    <i class="fa-solid fa-list"></i>
                </div>
                <div class="conten" style="display: flex;">
                    <h1 style="margin-top: 10px;">Xem chi tiết sản phẩm</h1>
                    <a href="?act=listSanpham" style="margin-left: 650px; margin-top: 20px"><button type="button" class="btn btn-success"><i class="fa-solid fa-list"></i> Danh sách</button></a> 
                </div>
                <form action=""> 
                    <?php 
                        $id_danhmuc = $Sanpham['ma_danhmuc'];
                        $id_danhmuc_con = $Sanpham['ma_danhmuc_con'];
                        $ten_danhmuc = $this->DanhmucModel->getByNameDanhmuc($id_danhmuc);
                        $ten_danhmuc_con = $this->danhmuccon->getByNameDanhmucCon($id_danhmuc_con);
                    ?>
                    <label for="" style="margin-left: 5px; display: flex;">Mã Danh mục <p style="color: red; margin-left: 5px;">(*)</p></label>
                    <select name="ma_danhmuc" id="" class="form-select" aria-label="Default select example">
                        <option><?= $ten_danhmuc['ten_danhmuc'] ?></option>
                    </select>
                    <label for="" style="margin-left: 5px; display: flex; margin-top: 10px; padding-bottom: 0px">Danh Mục Con <p style="color: red; margin-left: 5px;">(*)</p></label>
                    <select name="ma_danhmuc_con" id="" class="form-select" aria-label="Default select example">
                        <option> <?= $ten_danhmuc_con['ten_danhmuc_con'] ?></option>
                    </select>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label" style="margin-left: 5px; display: flex;">Tên sản phẩm <p style="color: red; margin-left: 5px;">(*)</p></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tenSanpham" value="<?= isset($Sanpham['ten_sp']) ? $Sanpham['ten_sp'] : ''?>">
                    </div>
                    <div class="mb-0">
                        <label for="exampleInputEmail1" class="form-label" style="margin-left: 5px; display: flex;">Ngày nhập hàng <p style="color: red; margin-left: 5px;">(*)</p></label>
                        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="ngaynhap" value="<?= isset($Sanpham['ngaynhap']) ? $Sanpham['ngaynhap'] : ''?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label" style="margin-left: 5px; display: flex; margin: 10px; margin-bottom: 0px">Thông tin sản phẩm <p style="color: red; margin-left: 5px;">(*)</p></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="mota"> <?= isset($Sanpham['mota_sanpham']) ? $Sanpham['mota_sanpham'] : ''?> </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label" style="margin-left: 5px; display: flex;">Hãng sản xuất <p style="color: red; margin-left: 5px;">(*)</p></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="hangsanxuat" value="<?= isset($Sanpham['hang_sanxuat']) ? $Sanpham['hang_sanxuat'] : ''?>">
                    </div>
                </form>
                <script>
                    CKEDITOR.replace('mota', {
                        removePlugins: 'exportpdf,cloudservices' // Vô hiệu hóa các plugin không cần thiết
                    });
                </script>
            </article>
        </section>
    </section>
    </section>
</body>
</html>