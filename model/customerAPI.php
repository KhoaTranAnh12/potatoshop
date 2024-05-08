<?php
    class Customer{
        private $conn;
        

        public $id;
        public $username;
        public $password;
        public $fName;
        public $lName;
        public $phoneNum;
        public $email;
        public $nComments;
        public $buyerFlag;
        public $sellerFlag;
        public $money;
        public $avatar;
        


        public function __construct($db){
            $this->conn = $db;
        }
        public function read(){
            $sql = "SELECT * FROM customer ORDER BY id";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        public function show(){
            $sql = "SELECT * FROM customer WHERE username=?";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->bindParam(1,$this->username);
            $stmt->execute();
            if($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $this->id = $row['id'];
                $this->username = $row['username'];
                $this->password = $row['password'];
                $this->fName = $row['fName'];
                $this->lName = $row['lName'];
                $this->email = $row['email'];
                $this->phoneNum = $row['phoneNum'];
                $this->nComments = $row['nComments'];
                $this->buyerFlag = $row['buyerFlag'];
                $this->sellerFlag = $row['sellerFlag']; 
                $this->money = $row['money'];
                $this->avatar = $row['avatar'];
                return true;
            }
            return false;
        }
        public function showid(){
            $sql = "SELECT * FROM customer WHERE id=?";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->bindParam(1,$this->id);
            $stmt->execute();
            if($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $this->id = $row['id'];
                $this->username = $row['username'];
                $this->password = $row['password'];
                $this->fName = $row['fName'];
                $this->lName = $row['lName'];
                $this->email = $row['email'];
                $this->phoneNum = $row['phoneNum'];
                $this->nComments = $row['nComments'];
                $this->buyerFlag = $row['buyerFlag'];
                $this->sellerFlag = $row['sellerFlag']; 
                $this->money = $row['money'];
                $this->avatar = $row['avatar'];
                return $row;
            }
            return [];
        }
        public function readfind($input){
            $sql = "SELECT * FROM customer 
            where username like '%$input%'
            or fName like '%$input%'
            or lName like '%$input%'
            ORDER BY id";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        public function create(){//Chưa kiểm tra hàm này
            $sql = "INSERT INTO customer SET id=:id,username=:username,password=:password,fName=:fName,
            lName=:lName,email=:email,phoneNum=:phoneNum,nComments=:nComments,
            buyerFlag=:buyerFlag,sellerFlag=:sellerFlag,money=:money,avatar=:avatar";
            $stmt = $this->conn->conn->prepare($sql);

            
            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->username = htmlspecialchars(strip_tags($this->username));
            $this->password = htmlspecialchars(strip_tags($this->password));
            $this->fName = htmlspecialchars(strip_tags($this->fName));
            $this->lName = htmlspecialchars(strip_tags($this->lName));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->phoneNum = htmlspecialchars(strip_tags($this->phoneNum));
            $this->nComments = htmlspecialchars(strip_tags($this->nComments));
            $this->buyerFlag = htmlspecialchars(strip_tags($this->buyerFlag));
            $this->sellerFlag = htmlspecialchars(strip_tags($this->sellerFlag));
            $this->money = htmlspecialchars(strip_tags($this->money));
            $this->avatar = htmlspecialchars(strip_tags($this->avatar));

            $stmt->bindParam(':id',$this->id);
            $stmt->bindParam(':username',$this->username);
            $stmt->bindParam(':password',$this->password);
            $stmt->bindParam(':fName',$this->fName);
            $stmt->bindParam(':lName',$this->lName);
            $stmt->bindParam(':email',$this->email);
            $stmt->bindParam(':phoneNum',$this->phoneNum);
            $stmt->bindParam(':nComments',$this->nComments);
            $stmt->bindParam(':buyerFlag',$this->buyerFlag);
            $stmt->bindParam(':sellerFlag',$this->sellerFlag);
            $stmt->bindParam(':money',$this->money);
            $stmt->bindParam(':avatar',$this->avatar);

            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
        public function update(){//Chưa kiểm tra hàm này
            $sql = "UPDATE customer SET username=:username,password=:password,fName=:fName,
            lName=:lName,email=:email,nComments=:nComments,phoneNum=:phoneNum,
            buyerFlag=:buyerFlag,sellerFlag=:sellerFlag,money=:money,avatar=:avatar
            WHERE id=:id";
            $stmt = $this->conn->conn->prepare($sql);
            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->username = htmlspecialchars(strip_tags($this->username));
            $this->password = htmlspecialchars(strip_tags($this->password));
            $this->fName = htmlspecialchars(strip_tags($this->fName));
            $this->lName = htmlspecialchars(strip_tags($this->lName));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->phoneNum = htmlspecialchars(strip_tags($this->phoneNum));
            $this->nComments = htmlspecialchars(strip_tags($this->nComments));
            $this->buyerFlag = htmlspecialchars(strip_tags($this->buyerFlag));
            $this->sellerFlag = htmlspecialchars(strip_tags($this->sellerFlag));
            $this->money = htmlspecialchars(strip_tags($this->money));
            $this->avatar = htmlspecialchars(strip_tags($this->avatar));

            $stmt->bindParam(':id',$this->id);
            $stmt->bindParam(':username',$this->username);
            $stmt->bindParam(':password',$this->password);
            $stmt->bindParam(':fName',$this->fName);
            $stmt->bindParam(':lName',$this->lName);
            $stmt->bindParam(':email',$this->email);
            $stmt->bindParam(':phoneNum',$this->phoneNum);
            $stmt->bindParam(':nComments',$this->nComments);
            $stmt->bindParam(':buyerFlag',$this->buyerFlag);
            $stmt->bindParam(':sellerFlag',$this->sellerFlag);
            $stmt->bindParam(':money',$this->money);
            $stmt->bindParam(':avatar',$this->avatar);

            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
        public function delete(){//Chưa kiểm tra hàm này
            $sql = "DELETE FROM customer WHERE id=:id";
            $stmt = $this->conn->conn->prepare($sql);
            $this->id = htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(':id',$this->id);
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
    }
?>