module.exports =  
{
    notificationsDelete: function(connection){
        connection.execute(`DROP TABLE IF EXISTS notifications`,(err) => {
            if(err) 
            {
                console.error("Error Deleting notifications Table: " + err);
                process.exit(0);
            }
        });
        connection.execute(`DELETE FROM migrations WHERE table_name = 'notifications'`,(err) => {
            if(err) 
            {
                console.error("Error Inserting into migrations Table: " + err);
                process.exit(0);
            }
        });
    },
    notificationsCreate: function(connection){
        connection.execute(`create table notifications(
            id int PRIMARY key AUTO_INCREMENT,
            senderid int,
            foreign key (senderid) REFERENCES customers(id) ON DELETE CASCADE ON UPDATE CASCADE,
            receiverid int,
            foreign key (receiverid) REFERENCES customers(id) ON DELETE CASCADE ON UPDATE CASCADE,
            content varchar(500) 
        ); `,(err) => {
            if(err) 
            {
                console.error("Error Creating notifications Table: " + err);
                process.exit(0);
            }
        });

        connection.execute(`INSERT INTO migrations (table_name) VALUES ('notifications')`,(err) => {
            if(err) 
            {
                console.error("Error Inserting into migrations Table: " + err);
                process.exit(0);
            }
        });
    }
}