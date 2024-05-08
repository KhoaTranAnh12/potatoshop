<?php
    class Seller{//CHƯA KIỂM TRA
        private $conn;
        

        public $id;
        public $username;
        public $nProducts;
        public $nTransactions;
        


        public function __construct($db){
            $this->conn = $db;
        }
        public function read(){
            $sql = "SELECT * FROM seller ORDER BY id";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        public function show(){
            $sql = "SELECT seller.id,customer.username,seller FROM seller inner join customer where seller.id=customer.id and seller.id=?";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->bindParam(1,$this->id);
            $stmt->execute();
            if($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $this->id = $row['id'];
                $this->username = $row['username'];
                $this->nTransactions = $row['nTransactions'];
                $this->nProducts = $row['nProducts'];
            }
            return false;
        }
        public function create(){//Chưa kiểm tra hàm này
            $sql = "INSERT INTO seller SET id=:id";
            $stmt = $this->conn->conn->prepare($sql);
            $this->id = htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(':id',$this->id);
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
        public function update(){//Chưa kiểm tra hàm này
            $sql = "UPDATE seller SET nTransactions=:nTransactions,nProducts=:nProducts
            WHERE id=:id";
            $stmt = $this->conn->conn->prepare($sql);

            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->nTransactions = htmlspecialchars(strip_tags($this->nTransactions));
            $this->nProducts = htmlspecialchars(strip_tags($this->nProducts));

            $stmt->bindParam(':id',$this->id);
            $stmt->bindParam(':nTransactions',$this->nTransactions);
            $stmt->bindParam(':nProducts',$this->nProducts);
            
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
        public function delete(){//Chưa kiểm tra hàm này
            $sql = "DELETE FROM seller WHERE id=:id";
            $stmt = $this->conn->conn->prepare($sql);
            $this->id = htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(':id',$this->id);
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
    }
?>