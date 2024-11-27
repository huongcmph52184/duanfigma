<?php
    class ProductDetail{
        public $detail;
        public function __construct(){
            $this->detail = connect_db();
        }
        public function listDetail($ma_sp,$limit,$start){
            try{
                $sql = "SELECT * FROM `sanpham_chitiet` WHERE 1";
                if($ma_sp>0){
                    $sql.=" and id_sanpham ='".$ma_sp."%'";
                }
                $sql .= " LIMIT " . ($start) . ", " . ($limit);
                $stmt = $this->detail->query($sql);
                $data = $stmt -> fetchAll();

                $totalQuery = "SELECT COUNT(*) AS total FROM `sanpham_chitiet` WHERE 1";
                if ($ma_sp > 0) {
                    $totalQuery .= " and id_sanpham ='".$ma_sp."%'";
                }
        
                $totalResult = $this->detail->query($totalQuery);
                $totalRecords = $totalResult->fetch()['total'];
                $totalPages = ceil($totalRecords / $limit);
        
                return [
                    'data' => $data,
                    'totalPages' => $totalPages
                ];
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        public function deleteDetail($id_ctsp){
            try{
                $sql = "DELETE FROM sanpham_chitiet WHERE `sanpham_chitiet`.`id_sp_chitiet` = {$id_ctsp}";
                $this->detail->exec($sql);
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        public function createDetail($id_sp,$id_price,$id_mausp,$id_dungluongsp,$anhsp,$quantyti){
            try{
                $sql = "INSERT INTO `sanpham_chitiet` (`id_sanpham`, `id_price`, `id_mausp`, `id_dungluong_sp`, `image_url`, `soluong_hang`) VALUES ('$id_sp', '$id_price', '$id_mausp', '$id_dungluongsp', '$anhsp', '$quantyti')";
                $this->detail->exec($sql);
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        public function updateDetail($id_ctsp,$id_sp,$id_price,$id_mau,$id_dungluong,$anhsp,$quantyti){
            try{
                $sql = "UPDATE `sanpham_chitiet` SET `id_sanpham` = '{$id_sp}', `id_price` = '{$id_price}', `id_mausp` = '{$id_mau}', `id_dungluong_sp` = '{$id_dungluong}', `image_url` = '{$anhsp}', `soluong_hang` = '$quantyti' WHERE `sanpham_chitiet`.`id_sp_chitiet` = {$id_ctsp}";
                $this->detail->query($sql);
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        public function listClient(){
            try{
                $sql = "SELECT * FROM sanpham_chitiet WHERE id_sp_chitiet IN (SELECT MIN(id_sp_chitiet) FROM sanpham_chitiet GROUP BY id_sanpham) LIMIT 15";
                $stmt = $this->detail->query($sql);
                $data = $stmt->fetchAll();
                return $data;
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        public function find($id_spct){
            try{
                $sql = "SELECT * FROM `sanpham_chitiet` WHERE `sanpham_chitiet`.`id_sp_chitiet` = {$id_spct}";
                $stmt = $this->detail->query($sql);
                $data = $stmt -> fetch();
                return $data;
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
    }
?>