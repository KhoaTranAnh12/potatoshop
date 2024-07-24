const express = require('express');
const path = require('path');
const StaticFiles = (app) => {
    //Cấu hình static files
    app.use(express.static(path.join(__dirname, '../public')));
}

module.exports = StaticFiles;