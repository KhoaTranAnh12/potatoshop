<?php
    class Article{//CHƯA KIỂM TRA
        private $conn;
        

        public $id;
        public $writerid;
        public $title;
        public $image;
        public $content;
        


        public function __construct($db){
            $this->conn = $db;
        }
        public function read(){
            $sql = "SELECT * FROM articles ORDER BY id";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        public function readLast10(){
            $sql = "SELECT * FROM articles ORDER BY id DESC limit 4";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        public function readwriter(){
            $sql = "SELECT * FROM articles where writerid=?";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->bindParam(1,$this->writerid);
            $stmt->execute();
            return $stmt;
        }
        public function readfind($input){
            $sql = "SELECT * FROM articles
            where title like '%$input%'
            or content like '%$input%'
            ORDER BY id";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        public function show(){
            $sql = "SELECT * FROM articles WHERE id=?";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->bindParam(1,$this->id);
            $stmt->execute();
            if($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $this->id = $row['id'];
                $this->title = $row['title'];
                $this->writerid = $row['writerid'];
                $this->image = $row['image'];
                $this->content = $row['content'];
                return $row;
            }
            return false;
        }
        public function create(){//Chưa kiểm tra hàm này
            $sql = "INSERT INTO articles SET id=:id,writerid=:writerid,title=:title,image=:image,content=:content";
            $stmt = $this->conn->conn->prepare($sql);

            
            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->writerid = htmlspecialchars(strip_tags($this->writerid));
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->image = htmlspecialchars(strip_tags($this->image));
            $this->content = htmlspecialchars(strip_tags($this->content));
            

            $stmt->bindParam(':id',$this->id);
            $stmt->bindParam(':writerid',$this->writerid);
            $stmt->bindParam(':title',$this->title);
            $stmt->bindParam(':image',$this->image);
            $stmt->bindParam(':content',$this->content);

            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
        public function update(){//Chưa kiểm tra hàm này
            $sql = "UPDATE articles SET title=:title,writerid=:writerid,image=:image,content=:content
            WHERE id=:id";
            $stmt = $this->conn->conn->prepare($sql);

            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->writerid = htmlspecialchars(strip_tags($this->writerid));
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->image = htmlspecialchars(strip_tags($this->image));
            $this->content = htmlspecialchars(strip_tags($this->content));
            

            $stmt->bindParam(':id',$this->id);
            $stmt->bindParam(':writerid',$this->writerid);
            $stmt->bindParam(':title',$this->title);
            $stmt->bindParam(':image',$this->image);
            $stmt->bindParam(':content',$this->content);


            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
        public function delete(){//Chưa kiểm tra hàm này
            $sql = "DELETE FROM articles WHERE id=:id";
            $stmt = $this->conn->conn->prepare($sql);
            $this->id = htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(':id',$this->id);
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
    }
?>