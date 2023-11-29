import React, { useState } from 'react'
// import axios from "axios";
import './Bill.css';
export default function Bill() {
const[units,setUnits] = useState(0)
function handleSubmit(e)
{
    e.preventDefault();
    fetch(`http://localhost:8082/electricity/calculate/${units}`).then((res)=>res.json())
    .then(result=>setUnits(result));
    console.log('units consumed are '+units);
}
  return (
    <div className='body'>
        <h1>BILL</h1>
        <label htmlFor="units">Enter number of units consumed</label>
        <input type="number" id='units' onChange={(e)=>setUnits(e.target.value)} />
        <input type="submit"    onClick={handleSubmit} />
        <p>Total Bill : {units}</p>
    </div>
  )
}
