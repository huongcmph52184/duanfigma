<?php
    require_once "./Controllers/SanphamController.php";
    require_once "./Controllers/SanphamDeltailController.php";
    require_once "./Model/sanpham.php";
    require_once "./Model/SanphamDetail.php";
    class MausacControllers{
        public $mausacModel;
        public $SanphamModel;
        public $detailModel;
        public function __construct(){
            $this -> mausacModel = new Mausac();
            $this -> SanphamModel = new Sanpham();
            $this->detailModel = new productDetail();
        }
        public function listMausacsanpham(){
            if(isset($_POST['go']) && ($_POST['go'])){
                $keyword = $_POST['keyword'];
                $ma_sp = $_POST['ma_sp'];
            }
            else{
                $keyword = '';
                $ma_sp = 0;
            }
            $listMausac = $this->mausacModel->listmausac($keyword,$ma_sp);
            $listSP = $this->SanphamModel->listsp();
            require_once "./Views/mausac/listmausac.php"; 
        }
        public function listMS(){
            $listMS = $this->mausacModel->listMS();
        }
        public function deleteMausacsanpham(){
            $id_mau = $_GET['id'];
            $this -> mausacModel -> deleteMausac($id_mau);
            header ("location:".BASE_URL_ADMIN."?act=listmausac");
        }
        public function createMausacsanpham(){
            $listSP = $this->SanphamModel->listsp();
            require_once "./Views/mausac/createmausac.php";
        }
        public function postcreateMausacsanpham(){
            if(isset($_POST['Themmoi']) && ($_POST['Themmoi'])){
               
                $image = "./Uploads/".$_FILES['anhmau']['name'];
                if(move_uploaded_file($_FILES['anhmau']['tmp_name'],$image))
                $anhmau = $image;

                $tenmau = $_POST['tenmau'];
                $id_sp = $_POST['ma_sanpham'];
                $_SESSION['create'] =  "Thêm mới thành công !";
                $this->mausacModel->createMausac($tenmau,$anhmau,$id_sp);
                header("Location:".BASE_URL_ADMIN."?act=createMausac");
            }
        }
        public function updateMausacsanpham(){
            if(isset($_GET['id']) && ($_GET['id'])){
                $id_mau = $_GET['id'];
                $mausac = $this->mausacModel->find($id_mau);
                $listSP = $this->SanphamModel->listsp();
            }
            require_once "./Views/mausac/updatemausac.php";
        }
        public function postupdateMausacsanpham(){
            if(isset($_POST['Themmoi']) && ($_POST['Themmoi'])){
                $id_mau = $_GET['id'];
                $mausac = $this->mausacModel->find($id_mau);
                $anhmau = $mausac['anh_mau'];
                $image = "./Uploads/".basename($_FILES['anhmau']['name']);
                if(move_uploaded_file($_FILES['anhmau']['tmp_name'],$image)){
                    $anhmau = $image;
                }
                $tenmau = $_POST['tenmau'];
                $id_sp = $_POST['ma_sanpham'];
                $_SESSION['update'] = "Cập nhập thành công";
                $this->mausacModel->updateMausac($id_mau,$tenmau,$anhmau,$id_sp);
                header("Location:".BASE_URL_ADMIN."?act=updateMausac");
            }
        }
        public function getNameByColor(){
            $detail = $this->detailModel->find($id_spct);
            $id_mau = $detail['id_mausp'];
            $nameColor = $this->mausacModel->getNameByColor($id_mau);
        }
    }
?>