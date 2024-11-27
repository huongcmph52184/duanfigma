<?php
    require_once "./Controllers/DanhmucController.php";
    require_once "./Model/danhmuc.php";
    require_once "./Controllers/SanphamController.php";
    require_once "./Model/sanpham.php";
    class DanhmucconConstrollers{
        public $SanphamModel;
        public $danhmuccon;
        public $DanhmucModel;
        public function __construct(){
            $this->danhmuccon = new Subcategory();
            $this -> DanhmucModel = new Danhmuc();
            $this -> SanphamModel = new Sanpham();
        }
        public function listDanhmucCon($page) {
            $keyword = $_POST['keyword'] ?? '';
            $ma_danhmuc_me = $_POST['ma_danhmuc_me'] ?? 0;
        
            $limit = 9;
            $start = ($page - 1) * $limit;
        
            // Fetch the data and pagination info
            $result = $this->danhmuccon->listDanhmucCon($keyword, $ma_danhmuc_me, $limit, $start);
            $listDanhmuccon = $result['data'];
            $totalPages = $result['totalPages'];
            $listDanhmuc = $this->DanhmucModel->listDanhmuc();
        
            require_once "./Views/danhmucCon/listDanhmucCon.php";
        }
        
        public function listDMC(){ // để thêm hãng sản xuất
            $listDMC = $this->danhmuccon->listDMC();
        }
        public function deleteDanhmucCon(){
            $iddm_con = $_GET['id'];
            $this->danhmuccon->deteleDanhmucCon($iddm_con);
            header("location:".BASE_URL_ADMIN."?act=listDanhmuccon");
        }
        public function createDanhmucCon(){
            $listDanhmuc = $this->DanhmucModel->listDanhmuc();
            require_once "./Views/danhmucCon/createDanhmucCon.php";
        }
        public function postcreateDanhmucCon(){
            if(isset($_POST['Themmoi']) && ($_POST['Themmoi'])){
                $ten_danhmuc_con = $_POST['tenDanhmucCon'];
                $ma_danhmuc_me = $_POST['ma_danhmuc_me'];

                $image = "./Uploads/".$_FILES['anhDanhmucCon']['name'];
                if(move_uploaded_file($_FILES['anhDanhmucCon']['tmp_name'],$image))
                $anhDanhmucCon = $image;
                $_SESSION['create'] = "Thêm mới thành công";
                $this->danhmuccon->createDanhmucCon($ten_danhmuc_con,$anhDanhmucCon,$ma_danhmuc_me);
                header("location:".BASE_URL_ADMIN."?act=createDanhmuccon");
            }
        }
        public function updateDanhmucCon(){
            if(isset($_GET['id']) && ($_GET['id'])){
                $iddm_con = $_GET['id'];
                $danhmucCon = $this->danhmuccon->find($iddm_con);
                $listDanhmuc = $this->DanhmucModel->listDanhmuc();
            }
            require_once "./Views/danhmucCon/updateDanhmucCon.php";
        }
        public function postupdateDanhmuccon(){
            if(isset($_POST['update']) && ($_POST['update'])){
                $iddm_con = $_GET['id'];
                $danhmucCon = $this->danhmuccon->find($iddm_con);
                $anhDanhmucCon = $danhmucCon['anh_danhmuc_con'];
                $image = "./Uploads/".basename($_FILES['anhDanhmucCon']['name']);
                if(move_uploaded_file($_FILES['anhDanhmucCon']['tmp_name'],$image)){
                    $anhDanhmucCon = $image;
                }
                $tenDanhmucCon = $_POST['danhmucCon'];
                $ma_danhmuc_me = $_POST['ma_danhmuc_me'];
                $_SESSION['update'] = "Cập nhập thành công";
                $this->danhmuccon->updateDanhmuccon($iddm_con,$tenDanhmucCon,$anhDanhmucCon,$ma_danhmuc_me);
                header ("location:".BASE_URL_ADMIN."?act=updateDanhmuccon");
            }
        }
        // Hàm định nghĩa để lấy ra tên của danh mục con
        public function getByNameDanhmucCon(){
            // đây là hàm đẩy lấy sản phẩm theo id đã được định nghĩa bên sản phẩm
            $Sanpham = $this->SanphamModel->find($idsp);
            // Đây là ID danh mục được lấy theo id của từng sản phẩm và rồi ID_danhmuc sẽ bằng với Sản phẩm đó với key là ma_danhmuc_con sau khi lấy được mã danh_muc_con thì chúng ta sẽ query ra tên danh mục con theo ma_danhmuc_con trong sản phẩm đó
            $id_danhmuc_con = $Sanpham['ma_danhmuc_con'];
            $ten_danhmuc_con = $this->danhmuccon->getByNameDanhmucCon($id_danhmuc_con);
        }
        // danh mục con ra menu
        public function listDanhmucNav(){
            $danhmucCon = $this->danhmuccon->find($iddm_con);
            $danhmuc_me = $danhmucCon['ma_danhmuc_me'];
            $DanhmucNav = $this->danhmuccon->listNav($danhmuc_me);
        }
    }
?>