// create table buyProduct(
//     id int PRIMARY key auto_increment,
//     uid int,
//     FOREIGN key (uid) REFERENCES buyer(id) ON DELETE CASCADE ON UPDATE CASCADE,
//     productid int,
//     foreign key (productid) REFERENCES product(id) ON DELETE CASCADE ON UPDATE CASCADE,
//     pType varchar(50),
//     FOREIGN key (pType) REFERENCES producttype(name) ON DELETE CASCADE ON UPDATE CASCADE,
//     quantity float
// );
module.exports = {
    create: async function(connection, data){
        return new Promise((resolve,reject)=>{
        connection.execute(`INSERT INTO buyProducts (uid,productid,pType,quantity) VALUES
        (?,?,?,?)`,[
            data['uid'],
            data['productid'],
            data['pType'],
            data['quantity']
        ],(err) => {
            if(err) 
            {
                console.error("Error adding buyProduct record into database: " + err);
                reject(err);
            }
            else 
            {
                console.log("Added new buyProduct record into database");
                resolve("Success");
            }
        });
    });
    },
    read: async function(connection,id){
        return new Promise((resolve,reject)=>{
            connection.execute(`SELECT * FROM buyProducts WHERE ID = ?`, [id], (err, results) => {
            if (err) {
                console.error("Error reading buyProduct record from Table: " + err);
                reject(err);
            } else {
                resolve(results);
            }
        });
        });
    },
    show: async function(connection,begin,n,uid){
        return new Promise((resolve,reject)=>{
            connection.execute(`SELECT * FROM buyProducts where uid = ? limit ?,?`,[uid,begin,n], (err, results) => {
            if (err) {
                console.error("Error reading buyProducts record from Table: " + err);
                reject(err);
            } else {
                resolve(results);
            }
        });
        });
    },
    update: async function(connection,id,data){
        return new Promise((resolve,reject)=>{
        connection.execute(`UPDATE buyProducts SET uid=?,productid=?,pType=?,quantity=? 
        WHERE id=?`,[
            data['uid'],
            data['productid'],
            data['pType'],
            data['quantity'],
            id,
        ],(err) => {
            if(err) 
            {
                console.error("Updated buyProduct record fail: " + err);
                reject(err);
            }
            else 
            {
                console.log("Updated buyProduct record success, ID: " + id);
                resolve("Success");
            }
        });
    });
    },
    delete: async function(connection,id){
        return new Promise((resolve,reject)=>{
            connection.execute(`DELETE FROM buyProducts WHERE ID = ?`, [id], (err, results) => {
            if (err) {
                console.error("Error deleting buyProduct record from Table: " + err);
                reject(err);
            } else {
                console.log("Deleted buyProduct record success, ID: " + id)
                resolve(results);
            }
        });
        });
    } 
};
        // old read()