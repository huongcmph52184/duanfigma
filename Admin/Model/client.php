<?php
    class Client{
        public $client;
        public function __construct(){
            $this->client = connect_db();
        }
        public function listsanphamDanhmuc($id_danhmuc_con){
            try{
                $sql = "SELECT * FROM `sanpham` WHERE `sanpham`.`ma_danhmuc_con` = {$id_danhmuc_con}";
                $stmt = $this->client->query($sql);
                $data = $stmt -> fetchAll();
                return $data;
            }
            catch (Exception $e){
                $e -> getMessage();
            }
        }
        public function ListProductDetail($id_sp){
            try{
                $sql = "SELECT * FROM `sanpham_chitiet` WHERE `sanpham_chitiet`.`id_sanpham` = {$id_sp}";
                $stmt = $this->client->query($sql);
                $data = $stmt -> fetchAll();
                return $data;
            }
            catch (Exception $e){
                $e -> getMessage();
            }
        }
        public function listDanhmucCon($id_danhmuc_con){
            try{
                $sql = "SELECT * FROM `danhmuc_con` WHERE `danhmuc_con`.`id_danhmuc_con` = {$id_danhmuc_con}";
                $stmt = $this->client->query($sql);
                $data = $stmt -> fetch();
                return $data;
            }
            catch (Exception $e){
                $e -> getMessage();
            }
        }
        // lấy sp cho danh mục mẹ
        public function listsanphamDanhmucMe($id_danhmuc){
            try{
                $sql = "SELECT * FROM `sanpham` WHERE `sanpham`.`ma_danhmuc` = {$id_danhmuc}";
                $stmt = $this->client->query($sql);
                $data = $stmt -> fetchAll();
                return $data;
            }
            catch (Exception $e){
                $e -> getMessage();
            }
        }
        public function ListSanPhamDetail($id_sp){
            try{
                $sql = "SELECT * FROM sanpham_chitiet WHERE id_sp_chitiet IN (SELECT MIN(id_sp_chitiet) FROM sanpham_chitiet GROUP BY id_sanpham)";
                $stmt = $this->client->query($sql);
                $data = $stmt -> fetchAll();
                return $data;
            }
            catch (Exception $e){
                $e -> getMessage();
            }
        }
        // Điện thoại nổi bật
        public function listDienthoai($id_danhmuc){
            try{
                $sql = "SELECT * FROM `sanpham` WHERE `sanpham`.`ma_danhmuc` = {$id_danhmuc}";
                $stmt = $this->client->query($sql);
                $data = $stmt -> fetchAll();
                return $data;
            }
            catch (Exception $e){
                $e -> getMessage();
            }
        }
        // điện thoại nổi bật
        public function ListDienthoaiDetail($id_sp){
            try{
                $sql = "SELECT * FROM sanpham_chitiet WHERE id_sp_chitiet IN (SELECT MIN(id_sp_chitiet) FROM sanpham_chitiet GROUP BY id_sanpham) LIMIT 10";
                $stmt = $this->client->query($sql);
                $data = $stmt->fetchAll();
                return $data;
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        // latop nổi bật
        public function listLaptop($id_danhmuc){
            try{
                $sql = "SELECT * FROM `sanpham` WHERE `sanpham`.`ma_danhmuc` = {$id_danhmuc}";
                $stmt = $this->client->query($sql);
                $data = $stmt -> fetchAll();
                return $data;
            }
            catch (Exception $e){
                $e -> getMessage();
            }
        }
        // laptop nổi bật
        public function ListLaptopDetail($id_sp){
            try{
                $sql = "SELECT * FROM sanpham_chitiet WHERE id_sanpham = {$id_sp}";
                $stmt = $this->client->query($sql);
                $data = $stmt->fetchAll();
                return $data;
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        // Chi tiết sản phẩm
        public function sanphamChitiet($id_spct){
            try{
                $sql = "SELECT * FROM `sanpham_chitiet` WHERE `sanpham_chitiet`.`id_sp_chitiet` = {$id_spct}";
                $stmt = $this->client->query($sql);
                $data = $stmt -> fetchAll();
                return $data;
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        // lấy ra các màu theo sản phẩm
        public function mauSP($id_sp){
            try{
                $sql = "SELECT * FROM `mau_sp` WHERE `mau_sp`.`id_sanpham` = {$id_sp}";
                $stmt = $this->client->query($sql);
                $data = $stmt -> fetchAll();
                return $data;
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        // lấy ra dung lương theo sp
        public function dungluongSP($id_sp){
            try{
                $sql = "SELECT * FROM `dungluong_sanpham` WHERE `dungluong_sanpham`.`ma_sanpham` = {$id_sp}";
                $stmt = $this->client->query($sql);
                $data = $stmt -> fetchAll();
                return $data;
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        // chitiettk
        public function chitietUser($id_taikhoan){
            try{
                $sql = "SELECT * FROM `users` WHERE `user`.`id_taikhoan` = {$id_taikhoan}";
                $stmt = $this->client->query($sql);
                $data = $stmt -> fetchAll();
                return $data;
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        public function __destruct(){
            $this->client = null;
        }
    }
?>