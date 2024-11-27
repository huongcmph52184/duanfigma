<?php  
    require_once "./Controllers/SanphamController.php";
    require_once "./Controllers/DungluongController.php";
    require_once "./Controllers/MausacController.php";
    require_once "./Controllers/PriceController.php";
    require_once "./Model/sanpham.php";
    require_once "./Model/dungluong.php";
    require_once "./Model/mausac.php";
    require_once "./Model/price.php";
    class ProductDetailControllers{
        public $detailModel;
        public $SanphamModel;
        public $dungluongModel;
        public $mausacModel;
        public $priceModel;
        public function __construct(){
            $this->detailModel = new productDetail();
            $this -> SanphamModel = new Sanpham();
            $this->dungluongModel = new Dungluong();
            $this -> mausacModel = new Mausac();
            $this->priceModel = new Price();
        }
        public function listProductDetail($page){
            if(isset($_POST['go']) && ($_POST['go'])){
                $ma_sp = $_POST['ma_sp'];
            }
            else{
                $ma_sp = 0;
            }
            $limit = 12;
            $start = ($page - 1) * $limit;
            $detail = $this->detailModel->listDetail($ma_sp,$limit,$start);
            $listDetail = $detail['data'];
            $totalPages = $detail['totalPages'];
            $listSP = $this->SanphamModel->listsp();
            require_once "./Views/detail/listDetail.php";
        }
        public function deleteDetail(){
            $id_spct = $_GET['id'];
            $this->detailModel->deleteDetail($id_ctsp);
            header("location:".BASE_URL_ADMIN."?act=listProductDetail");
        }
        public function createDetail(){
            $listSP = $this->SanphamModel->listsp();
            $listDL = $this->dungluongModel->listDL();
            $listMS = $this->mausacModel->listMS();
            $listgia = $this->priceModel->listgia();
            require_once "./Views/detail/createDetail.php";
        }
        public function postcreateDetail(){
            if(isset($_POST['Themmoi']) && ($_POST['Themmoi'])){
                $id_sp = $_POST['id_sanpham'];
                $id_price = $_POST['id_price'];
                $id_mausp = $_POST['id_mau'];
                $id_dungluongsp = $_POST['id_dungluong'];

                $image = "./Uploads/".$_FILES['image']['name'];
                if(move_uploaded_file($_FILES['image']['tmp_name'],$image))
                $anhsp = $image;
                $quantyti = $_POST['quantyti'];
                $_SESSION['create'] = "Thêm mới thành công";
                $this->detailModel->createDetail($id_sp,$id_price,$id_mausp,$id_dungluongsp,$anhsp,$quantyti);
                header("location:".BASE_URL_ADMIN."?act=createDetail");
            }
        }
        public function updateDetail(){
            if(isset($_GET['id']) && ($_GET['id'])){
                $id_spct = $_GET['id'];
                $detail = $this->detailModel->find($id_spct);
            }
            $listSP = $this->SanphamModel->listsp();
            $listDL = $this->dungluongModel->listDL();
            $listMS = $this->mausacModel->listMS();
            $listgia = $this->priceModel->listgia();
            require_once "./Views/detail/updateDetail.php";
        }
        public function postupdateDetail(){
            if(isset($_POST['Themmoi']) && ($_POST['Themmoi'])){
                $id_ctsp = $_GET['id'];

                $detail = $this->detailModel->find($id_spct);
                $anhsp = $detail['image_url'];
                $image = "./Uploads/".basename($_FILES['image']['name']);
                if(move_uploaded_file($_FILES['image']['tmp_name'],$image)){
                    $anhsp = $image;
                }

                $id_sp = $_POST['id_sanpham'];
                $id_price = $_POST['id_price'];
                $id_mau = $_POST['id_mau'];
                $id_dungluong = $_POST['id_dungluong'];
                $quantyti = $_POST['quantyti'];
                $_SESSION['update'] = "Cập nhập thành công";

                $this->detailModel->updateDetail($id_ctsp,$id_sp,$id_price,$id_mau,$id_dungluong,$anhsp,$quantyti);
                header("location:".BASE_URL_ADMIN."?act=updateDetail");
            }
        }
    }
?>