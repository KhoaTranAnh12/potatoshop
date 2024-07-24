const express = require('express');
const router = express.Router()

var users = [
    { id: 1, name: "User1", email: "user1@gmail.com", age: 31 },
    { id: 2, name: "User2", email: "user2@gmail.com", age: 20 },
    { id: 3, name: "User1", email: "user1.2@gmail.com", age: 25 }
];

module.exports = {
    index: function (req, res) {
        res.render('sample.ejs', {
            salary: 2,
            users: users
        });
    }
};