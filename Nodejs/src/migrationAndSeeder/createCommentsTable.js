module.exports =  
{
    commentsDelete: function (connection){
        connection.execute(`DROP TABLE IF EXISTS comments`,(err) => {
            if(err) 
            {
                console.error("Error Deleting Comments Table: " + err);
                process.exit(0);
            }
        });
        connection.execute(`DELETE FROM migrations WHERE table_name = 'comments'`,(err) => {
            if(err) 
            {
                console.error("Error Deleting from migrations Table: " + err);
                process.exit(0);
            }
        })
    },
    commentsCreate: function (connection){
        connection.execute(`create table comments(
            id int primary key AUTO_INCREMENT,
            uid int,
            type varchar(10),
            content varchar(500),
            articleid int,
            FOREIGN key (articleid) REFERENCES articles(id) ON DELETE CASCADE ON UPDATE CASCADE,
            commentid int,
            FOREIGN key (commentid) REFERENCES comments(id) ON DELETE CASCADE ON UPDATE CASCADE,
            newsid int,
            FOREIGN key (newsid) REFERENCES news(id) ON DELETE CASCADE ON UPDATE CASCADE,
            productid int,
            FOREIGN key (productid) REFERENCES products(id) ON DELETE CASCADE ON UPDATE CASCADE
        );`,(err) => {
            if(err) 
            {
                console.error("Error Creating Comments Table: " + err);
                process.exit(0);
            }
        });
        connection.execute(`INSERT INTO migrations (table_name) VALUES ('comments')`,(err) => {
            if(err) 
            {
                console.error("Error Inserting into migrations Table: " + err);
                process.exit(0);
            }
        });
    }
}