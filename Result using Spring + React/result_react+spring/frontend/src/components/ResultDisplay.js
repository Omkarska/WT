// ResultDisplay.js
import React from 'react';
import '../css/ResultDisplay.css'
const ResultDisplay = ({ result }) => {
    console.log(result)
  return (
    <div className='body'>
      <h2>Student Result</h2>
      {result ? (
        <div>
          <p>PRN: {result.prn}</p>
          <ul>
            {result.subjects.map((subject, index) => (
              <li key={index}>
                <strong>{subject.name}:</strong> Mid Sem - {subject.midSemMarks}, End Sem - {subject.endSemMarks}
              </li>
            ))}
          </ul>
        </div>
      ) : (
        <p>No result found for the provided PRN.</p>
      )}
    </div>
  );
};

export default ResultDisplay;
