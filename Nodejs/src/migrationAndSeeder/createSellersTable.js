module.exports =  
{
    sellersDelete: function(connection){
        connection.execute(`DROP TABLE IF EXISTS sellers`,(err) => {
            if(err) 
            {
                console.error("Error Deleting Sellers Table: " + err);
                process.exit(0);
            }
        });
        connection.execute(`DELETE FROM migrations WHERE table_name = 'sellers'`,(err) => {
            if(err) 
            {
                console.error("Error Inserting into migrations Table: " + err);
                process.exit(0);
            }
        });
    },
    sellersCreate: function(connection){
        connection.execute(`create table sellers(
            id int PRIMARY KEY,
            nProducts int default 0,
            nTransactions int DEFAULT 0,
            FOREIGN KEY (id) REFERENCES customers(id) ON DELETE CASCADE ON UPDATE CASCADE
        );`,(err) => {
            if(err) 
            {
                console.error("Error Creating Sellers Table: " + err);
                process.exit(0);
            }
        });

        connection.execute(`INSERT INTO migrations (table_name) VALUES ('sellers')`,(err) => {
            if(err) 
            {
                console.error("Error Inserting into migrations Table: " + err);
                process.exit(0);
            }
        });
    }
}