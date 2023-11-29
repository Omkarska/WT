
import './App.css';
import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route, Link, Routes } from 'react-router-dom';
import Teacher from './Teacher';
import Student from './Student';

function App() {
  return (
    <Router>
    <div className="container">
      <h1>Welcome to VIT Semester Results</h1>
      <div className="btn-container">
        <Link to="/teacher" className="btn teacher-btn">
          Teacher
        </Link>
        <Link to="/student" className="btn student-btn">
          Student
        </Link>
      </div>
    </div>
    <Routes>
      <Route path="/teacher" element={<Teacher />} />
      <Route path="/student" element={<Student />} />
    </Routes>
  </Router>
  );
}

export default App;
