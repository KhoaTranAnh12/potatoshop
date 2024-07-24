module.exports =  
{
    newsDelete: function (connection){
        connection.execute(`DROP TABLE IF EXISTS news`,(err) => {
            if(err) 
            {
                console.error("Error Deleting News Table: " + err);
                process.exit(0);
            }
        });
        connection.execute(`DELETE FROM migrations WHERE table_name = 'news'`,(err) => {
            if(err) 
            {
                console.error("Error Deleting from migrations Table: " + err);
                process.exit(0);
            }
        })
    },
    newsCreate: function (connection){
        connection.execute(`create table news(
            id int primary key AUTO_INCREMENT,
            url varchar(100),
            image LONGTEXT,
            secondaryimage LONGTEXT,
            uploaderid int,
            foreign key (uploaderid) REFERENCES admins(id) ON DELETE CASCADE ON UPDATE CASCADE  
        );`,(err) => {
            if(err) 
            {
                console.error("Error Creating News Table: " + err);
                process.exit(0);
            }
        });
        connection.execute(`INSERT INTO migrations (table_name) VALUES ('news')`,(err) => {
            if(err) 
            {
                console.error("Error Inserting into migrations Table: " + err);
                process.exit(0);
            }
        });
    }
}