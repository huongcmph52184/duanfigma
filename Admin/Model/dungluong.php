<?php
    class Dungluong{
        public $dungluong;
        public function __construct(){
            $this->dungluong = connect_db();
        }
        public function listDungluong($keyword,$ma_sp){
            try{
                $sql = "SELECT * FROM `dungluong_sanpham` WHERE 1";
                if($keyword != ""){
                    $sql.=" and ten_dungluong like '%".$keyword."%'";
                }
                if($ma_sp > 0){
                    $sql.=" and ma_sanpham ='".$ma_sp."%'";
                }
                $stmt = $this->dungluong->query($sql);
                $data = $stmt -> fetchAll();
                return $data;
            }
            catch (Exception $e) {
                $e->getMessage();
            }
        }
        public function listDL(){
            try{
                $sql = "SELECT * FROM `dungluong_sanpham`";
                $stmt = $this->dungluong->query($sql);
                $data = $stmt -> fetchAll();
                return $data;
            }
            catch (Exception $e) {
                $e->getMessage();
            }
        }
        public function deleteDungluong($id_dungluong){
            try{
                $sql = "DELETE FROM dungluong_sanpham WHERE `dungluong_sanpham`.`id_dungluong` = {$id_dungluong}";
                $this->dungluong->exec($sql);
            }
            catch (Exception $e) {
                $e->getMessage();
            }
        }
        public function createDungluong($ten_dungluong,$id_sp){
            try{
                $sql = "INSERT INTO `dungluong_sanpham` (`ten_dungluong`, `ma_sanpham`) VALUES ('$ten_dungluong', '$id_sp')";
                $this->dungluong->query($sql);
            }
            catch (Exception $e) {
                $e->getMessage();
            }
        }
        public function find($id_dungluong){
            try{
                $sql = "SELECT * FROM `dungluong_sanpham` WHERE `dungluong_sanpham`.`id_dungluong` = {$id_dungluong}";
                $stmt = $this->dungluong->query($sql);
                $data = $stmt -> fetch();
                return $data;
            }
            catch (Exception $e) {
                $e->getMessage();
            }
        }
        public function updateDungluong($id_dungluong,$ten_dungluong,$id_sp){
            try{
                $sql = "UPDATE `dungluong_sanpham` SET `ten_dungluong` = '$ten_dungluong', `ma_sanpham` = '$id_sp' WHERE `dungluong_sanpham`.`id_dungluong` = {$id_dungluong}";
                $this->dungluong->exec($sql);
            }
            catch (Exception $e) {
                $e->getMessage();
            }
        }
        public function getByNameDungluong($id_dungluong){
            try{
                $sql = "SELECT ten_dungluong FROM dungluong_sanpham WHERE id_dungluong = {$id_dungluong}";
                $stmt = $this->dungluong->query($sql);
                $data = $stmt -> fetch();
                return $data;
            }
            catch (Exception $e) {
                $e->getMessage();
            }
        }
        public function __destruct(){
            $this->dungluong = null;
        }
    }
?>