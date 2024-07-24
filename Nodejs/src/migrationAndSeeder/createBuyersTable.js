module.exports =  
{
    buyersDelete: function (connection){
        connection.execute(`DROP TABLE IF EXISTS buyers`,(err) => {
            if(err) 
            {
                console.error("Error Deleting Buyers Table: " + err);
                process.exit(0);
            }
        });
        connection.execute(`DELETE FROM migrations WHERE table_name = 'buyers'`,(err) => {
            if(err) 
            {
                console.error("Error Deleting From migrations Table: " + err);
                process.exit(0);
            }
        });
    },
    buyersCreate: function (connection){
        connection.execute(`create table buyers(
            id int PRIMARY key,
            nTransactions int DEFAULT 0,
            FOREIGN KEY (id) REFERENCES customers(id) ON DELETE CASCADE ON UPDATE CASCADE,
            nShopcartitems int DEFAULT 0
        )`,(err) => {
            if(err) 
            {
                console.error("Error Creating Buyers Table: " + err);
                process.exit(0);
            }
        });

        connection.execute(`INSERT INTO migrations (table_name) VALUES ('buyers')`,(err) => {
            if(err) 
            {
                console.error("Error Inserting into migrations Table: " + err);
                process.exit(0);
            }
        });
    }
}