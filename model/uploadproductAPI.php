<?php
    class uploadproduct{//CHƯA KIỂM TRA
        private $conn;
        

        public $id;
        public $uid;
        public $pType;
        public $quantity;
        


        public function __construct($db){
            $this->conn = $db;
        }
        public function read(){
            $sql = "SELECT * FROM uploadproduct ORDER BY id";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        public function show(){
            $sql = "SELECT * FROM uploadproduct where uploadproduct.id=?";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->bindParam(1,$this->id);
            $stmt->execute();
            if($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $this->id = $row['id'];
                $this->uid = $row['uid'];
                $this->pType = $row['pType'];
                $this->quantity = $row['quantity'];
            }
            return false;
        }
        public function create(){//Chưa kiểm tra hàm này
            $sql = "INSERT INTO uploadproduct SET id=:id,uid=:uid,pType=:pType,quantity=:quantity";
            $stmt = $this->conn->conn->prepare($sql);
            $this->id = htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(':id',$this->id);
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
        public function update(){//Chưa kiểm tra hàm này
            $sql = "UPDATE uploadproduct SET uid=:uid,pType=:pType,quantity=:quantity
            WHERE id=:id";
            $stmt = $this->conn->conn->prepare($sql);

            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->uid = htmlspecialchars(strip_tags($this->uid));
            $this->pType = htmlspecialchars(strip_tags($this->pType));
            $this->quantity = htmlspecialchars(strip_tags($this->quantity));

            $stmt->bindParam(':id',$this->id);
            $stmt->bindParam(':uid',$this->uid);
            $stmt->bindParam(':pType',$this->pType);
            $stmt->bindParam(':quantity',$this->quantity);
            
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
        public function delete(){//Chưa kiểm tra hàm này
            $sql = "DELETE FROM uploadproduct WHERE id=:id";
            $stmt = $this->conn->conn->prepare($sql);
            $this->id = htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(':id',$this->id);
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
    }
?>