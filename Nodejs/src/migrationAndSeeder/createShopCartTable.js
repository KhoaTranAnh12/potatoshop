module.exports =  
{
    shopCartsDelete: function (connection){
        connection.execute(`DROP TABLE IF EXISTS shopCarts`,(err) => {
            if(err) 
            {
                console.error("Error Deleting shopCarts Table: " + err);
                process.exit(0);
            }
        });
    },
    shopCartsCreate: function (connection){
        connection.execute(`create table shopcarts(
            id int PRIMARY key auto_increment,
            uid int,
            FOREIGN key (uid) REFERENCES buyers(id) ON DELETE CASCADE ON UPDATE CASCADE,
            productid int,
            foreign key (productid) REFERENCES products(id) ON DELETE CASCADE ON UPDATE CASCADE,
            pType varchar(50),
            FOREIGN key (pType) REFERENCES producttypes(name) ON DELETE CASCADE ON UPDATE CASCADE,
            quantity float
        );`,(err) => {
            if(err) 
            {
                console.error("Error Creating shopCarts Table: " + err);
                process.exit(0);
            }
        });

        connection.execute(`INSERT INTO migrations (table_name) VALUES ('shopCarts')`,(err) => {
            if(err) 
            {
                console.error("Error Inserting into migrations Table: " + err);
                process.exit(0);
            }
        });
    }
}