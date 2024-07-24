// create table notifications(
// 	id int PRIMARY key AUTO_INCREMENT,
//     senderid int,
//     foreign key (senderid) REFERENCES notification(id) ON DELETE CASCADE ON UPDATE CASCADE,
//     foreign key (senderid) REFERENCES admin(id) ON DELETE CASCADE ON UPDATE CASCADE,
//     receiverid int,
//     foreign key (receiverid) REFERENCES notification(id) ON DELETE CASCADE ON UPDATE CASCADE,
//     foreign key (receiverid) REFERENCES admin(id) ON DELETE CASCADE ON UPDATE CASCADE,
//     content varchar(500) 
// ); 
module.exports = {
    create: async function(connection, data){
        return new Promise((resolve,reject)=>{
        connection.execute(`INSERT INTO notifications (senderid,receiverid,content) VALUES
        (?,?,?)`,[
            data['senderid'],
            data['receiverid'],
            data['content']
        ],(err) => {
            if(err) 
            {
                console.error("Error adding notification record into database: " + err);
                reject(err);
            }
            else 
            {
                console.log("Added new notification record into database");
                resolve("Success");
            }
        });
    });
    },
    read: async function(connection,id){
        return new Promise((resolve,reject)=>{
            connection.execute(`SELECT * FROM notifications WHERE ID = ?`, [id], (err, results) => {
            if (err) {
                console.error("Error reading notification record from Table: " + err);
                reject(err);
            } else {
                resolve(results);
            }
        });
        });
    },
    update: async function(connection,id,data){
        return new Promise((resolve,reject)=>{
        connection.execute(`UPDATE notifications SET senderid=?,receiverid=?,content=?
        WHERE id=?`,[
            data['senderid'],
            data['receiverid'],
            data['content'],
            id,
        ],(err) => {
            if(err) 
            {
                console.error("Updated notification record fail: " + err);
                reject(err);
            }
            else 
            {
                console.log("Updated notification record success, ID: " + id);
                resolve("Success");
            }
        });
    });
    },
    delete: async function(connection,id){
        return new Promise((resolve,reject)=>{
            connection.execute(`DELETE FROM notifications WHERE ID = ?`, [id], (err, results) => {
            if (err) {
                console.error("Error deleting notification record from Table: " + err);
                reject(err);
            } else {
                console.log("Deleted notification record success, ID: " + id)
                resolve(results);
            }
        });
        });
    } 
};
        // old read()