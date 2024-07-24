const mysql = require('mysql2');
require('dotenv').config();

// create the connection to database
const connection = mysql.createConnection({
    host: process.env.DB_HOST_NAME,
    user: process.env.DB_USER_NAME,
    port: process.env.DB_PORT,
    password: process.env.DB_PASSWORD,
    database: process.env.DB_NAME,
    multipleStatements: true,
    idleTimeout: 120000
});

// const pool = mysql.createPool({
//   host: process.env.DB_HOST_NAME,
//   user: process.env.DB_USER_NAME,
//   database: process.env.DB_NAME,
//   waitForConnections: true,
//   connectionLimit: 10,
//   maxIdle: 10, // max idle connections, the default value is the same as `connectionLimit`
//   idleTimeout: 60000, // idle connections timeout, in milliseconds, the default value 60000
//   queueLimit: 0,
//   enableKeepAlive: true,
//   keepAliveInitialDelay: 0,
//   multipleStatements: true,
// });

module.exports = connection;
