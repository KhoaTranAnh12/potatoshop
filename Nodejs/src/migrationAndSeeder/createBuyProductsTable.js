module.exports =  
{
    buyProductsDelete: function (connection){
        connection.execute(`DROP TABLE IF EXISTS buyProducts`,(err) => {
            if(err) 
            {
                console.error("Error Deleting BuyProducts Table: " + err);
                process.exit(0);
            }
        });
        connection.execute(`DELETE FROM migrations WHERE table_name = 'buyProducts'`,(err) => {
            if(err) 
            {
                console.error("Error Deleting from migrations Table: " + err);
                process.exit(0);
            }
        })
    },
    buyProductsCreate: function (connection){
        connection.query(`create table buyProducts(
            id int PRIMARY key auto_increment,
            uid int,
            FOREIGN key (uid) REFERENCES buyers(id) ON DELETE CASCADE ON UPDATE CASCADE,
            productid int,
            foreign key (productid) REFERENCES products(id) ON DELETE CASCADE ON UPDATE CASCADE,
            pType varchar(50),
            FOREIGN key (pType) REFERENCES producttypes(name) ON DELETE CASCADE ON UPDATE CASCADE,
            quantity float
            
        );      
        `,(err) => {
            if(err) 
            {
                console.error("Error Creating BuyProducts Table: " + err);
                process.exit(0);
            }
        });
        connection.query(`
        CREATE TRIGGER buying AFTER INSERT ON buyproducts
        FOR EACH ROW 
        begin
        declare bill int DEFAULT 0; 
        select products.price
            into bill 
            from products  
            where new.productid = products.id;
        set bill = bill * new.quantity;
        if exists (select * from customers where customers.money < bill and customers.id = new.uid)
        then
        delete from buyproducts where id = new.id;
        ELSE
        BEGIN
            update customers
            set money = money - bill 
            where  customers.id = new.uid; 
            
            update buyers
            set nTransactions =nTransactions +1
            where  buyers.id = new.uid;
            
            update products
            set quantity = quantity - new.quantity
            where products.id = new.productid;
        
            update sellers
            inner join products
            on sellers.id = products.sellerid
            set  nTransactions =nTransactions +1
            where new.productid = products.id;

            update customers
            inner join products
            on customers.id = products.sellerid
            set money = money + bill;
            
        END;
        end if;
        end`,(err) => {
            if(err) 
            {
                console.error("Error Creating BuyProducts Table: " + err);
                process.exit(0);
            }
        });
        connection.execute(`INSERT INTO migrations (table_name) VALUES ('buyProducts')`,(err) => {
            if(err) 
            {
                console.error("Error Inserting into migrations Table: " + err);
                process.exit(0);
            }
        });
    }
}