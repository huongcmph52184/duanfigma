<?php
    class Price{
        public $price;
        public function __construct(){
            $this->price = connect_db();
        }
        public function listprice($keyword,$ma_sp){
            try{
                $sql = "SELECT * FROM `gia_sanpham` WHERE 1";
                if($keyword != ""){
                    $sql.=" and price like '%".$keyword."'";
                }
                if($ma_sp>0){
                    $sql.=" and id_sanpham ='".$ma_sp."%'";
                }
                $stmt = $this->price->query($sql);
                $data = $stmt -> fetchAll();
                return $data;
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        public function listgia(){
            try{
                $sql = "SELECT * FROM `gia_sanpham`";
                $stmt = $this->price->query($sql);
                $data = $stmt -> fetchAll();
                return $data;
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        public function deletePrice($id_price){
            try{
                $sql = "DELETE FROM gia_sanpham WHERE `gia_sanpham`.`id_price` = {$id_price}";
                $this->price->query($sql);
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        public function createPrice($ma_sanpham,$price){
            try{
                $sql = "INSERT INTO `gia_sanpham` (`id_sanpham`, `price`) VALUES ('$ma_sanpham', '$price')";
                $this->price->exec($sql);
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        public function updatePrice($id_price,$price,$id_sp){
            try{
                $sql = "UPDATE `gia_sanpham` SET `id_sanpham` = '$id_sp', `price` = '$price' WHERE `gia_sanpham`.`id_price` = {$id_price}";
                $this->price->exec($sql);
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        public function find($id_price){
            try {
                $sql = "SELECT * FROM `gia_sanpham` WHERE `gia_sanpham`.`id_price` = {$id_price}";
                $stmt = $this->price->query($sql);
                $data = $stmt -> fetch();
                return $data;
            } 
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        public function getByNamePrice($id_price){
            try{
                $sql = "SELECT price FROM gia_sanpham WHERE id_price = {$id_price}";
                $stmt = $this->price->query($sql);
                $data = $stmt -> fetch();
                return $data;
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        public function __destrcut(){
            $this->price = null;
        }
    }
?>