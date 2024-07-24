// create table shopcarts(
//             id int PRIMARY key auto_increment,
//             uid int,
//             FOREIGN key (uid) REFERENCES buyers(id) ON DELETE CASCADE ON UPDATE CASCADE,
//             productid int,
//             foreign key (productid) REFERENCES products(id) ON DELETE CASCADE ON UPDATE CASCADE,
//             pType varchar(50),
//             FOREIGN key (pType) REFERENCES producttypes(name) ON DELETE CASCADE ON UPDATE CASCADE,
//             quantity float
//         );
module.exports = {
    create: async function(connection, data){
        return new Promise((resolve,reject)=>{
        connection.execute(`INSERT INTO shopCarts (uid,productid,pType,quantity) VALUES
        (?,?,?,?)`,[
            data['uid'],
            data['productid'],
            data['pType'],
            data['quantity'],
        ],(err) => {
            if(err) 
            {
                console.error("Error adding shopCart record into database: " + err);
                reject(err);
            }
            else 
            {
                console.log("Added new shopCart record into database");
                resolve("Success");
            }
        });
    });
    },
    read: async function(connection,id){
        return new Promise((resolve,reject)=>{
            connection.execute(`SELECT * FROM shopCarts WHERE ID = ?`, [id], (err, results) => {
            if (err) {
                console.error("Error reading shopCart record from Table: " + err);
                reject(err);
            } else {
                resolve(results);
            }
        });
        });
    },
    update: async function(connection,id,data){
        return new Promise((resolve,reject)=>{
        connection.execute(`UPDATE shopCarts SET uid=?, productid=?, pType=?, quantity=? 
        WHERE id=?`,[
            data['uid'],
            data['productid'],
            data['pType'],
            data['quantity'],
            id,
        ],(err) => {
            if(err) 
            {
                console.error("Updated shopCart record fail: " + err);
                reject(err);
            }
            else 
            {
                console.log("Updated shopCart record success, ID: " + id);
                resolve("Success");
            }
        });
    });
    },
    delete: async function(connection,id){
        return new Promise((resolve,reject)=>{
            connection.execute(`DELETE FROM shopCarts WHERE ID = ?`, [id], (err, results) => {
            if (err) {
                console.error("Error deleting shopCart record from Table: " + err);
                reject(err);
            } else {
                console.log("Deleted shopCart record success, ID: " + id)
                resolve(results);
            }
        });
        });
    } 
};
        // old read()