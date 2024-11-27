<?php
    session_start();
    require_once "./Controllers/SanphamController.php";
    require_once "./Controllers/SanphamDeltailController.php";
    require_once "./Model/sanpham.php";
    require_once "./Model/SanphamDetail.php";
    class DungluongControllers{
        public $dungluongModel;
        public $SanphamModel;
        public $detailModel;
        public function __construct(){
            $this->dungluongModel = new Dungluong();
            $this -> SanphamModel = new Sanpham();
            $this->detailModel = new productDetail();
        }
        public function listdungluong(){
            if(isset($_POST['go']) && ($_POST['go'])){
                $keyword = $_POST['keyword'];
                $ma_sp = $_POST['ma_sp'];
            }
            else{
                $keyword = '';
                $ma_sp = 0;
            }
            $listDungluong = $this->dungluongModel->listDungluong($keyword,$ma_sp);
            $listSP = $this->SanphamModel->listsp();
            require_once "./Views/dungluong/listdungluong.php";
        }
        public function listDL (){
            $listDL = $this->dungluongModel->listDL();
        }
        public function deleteDungluong(){
            $id_dungluong = $_GET['id'];
            $this->dungluongModel->deleteDungluong($id_dungluong);
            header ("Location:".BASE_URL_ADMIN."?act=listdungluong");
        }
        public function createDungluong(){
            $listSP = $this->SanphamModel->listsp();
            require_once "./Views/dungluong/createdungluong.php";
        }
        public function postcreateDungluong(){
            if(isset($_POST['Themmoi']) && ($_POST['Themmoi'])){
                $ten_dungluong = $_POST['tendungluong'];
                $id_sp = $_POST['ma_sanpham'];
                $this->dungluongModel->createDungluong($ten_dungluong,$id_sp);
                $_SESSION['themmoi'] = "Thêm mới thành công";
                header ("Location:".BASE_URL_ADMIN."?act=createDungluong");
            }
        }
        public function updateDungluong(){
            if(isset($_GET['id']) && ($_GET['id'])){
                $id_dungluong = $_GET['id'];
                $listSP = $this->SanphamModel->listsp();
                $Dungluong = $this->dungluongModel->find($id_dungluong);
            }
            require_once "./Views/dungluong/updatedungluong.php";
        }
        public function postupdateDungluong(){
            if(isset($_POST['Themmoi']) && ($_POST['Themmoi'])){
                $id_dungluong = $_GET['id'];
                $Dungluong = $this->dungluongModel->find($id_dungluong);
                $ten_dungluong = $_POST['tendungluong'];
                $id_sp = $_POST['ma_sanpham'];
                $this->dungluongModel->updateDungluong($id_dungluong,$ten_dungluong,$id_sp);
                $_SESSION['thongbao'] = "Cập nhập thành công";
                header ("Location:".BASE_URL_ADMIN."?act=updateDungluong");
            }
        }
        public function getByNameDungluong(){
            $detail = $this->detailModel->find($id_spct);
            $id_dungluong = $detail['id_dungluong_sp'];
            $ten_dungluong = $this->dungluongModel->getByNameDungluong($id_dungluong);
        }
    }
?>