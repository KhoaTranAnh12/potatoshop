<?php
    class ProductType{//CHƯA KIỂM TRA
        private $conn;
        

        public $name;
        public $image;
        public $numProducts;


        public function __construct($db){
            $this->conn = $db;
        }
        public function read(){
            $sql = "SELECT * FROM producttype ORDER BY name";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        public function show(){
            $sql = "SELECT * FROM producttype where producttype.name=?";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->bindParam(1,$this->name);
            $stmt->execute();
            if($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $this->name = $row['name'];
                $this->image = $row['image'];
                $this->numProducts = $row['numProducts'];
            }
            return false;
        }
        public function create(){//Chưa kiểm tra hàm này
            $sql = "INSERT INTO producttype 
            SET name=:name,numProducts=:numProducts,image=:image";
            $stmt = $this->conn->conn->prepare($sql);

            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->image = htmlspecialchars(strip_tags($this->image));
            $this->numProducts = htmlspecialchars(strip_tags($this->numProducts));

            $stmt->bindParam(':name',$this->name);
            $stmt->bindParam(':image',$this->image);
            $stmt->bindParam(':numProducts',$this->numProducts);
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
        public function update(){//Chưa kiểm tra hàm này
            $sql = "UPDATE producttype SET numProducts=:numProducts,image=:image
            WHERE name=:name";
            $stmt = $this->conn->conn->prepare($sql);

            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->image = htmlspecialchars(strip_tags($this->image));
            $this->numProducts = htmlspecialchars(strip_tags($this->numProducts));

            $stmt->bindParam(':name',$this->name);
            $stmt->bindParam(':image',$this->image);
            $stmt->bindParam(':numProducts',$this->numProducts);
            
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
        public function delete(){//Chưa kiểm tra hàm này
            $sql = "DELETE FROM producttype WHERE name=:name";
            $stmt = $this->conn->conn->prepare($sql);
            $this->name = htmlspecialchars(strip_tags($this->name));
            $stmt->bindParam(':name',$this->name);
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
    }
?>