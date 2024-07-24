const connection = require('../configs/db.js');
//Import Migrations Modules
const migrationsM = require('./createMigrationTable.js');
const customersM = require('./createCustomersTable.js');
const sellersM = require('./createSellersTable.js');
const buyersM = require('./createBuyersTable.js');
const adminsM = require('./createAdminsTable.js');
const productTypesM = require('./createProductTypesTable.js');
const productM = require('./createProductsTable.js');
const newsM = require('./createNewsTable.js');
const articlesM = require('./createArticlesTable.js');
const commentsM = require('./createCommentsTable.js');
const buyProductsM = require('./createBuyProductsTable.js');
const notificationsM = require('./createNotificationsTable.js');
const shopCartsM = require('./createShopCartTable.js');

migrationsM.MigrationsTable(connection);
//Delete Old Tables
shopCartsM.shopCartsDelete(connection);
notificationsM.notificationsDelete(connection);
buyProductsM.buyProductsDelete(connection);
commentsM.commentsDelete(connection);
articlesM.articlesDelete(connection);
newsM.newsDelete(connection);
productM.productsDelete(connection);
productTypesM.productTypesDelete(connection);
adminsM.adminsDelete(connection);
buyersM.buyersDelete(connection);
sellersM.sellersDelete(connection);
customersM.customersDelete(connection);
//Create New Tables
customersM.customersCreate(connection);
sellersM.sellersCreate(connection);
buyersM.buyersCreate(connection);
adminsM.adminsCreate(connection);
productTypesM.productTypesCreate(connection);
productM.productsCreate(connection);
newsM.newsCreate(connection);
articlesM.articlesCreate(connection);
commentsM.commentsCreate(connection);
buyProductsM.buyProductsCreate(connection);
notificationsM.notificationsCreate(connection);
shopCartsM.shopCartsCreate(connection);
//Close the connections
connection.end();