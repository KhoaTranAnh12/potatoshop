drop database if exists potatoshop;
create database potatoshop;
use potatoshop;
create table customer(
    id int AUTO_INCREMENT PRIMARY KEY,
    username varchar(20) unique,
    password varchar(20),
    fName varchar(10),
    lName varchar(20),
    phoneNum varchar(10),
    email varchar(50),
    nComments int DEFAULT 0,
    buyerFlag bit,
    sellerFlag bit,
    money int DEFAULT 0,
    avatar mediumtext
);
create table seller(
    id int PRIMARY KEY,
    nProducts int default 0,
    nTransactions int DEFAULT 0,
    FOREIGN KEY (id) REFERENCES customer(id) ON DELETE CASCADE ON UPDATE CASCADE
);
create table buyer(
    id int PRIMARY key,
    nTransactions int DEFAULT 0,
    FOREIGN KEY (id) REFERENCES customer(id) ON DELETE CASCADE ON UPDATE CASCADE,
    nShopcartitems int DEFAULT 0
);
create table admin(
    id int PRIMARY KEY,
    FOREIGN KEY (id) REFERENCES customer(id) ON DELETE CASCADE ON UPDATE CASCADE
);
create table productType(
    name varchar(50) primary key,
    image mediumtext,
    numProducts int DEFAULT 0
);
create table product(
    id int AUTO_INCREMENT PRIMARY key,
    sellerid int,
    name varchar(50),
    type varchar(50),
    quantity float,
    price float,
    description varchar(500),
    image1 mediumtext,
    image2 mediumtext,
    image3 mediumtext,
    foreign key (type) REFERENCES producttype(name) ON DELETE CASCADE ON UPDATE CASCADE,
    foreign key (sellerid) REFERENCES seller(id) ON DELETE CASCADE ON UPDATE CASCADE
    );
create table news(
    id int primary key AUTO_INCREMENT,
    url varchar(100),
    image mediumtext,
    secondaryimage mediumtext,
    uploaderid int,
    foreign key (uploaderid) REFERENCES seller(id) ON DELETE CASCADE ON UPDATE CASCADE,
    foreign key (uploaderid) REFERENCES admin(id) ON DELETE CASCADE ON UPDATE CASCADE  
);
create table articles(
    id int PRIMARY key AUTO_INCREMENT,
    writerid int,
    title varchar(50) not null,
    image mediumtext,
    content varchar(500) not null,
    foreign key (writerid) REFERENCES customer(id)
);
create table comment(
    id int primary key AUTO_INCREMENT,
    uid int,
    type varchar(10),
    content varchar(500),
    articleid int,
    FOREIGN key (articleid) REFERENCES articles(id) ON DELETE CASCADE ON UPDATE CASCADE,
    commentid int,
    FOREIGN key (commentid) REFERENCES comment(id) ON DELETE CASCADE ON UPDATE CASCADE,
    newsid int,
    FOREIGN key (newsid) REFERENCES news(id) ON DELETE CASCADE ON UPDATE CASCADE,
    productid int,
    FOREIGN key (productid) REFERENCES product(id) ON DELETE CASCADE ON UPDATE CASCADE
);

create table buyProduct(
    id int PRIMARY key auto_increment,
    uid int,
    FOREIGN key (uid) REFERENCES buyer(id) ON DELETE CASCADE ON UPDATE CASCADE,
    productid int,
    foreign key (productid) REFERENCES product(id) ON DELETE CASCADE ON UPDATE CASCADE,
    pType varchar(50),
    FOREIGN key (pType) REFERENCES producttype(name) ON DELETE CASCADE ON UPDATE CASCADE,
    quantity float
);
create table uploadProduct(
    id int PRIMARY key auto_increment,
    uid int,
    FOREIGN key (uid) REFERENCES seller(id) ON DELETE CASCADE ON UPDATE CASCADE,
    pType varchar(50),
    FOREIGN key (pType) REFERENCES producttype(name) ON DELETE CASCADE ON UPDATE CASCADE,
    quantity int
);
create table shopcartitems(
	productid int primary key,
    quantity float,
    foreign key (productid) REFERENCES product(id) ON DELETE CASCADE ON UPDATE CASCADE
);
create table notifications(
	id int PRIMARY key AUTO_INCREMENT,
    senderid int,
    foreign key (senderid) REFERENCES customer(id) ON DELETE CASCADE ON UPDATE CASCADE,
    foreign key (senderid) REFERENCES admin(id) ON DELETE CASCADE ON UPDATE CASCADE,
    receiverid int,
    foreign key (receiverid) REFERENCES customer(id) ON DELETE CASCADE ON UPDATE CASCADE,
    foreign key (receiverid) REFERENCES admin(id) ON DELETE CASCADE ON UPDATE CASCADE,
    content varchar(500) 
);
create table cart_item(
    id int PRIMARY key auto_increment,
    uid int,
    FOREIGN key (uid) REFERENCES buyer(id) ON DELETE CASCADE ON UPDATE CASCADE,
    productid int,
    foreign key (productid) REFERENCES product(id) ON DELETE CASCADE ON UPDATE CASCADE,
    pType varchar(50),
    FOREIGN key (pType) REFERENCES producttype(name) ON DELETE CASCADE ON UPDATE CASCADE,
    quantity float
);
DELIMITER //
CREATE TRIGGER `ass` AFTER INSERT ON `buyproduct` FOR EACH ROW begin
declare bill int DEFAULT 0; 
select product.price
    into bill 
    from product  
    where new.productid = product.id;
set bill = bill * new.quantity;
if exists (select * from buyer where buyer.money < bill and buyer.id = new.uid)
then
delete from buyproduct where id = new.id;
ELSE
BEGIN
update customer
    set money = money - bill 
    where  customer.id = new.uid; 
    
    update buyer
    set nTransactions =nTransactions +1
    where  buyer.id = new.uid; 
   
    update seller
    inner join product
    on seller.id = product.sellerid
    set  nTransactions =nTransactions +1
    where new.productid = product.id;
    
END;
end if;
end//


CREATE TRIGGER `cuscreate` 
AFTER INSERT ON `customer` 
FOR EACH ROW 
begin declare cid int DEFAULT 0; 
set cid = new.id; 
if new.buyerFlag 
then INSERT into buyer VALUES(new.id,0,0); 
end if; 
if new.sellerFlag 
THEN insert into seller VALUES (new.id,0,0);
end if; 
end//
