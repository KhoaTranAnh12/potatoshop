module.exports = {
    create: async function(connection, data){
        return new Promise((resolve,reject)=>{
        connection.execute(`INSERT INTO customers (username,password,fName,lName,phoneNum,email,nComments,buyerFlag,sellerFlag,money,avatar) VALUES
        (?,?,?,?,?,?,?,?,?,?,?)`,[
            data['username'],
            data['password'],
            data['fName'],
            data['lName'],
            data['phoneNum'],
            data['email'],
            data['nComments'],
            data['buyerFlag'],
            data['sellerFlag'],
            data['money'],
            data['avatar'],
        ],(err) => {
            if(err) 
            {
                console.error("Error adding customer record into database: " + err);
                reject(err);
            }
            else 
            {
                console.log("Added new customer record into database");
                resolve("Success");
            }
        });
    });
    },
    read: async function(connection,id){
        return new Promise((resolve,reject)=>{
            connection.execute(`SELECT * FROM customers WHERE ID = ?`, [id], (err, results) => {
            if (err) {
                console.error("Error reading customer record from Table: " + err);
                reject(err);
            } else {
                resolve(results);
            }
        });
        });
    },
    readUsername: async function(connection,username){
        return new Promise((resolve,reject)=>{
            connection.execute(`SELECT * FROM customers WHERE username = ?`, [username], (err, results) => {
            if (err) {
                console.error("Error reading customer record from Table: " + err);
                reject(err);
            } else {
                resolve(results);
            }
        });
        });
    },
    show: async function(connection,begin,n){
        return new Promise((resolve,reject)=>{
            connection.execute(`SELECT * FROM customers limit ?,?`,[begin,n], (err, results) => {
            if (err) {
                console.error("Error reading customer record from Table: " + err);
                reject(err);
            } else {
                resolve(results);
            }
        });
        });
    },
    find: async function(connection,input){
        console.log(input);
        return new Promise((resolve,reject)=>{
            connection.execute(`SELECT * FROM customers WHERE username like ?`, [input], (err, results) => {
            if (err) {
                console.error("Error reading customer record from Table: " + err);
                reject(err);
            } else {
                resolve(results);
            }
        });
        });
    },
    update: async function(connection,id,data){
        console.log(data);
        return new Promise((resolve,reject)=>{
        connection.execute(`UPDATE customers SET username=?,password=?,fName=?,lName=?,phoneNum=?,email=?,nComments=?,buyerFlag=?,sellerFlag=?,money=?,avatar=? 
        WHERE id=?`,[
            data['username'],
            data['password'],
            data['fName'],
            data['lName'],
            data['phoneNum'],
            data['email'],
            data['nComments'],
            data['buyerFlag'],
            data['sellerFlag'],
            data['money'],
            data['avatar'],
            id,
        ],(err) => {
            if(err) 
            {
                console.error("Updated customer record fail: " + err);
                reject(err);
            }
            else 
            {
                console.log("Updated customer record success, ID: " + id);
                resolve("Success");
            }
        });
    });
    },
    delete: async function(connection,id){
        return new Promise((resolve,reject)=>{
            connection.execute(`DELETE FROM customers WHERE ID = ?`, [id], (err, results) => {
            if (err) {
                console.error("Error deleting customer record from Table: " + err);
                reject(err);
            } else {
                console.log("Deleted customer record success, ID: " + id)
                resolve(results);
            }
        });
        });
    },
    readUsernamePassword: async function(connection,username,password){
        return new Promise((resolve,reject)=>{
            connection.execute(`SELECT * FROM customers WHERE username = ? and password = ?`, [username,password], (err, results) => {
            if (err) {
                console.error("Error reading customer record from Table: " + err);
                reject(err);
            } else {
                resolve(results);
            }
        });
        });
    },  
};
        // old read()
        // let res = {};
        // await connection.execute(`SELECT * FROM customers WHERE ID = ?`,[id],(err,results) => {
        //     if(err)
        //     {
        //         console.error("Error reading customer record from Table: " + err);
        //     }
        //     else 
        //     {
        //         //How to gắn results vào res?
        //         console.log(results);
        //     }
        // });
        // return res;