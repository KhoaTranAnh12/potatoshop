module.exports =  
{
    articlesDelete: function (connection){
        connection.execute(`DROP TABLE IF EXISTS articles`,(err) => {
            if(err) 
            {
                console.error("Error Deleting Articles Table: " + err);
                process.exit(0);
            }
        });
        connection.execute(`DELETE FROM migrations WHERE table_name = 'articles'`,(err) => {
            if(err) 
            {
                console.error("Error Deleting from migrations Table: " + err);
                process.exit(0);
            }
        })
    },
    articlesCreate: function (connection){
        connection.execute(`create table articles(
            id int PRIMARY key AUTO_INCREMENT,
            writerid int,
            title varchar(50) not null,
            image LONGTEXT,
            content varchar(500) not null,
            foreign key (writerid) REFERENCES customers(id)
        );`,(err) => {
            if(err) 
            {
                console.error("Error Creating Articles Table: " + err);
                process.exit(0);
            }
        });
        connection.execute(`INSERT INTO migrations (table_name) VALUES ('articles')`,(err) => {
            if(err) 
            {
                console.error("Error Inserting into migrations Table: " + err);
                process.exit(0);
            }
        });
    }
}