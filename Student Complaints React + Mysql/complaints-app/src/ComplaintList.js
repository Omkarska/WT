// ComplaintList.js

import React, { useEffect, useState } from 'react';
import axios from 'axios';
import './ComplaintList.css';

const ComplaintList = () => {
  const [complaints, setComplaints] = useState([]);

  useEffect(() => {
    const fetchComplaints = async () => {
      try {
        const response = await axios.get('http://localhost:3001/complaints');
        setComplaints(response.data);
      } catch (error) {
        console.error('Error fetching complaints:', error.message);
      }
    };

    fetchComplaints();
  }, []);

  return (
    <div>
      <h2>Complaints</h2>
      <ul>
        {complaints.map((complaint) => (
          <li key={complaint.id}>
            <strong>{complaint.title}</strong>
            <p>{complaint.description}</p>
          </li>
        ))}
      </ul>
    </div>
  );
};

export default ComplaintList;
