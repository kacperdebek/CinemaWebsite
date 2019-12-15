var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "1234567",
  database: "cinemaDB"
});

con.connect(function(err) {
  if (err) throw err;
  alert("conn")
  con.query("SELECT * FROM film", function (err, result, fields) {
    if (err) throw err;
    // console.log(result);
  });
});