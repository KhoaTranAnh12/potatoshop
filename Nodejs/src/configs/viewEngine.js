const path = require('path');
const ViewEngine = (app) => {
    //Template engines
    //install: npm install ejs
    app.set('views', path.join(__dirname, '../views'));
    app.set('view engine', 'ejs');
}

module.exports = ViewEngine;