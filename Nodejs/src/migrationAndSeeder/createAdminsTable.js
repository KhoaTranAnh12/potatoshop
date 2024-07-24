module.exports =  
{
    adminsDelete: function(connection){
        connection.execute(`DROP TABLE IF EXISTS admins`,(err) => {
            if(err) 
            {
                console.error("Error Deleting Admins Table: " + err);
                process.exit(0);
            }
        });
        connection.execute(`DELETE FROM migrations WHERE table_name = 'admins'`,(err) => {
            if(err) 
            {
                console.error("Error Deleting From migrations Table: " + err);
                process.exit(0);
            }
        });
    },
    adminsCreate: function (connection){
        connection.execute(`create table admins(
            id int PRIMARY KEY,
            FOREIGN KEY (id) REFERENCES customers(id) ON DELETE CASCADE ON UPDATE CASCADE
        );`,(err) => {
            if(err) 
            {
                console.error("Error Creating Admins Table: " + err);
                process.exit(0);
            }
        });

        connection.execute(`INSERT INTO migrations (table_name) VALUES ('admins')`,(err) => {
            if(err) 
            {
                console.error("Error Inserting into migrations Table: " + err);
                process.exit(0);
            }
        });
    }
}