<?php
    class Notifications{//CHƯA KIỂM TRA
        private $conn;
        

        public $id;
        public $senderid;
        public $receiverid;
        public $sender;
        public $receiver;
        public $content;


        public function __construct($db){
            $this->conn = $db;
        }
        public function read(){
            $sql = "SELECT * FROM notifications ORDER BY id";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        public function show(){
            $sql = "SELECT notifications.id,b.username as sender,c.username as receiver,notifications.content 
            FROM notifications 
            inner join customer as b 
            inner join customer as c 
            where notifications.senderid=b.id 
            and notifications.receiverid=c.id 
            and notifications.id=?";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->bindParam(1,$this->id);
            $stmt->execute();
            if($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $this->id = $row['id'];
                $this->sender = $row['sender'];
                $this->receiver = $row['receiver'];
                $this->content = $row['content'];
            }
            return false;
        }
        public function create(){//Chưa kiểm tra hàm này
            $sql = "INSERT INTO notifications SET id=:id,senderid=:senderid,receiverid=:receiverid,content=:content";
            $stmt = $this->conn->conn->prepare($sql);

            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->senderid = htmlspecialchars(strip_tags($this->senderid));
            $this->receiverid = htmlspecialchars(strip_tags($this->receiverid));
            $this->content = htmlspecialchars(strip_tags($this->content));
            

            $stmt->bindParam(':id',$this->id);
            $stmt->bindParam(':senderid',$this->senderid);
            $stmt->bindParam(':receiverid',$this->receiverid);
            $stmt->bindParam(':content',$this->content);
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
        public function update(){//Chưa kiểm tra hàm này
            $sql = "UPDATE notifications SET senderid=:senderid,receiverid=:receiverid,content=:content
            WHERE id=:id";
            $stmt = $this->conn->conn->prepare($sql);

            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->senderid = htmlspecialchars(strip_tags($this->senderid));
            $this->receiverid = htmlspecialchars(strip_tags($this->receiverid));
            $this->content = htmlspecialchars(strip_tags($this->content));
            

            $stmt->bindParam(':id',$this->id);
            $stmt->bindParam(':senderid',$this->senderid);
            $stmt->bindParam(':receiverid',$this->receiverid);
            $stmt->bindParam(':content',$this->content);

            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
        public function delete(){//Chưa kiểm tra hàm này
            $sql = "DELETE FROM notifications WHERE id=:id";
            $stmt = $this->conn->conn->prepare($sql);
            $this->id = htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(':id',$this->id);
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
    }
?>