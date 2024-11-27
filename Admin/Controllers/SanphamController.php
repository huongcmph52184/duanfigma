<?php
    require_once "./Controllers/DanhmucController.php";
    require_once "./Controllers/DanhmucconController.php";
    require_once "./Controllers/DungluongController.php";
    require_once "./Controllers/MausacController.php";
    require_once "./Controllers/SanphamDeltailController.php";
    require_once "./Model/danhmuc.php";
    require_once "./Model/sanpham.php";
    require_once "./Model/danhmuccon.php";
    require_once "./Model/dungluong.php";
    require_once "./Model/mausac.php";
    require_once "./Model/SanphamDetail.php";
    class SanphamControllers{
        public $SanphamModel;
        public $DanhmucModel;
        public $danhmuccon;
        public $dungluongModel;
        public $mausacModel;
        public $detailModel;
        public function __construct(){
            $this -> SanphamModel = new Sanpham();
            $this -> DanhmucModel = new Danhmuc();
            $this-> danhmuccon = new Subcategory();
            $this->dungluongModel = new Dungluong();
            $this -> mausacModel = new Mausac();
            $this->detailModel = new productDetail();
        }
        public function listSanPham(){
            if(isset($_POST['go']) && ($_POST['go'])){
                $keyword = $_POST['keyword'];
                $ma_danhmuc = $_POST['ma_danhmuc'];
                $ma_danhmuc_con = $_POST['ma_danhmuc_con'];
            }
            else{
                $keyword = '';
                $ma_danhmuc = 0;
                $ma_danhmuc_con = 0;
            }
            $listDMC = $this->danhmuccon->listDMC(); 
            $listDanhmuc = $this->DanhmucModel->listDanhmuc();
            $ListSanpham = $this->SanphamModel->listSanpham($keyword,$ma_danhmuc,$ma_danhmuc_con);
            require_once "./Views/sanpham/ListSanpham.php";
        }
        public function list(){
            $listSP = $this->SanphamModel->listsp();
        }
        public function deleteSanPham(){
            $idsp = $_GET['id'];
            $this->SanphamModel->deleteSanpham($idsp);
            header ("location:".BASE_URL_ADMIN."?act=listSanpham");
        }
        public function createSanPham(){
            $listDMC = $this->danhmuccon->listDMC(); // thêm hãng sản xuất danh mục con
            $listDanhmuc = $this->DanhmucModel->listDanhmuc(); // danh mục mẹ
            require_once "./Views/sanpham/CreateSanpham.php";
        }
        public function postcreateSanpham(){
            if(isset($_POST['create']) && ($_POST['create'])){
                $tensanpham = $_POST['tenSanpham'];
                $ngaynhap = $_POST['ngaynhap'];
                $thongtin = $_POST['thongtin'];
                $hangsx = $_POST['hangsanxuat'];
                $ma_danhmuc = $_POST['ma_danhmuc'];
                $ma_danhmuc_con = $_POST['danhmuc_con'];
                $_SESSION['create'] = "Thêm mới thành công";
                $this->SanphamModel->createSanpham($tensanpham,$ngaynhap,$thongtin,$hangsx,$ma_danhmuc,$ma_danhmuc_con);
                header ("location:".BASE_URL_ADMIN."?act=createSanpham");
            }
        }
        public function updateSanpham(){
            if(isset($_GET['id']) && ($_GET['id'])){
                $idsp = $_GET['id'];
                $listDanhmuc = $this->DanhmucModel->listDanhmuc();
                $listDMC = $this->danhmuccon->listDMC();
                $Sanpham = $this->SanphamModel->find($idsp);
            }
            require_once "./Views/sanpham/UpdateSanpham.php";
        }
        public function postupdateSanpham(){
            if(isset($_POST['update']) && ($_POST['update'])){
                $idsp = $_GET['id'];
                $Sanpham = $this->SanphamModel->find($idsp); 
                $tensanpham = $_POST['tenSanpham'];
                $ngaynhap = $_POST['ngaynhap'];
                $thongtin = $_POST['thongtin'];
                $hangsx = $_POST['hangsanxuat'];
                $ma_danhmuc = $_POST['ma_danhmuc'];
                $ma_danhmuc_con = $_POST['ma_danhmuc_con'];
                $_SESSION['update'] = "Cập nhập thành công !";
                $this->SanphamModel->updateSanpham($idsp,$tensanpham,$ngaynhap,$thongtin,$hangsx,$ma_danhmuc,$ma_danhmuc_con);
                header ("location:".BASE_URL_ADMIN."?act=updateSanpham");
            }
        }
        public function eyeSanpham(){
            $idsp = $_GET['id'];
            $eyeSanpham = $this->SanphamModel->eye($idsp);
            $Sanpham = $this->SanphamModel->find($idsp);
            require_once "./Views/sanpham/eyeSanpham.php";
        }
        public function getByNameProducts(){
            $detail = $this->detailModel->find($id_spct);
            $id_sp = $detail['id_sanpham'];
            $ten_sp = $this->SanphamModel->getByNameProducts($id_sp);
        }
    }
?>