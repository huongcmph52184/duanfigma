<?php
    class Subcategory{
        public $danhmucCon;
        public function __construct(){
            $this->danhmucCon = connect_db();
        }
        public function listDanhmucCon($keyword, $ma_danhmuc_me, $limit, $start) {
            try {
                $sql = "SELECT * FROM `danhmuc_con` WHERE 1";
                if ($keyword != "") {
                    $sql .= " AND ten_danhmuc_con LIKE '%" .$keyword. "%'";
                }
                if ($ma_danhmuc_me > 0) {
                    $sql .= " AND ma_danhmuc_me = '".$ma_danhmuc_me."%'";
                }
                $sql .= " LIMIT " . ($start) . ", " . ($limit);
        
                $stmt = $this->danhmucCon->query($sql);
                $data = $stmt->fetchAll();
        
                // Count total records for pagination
                $totalQuery = "SELECT COUNT(*) AS total FROM `danhmuc_con` WHERE 1";
                if ($keyword != "") {
                    $totalQuery .= " AND ten_danhmuc_con LIKE '%".$keyword. "%'";
                }
                if ($ma_danhmuc_me > 0) {
                    $totalQuery .= " AND ma_danhmuc_me = '".$ma_danhmuc_me."'";
                }
        
                $totalResult = $this->danhmucCon->query($totalQuery);
                $totalRecords = $totalResult->fetch()['total'];
                $totalPages = ceil($totalRecords / $limit);
        
                return [
                    'data' => $data,
                    'totalPages' => $totalPages
                ];
            } catch (Exception $e) {
                $e->getMessage();
            }
        }        
        public function deteleDanhmucCon($iddm_con){
            try{
                $sql = "DELETE FROM danhmuc_con WHERE `danhmuc_con`.`id_danhmuc_con` = {$iddm_con}";
                $this->danhmucCon->exec($sql);
            }
            catch (Exception $e){
                $e -> getMessage();
            }
        }
        public function createDanhmucCon($ten_danhmuc_con,$anhDanhmucCon,$ma_danhmuc_me){
            try{
                $sql = "INSERT INTO `danhmuc_con` (`ten_danhmuc_con`, `anh_danhmuc_con`, `ma_danhmuc_me`) VALUES ('$ten_danhmuc_con', '$anhDanhmucCon', '$ma_danhmuc_me')";
                $this->danhmucCon->exec($sql);
            }
            catch (Exception $e){
                $e -> getMessage();
            }
        }
        public function listDMC(){
            try{
                $sql = "SELECT * FROM `danhmuc_con`";
                $stmt = $this->danhmucCon->query($sql);
                $data = $stmt -> fetchAll();
                return $data;
            }
            catch (Exception $e){
                $e -> getMessage();
            }
        }
        public function listNav($danhmuc_me){
            try{
                $sql = "SELECT * FROM `danhmuc_con` WHERE `ma_danhmuc_me` = {$danhmuc_me}";
                $stmt = $this->danhmucCon->query($sql);
                $data = $stmt -> fetchAll();
                return $data;
            }
            catch (Exception $e){
                $e -> getMessage();
            }
        }
        public function updateDanhmuccon($iddm_con,$tenDanhmucCon,$anhDanhmucCon,$ma_danhmuc_me){
            try{
                $sql = "UPDATE `danhmuc_con` SET `ten_danhmuc_con` = '$tenDanhmucCon', `anh_danhmuc_con` = '$anhDanhmucCon', `ma_danhmuc_me` = '$ma_danhmuc_me' WHERE `danhmuc_con`.`id_danhmuc_con` = {$iddm_con}";
                $this->danhmucCon->exec($sql);
            }
            catch (Exception $e){
                $e -> getMessage();
            }
        }
        public function find($iddm_con){
            try{
                $sql = "SELECT * FROM `danhmuc_con` WHERE `danhmuc_con`.`id_danhmuc_con` = {$iddm_con}";
                $stmt = $this->danhmucCon->query($sql);
                $data = $stmt->fetch();
                return $data;
            }
            catch (Exception $e){
                $e -> getMessage();
            }
        }
        public function getByNameDanhmucCon($id_danhmuc_con){
            try{
                $sql = "SELECT ten_danhmuc_con FROM danhmuc_con WHERE id_danhmuc_con = {$id_danhmuc_con}";
                $stmt = $this->danhmucCon->query($sql);
                $data = $stmt -> fetch();
                return $data;
            }
            catch (Exception $e){
                $e -> getMessage();
            }
        }
        public function __destruct(){
            $this->danhmucCon = null;
        }
    }
?>