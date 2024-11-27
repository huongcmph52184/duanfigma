<?php
    require_once "./Controllers/DanhmucController.php";
    require_once "./Model/danhmuc.php";
    require_once "./Controllers/SanphamDeltailController.php";
    require_once "./Model/SanphamDetail.php";
    require_once "./Controllers/SanphamController.php";
    require_once "./Model/sanpham.php";
    require_once "./Controllers/DungluongController.php";
    require_once "./Model/dungluong.php";
    require_once "./Controllers/PriceController.php";
    require_once "./Model/price.php";
    require_once "./Controllers/DanhmucconController.php";
    require_once "./Model/danhmuccon.php";
    require_once "./Model/client.php";
    require_once "./Controllers/TaikhoanController.php";
    require_once "./Model/taikhoan.php";
    class ClientController{
        public $DanhmucModel;
        public $detailModel;
        public $SanphamModel;
        public $dungluongModel;
        public $priceModel;
        public $danhmuccon;
        public $clientModel;
        public $taikhoanModel;
        public function __construct(){
            $this -> DanhmucModel = new Danhmuc();
            $this-> detailModel = new productDetail();
            $this -> SanphamModel = new Sanpham();
            $this->dungluongModel = new Dungluong();
            $this->priceModel = new Price();
            $this->danhmuccon = new Subcategory();
            $this->clientModel = new Client();
            $this->taikhoanModel = new Taikhoan();
        }
        public function homeClient(){
            $listDanhmuc = $this->DanhmucModel->listDanhmuc();
            require './Views/client/homeClient.php';
        }
        public function DanhmucNav(){
            $DanhmucNav = $this->danhmuccon->listNav($danhmuc_me);
            require_once './Views/client/homeClient.php';
        }
        public function listSanPhamClient() {
            $productList = $this->detailModel->listClient(); // Renamed for clarity
            require_once './Views/client/homeClient.php';
        }
        // Danh mục mẹ
        public function listSanphamDanhMucMe(){
            $id_danhmuc = $_GET['id'];
            $listsanphamDanhmuc = $this->clientModel->listsanphamDanhmucMe($id_danhmuc);
            foreach($listsanphamDanhmuc as $product){
                $id_sp = $product['ma_sp'];
                $listProductDetail = $this->clientModel->ListSanPhamDetail($id_sp);
                $id_danhmuc = $product['ma_danhmuc'];
                $ten_danhmuc = $this->DanhmucModel->getByNameDanhmuc($id_danhmuc);
            }
            $listDanhmuc = $this->DanhmucModel->listDanhmuc();
            require_once './Views/client/sanphamDanhmucME.php';
        }
        // Danh mục con
        public function listsanphamDanhmuc(){
            $id_danhmuc_con = $_GET['id'];
            $listsanphamDanhmuc = $this->clientModel->listsanphamDanhmuc($id_danhmuc_con); 
            foreach($listsanphamDanhmuc as $product){
                $id_sp = $product['ma_sp'];
                $listProductDetail = $this->clientModel->ListProductDetail($id_sp);
                $id_danhmuc_con = $product['ma_danhmuc_con'];
                $ten_danhmuc_con = $this->danhmuccon->getByNameDanhmucCon($id_danhmuc_con);
            }    
            $listDanhmuc = $this->DanhmucModel->listDanhmuc();
            require_once './Views/client/sanphamDanhmuc.php';
        }
        public function listDienthoai(){
            $id_danhmuc = 7;
            $listDienthoai = $this->clientModel->listDienthoai($id_danhmuc); 
            foreach($listDienthoai as $dienthoai){
                $id_sp = $dienthoai['ma_sp'];
                $listDienthoaiDetail = $this->clientModel->ListDienthoaiDetail($id_sp);
            }    
            require_once './Views/client/homeClient.php';
        }
        public function listLaptop(){
            $id_danhmuc = 8;
            $listLaptop = $this->clientModel->listLaptop($id_danhmuc); 
            foreach($listLaptop as $laptop){
                $id_sp = $laptop['ma_sp'];
                $listLaptopDetail = $this->clientModel->ListLaptopDetail($id_sp);
            }    
            require_once './Views/client/homeClient.php';
        }

        // Chi tiết sản phẩm
        public function ChitietProduct(){
            $id_spct = $_GET['id'];
            $sanphamChitiet = $this->clientModel->sanphamChitiet($id_spct);
            foreach($sanphamChitiet as $sanPham){
                $id_sp = $sanPham['id_sanpham'];
                $mauSP = $this->clientModel->mauSP($id_sp);
                $dungluongSP = $this->clientModel->dungluongSP($id_sp);
            }
            $listDanhmuc = $this->DanhmucModel->listDanhmuc();
            require_once "./Views/client/chitietProduct.php";
        }
        // public function variantProduct(){
        //     if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        //         $id_sanpham_ct = $_POST['id_sanpham_chitiet'];
        //         $id_dungluong = $_POST['dungluong'];
        //     }
        // }
        public function chitietUser(){
            $listDanhmuc = $this->DanhmucModel->listDanhmuc();
            require_once "./Views/client/chitietUser.php";
        }
    }
  
?>