<?php
    class Product{//CHƯA KIỂM TRA
        private $conn;
        

        public $id;
        public $sellerid;
        public $name;
        public $type;
        public $quantity;
        public $price;
        public $description;
        public $image1;
        public $image2;
        public $image3;


        public function __construct($db){
            $this->conn = $db;
        }
        public function read(){
            $sql = "SELECT * FROM product ORDER BY id";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        public function readsellerid(){
            $sql = "SELECT * FROM product where sellerid=?";         
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->bindParam(1,$this->sellerid);
            $stmt->execute();
            return $stmt;
        }
        public function readfind($input){
            $sql = "SELECT * FROM product
            where name like '%$input%'
            or type like '%$input%'
            ORDER BY id";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        public function readtype(){
            $sql = "SELECT * FROM product WHERE product.type=? ORDER BY id";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->bindParam(1,$this->type);
            $stmt->execute();
            return $stmt;
        }
        public function readselleridtype(){
            $sql = "SELECT * FROM product where sellerid=:sellerid and type=:type order by id";         
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->bindParam(":type",$this->type);
            $stmt->bindParam(':sellerid',$this->sellerid);
            $stmt->execute();
            return $stmt;
        }
        public function show(){
            $sql = "SELECT * FROM product where product.id=?";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->bindParam(1,$this->id);
            $stmt->execute();
            if($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $this->id = $row['id'];
                $this->sellerid = $row['sellerid'];
                $this->name = $row['name'];
                $this->type = $row['type'];
                $this->quantity = $row['quantity'];
                $this->price = $row['price'];
                $this->description = $row['description'];
                $this->image1 = $row['image1'];
                $this->image2 = $row['image2'];
                $this->image3 = $row['image3'];
                return $row;
            }
            return $stmt;
        }
        public function create(){//Chưa kiểm tra hàm này
            $sql = "INSERT INTO product 
            SET id=:id,type=:type,quantity=:quantity,price=:price,name=:name, sellerid=:sellerid,
            description=:description,image1=:image1,image2=:image2,image3=:image3";
            $stmt = $this->conn->conn->prepare($sql);

            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->sellerid = htmlspecialchars(strip_tags($this->sellerid));
            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->type = htmlspecialchars(strip_tags($this->type));
            $this->quantity = htmlspecialchars(strip_tags($this->quantity));
            $this->price = htmlspecialchars(strip_tags($this->price));
            $this->description = htmlspecialchars(strip_tags($this->description));
            $this->image1 = htmlspecialchars(strip_tags($this->image1));
            $this->image2 = htmlspecialchars(strip_tags($this->image2));
            $this->image3 = htmlspecialchars(strip_tags($this->image3));

            $stmt->bindParam(':id',$this->id);
            $stmt->bindParam(':sellerid',$this->sellerid);
            $stmt->bindParam(':name',$this->name);
            $stmt->bindParam(':type',$this->type);
            $stmt->bindParam(':quantity',$this->quantity);
            $stmt->bindParam(':price',$this->price);
            $stmt->bindParam(':description',$this->description);
            $stmt->bindParam(':image1',$this->image1);
            $stmt->bindParam(':image2',$this->image2);
            $stmt->bindParam(':image3',$this->image3);
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
        public function update(){//Chưa kiểm tra hàm này
            $sql = "UPDATE product SET type=:type,quantity=:quantity,price=:price,name=:name, sellerid=:sellerid,
            description=:description,image1=:image1,image2=:image2,image3=:image3
            WHERE id=:id";
            $stmt = $this->conn->conn->prepare($sql);

            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->sellerid = htmlspecialchars(strip_tags($this->sellerid));
            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->type = htmlspecialchars(strip_tags($this->type));
            $this->quantity = htmlspecialchars(strip_tags($this->quantity));
            $this->price = htmlspecialchars(strip_tags($this->price));
            $this->description = htmlspecialchars(strip_tags($this->description));
            $this->image1 = htmlspecialchars(strip_tags($this->image1));
            $this->image2 = htmlspecialchars(strip_tags($this->image2));
            $this->image3 = htmlspecialchars(strip_tags($this->image3));

            $stmt->bindParam(':id',$this->id);
            $stmt->bindParam(':sellerid',$this->sellerid);
            $stmt->bindParam(':name',$this->name);
            $stmt->bindParam(':type',$this->type);
            $stmt->bindParam(':quantity',$this->quantity);
            $stmt->bindParam(':price',$this->price);
            $stmt->bindParam(':description',$this->description);
            $stmt->bindParam(':image1',$this->image1);
            $stmt->bindParam(':image2',$this->image2);
            $stmt->bindParam(':image3',$this->image3);
            
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
        public function delete(){//Chưa kiểm tra hàm này
            $sql = "DELETE FROM product WHERE id=:id";
            $stmt = $this->conn->conn->prepare($sql);
            $this->id = htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(':id',$this->id);
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
    }
?>