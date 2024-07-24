// create table product(
//     id int AUTO_INCREMENT PRIMARY key,
//     sellerid int,
//     name varchar(50),
//     type varchar(50),
//     quantity float,
//     price float,
//     description varchar(500),
//     image1 mediumtext,
//     image2 mediumtext,
//     image3 mediumtext,
//     foreign key (type) REFERENCES producttype(name) ON DELETE CASCADE ON UPDATE CASCADE,
//     foreign key (sellerid) REFERENCES seller(id) ON DELETE CASCADE ON UPDATE CASCADE
// );
module.exports = {
    create: async function(connection, data){
        return new Promise((resolve,reject)=>{
        connection.execute(`INSERT INTO products (sellerid, name, type, quantity, price, description, image1, image2, image3) VALUES
        (?,?,?,?,?,?,?,?,?)`,[
            data['sellerid'],
            data['name'],
            data['type'],
            data['quantity'],
            data['price'],
            data['description'],
            data['image1'],
            data['image2'],
            data['image3'],
        ],(err) => {
            if(err) 
            {
                console.error("Error adding product record into database: " + err);
                reject(err);
            }
            else 
            {
                console.log("Added new product record into database");
                resolve("Success");
            }
        });
    });
    },
    read: async function(connection,id){
        return new Promise((resolve,reject)=>{
            connection.execute(`SELECT * FROM products WHERE ID = ?`, [id], (err, results) => {
            if (err) {
                console.error("Error reading product record from Table: " + err);
                reject(err);
            } else {
                resolve(results);
            }
        });
        });
    },
    find: async function(connection,input){
        return new Promise((resolve,reject)=>{
            connection.execute(`SELECT * FROM products WHERE name like ?`, [input], (err, results) => {
            if (err) {
                console.error("Error reading product record from Table: " + err);
                reject(err);
            } else {
                resolve(results);
            }
        });
        });
    },
    show: async function(connection,begin,n){
        return new Promise((resolve,reject)=>{
            connection.execute(`SELECT * FROM products limit ?,?`,[begin,n], (err, results) => {
            if (err) {
                console.error("Error reading product record from Table: " + err);
                reject(err);
            } else {
                resolve(results);
            }
        });
        });
    },
    showCategory: async function(connection,begin,n,category){
        return new Promise((resolve,reject)=>{
            connection.execute(`SELECT * FROM products WHERE type = ? limit ?,?`,[category,begin,n], (err, results) => {
            if (err) {
                console.error("Error reading product record from Table: " + err);
                reject(err);
            } else {
                resolve(results);
            }
        });
        });
    },
    showSeller: async function(connection,begin,n,sellerid){
        return new Promise((resolve,reject)=>{
            connection.execute(`SELECT * FROM products where sellerid = ? limit ?,?`,[sellerid,begin,n], (err, results) => {
            if (err) {
                console.error("Error reading product record from Table: " + err);
                reject(err);
            } else {
                resolve(results);
            }
        });
        });
    },
    showCategorySeller: async function(connection,begin,n,category){
        return new Promise((resolve,reject)=>{
            connection.execute(`SELECT * FROM products WHERE type = ?, sellerid = ? limit ?,?`,[category,sellerid,begin,n], (err, results) => {
            if (err) {
                console.error("Error reading product record from Table: " + err);
                reject(err);
            } else {
                resolve(results);
            }
        });
        });
    },
    update: async function(connection,id,data){
        return new Promise((resolve,reject)=>{
        connection.execute(`UPDATE products SET sellerid=?, name=?, type=?, quantity=?, price=?, description=?, image1=?, image2=?, image3=? 
        WHERE id=?`,[
            data['sellerid'],
            data['name'],
            data['type'],
            data['quantity'],
            data['price'],
            data['description'],
            data['image1'],
            data['image2'],
            data['image3'],
            id,
        ],(err) => {
            if(err) 
            {
                console.error("Updated product record fail: " + err);
                reject(err);
            }
            else 
            {
                console.log("Updated product record success, ID: " + id);
                resolve("Success");
            }
        });
    });
    },
    delete: async function(connection,id){
        return new Promise((resolve,reject)=>{
            connection.execute(`DELETE FROM products WHERE ID = ?`, [id], (err, results) => {
            if (err) {
                console.error("Error deleting product record from Table: " + err);
                reject(err);
            } else {
                console.log("Deleted product record success, ID: " + id)
                resolve(results);
            }
        });
        });
    } 
};
        // old read()