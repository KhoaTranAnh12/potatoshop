<?php
    class Admin{
        private $conn;
        

        public $id;
        public $username;
        


        public function __construct($db){
            $this->conn = $db;
        }
        public function read(){
            $sql = "SELECT * FROM admin ORDER BY id";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        public function show(){
            $sql = "SELECT admin.id,customer.username FROM admin inner join customer where admin.id=customer.id and admin.id=?";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->bindParam(1,$this->id);
            $stmt->execute();
            if($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $this->id = $row['id'];
                $this->username = $row['username'];
                return $stmt;
            }
            return false;
        }
        public function create(){//Chưa kiểm tra hàm này
            $sql = "INSERT INTO admin SET id=:id";
            $stmt = $this->conn->conn->prepare($sql);
            $this->id = htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(':id',$this->id);
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
        public function delete(){//Chưa kiểm tra hàm này
            $sql = "DELETE FROM admin WHERE id=:id";
            $stmt = $this->conn->conn->prepare($sql);
            $this->id = htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(':id',$this->id);
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
    }
?>