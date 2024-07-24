const connection = require('../configs/db.js');
const fs = require('node:fs');
connection.query(`
INSERT INTO customers (username,password,fName,lName,phoneNum,email,nComments,buyerFlag,sellerFlag,money,avatar) VALUES
("admin","admin","admin","admin","0777111234","",0,1,1,1000000,"data:image/jpeg;base64,`+ fs.readFileSync("src/public/images/admin.jpg", {encoding: 'base64'})+`");
INSERT INTO admins (id) VALUES (1);
INSERT INTO sellers (id) VALUES (1);
INSERT INTO buyers (id) VALUES (1);

INSERT INTO customers (username,password,fName,lName,phoneNum,email,nComments,buyerFlag,sellerFlag,money,avatar) VALUES
("admin2","admin2","admin2","admin2","0777111234","",0,1,1,1000000,"data:image/jpeg;base64,`+ fs.readFileSync("src/public/images/admin.jpg", {encoding: 'base64'})+`");
INSERT INTO admins (id) VALUES (2);
INSERT INTO sellers (id) VALUES (2);
INSERT INTO buyers (id) VALUES (2);



INSERT INTO productTypes values ("Iphone","data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`",0);
INSERT INTO productTypes values ("Android","data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`",0);
INSERT INTO productTypes values ("Laptop","data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`",0);


INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample android phone","android",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`"
);
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample android phone","android",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`"
);
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample android phone","android",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`"
);
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample android phone","android",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`"
);
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample android phone","android",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`"
);
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample android phone","android",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`"
);
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample android phone","android",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`"
);
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample android phone","android",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`"
);
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample android phone","android",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`"
);
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample android phone","android",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/androids.jpg", {encoding: 'base64'})+`"
);
`,(err) => {
    if(err) 
    {
        console.error("Error seeding: " + err);
        process.exit(0);
    }
});
connection.query(`
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample iphone","iphone",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`"
);
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample iphone","iphone",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`"
);
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample iphone","iphone",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`"
);
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample iphone","iphone",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`"
);
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample iphone","iphone",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`"
);
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample iphone","iphone",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`"
);
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample iphone","iphone",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`"
);
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample iphone","iphone",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`"
);
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample iphone","iphone",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`"
);
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample iphone","iphone",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/iphones.jpg", {encoding: 'base64'})+`"
);
`,(err) => {
    if(err) 
    {
        console.error("Error seeding: " + err);
        process.exit(0);
    }
});
connection.query(`
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample laptop","laptop",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`"
);
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample laptop","laptop",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`"
);
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample laptop","laptop",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`"
);
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample laptop","laptop",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`"
);
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample laptop","laptop",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`"
);
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample laptop","laptop",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`"
);
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample laptop","laptop",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`"
);
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample laptop","laptop",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`"
);
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample laptop","laptop",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`"
);
INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES 
(1,"Sample laptop","laptop",1000,1,"Điện thoại",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`",
"data:image/jpeg;base64,`+fs.readFileSync("src/public/images/laptops.jpg", {encoding: 'base64'})+`"
);
`,(err) => {
    if(err) 
    {
        console.error("Error seeding: " + err);
        process.exit(0);
    }
});
connection.end();