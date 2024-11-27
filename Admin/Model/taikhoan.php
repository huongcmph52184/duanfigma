<?php
    class Taikhoan{
        public $taikhoan;
        public function __construct(){
            $this->taikhoan = connect_db();
        }
        public function all_taikhoan(){
            try{
                $sql = "SELECT * FROM `users`";
                $stmt= $this->taikhoan->query($sql);
                $data= $stmt->fetchAll();
                return $data; 
            }
            catch (Exception $e){
                $e->getMessage();
            }
        }
        
            public function delete_tk($id){
            try{
                $sql = "DELETE FROM users WHERE `users`.`id_taikhoan` = {$id}";
                $this->taikhoan->query($sql);
            }
            catch (Exception $e){
                $e->getMessage();
            }
        }
        public function Dangky($ten_nguoidung,$matkhau,$avatar,$Sdt,$Diachi_lienhe,$email){
            try{
                $sql = "INSERT INTO `users` (`username`, `password`, `Avartar`,`Sdt`,`Diachi_lienhe`,`Email`) VALUES ('$ten_nguoidung', '$matkhau','$avatar', '$Sdt', '$Diachi_lienhe',  '$email')";
                $this->taikhoan->exec($sql);
            }
            catch (Exception $e){
                $e->getMessage();
            }
        }
        public function checksUser($ten_nguoidung,$matkhau){
            try{
                $sql = "SELECT * FROM `users` WHERE `username`= '$ten_nguoidung' AND `password` = '$matkhau'";
                $stmt = $this->taikhoan->query($sql);
                $data=$stmt->fetch();
                return $data;
            }
            catch (Exception $e){
                $e->getMessage();
            }
        }
        public function find($id_taikhoan){
            try{
                $sql = "SELECT * FROM `users` WHERE `user`.`id_taikhoan` = {$id_taikhoan}";
                $stmt = $this->taikhoan->query($sql);
                $data=$stmt->fetch();
                return $data;
            }
            catch (Exception $e){
                $e->getMessage();
            }
        }
        public function updateUser($id_taikhoan,$username,$password,$avatar,$sdt,$address,$email){
            try{
                $sql = "UPDATE `users` SET `username` = '$username', `password` = '$password', `Avartar` = '$avatar', `Sdt` = '$sdt', `Diachi_lienhe` = '$address', `Email` = '$email' WHERE `users`.`id_taikhoan` = {$id_taikhoan}";
                $stmt = $this->taikhoan->query($sql);
            }
            catch (Exception $e){
                $e->getMessage();
            }
        }
        public function __destruct(){
            $this->taikhoan=null;
        }
    }
?>