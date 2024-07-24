module.exports =  
{
    productTypesDelete: function (connection){
        connection.execute(`DROP TABLE IF EXISTS productTypes`,(err) => {
            if(err) 
            {
                console.error("Error Deleting Product Types Table: " + err);
                process.exit(0);
            }
        });
        connection.execute(`DELETE FROM migrations WHERE table_name = 'productTypes'`,(err) => {
            if(err) 
            {
                console.error("Error Deleting from migrations Table: " + err);
                process.exit(0);
            }
        });
    },
    productTypesCreate: function (connection){
        connection.execute(`create table productTypes(
            name varchar(50) primary key,
            image LONGTEXT,
            numProducts int DEFAULT 0
        );`,(err) => {
            if(err) 
            {
                console.error("Error Creating Product Types Table: " + err);
                process.exit(0);
            }
        });

        connection.execute(`INSERT INTO migrations (table_name) VALUES ('productTypes')`,(err) => {
            if(err) 
            {
                console.error("Error Inserting into migrations Table: " + err);
                process.exit(0);
            }
        });
    }
}