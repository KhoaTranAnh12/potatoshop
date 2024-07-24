module.exports = {
    //Cấp quyền seller cho Customer
    create: async function(connection, id){
        return new Promise((resolve,reject)=>{
        connection.execute(`INSERT INTO sellers (id) VALUES
        (?)`,[
            id,
        ],(err) => {
            if(err) 
            {
                console.error("Error adding seller record into database: " + err.sqlMessage);
                reject(err.sqlMessage);
            }
            else 
            {
                console.log("Added new seller record into database");
                resolve("Success");
            }
        });
    });
    },
    // Hàm read duy nhất để kiểm tra xem có seller nào có ID vậy không
    read: async function(connection,id){
        return new Promise((resolve,reject)=>{
            connection.execute(`SELECT * FROM sellers WHERE ID = ?`, [id], (err, results) => {
            if (err) {
                console.error("Error reading seller record from Table: " + err);
                reject(err.sqlMessage);
            } else {
                resolve(results);
            }
        });
        });
    },
    // update: async function(connection,id,data){
    //     return new Promise((resolve,reject)=>{
    //     connection.execute(`UPDATE sellers SET username=?,password=?,fName=?,lName=?,phoneNum=?,email=?,nComments=?,sellerFlag=?,sellerFlag=?,money=?,avatar=? 
    //     WHERE id=?`,[
    //         data['username'],
    //         data['password'],
    //         data['fName'],
    //         data['lName'],
    //         data['phoneNum'],
    //         data['email'],
    //         data['nComments'],
    //         data['sellerFlag'],
    //         data['sellerFlag'],
    //         data['money'],
    //         data['avatar'],
    //         id,
    //     ],(err) => {
    //         if(err) 
    //         {
    //             console.error("Updated seller record fail: " + err);
    //             reject(err);
    //         }
    //         else 
    //         {
    //             console.log("Updated seller record success, ID: " + id);
    //             resolve("Success");
    //         }
    //     });
    // });
    // },
    // delete: async function(connection,id){
    //     return new Promise((resolve,reject)=>{
    //         connection.execute(`DELETE FROM sellers WHERE ID = ?`, [id], (err, results) => {
    //         if (err) {
    //             console.error("Error deleting seller record from Table: " + err);
    //             reject(err);
    //         } else {
    //             console.log("Deleted seller record success, ID: " + id)
    //             resolve(results);
    //         }
    //     });
    //     });
    // } 
};