<?php
    class BuyProduct{//CHƯA KIỂM TRA
        private $conn;
        

        public $id;
        public $uid;
        public $username;
        public $productid;
        public $pType;
        public $quantity;


        public function __construct($db){
            $this->conn = $db;
        }
        public function read(){
            $sql = "SELECT * FROM buyproduct ORDER BY id";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        public function readuid(){
            $sql = "SELECT * FROM buyproduct where uid=? order by id";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->bindParam(1,$this->uid);
            $stmt->execute();
            return $stmt;
        }
        public function show(){
            $sql = "SELECT buyproduct.id,buyproduct.productid,customer.username,buyproduct.pType,buyproduct.quantity
            FROM buyproduct inner join customer where buyproduct.uid=customer.id and buyproduct.id=?";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->bindParam(1,$this->id);
            $stmt->execute();
            if($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $this->id = $row['id'];
                $this->productid = $row['productid'];
                $this->username = $row['username'];
                $this->pType = $row['pType'];
                $this->quantity = $row['quantity'];
            }
            return false;
        }
        public function create(){//Chưa kiểm tra hàm này
            $sql = "INSERT INTO buyproduct SET id=:id,productid=:productid,uid=:uid,pType=:pType,quantity=:quantity";
            $stmt = $this->conn->conn->prepare($sql);

            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->productid = htmlspecialchars(strip_tags($this->productid));
            $this->uid = htmlspecialchars(strip_tags($this->uid));
            $this->pType = htmlspecialchars(strip_tags($this->pType));
            $this->quantity = htmlspecialchars(strip_tags($this->quantity));
            

            $stmt->bindParam(':id',$this->id);
            $stmt->bindParam(':productid',$this->productid);
            $stmt->bindParam(':uid',$this->uid);
            $stmt->bindParam(':pType',$this->pType);
            $stmt->bindParam(':quantity',$this->quantity);
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
        public function update(){//Chưa kiểm tra hàm này
            $sql = "UPDATE buyproduct SET uid=:uid,productid=:productid,pType=:pType,quantity=:quantity
            WHERE id=:id";
            $stmt = $this->conn->conn->prepare($sql);

            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->productid = htmlspecialchars(strip_tags($this->productid));
            $this->uid = htmlspecialchars(strip_tags($this->uid));
            $this->pType = htmlspecialchars(strip_tags($this->pType));
            $this->quantity = htmlspecialchars(strip_tags($this->quantity));

            $stmt->bindParam(':id',$this->id);
            $stmt->bindParam(':productid',$this->productid);
            $stmt->bindParam(':uid',$this->uid);
            $stmt->bindParam(':pType',$this->pType);
            $stmt->bindParam(':quantity',$this->quantity);
            
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
        public function delete(){//Chưa kiểm tra hàm này
            $sql = "DELETE FROM buyproduct WHERE id=:id";
            $stmt = $this->conn->conn->prepare($sql);
            $this->id = htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(':id',$this->id);
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
    }
?>