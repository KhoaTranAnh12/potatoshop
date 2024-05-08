<?php
    class Buyer{//CHƯA KIỂM TRA
        private $conn;
        

        public $id;
        public $username;
        public $nShopcartItems;
        public $nTransactions;
        


        public function __construct($db){
            $this->conn = $db;
        }
        public function read(){
            $sql = "SELECT * FROM buyer ORDER BY id";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        public function show(){
            $sql = "SELECT buyer.id,customer.username,buyer FROM buyer inner join customer where buyer.id=customer.id and buyer.id=?";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->bindParam(1,$this->id);
            $stmt->execute();
            if($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $this->id = $row['id'];
                $this->username = $row['username'];
                $this->nTransactions = $row['nTransactions'];
                $this->nShopcartItems = $row['nShopcartItems'];
            }
            return false;
        }
        public function create(){//Chưa kiểm tra hàm này
            $sql = "INSERT INTO buyer SET id=:id";
            $stmt = $this->conn->conn->prepare($sql);
            $this->id = htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(':id',$this->id);
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
        public function update(){//Chưa kiểm tra hàm này
            $sql = "UPDATE buyer SET nTransactions=:nTransactions,nShopcartItems=:nShopcartItems
            WHERE id=:id";
            $stmt = $this->conn->conn->prepare($sql);

            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->nTransactions = htmlspecialchars(strip_tags($this->nTransactions));
            $this->nShopcartItems = htmlspecialchars(strip_tags($this->nShopcartItems));

            $stmt->bindParam(':id',$this->id);
            $stmt->bindParam(':nTransactions',$this->nTransactions);
            $stmt->bindParam(':nShopcartItems',$this->nShopcartItems);
            
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
        public function delete(){//Chưa kiểm tra hàm này
            $sql = "DELETE FROM buyer WHERE id=:id";
            $stmt = $this->conn->conn->prepare($sql);
            $this->id = htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(':id',$this->id);
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
    }
?>