module.exports =  
{
    MigrationsTable: function(connection){
        connection.execute(`DROP TABLE IF EXISTS migrations`,(err) => {
            if(err) 
            {
                console.error("Error Deleting Migrations: " + err);
                process.exit(0);
            }
        });
        connection.execute(`CREATE TABLE migrations(
            id int auto_increment primary key,
            table_name varchar(20),
            trigger_name varchar(20),
            created_at timestamp default CURRENT_TIMESTAMP
        )`,(err) => {
            if(err) 
            {
                console.error("Error Creating Migrations Table: " + err);
                process.exit(0);
            }
        });
    }
}