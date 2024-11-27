<?php
    require_once "./Controllers/SanphamController.php";
    require_once "./Model/sanpham.php";
    class DanhmucConstrollers{
        public $SanphamModel;
        public $DanhmucModel;
        public function __construct(){
            $this -> SanphamModel = new Sanpham();
            $this->DanhmucModel = new Danhmuc();
        }
        public function listDanhmuc(){
            $listDanhmuc = $this->DanhmucModel->listDanhmuc();
            require_once "./Views/danhmuc/ListDanhmuc.php";
        }
        public function deletedanhmuc(){
            $id = $_GET['id']; 
            $this->DanhmucModel->deleteDanhmuc($id);
            header ("location:".BASE_URL_ADMIN."?act=listDanhmuc");
        }
        public function createDanhmuc(){
            require_once "./Views/danhmuc/CreateDanhmuc.php";
        }
        public function postcreateDanhmuc(){
            if(isset($_POST['Themmoi']) && ($_POST['Themmoi'])){
                $tenDanhmuc = $_POST['tenDanhmuc'];

                $anhDanhmuc = "./Uploads/".$_FILES['anhDanhmuc']['name'];
                if(move_uploaded_file($_FILES['anhDanhmuc']['tmp_name'],$anhDanhmuc))
                $image = $anhDanhmuc;
                
                $_SESSION['create'] = "Thêm mới thành công";
                $this->DanhmucModel->createDanhmuc($tenDanhmuc,$image);
                header ("location:".BASE_URL_ADMIN."?act=createDanhmuc");
            }
        }
        public function updateDanhmuc(){
            if(isset($_GET['id']) && ($_GET['id'])){
                $iddm=$_GET['id'];
                $Danhmuc = $this->DanhmucModel->find($iddm);
            }
            require_once "./Views/danhmuc/UpdateDanhmuc.php";
        }
        public function postupdateDanhmuc(){
            if(isset($_POST['update']) && ($_POST['update'])){
                $iddm=$_GET['id'];
                $tenDanhmuc = $_POST['tenDanhmuc'];
                
                $Danhmuc = $this->DanhmucModel->find($iddm);
                $anhUpdate = $Danhmuc['anh_danhmuc'];
                $anhDanhmuc = "./Uploads/".basename($_FILES['anhDanhmuc']['name']);
                if(move_uploaded_file($_FILES['anhDanhmuc']['tmp_name'],$anhDanhmuc)){
                    $anhUpdate = $anhDanhmuc;
                }
                $_SESSION['update'] = "Cập nhập thành công";
                $this->DanhmucModel->updateDanhmuc($iddm,$tenDanhmuc,$anhUpdate);
                header ("location:".BASE_URL_ADMIN."?act=updateDanhmuc");
            }
        }
        // Hàm định nghĩa để lấy tên danh mục 
        public function getByNameDanhmuc(){
            // đây là hàm đẩy lấy sản phẩm theo id đã được định nghĩa bên sản phẩm
            $Sanpham = $this->SanphamModel->find($idsp);
            // Đây là ID danh mục được lấy theo id của từng sản phẩm và rồi ID_danhmuc sẽ bằng với Sản phẩm đó với key là ma_danhmuc thì chúng ta sẽ query ra tên danh mục theo ma_danhmuc trong sản phẩm đó
            $id_danhmuc = $Sanpham['ma_danhmuc'];
            $ten_danhmuc = $this->DanhmucModel->getByNameDanhmuc($id_danhmuc);
        }
    }

?>