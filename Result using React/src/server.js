const mysql = require('mysql');
const express = require('express');
const cors = require('cors');
const bodyParser = require('body-parser');

const app = express();
app.use(cors());
app.use(bodyParser.json());

// MySQL database connection configuration
const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'vit_results',
});

// Connect to the database
db.connect((err) => {
  if (err) throw err;
  console.log('Connected to MySQL database');
});

// API endpoint to save student marks
app.post('/save-marks', (req, res) => {
  const { prn, subjects } = req.body;

  const insertQueries = subjects.map((subject, i) => {
    console.log(subject)
    const mse_marks = subject['mseMarks'];
    const ese_marks = subject['eseMarks'];
    const max_marks_mse = subject['maxMarksMse'];
    const max_marks_ese = subject['maxMarksEse'];

    return new Promise((resolve, reject) => {
      const sql = 'INSERT INTO results (prn_no, subject, mse_marks, ese_marks, max_marks_mse, max_marks_ese) VALUES (?, ?, ?, ?, ?, ?)';
      db.query(sql, [prn, subject['subject'], mse_marks, ese_marks, max_marks_mse, max_marks_ese], (err, result) => {
        if (err) {
          reject(err);
        } else {
          resolve(result);
        }
      });
    });
  });

  Promise.all(insertQueries)
    .then(() => {
      res.json({ success: 'Marks saved successfully' });
    })
    .catch((err) => {
      console.error('Error:', err);
      res.status(500).json({ error: 'Failed to save marks' });
    });
});

// API endpoint to fetch student results
app.post('/fetch-results', (req, res) => {
  const { prn } = req.body;

  const sql = 'SELECT subject, mse_marks, ese_marks FROM results WHERE prn_no = ?';
  db.query(sql, [prn], (err, results) => {
    if (err) {
      console.error('Error:', err);
      res.status(500).json({ error: 'Failed to fetch results' });
    } else if (results.length === 0) {
      res.status(404).json({ error: 'No results found for the given PRN number' });
    } else {
      res.json({ results });
    }
  });
});

// Start the server
const port = process.env.PORT || 3000;
app.listen(port, () => {
  console.log(`Server is running on port ${port}`);
});
