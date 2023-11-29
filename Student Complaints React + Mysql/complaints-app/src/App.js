// App.js

import React from 'react';
import { BrowserRouter as Router, Routes, Route, Link } from 'react-router-dom';
import ComplaintForm from './ComplaintForm';
import ComplaintList from './ComplaintList';

function App() {
  return (
    <Router>
      <div>
        <nav>
          <ul>
            <li>
              <Link to="/">Home</Link>
            </li>
            <li>
              <Link to="/complaints">Complaints</Link>
            </li>
          </ul>
        </nav>

        <Routes>
          <Route path="/complaints" element={<ComplaintList />} />
          <Route path="/" element={<ComplaintForm />} />
        </Routes>
      </div>
    </Router>
  );
}

export default App;
