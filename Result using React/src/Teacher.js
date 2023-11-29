import React, { useState } from 'react';
import './teacher.css';

function Teacher() {
  const [prn, setPrn] = useState('');
  const [subjects, setSubjects] = useState([]);
  const [subjectDetails, setSubjectDetails] = useState([]);

  const handleSubmit = async (e) => {
    e.preventDefault();

    const subjectArray = [];
    for (let i = 1; i <= 4; i++) {
      const subject = e.target[`subject${i}`].value;
      const mseMarks = e.target[`mse_marks${i}`].value;
      const eseMarks = e.target[`ese_marks${i}`].value;
      const maxMarksMse = e.target[`max_marks_mse${i}`].value;
      const maxMarksEse = e.target[`max_marks_ese${i}`].value;
      subjectArray.push({ subject, mseMarks, eseMarks, maxMarksMse, maxMarksEse });
    }

    setSubjects(subjectArray);
    setSubjectDetails(subjectArray);

    // Prepare the data to send to the server
    const data = {
      prn,
      subjects: subjectArray,
    };

    try {
      // Make a POST request to your API endpoint
      const response = await fetch('http://localhost:3000/save-marks', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
      });

      if (response.ok) {
        console.log('Marks saved successfully');
      } else {
        console.error('Failed to save marks');
      }
    } catch (error) {
      console.error('Error:', error);
    }
  };

  return (
    <div className="container">
      <h1>Teacher - Enter Student Marks</h1>
      <form onSubmit={handleSubmit}>
        <div className="form-group">
          <label htmlFor="prn">PRN Number:</label>
          <input type="text" id="prn" name="prn" required onChange={(e) => setPrn(e.target.value)} />
        </div>

        {subjectDetails.length === 0 ? (
          <>
            {Array.from({ length: 4 }).map((_, i) => (
              <div className="subject" key={i}>
                <label htmlFor={`subject${i + 1}`}>Subject {i + 1}:</label>
                <input type="text" id={`subject${i + 1}`} name={`subject${i + 1}`} required />
                <label htmlFor={`mse_marks${i + 1}`}>MSE Marks (30%):</label>
                <input type="number" id={`mse_marks${i + 1}`} name={`mse_marks${i + 1}`} required />
                <label htmlFor={`ese_marks${i + 1}`}>ESE Marks (70%):</label>
                <input type="number" id={`ese_marks${i + 1}`} name={`ese_marks${i + 1}`} required />
                <label htmlFor={`max_marks_mse${i + 1}`}>Max Marks for MSE:</label>
                <input type="number" id={`max_marks_mse${i + 1}`} name={`max_marks_mse${i + 1}`} required />
                <label htmlFor={`max_marks_ese${i + 1}`}>Max Marks for ESE:</label>
                <input type="number" id={`max_marks_ese${i + 1}`} name={`max_marks_ese${i + 1}`} required />
              </div>
            ))}
            <button type="submit" className="btn submit-btn">Submit</button>
          </>
        ) : (
          <div className="subject">
            <h3>Subject Details</h3>
            {subjectDetails.map((subject, i) => (
              <div key={i}>
                <p>Subject {i + 1}: {subject.subject}</p>
                <p>MSE Marks: {subject.mseMarks}</p>
                <p>ESE Marks: {subject.eseMarks}</p>
                <p>Max Marks for MSE: {subject.maxMarksMse}</p>
                <p>Max Marks for ESE: {subject.maxMarksEse}</p>
              </div>
            ))}
          </div>
        )}
      </form>
    </div>
  );
}

export default Teacher;
