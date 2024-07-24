module.exports =  
{
    customersDelete: function (connection){
        connection.execute(`DROP TABLE IF EXISTS customers`,(err) => {
            if(err) 
            {
                console.error("Error Deleting Customers Table: " + err);
                process.exit(0);
            }
        });
        connection.execute(`DELETE FROM migrations WHERE table_name = 'customers'`,(err) => {
            if(err) 
            {
                console.error("Error Deleting from migrations Table: " + err);
                process.exit(0);
            }
        })
    },
    customersCreate: function (connection){
        connection.execute(`create table customers(
            id int AUTO_INCREMENT PRIMARY KEY,
            username varchar(20) unique,
            password varchar(20),
            fName varchar(10),
            lName varchar(20),
            phoneNum varchar(10),
            email varchar(50),
            nComments int DEFAULT 0,
            buyerFlag bit,
            sellerFlag bit,
            money int DEFAULT 0,
            avatar LONGTEXT
        )`,(err) => {
            if(err) 
            {
                console.error("Error Creating Customers Table: " + err);
                process.exit(0);
            }
        });
        connection.execute(`INSERT INTO migrations (table_name) VALUES ('customers')`,(err) => {
            if(err) 
            {
                console.error("Error Inserting into migrations Table: " + err);
                process.exit(0);
            }
        });
    }
}