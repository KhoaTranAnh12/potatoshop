<?php
    class News{//CHƯA KIỂM TRA
        private $conn;
        

        public $id;
        public $url;
        public $image;
        public $secondaryimage;
        public $uploaderid;
        public $username;


        public function __construct($db){
            $this->conn = $db;
        }
        public function read(){
            $sql = "SELECT * FROM news ORDER BY id";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        public function find($input){
            $sql = "SELECT * FROM news
            where url like '%$input%'
            ORDER BY id";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        public function show(){
            $sql = "SELECT news.id,news.uploaderid,customer.username,news.image,news.secondaryimage,news.url
            FROM news inner join customer where news.uploaderid=customer.id and news.id=?";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->bindParam(1,$this->id);
            $stmt->execute();
            if($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $this->id = $row['id'];
                $this->uploaderid = $row['uploaderid'];
                $this->url = $row['url'];
                $this->image = $row['image'];
                $this->secondaryimage = $row['secondaryimage'];
                $this->username = $row['username'];
                return $row;
            }
            return false;
        }
        public function create(){//Chưa kiểm tra hàm này
            $sql = "INSERT INTO news SET id=:id,url=:url,image=:image,secondaryimage=:secondaryimage,uploaderid=:uploaderid";
            $stmt = $this->conn->conn->prepare($sql);

            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->url = htmlspecialchars(strip_tags($this->url));
            $this->image = htmlspecialchars(strip_tags($this->image));
            $this->secondaryimage = htmlspecialchars(strip_tags($this->secondaryimage));
            $this->uploaderid = htmlspecialchars(strip_tags($this->uploaderid));
            

            $stmt->bindParam(':id',$this->id);
            $stmt->bindParam(':url',$this->url);
            $stmt->bindParam(':image',$this->image);
            $stmt->bindParam(':secondaryimage',$this->secondaryimage);
            $stmt->bindParam(':uploaderid',$this->uploaderid);
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
        public function update(){//Chưa kiểm tra hàm này
            $sql = "UPDATE news SET url=:url,image=:image,secondaryimage=:secondaryimage,uploaderid=:uploaderid
            WHERE id=:id";
            $stmt = $this->conn->conn->prepare($sql);

            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->url = htmlspecialchars(strip_tags($this->url));
            $this->image = htmlspecialchars(strip_tags($this->image));
            $this->secondaryimage = htmlspecialchars(strip_tags($this->secondaryimage));
            $this->uploaderid = htmlspecialchars(strip_tags($this->uploaderid));
            

            $stmt->bindParam(':id',$this->id);
            $stmt->bindParam(':url',$this->url);
            $stmt->bindParam(':image',$this->image);
            $stmt->bindParam(':secondaryimage',$this->secondaryimage);
            $stmt->bindParam(':uploaderid',$this->uploaderid);

            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
        public function delete(){//Chưa kiểm tra hàm này
            $sql = "DELETE FROM news WHERE id=:id";
            $stmt = $this->conn->conn->prepare($sql);
            $this->id = htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(':id',$this->id);
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
    }
?>