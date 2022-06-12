const express = require('express')
const bodyParser = require('body-parser')
const mysql = require('mysql')

const app = express()
const port = process.env.PORT || 3306


app.use(bodyParser.urlencoded({ extended: false}))
app.use(bodyParser.json())

// MySQL
const pool = mysql.createPool({
    connectionLimit: 1000,
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'birt'
})

// GET /employees
app.get('/employees', (req, res) => {
    pool.getConnection((err, connection) => {
        if(err) throw err
        console.log(`connected as id ${connection.threadId}`)

        connection.query('SELECT * FROM employees LIMIT 10', (err, rows) => {
            connection.release() // return the connection to pool

            if(!err) {
                res.send(rows)
            } else 
            {
                console.log(err)
            }
        })
    })
})


// GET /employees/:id
app.get('/employees/:id', (req, res) => {
    pool.getConnection((err, connection) => {
        if(err) throw err
        console.log(`connected as id ${connection.threadId}`)

        connection.query('SELECT * FROM employees WHERE employeeNumber = ?', [req.params.id], (err, rows) => {
            connection.release() // return the connection to pool

            if(!err) {
                res.send(rows)
            } else 
            {
                console.log(err)
            }
        })
    })
})

// POST /employees
app.post('/employees', (req, res) => {
    pool.getConnection((err, connection) => {
        if(err) throw err
        console.log(`connected as id ${connection.threadId}`)

        const params = req.body
        console.log(params)
        connection.query('INSERT INTO employees SET ?', params, (err, rows) => {
            connection.release() // return the connection to pool

            if(!err) {
                res.send(`Djelatnik ${params.firstName} ${params.lastName} kreiran.`)
            } else 
            {
                console.log(err)
            }
        })
    })
})

// PUT /employees/:id
app.put('/employees', (req, res) => {
    pool.getConnection((err, connection) => {
        if(err) throw err
        console.log(`connected as id ${connection.threadId}`)

        const { employeeNumber, lastName, firstName, email, jobTitle } = req.body
        console.log(req.body)
        connection.query('UPDATE employees SET lastName = ?, firstName = ?,  email = ?, jobTitle = ? WHERE employeeNumber = ?', [lastName, firstName, email, jobTitle, employeeNumber], (err, rows) => {
            connection.release() // return the connection to pool

            if(!err) {
                res.send(`Zaposlenik s ID-em ${employeeNumber} uspješno ažuriran.`)
            } else 
            {
                console.log(err)
            }
        })
    })
})


app.listen(port, () => console.log(`Listening on port ${port}`))