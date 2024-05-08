<?php
    class Comment{//CHƯA KIỂM TRA
        private $conn;
        

        public $id;
        public $uid;
        public $username;
        public $content;
        public $articleid;
        public $commentid;
        public $newsid;
        public $productid;


        public function __construct($db){
            $this->conn = $db;
        }
        public function read(){
            $sql = "SELECT * FROM comment ORDER BY id";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        public function readfind($input){
            $sql = "SELECT * FROM comment
            inner join customer
            where comment.uid=customer.id
            and (customer.username like '%$input%'
            or comment.content like '%$input%')
            ORDER BY comment.id";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        public function readuid(){
            $sql = "SELECT * FROM comment where uid=? ORDER BY id";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->bindParam(1,$this->uid);
            $stmt->execute();
            return $stmt;
        }
        public function showarticle(){
            $sql = "SELECT comment.id,comment.uid,customer.username,comment.content,comment.articleid
            FROM comment inner join customer where comment.uid=customer.id and comment.articleid=?";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->bindParam(1,$this->articleid);
            $stmt->execute();
            return $stmt;
        }
        public function showcomment(){
            $sql = "SELECT comment.id,comment.uid,customer.username,comment.content,comment.commentid
            FROM comment inner join customer where comment.uid=customer.id and comment.commentid=?";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->bindParam(1,$this->commentid);
            $stmt->execute();
            return $stmt;
        }
        public function shownews(){
            $sql = "SELECT comment.id,comment.uid,customer.username,comment.content,comment.newsid
            FROM comment inner join customer where comment.uid=customer.id and comment.newsid=?";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->bindParam(1,$this->newsid);
            $stmt->execute();
            return $stmt;
        }
        public function showproduct(){
            $sql = "SELECT comment.id,comment.uid,customer.username,comment.content,comment.productid
            FROM comment inner join customer where comment.uid=customer.id and comment.productid=?";
            $stmt = $this->conn->conn->prepare($sql);
            $stmt->bindParam(1,$this->productid);
            $stmt->execute();
            return $stmt;
        }
        public function createcommentcomment(){//Chưa kiểm tra hàm này
            $this->commentid = htmlspecialchars(strip_tags($this->commentid));
            $this->uid = htmlspecialchars(strip_tags($this->uid));
            $this->content = htmlspecialchars(strip_tags($this->content));
            $sql = "insert into comment (commentid,uid,content) 
            values (".$this->commentid.",".$this->uid.",'".$this->content."');";
            $stmt = $this->conn->conn->prepare($sql);
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
        public function createproductcomment(){//Chưa kiểm tra hàm này
            $this->productid = htmlspecialchars(strip_tags($this->productid));
            $this->uid = htmlspecialchars(strip_tags($this->uid));
            $this->content = htmlspecialchars(strip_tags($this->content));
            $sql = "insert into comment (productid,uid,content) 
            values (".$this->productid.",".$this->uid.",'".$this->content."');";
            echo $sql;
            $stmt = $this->conn->conn->prepare($sql);
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
        public function createarticlecomment(){//Chưa kiểm tra hàm này
            $this->articleid = htmlspecialchars(strip_tags($this->articleid));
            $this->uid = htmlspecialchars(strip_tags($this->uid));
            $this->content = htmlspecialchars(strip_tags($this->content));
            $sql = "insert into comment (articleid,uid,content) 
            values (".$this->articleid.",".$this->uid.",'".$this->content."');";
            $stmt = $this->conn->conn->prepare($sql);
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
        public function createnewscomment(){//Chưa kiểm tra hàm này
            $this->newsid = htmlspecialchars(strip_tags($this->newsid));
            $this->uid = htmlspecialchars(strip_tags($this->uid));
            $this->content = htmlspecialchars(strip_tags($this->content));
            $sql = "insert into comment (newsid,uid,content) 
            values (".$this->newsid.",".$this->uid.",'".$this->content."');";
            $stmt = $this->conn->conn->prepare($sql);
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
        public function update(){//Chưa kiểm tra hàm này
            $sql = "UPDATE comment SET commentid=:commentid,articleid=:articleid,newsid=:newsid,
            productid=:productid,uid=:uid,content=:content
            WHERE id=:id";
            $stmt = $this->conn->conn->prepare($sql);

            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->commentid = htmlspecialchars(strip_tags($this->commentid));
            $this->articleid = htmlspecialchars(strip_tags($this->articleid));
            $this->newsid = htmlspecialchars(strip_tags($this->newsid));
            $this->productid = htmlspecialchars(strip_tags($this->productid));
            $this->uid = htmlspecialchars(strip_tags($this->uid));
            $this->content = htmlspecialchars(strip_tags($this->content));

            $stmt->bindParam(':id',$this->id);
            $stmt->bindParam(':commentid',$this->commentid);
            $stmt->bindParam(':articleid',$this->articleid);
            $stmt->bindParam(':newsid',$this->newsid);
            $stmt->bindParam(':productid',$this->productid);
            $stmt->bindParam(':uid',$this->uid);
            $stmt->bindParam(':content',$this->content);

            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
        public function delete(){//Chưa kiểm tra hàm này
            $sql = "DELETE FROM comment WHERE id=:id";
            $stmt = $this->conn->conn->prepare($sql);
            $this->id = htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(':id',$this->id);
            if ($stmt->execute()) return true;
            echo 'Error: '.$stmt->error;
            return false;
        }
    }
?>