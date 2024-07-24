// create table productType(
//     name varchar(50) primary key,
//     image mediumtext,
//     numProducts int DEFAULT 0
// );
module.exports = {
    create: async function(connection, data){
        return new Promise((resolve,reject)=>{
        connection.execute(`INSERT INTO productTypes (name,image,numProducts) VALUES
        (?,?,?)`,[
            data['name'],
            data['image'],
            data['numProducts'],
        ],(err) => {
            if(err) 
            {
                console.error("Error adding product type record into database: " + err);
                reject(err);
            }
            else 
            {
                console.log("Added new product type record into database");
                resolve("Success");
            }
        });
    });
    },
    read: async function(connection,name){
        return new Promise((resolve,reject)=>{
            connection.execute(`SELECT * FROM productTypes WHERE name = ?`, [name], (err, results) => {
            if (err) {
                console.error("Error reading product type record from Table: " + err);
                reject(err);
            } else {
                resolve(results);
            }
        });
        });
    },
    show: async function(connection){
        return new Promise((resolve,reject)=>{
            connection.execute(`SELECT * FROM productTypes`, (err, results) => {
            if (err) {
                console.error("Error reading product type record from Table: " + err);
                reject(err);
            } else {
                // console.log(results);
                resolve(results);
            }
        });
        });
    },
    update: async function(connection,name,data){
        return new Promise((resolve,reject)=>{
        connection.execute(`UPDATE productTypes SET name = ?,image = ?,numProducts = ? 
        WHERE name=?`,[
            data['name'],
            data['image'],
            data['numProducts'],
            name,
        ],(err) => {
            if(err) 
            {
                console.error("Updated product type record fail: " + err);
                reject(err);
            }
            else 
            {
                console.log("Updated product type record success, name: " + name);
                resolve("Success");
            }
        });
    });
    },
    delete: async function(connection,name){
        return new Promise((resolve,reject)=>{
            connection.execute(`DELETE FROM productTypes WHERE name = ?`, [name], (err, results) => {
            if (err) {
                console.error("Error deleting product type record from Table: " + err);
                reject(err);
            } else {
                console.log("Deleted product type record success, name: " + name)
                resolve(results);
            }
        });
        });
    } 
};
        // old read()