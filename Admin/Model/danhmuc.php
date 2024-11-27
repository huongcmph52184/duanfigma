<?php
    class Danhmuc{
        public $danhmuc;
        public function __construct(){
            $this-> danhmuc = connect_db();
        }
        public function listDanhmuc(){
            try{
                $sql = "SELECT * FROM `danhmuc`";
                $stmt = $this->danhmuc->query($sql);
                $data = $stmt -> fetchAll();
                return $data;
            }
            catch (Exception $e){
                $e -> getMessage();
            }
        }
        public function deleteDanhmuc($id){
            try{
                $sql = "DELETE FROM danhmuc WHERE `danhmuc`.`ma_danhmuc` = $id";
                $this->danhmuc->exec($sql);
            }
            catch (Exception $e){
                $e -> getMessage();
            }
        }
        public function createDanhmuc($ten_Danhmuc,$image){
            try{
                $sql = "INSERT INTO `danhmuc` (`ten_danhmuc`,`anh_danhmuc`) VALUES ('$ten_Danhmuc','$image')";
                $this->danhmuc->exec($sql);
            }
            catch (Exception $e){
                $e -> getMessage();
            }
        }
        public function updateDanhmuc($iddm,$tenDanhmuc,$anhUpdate){
            try{
                $sql = "UPDATE `danhmuc` SET `ten_danhmuc` = '$tenDanhmuc', `anh_danhmuc` = '$anhUpdate' WHERE `danhmuc`.`ma_danhmuc` = $iddm";
                $this->danhmuc->exec($sql);
            }
            catch (Exception $e){
                $e -> getMessage();
            }
        }
        public function find($iddm){
            try{
                $sql = "SELECT * FROM `danhmuc` WHERE `danhmuc`.`ma_danhmuc` = $iddm";
                $stmt = $this->danhmuc->query($sql);
                $data = $stmt -> fetch();
                return $data;
            }
            catch (Exception $e){
                $e -> getMessage();
            }
        }
        function getByNameDanhmuc($id_danhmuc) {
            try {
                // Sử dụng ID để truy vấn tên danh mục từ bảng 'danhmuc'
                $sql = "SELECT ten_danhmuc FROM danhmuc WHERE ma_danhmuc = {$id_danhmuc}";
                $stmt = $this->danhmuc->query($sql);
                $data = $stmt -> fetch();      
                return $data;
            } catch (Exception $e) {
                $e->getMessage(); // Xử lý ngoại lệ nếu có lỗi
            }
        }        
        public function __destruct(){
            $this->danhmuc = null;
        }
    }

?>