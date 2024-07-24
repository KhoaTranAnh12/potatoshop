// create table news(
//     id int primary key AUTO_INCREMENT,
//     url varchar(100),
//     image mediumtext,
//     secondaryimage mediumtext,
//     uploaderid int,
//     foreign key (uploaderid) REFERENCES admin(id) ON DELETE CASCADE ON UPDATE CASCADE  
// );
module.exports = {
    create: async function(connection, data){
        return new Promise((resolve,reject)=>{
        connection.execute(`INSERT INTO news (url, image, secondaryimage, uploaderid) VALUES
        (?,?,?,?)`,[
            data['url'],
            data['image'],
            data['secondaryimage'],
            data['uploaderid']
        ],(err) => {
            if(err) 
            {
                console.error("Error adding news record into database: " + err);
                reject(err);
            }
            else 
            {
                console.log("Added new news record into database");
                resolve("Success");
            }
        });
    });
    },
    read: async function(connection,id){
        return new Promise((resolve,reject)=>{
            connection.execute(`SELECT * FROM news WHERE ID = ?`, [id], (err, results) => {
            if (err) {
                console.error("Error reading news record from Table: " + err);
                reject(err);
            } else {
                resolve(results);
            }
        });
        });
    },
    show: async function(connection,begin,n){
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
    update: async function(connection,id,data){
        return new Promise((resolve,reject)=>{
        connection.execute(`UPDATE news SET url=?, image=?, secondaryimage=?, uploaderid=? 
        WHERE id=?`,[
            data['url'],
            data['image'],
            data['secondaryimage'],
            data['uploaderid'],
            id,
        ],(err) => {
            if(err) 
            {
                console.error("Updated news record fail: " + err);
                reject(err);
            }
            else 
            {
                console.log("Updated news record success, ID: " + id);
                resolve("Success");
            }
        });
    });
    },
    delete: async function(connection,id){
        return new Promise((resolve,reject)=>{
            connection.execute(`DELETE FROM news WHERE ID = ?`, [id], (err, results) => {
            if (err) {
                console.error("Error deleting news record from Table: " + err);
                reject(err);
            } else {
                console.log("Deleted news record success, ID: " + id)
                resolve(results);
            }
        });
        });
    } 
};
        // old read()