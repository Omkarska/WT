const mysql = require('mysql');
const express = require('express');
const bodyParser = require('body-parser');

const cors = require('cors');
const app = express();
const PORT = 3001;

app.use(cors());

app.use(bodyParser.json());

var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "bookstore"
});

con.connect(function (err) {
    if (err) throw err;
    console.log("Connected!");
});

app.post('/user/create', (req, res) => {
    let { name, username, password } = req.body;

    if (!name || !username || !password) {
        res.status(400).send('Missing parameters');
    } else {
        //create user
        con.query("INSERT INTO user (name, username, password) VALUES ('" + name + "', '" + username + "', '" + password + "')", function (err, result) {
            if (err){
                console.log(err);
            }
            console.log(result);
        });
        res.status(200).send({"message":"Succes"});
    }
});


app.post('/user/login', (req, res) => {
    let { username, password } = req.body;

    if (!username || !password) {
        res.status(400).send('Missing parameters');
    } else {
        //login user
        con.query("SELECT * FROM user WHERE username = '" + username + "' AND password = '" + password + "'", function (err, result) {
            if (err) {
                console.log(err);
            }
            console.log(result);
            res.status(200).send(result);
        });
    }
}
);

app.get('/books/get', (req, res) => {
    con.query("SELECT * FROM book", function (err, result) {
        if (err) {
            console.log(err);
        }
        console.log(result);
        return res.status(200).send(result);
    });
})


app.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
});