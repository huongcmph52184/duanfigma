<?php
    class Mausac{
        public $mausac;
        public function __construct(){
            $this->mausac = connect_db();
        }
        public function listmausac($keyword,$ma_sp){
            try{
                $sql = "SELECT * FROM `mau_sp` WHERE 1";
                if($keyword != ""){
                    $sql.=" and ten_mau like '%".$keyword."%'"; 
                }
                if($ma_sp > 0){
                    $sql.=" and id_sanpham ='".$ma_sp."%'";
                }
                $stmt = $this->mausac->query($sql);
                $data = $stmt -> fetchAll();
                return $data;
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        public function listMS(){
            try{
                $sql = "SELECT * FROM `mau_sp`";
                $stmt = $this->mausac->query($sql);
                $data = $stmt -> fetchAll();
                return $data;
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        public function deleteMausac($id_mau){
            try{
                $sql = "DELETE FROM mau_sp WHERE `mau_sp`.`id_mau` = {$id_mau}";
                $this->mausac->query($sql);
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        public function createMausac($tenmau,$anhmau,$id_sp){
            try{
                $sql = "INSERT INTO `mau_sp` (`ten_mau`, `anh_mau`, `id_sanpham`) VALUES ('$tenmau', '$anhmau', '$id_sp')";
                $this->mausac->query($sql);
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        public function updateMausac($id_mau,$tenmau,$anhmau,$id_sp){
            try{
                $sql = "UPDATE `mau_sp` SET `ten_mau` = '$tenmau', `anh_mau` = '$anhmau', `id_sanpham` = '$id_sp' WHERE `mau_sp`.`id_mau` = {$id_mau}";
                $this->mausac->exec($sql);
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        public function find($id_mau){
            try{
                $sql = "SELECT * FROM `mau_sp` WHERE `mau_sp`.`id_mau` = {$id_mau}";
                $stmt = $this->mausac->query($sql);
                $data = $stmt -> fetch();
                return $data;
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        public function getNameByColor($id_mau){
            try{
                $sql = "SELECT ten_mau, anh_mau FROM mau_sp WHERE id_mau = {$id_mau}";
                $stmt = $this->mausac->query($sql);
                $data = $stmt -> fetch();
                return $data;
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        public function __destruct(){
            $this->mausac = null;
        }
    }
?>