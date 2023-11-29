// ResultForm.js
import React, { useState } from 'react';
import axios from 'axios';
import ResultDisplay from './ResultDisplay';
import { useNavigate } from 'react-router-dom';
import '../css/ResultForm.css'

const ResultForm = () => {
  const [prn, setPrn] = useState('');
  const [result, setResult] = useState(null);
  const navigate = useNavigate();

  const handleSubmit = async (event) => {
    event.preventDefault();

    try {

    // fetch(`http://localhost:8082/api/students/${prn}`).then((res)=>setResult(res));
        await fetch(`http://localhost:8082/api/students/${prn}`).then((res)=>
        res.json()).then((result)=>setResult(result))
    
    //   setResult(response.data);
    //   console.log(response.json());
    //   result = response.data
    //   console.log(result)
    //   navigate('/get-result');
    } catch (error) {
      console.error('Error fetching result:', error);
      setResult(null);
    }
  };

  return (
    <div className='body'>
      <form onSubmit={handleSubmit}>
        <label>
          Enter PRN:
          <input type="text" value={prn} onChange={(e) => setPrn(e.target.value)} />
        </label>
        <button type="submit">Submit</button>
      </form>

      {result && <ResultDisplay result={result} />}
    </div>
  );
};

export default ResultForm;
