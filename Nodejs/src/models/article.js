// create table articles(
//     id int PRIMARY key AUTO_INCREMENT,
//     writerid int,
//     title varchar(50) not null,
//     image mediumtext,
//     content varchar(500) not null,
//     foreign key (writerid) REFERENCES article(id)
// );
module.exports = {
    create: async function(connection, data){
        return new Promise((resolve,reject)=>{
        connection.execute(`INSERT INTO articles ( writerid, title, image, content) VALUES
        (?,?,?,?)`,[
            data['writerid'],
            data['title'],
            data['image'],
            data['content'],
        ],(err) => {
            if(err) 
            {
                console.error("Error adding article record into database: " + err);
                reject(err);
            }
            else 
            {
                console.log("Added new article record into database");
                resolve("Success");
            }
        });
    });
    },
    read: async function(connection,id){
        return new Promise((resolve,reject)=>{
            connection.execute(`SELECT * FROM articles WHERE ID = ?`, [id], (err, results) => {
            if (err) {
                console.error("Error reading article record from Table: " + err);
                reject(err);
            } else {
                resolve(results);
            }
        });
        });
    },
    show: async function(connection,begin,n){
        return new Promise((resolve,reject)=>{
            connection.execute(`SELECT * FROM articles limit ?,?`,[begin,n], (err, results) => {
            if (err) {
                console.error("Error reading article record from Table: " + err);
                reject(err);
            } else {
                resolve(results);
            }
        });
        });
    },
    showUser: async function(connection,begin,n,writerid){
        return new Promise((resolve,reject)=>{
            connection.execute(`SELECT * FROM articles where writerid = ? limit ?,?`,[writerid,begin,n], (err, results) => {
            if (err) {
                console.error("Error reading article record from Table: " + err);
                reject(err);
            } else {
                resolve(results);
            }
        });
        });
    },
    update: async function(connection,id,data){
        return new Promise((resolve,reject)=>{
        connection.execute(`UPDATE articles SET writerid=?, title=?, image=?, content=? 
        WHERE id=?`,[
            data['writerid'],
            data['title'],
            data['image'],
            data['content'],
            id,
        ],(err) => {
            if(err) 
            {
                console.error("Updated article record fail: " + err);
                reject(err);
            }
            else 
            {
                console.log("Updated article record success, ID: " + id);
                resolve("Success");
            }
        });
    });
    },
    delete: async function(connection,id){
        return new Promise((resolve,reject)=>{
            connection.execute(`DELETE FROM articles WHERE ID = ?`, [id], (err, results) => {
            if (err) {
                console.error("Error deleting article record from Table: " + err);
                reject(err);
            } else {
                console.log("Deleted article record success, ID: " + id)
                resolve(results);
            }
        });
        });
    } 
};
        // old read()