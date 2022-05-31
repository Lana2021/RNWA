var express = require('express');
var app = express();
var bodyParser = require('body-parser');
var mysql = require('mysql');
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({
extended: true
}));
// default route
app.get('/', function (req, res) {
return res.send({ error: true, message: 'hello' })
});
// connection configurations
var dbConn = mysql.createConnection({
host: 'localhost',
user: 'root',
password: '',
database: 'birt'
});
// connect to database
dbConn.connect(); 
// Retrieve all employees 
app.get('/employees', function (req, res) {
dbConn.query('SELECT * FROM employees', function (error, results, fields) {
if (error) throw error;
return res.send({ error: false, data: results, message: 'All employees list.' });
});
});
// Retrieve employee with employeeNumber 
app.get('/employee/:id', function (req, res) {
let emp_id = req.params.id;
if (!emp_id) {
return res.status(400).send({ error: true, message: 'Please provide emp_id' });
}
dbConn.query('SELECT * FROM employees where employeeNumber=?', emp_id, function (error, results, fields) {
	if (error) throw error;
	//return res.send({ error: false, data: results[0], message: 'Single employee list error.' });
	return res.send({ error: false, data: results[0], message: 'Single employee list.' });
	});
});
// Add a new employee  
app.post('/employee', (req, res) => {
        const params = req.body
        console.log(params)
        dbConn.query('INSERT INTO employees SET ?', params, (err, rows) => {

            if(!err) {
                res.send(`Zaposlenik ${params.firstName} ${params.lastName} uspješno dodan.`)
            } else 
            {
                console.log(err)
            }
        })
    });
//  Update employee with id
app.put('/employee', function (req, res) {
        const { employeeNumber, firstName, lastName, email, jobTitle } = req.body

        dbConn.query("UPDATE employees SET firstName = ?, lastName = ?, email =?, jobTitle = ? where employeeNumber = ?", [firstName, lastName, email, jobTitle, employeeNumber], function (error, results, fields) {
        if (error) throw error;
        return res.send({ error: false, data: results, message: `Zaposlenik  ${employeeNumber} je uspješno ažuriran.` });
        });
});
//  Delete employee
app.delete('/employee/:id', function (req, res) {
	let emp_id = req.params.id;
	if (!emp_id) {
	return res.status(400).send({ error: true, message: 'Please provide emp_id' });
	}
	dbConn.query('DELETE FROM employees where employeeNumber = ?', [emp_id], function (error, results, fields) {
	if (error) throw error;
	return res.send({ error: false, data: results, message: 'Employee  has been deleted successfully.' });
	});
}); 
// set port
app.listen(3000, function () {
	console.log('Node MySQL REST API app is running on port 3000');
});
module.exports = app;