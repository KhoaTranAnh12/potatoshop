module.exports = {
    //Cấp quyền Buyer cho Customer
    create: async function(connection, id){
        return new Promise((resolve,reject)=>{
        connection.execute(`INSERT INTO buyers (id) VALUES
        (?)`,[
            id,
        ],(err) => {
            if(err) 
            {
                console.error("Error adding buyer record into database: " + err.sqlMessage);
                reject(err.sqlMessage);
            }
            else 
            {
                console.log("Added new buyer record into database");
                resolve("Success");
            }
        });
    });
    },
    // Hàm read duy nhất để kiểm tra xem có Buyer nào có ID vậy không
    read: async function(connection,id){
        return new Promise((resolve,reject)=>{
            connection.execute(`SELECT * FROM buyers WHERE ID = ?`, [id], (err, results) => {
            if (err) {
                console.error("Error reading buyer record from Table: " + err);
                reject(err.sqlMessage);
            } else {
                resolve(results);
            }
        });
        });
    },
    // update: async function(connection,id,data){
    //     return new Promise((resolve,reject)=>{
    //     connection.execute(`UPDATE buyers SET username=?,password=?,fName=?,lName=?,phoneNum=?,email=?,nComments=?,buyerFlag=?,sellerFlag=?,money=?,avatar=? 
    //     WHERE id=?`,[
    //         data['username'],
    //         data['password'],
    //         data['fName'],
    //         data['lName'],
    //         data['phoneNum'],
    //         data['email'],
    //         data['nComments'],
    //         data['buyerFlag'],
    //         data['sellerFlag'],
    //         data['money'],
    //         data['avatar'],
    //         id,
    //     ],(err) => {
    //         if(err) 
    //         {
    //             console.error("Updated buyer record fail: " + err);
    //             reject(err);
    //         }
    //         else 
    //         {
    //             console.log("Updated buyer record success, ID: " + id);
    //             resolve("Success");
    //         }
    //     });
    // });
    // },
    // delete: async function(connection,id){
    //     return new Promise((resolve,reject)=>{
    //         connection.execute(`DELETE FROM buyers WHERE ID = ?`, [id], (err, results) => {
    //         if (err) {
    //             console.error("Error deleting buyer record from Table: " + err);
    //             reject(err);
    //         } else {
    //             console.log("Deleted buyer record success, ID: " + id)
    //             resolve(results);
    //         }
    //     });
    //     });
    // } 
};