<?php
    require_once "./Controllers/SanphamController.php";
    require_once "./Controllers/SanphamDeltailController.php";
    require_once "./Model/sanpham.php";
    require_once "./Model/SanphamDetail.php";
    class PriceControllers{
        public $priceModel;
        public $SanphamModel;
        public $detailModel;
        public function __construct(){
            $this->priceModel = new Price();
            $this -> SanphamModel = new Sanpham();
            $this->detailModel = new productDetail();
        }
        public function listprice(){
            if(isset($_POST['go']) && ($_POST['go'])){
                $keyword = $_POST['keyword'];
                $ma_sp = $_POST['ma_sp'];
            }
            else{
                $keyword = '';
                $ma_sp = 0;
            }
            $listSP = $this->SanphamModel->listsp();
            $listPrice = $this->priceModel->listprice($keyword,$ma_sp);
            require_once "./Views/giasanpham/listprice.php";
        }
        public function listgia (){
            $listgia = $this->priceModel->listgia();
        }
        public function deletePrice(){
            $id_price = $_GET['id'];
            $this->priceModel->deletePrice($id_price);
            header("location:".BASE_URL_ADMIN."?act=listpriceProduct");
        }
        public function createPrice(){
            $listSP = $this->SanphamModel->listsp();
            require_once "./Views/giasanpham/createPrice.php";
        }
        public function postcreatePrice(){
            if(isset($_POST['Themmoi']) && ($_POST['Themmoi'])){
                $price = $_POST['price'];
                $ma_sanpham = $_POST['ma_sanpham'];
                $_SESSION['create'] =  "Thêm mới thành công !";
                $this->priceModel->createPrice($ma_sanpham,$price);
                header("location:".BASE_URL_ADMIN."?act=createPrice");
            }
        }
        public function updatePrice(){
            if(isset($_GET['id']) && ($_GET['id'])){
                $id_price = $_GET['id'];
                $Price = $this->priceModel->find($id_price);
            }
            $listSP = $this->SanphamModel->listsp();
            require_once "./Views/giasanpham/updatePrice.php";
        }
        public function postupdatePrice(){
            $id_price = $_GET['id'];
            $Price = $this->priceModel->find($id_price);
            $price = $_POST['price'];
            $id_sp = $_POST['ma_sanpham'];
            $_SESSION['update'] = "Cập nhập thành công";
            $this->priceModel->updatePrice($id_price,$price,$id_sp);
            header("location:".BASE_URL_ADMIN."?act=updatePrice");
        }
        public function getByNamePrice(){
            $detail = $this->detailModel->find($id_spct);
            $id_price = $detail['id_price'];
            $value_price = $this->priceModel->getByNamePrice($id_price);
        }
    }
?>