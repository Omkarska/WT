import React, { useState } from 'react';
import axios from 'axios';
import './ComplaintForm.css';

const ComplaintForm = () => {
  const [title, setTitle] = useState('');
  const [description, setDescription] = useState('');

  const handleSubmit = async (e) => {
    e.preventDefault();

    try {
      await axios.post('http://localhost:3001/complaints', { title, description });
      console.log('Complaint registered successfully');
      // Add further logic or redirect to a thank-you page
    } catch (error) {
      console.error('Error registering complaint:', error.message);
    }
  };

  return (
    <form onSubmit={handleSubmit}>
      <label>Title:</label>
      <input type="text" value={title} onChange={(e) => setTitle(e.target.value)} required />

      <label>Description:</label>
      <textarea value={description} onChange={(e) => setDescription(e.target.value)} required />

      <button type="submit">Submit Complaint</button>
    </form>
  );
};

export default ComplaintForm;
