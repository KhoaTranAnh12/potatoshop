module.exports =  
{
    productsDelete: function (connection){
        connection.execute(`DROP TABLE IF EXISTS products`,(err) => {
            if(err) 
            {
                console.error("Error Deleting Products Table: " + err);
                process.exit(0);
            }
        });
    },
    productsCreate: function (connection){
        connection.execute(`create table products(
            id int AUTO_INCREMENT PRIMARY key,
            sellerid int,
            name varchar(50),
            type varchar(50),
            quantity float,
            price float,
            description varchar(500),
            image1 LONGTEXT,
            image2 LONGTEXT,
            image3 LONGTEXT,
            foreign key (type) REFERENCES productTypes(name) ON DELETE CASCADE ON UPDATE CASCADE,
            foreign key (sellerid) REFERENCES sellers(id) ON DELETE CASCADE ON UPDATE CASCADE
        );`,(err) => {
            if(err) 
            {
                console.error("Error Creating Products Table: " + err);
                process.exit(0);
            }
        });

        connection.execute(`INSERT INTO migrations (table_name) VALUES ('products')`,(err) => {
            if(err) 
            {
                console.error("Error Inserting into migrations Table: " + err);
                process.exit(0);
            }
        });
    }
}