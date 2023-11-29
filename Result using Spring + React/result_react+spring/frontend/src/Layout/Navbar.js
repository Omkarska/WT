import React from 'react'
import {Link} from 'react-router-dom'
import './Navbar.css'

export default function Navbar() {
  return (
    <div>
    <div className="Title"><h1>Result Management System</h1></div>
<div className="flex-container">
    <div><Link to="/home">Home</Link></div>
    <div><Link to="/enter-marks">Enter Marks</Link></div>
    <div><Link to="/view-marks">View Marks</Link></div>
</div>
</div>
  )
}
