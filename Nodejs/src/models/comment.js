// create table comment(
//     id int primary key AUTO_INCREMENT,
//     uid int,
//     type varchar(10),
//     content varchar(500),
//     articleid int,
//     FOREIGN key (articleid) REFERENCES articles(id) ON DELETE CASCADE ON UPDATE CASCADE,
//     commentid int,
//     FOREIGN key (commentid) REFERENCES comment(id) ON DELETE CASCADE ON UPDATE CASCADE,
//     newsid int,
//     FOREIGN key (newsid) REFERENCES news(id) ON DELETE CASCADE ON UPDATE CASCADE,
//     productid int,
//     FOREIGN key (productid) REFERENCES product(id) ON DELETE CASCADE ON UPDATE CASCADE
// );
module.exports = {
    create: async function(connection, data){
        console.log("data");
        console.log(data);
        return new Promise((resolve,reject)=>{
        connection.execute(`INSERT INTO comments (uid,type,content,articleid,commentid,newsid,productid) VALUES
        (?,?,?,?,?,?,?)`,[
            data['uid'],
            data['type'],
            data['content'],
            data['articleid'],
            data['commentid'],
            data['newsid'],
            data['productid'],
        ],(err) => {
            if(err) 
            {
                console.error("Error adding comment record into database: " + err);
                reject(err);
            }
            else 
            {
                console.log("Added new comment record into database");
                resolve("Success");
            }
        });
    });
    },
    showAll: async function(connection,begin,n){
        console.log(begin)
        return new Promise((resolve,reject)=>{
            connection.execute(`SELECT * FROM comments limit ?,?`,[begin,n], (err, results) => {
            if (err) {
                console.error("Error reading comment record from Table: " + err);
                reject(err);
            } else {
                resolve(results);
            }
        });
        });
    },
    read: async function(connection,id){
        return new Promise((resolve,reject)=>{
            connection.execute(`SELECT * FROM comments WHERE ID = ?`, [id], (err, results) => {
            if (err) {
                console.error("Error reading comment record from Table: " + err);
                reject(err);
            } else {
                resolve(results);
            }
        });
        });
    },
    show: async function(connection,begin,n,uid){
        return new Promise((resolve,reject)=>{
            connection.execute(`SELECT * FROM comments where uid = ? limit ?,?`,[uid,begin,n], (err, results) => {
            if (err) {
                console.error("Error reading comments record from Table: " + err);
                reject(err);
            } else {
                resolve(results);
            }
        });
        });
    },
    readProduct: async function(connection,productid){
        return new Promise((resolve,reject)=>{
            connection.execute(`
            SELECT comments.id, comments.uid, customers.username, customers.avatar, comments.content
            FROM comments 
            INNER JOIN customers 
            ON comments.uid = customers.id
            WHERE comments.productID = ?`
            , [productid], (err, results) => {
            if (err) {
                console.error("Error reading comment record from Table: " + err);
                reject(err);
            } else {
                resolve(results);
            }
        });
        });
    },
    update: async function(connection,id,data){
        return new Promise((resolve,reject)=>{
        connection.execute(`UPDATE comments SET uid=?, type=?, content=?, articleid=?, commentid=?, newsid=?, productid=?
        WHERE id=?`,[
            data['uid'],
            data['type'],
            data['content'],
            data['articleid'],
            data['commentid'],
            data['newsid'],
            data['productid'],
            id,
        ],(err) => {
            if(err) 
            {
                console.error("Updated comment record fail: " + err);
                reject(err);
            }
            else 
            {
                console.log("Updated comment record success, ID: " + id);
                resolve("Success");
            }
        });
    });
    },
    delete: async function(connection,id){
        return new Promise((resolve,reject)=>{
            connection.execute(`DELETE FROM comments WHERE ID = ?`, [id], (err, results) => {
            if (err) {
                console.error("Error deleting comment record from Table: " + err);
                reject(err);
            } else {
                console.log("Deleted comment record success, ID: " + id)
                resolve(results);
            }
        });
        });
    } 
};
        // old read()