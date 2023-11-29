// StudentForm.js
import React, { useState } from 'react';
import axios from 'axios';

const StudentForm = () => {
  const [prn, setPrn] = useState('');
  const [subjects, setSubjects] = useState([
    { name: '', midSemMarks: '', endSemMarks: '' },
    { name: '', midSemMarks: '', endSemMarks: '' },
    { name: '', midSemMarks: '', endSemMarks: '' },
    { name: '', midSemMarks: '', endSemMarks: '' },
  ]);

  const handleInputChange = (index, event) => {
    const newSubjects = [...subjects];
    newSubjects[index][event.target.name] = event.target.value;
    setSubjects(newSubjects);
  };

  const handleSubmit = async (event) => {
    event.preventDefault();

    try {
    //   const response = await axios.post('http://localhost:8082/api/students', {
    //     prn,
    //     subjects,
    //   });

    await fetch('http://localhost:8082/api/students', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          prn,
          subjects,
        }),
      }).then(res => res.json()).then(result => console.log(result))
  
    //   if (!response.ok) {
    //     throw new Error(`HTTP error! Status: ${response.status}`);
    //   }
  
    //   const result = await response.json();
    //   console.log(result);
      //console.log(response.data);
      // You can handle success or redirect to another page here
    } catch (error) {
      console.error('Error submitting form:', error);
      // Handle error
    }
  };

  return (
    <form onSubmit={handleSubmit} className='body'>
      <label>
        PRN:
        <input type="text" value={prn} onChange={(e) => setPrn(e.target.value)} />
      </label>

      {subjects.map((subject, index) => (
        <div key={index}>
          <label>
            Subject Name:
            <input
              type="text"
              name="name"
              value={subject.name}
              onChange={(e) => handleInputChange(index, e)}
            />
          </label>
          <label>
            Mid Sem Marks:
            <input
              type="number"
              name="midSemMarks"
              value={subject.midSemMarks}
              onChange={(e) => handleInputChange(index, e)}
            />
          </label>
          <label>
            End Sem Marks:
            <input
              type="number"
              name="endSemMarks"
              value={subject.endSemMarks}
              onChange={(e) => handleInputChange(index, e)}
            />
          </label>
        </div>
      ))}

      <button type="submit">Submit</button>
    </form>
  );
};

export default StudentForm;
