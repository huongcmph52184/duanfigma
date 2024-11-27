<?php
    require_once "./Controllers/DanhmucController.php";
    require_once "./Model/danhmuc.php";
    require_once "./Controllers/DanhmucconController.php";
    require_once "./Model/danhmuccon.php";
    require_once "./Model/taikhoan.php";
    class TaikhoanControllers{
        public $taikhoanModel;
        public $DanhmucModel;
        public $danhmuccon;
        public function __construct(){
            $this->taikhoanModel = new Taikhoan();
            $this -> DanhmucModel = new Danhmuc();
            $this->danhmuccon = new Subcategory();
        }
        public function listtk(){
            $Listtaikhoan=$this->taikhoanModel->all_taikhoan();
            require_once "./Views/taikhoan/listtaikhoan.php";
        }
        public function delete_tk(){
            $id = $_GET['id'];
            $this->taikhoanModel->delete_tk($id);
            header ("location:".BASE_URL_ADMIN."?act=listtk");
        }
        public function dangky(){
            require_once "./Views/client/dangky.php";
        }
        public function postDangky(){
            if(isset($_POST['dangky'])&&($_POST['dangky'])){
                $ten_nguoidung = $_POST['username'];
                $matkhau = $_POST['password'];
                $avatar = $_POST['Avatar'];
                $Sdt = $_POST['Sdt'];
                $Diachi_lienhe = $_POST['Diachi_lienhe'];
                $email = $_POST['Email'];
                $this->taikhoanModel->Dangky($ten_nguoidung,$matkhau,$avatar,$Sdt,$Diachi_lienhe,$email);
                header ("location:".BASE_URL_ADMIN."?act=dangky");
                $_SESSION['thongbao'] = "Đăng ký thành công! Vui lòng đăng nhập để sử dụng.";
            }
        }
        public function dangnhap(){
            $listDanhmuc = $this->DanhmucModel->listDanhmuc();
            require_once "./Views/client/dangnhap.php";
        }
        public function postDangnhap(){
            if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
                $ten_nguoidung = $_POST['username'];
                $matkhau = $_POST['password'];
                $checksUser = $this->taikhoanModel->checksUser($ten_nguoidung,$matkhau);
                if(is_array($checksUser)){
                    $_SESSION['user'] = $checksUser;
                    header ("location:".BASE_URL_ADMIN."?act=/");
                    exit();
                }
                else{
                    $_SESSION['erron'] = "Tài khoản không tồn tại xem lại tài khoản hoặc mật khẩu";
                    header ("location:".BASE_URL_ADMIN."?act=dangnhap");
                    exit();
                }
                
            }
        }
        public function postDangxuat(){
            session_unset();
            header ("location:".BASE_URL_ADMIN."?act=/");
        }
        public function updateTk(){
            $id_taikhoan = $_SESSION['user']['id_taikhoan'];
            $taikhoan = $this->taikhoanModel->find($id_taikhoan);
            $listDanhmuc = $this->DanhmucModel->listDanhmuc();
            require_once "./Views/client/updateUser.php";
        }
        public function postupdateTk(){
            if(isset($_POST['update']) && ($_POST['update'])){
                $id_taikhoan = $_SESSION['user']['id_taikhoan'];
                $taikhoan = $this->taikhoanModel->find($id_taikhoan);
                $username = $_POST['username'];
                $password = $_POST['password'];

                $avatar = $taikhoan['Avartar'];
                $image = "./Uploads/".$_FILES['image']['name'];
                if(move_uploaded_file($_FILES['image']['tmp_name'],$image))
                $avatar = $image;

                $sdt = $_POST['sdt'];
                $address = $_POST['Address'];
                $email = $_POST['email'];
                $_SESSION['update'] = "Cập nhập thành công";
                $this->taikhoanModel->updateUser($id_taikhoan,$username,$password,$avatar,$sdt,$address,$email);
                header("location:".BASE_URL_ADMIN."?act=updateUser");

            }
        }
    }
?>