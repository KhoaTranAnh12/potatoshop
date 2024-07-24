module.exports = {
    //Cấp quyền admin cho Customer
    create: async function(connection, id){
        return new Promise((resolve,reject)=>{
        connection.execute(`INSERT INTO admins (id) VALUES
        (?)`,[
            id,
        ],(err) => {
            if(err) 
            {
                console.error("Error adding admin record into database: " + err.sqlMessage);
                reject(err.sqlMessage);
            }
            else 
            {
                console.log("Added new admin record into database");
                resolve("Success");
            }
        });
    });
    },
    // Hàm read duy nhất để kiểm tra xem có admin nào có ID vậy không
    read: async function(connection,id){
        return new Promise((resolve,reject)=>{
            connection.execute(`SELECT * FROM admins WHERE ID = ?`, [id], (err, results) => {
            if (err) {
                console.error("Error reading admin record from Table: " + err);
                reject(err.sqlMessage);
            } else {
                resolve(results);
            }
        });
        });
    },
    // update: async function(connection,id,data){
    //     return new Promise((resolve,reject)=>{
    //     connection.execute(`UPDATE admins SET username=?,password=?,fName=?,lName=?,phoneNum=?,email=?,nComments=?,adminFlag=?,sellerFlag=?,money=?,avatar=? 
    //     WHERE id=?`,[
    //         data['username'],
    //         data['password'],
    //         data['fName'],
    //         data['lName'],
    //         data['phoneNum'],
    //         data['email'],
    //         data['nComments'],
    //         data['adminFlag'],
    //         data['sellerFlag'],
    //         data['money'],
    //         data['avatar'],
    //         id,
    //     ],(err) => {
    //         if(err) 
    //         {
    //             console.error("Updated admin record fail: " + err);
    //             reject(err);
    //         }
    //         else 
    //         {
    //             console.log("Updated admin record success, ID: " + id);
    //             resolve("Success");
    //         }
    //     });
    // });
    // },
    // delete: async function(connection,id){
    //     return new Promise((resolve,reject)=>{
    //         connection.execute(`DELETE FROM admins WHERE ID = ?`, [id], (err, results) => {
    //         if (err) {
    //             console.error("Error deleting admin record from Table: " + err);
    //             reject(err);
    //         } else {
    //             console.log("Deleted admin record success, ID: " + id)
    //             resolve(results);
    //         }
    //     });
    //     });
    // } 
};