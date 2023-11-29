import React, { useState } from 'react';
import './student.css';

function Student() {
  const [prn, setPrn] = useState('');
  const [results, setResults] = useState([]);
  const [totalMSE, setTotalMSE] = useState(0);
  const [totalESE, setTotalESE] = useState(0);

  const handleFetchResult = async (e) => {
    e.preventDefault();

    // Replace this with your actual API endpoint
    const apiUrl = 'http://localhost:3000/fetch-results';

    try {
      const response = await fetch(apiUrl, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ prn }),
      });

      if (response.ok) {
        const data = await response.json();

        if (data.results.length > 0) {
          setResults(data.results);
          let mseTotal = 0;
          let eseTotal = 0;

          data.results.forEach((result) => {
            mseTotal += result.mse_marks;
            eseTotal += result.ese_marks;
          });

          setTotalMSE(mseTotal);
          setTotalESE(eseTotal);
        } else {
          setResults([]);
          setTotalMSE(0);
          setTotalESE(0);
        }
      } else {
        console.error('Failed to fetch results.');
      }
    } catch (error) {
      console.error('Error:', error);
    }
  };

  return (
    <div className="container">
      <h1>Student - Fetch Result</h1>
      <form onSubmit={handleFetchResult}>
        <div className="form-group">
          <label htmlFor="prn">PRN Number:</label>
          <input
            type="text"
            id="prn"
            name="prn"
            value={prn}
            onChange={(e) => setPrn(e.target.value)}
            required
          />
          <button type="submit" className="btn fetch-btn">
            Fetch Result
          </button>
        </div>
      </form>

      {results.length > 0 ? (
        <div>
          <table className="result-table">
            <thead>
              <tr>
                <th>Subject Name</th>
                <th>Obtained Marks (MSE)</th>
                <th>Obtained Marks (ESE)</th>
                <th>Total Marks</th>
              </tr>
            </thead>
            <tbody>
              {results.map((result, index) => (
                <tr key={index}>
                  <td>{result.subject}</td>
                  <td>{result.mse_marks}</td>
                  <td>{result.ese_marks}</td>
                  <td>{result.mse_marks + result.ese_marks}</td>
                </tr>
              ))}
            </tbody>
          </table>
          <div className="total">
            <p>Total Obtained Marks (MSE): {totalMSE}</p>
            <p>Total Obtained Marks (ESE): {totalESE}</p>
            <p>Combined Percentage: {((totalMSE + totalESE) / (results.length * 200)) * 100}%</p>
          </div>
        </div>
      ) : null}
    </div>
  );
}

export default Student;
