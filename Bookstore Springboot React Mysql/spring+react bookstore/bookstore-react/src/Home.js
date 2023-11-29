import React, { useEffect, useState } from 'react';
import Cookies from 'js-cookie';
import { useNavigate } from 'react-router-dom';
import BookCard from './BookCard';

function Home() {
  const [books, setBooks] = useState([]);
  const navigate = useNavigate();

  useEffect(() => {
    const username = Cookies.get('username');
    if (!username) {
        navigate('/login');
    } else {
      fetch('http://localhost:8080/books/get')
        .then((response) => response.json())
        .then((data) => setBooks(data))
        .catch((error) => console.error('Error fetching books:', error));
    }
  }, [navigate]);

  return (
      <div>
      <h1>Welcome to the Home Page</h1>
      <h2>Books:</h2>
      <div style={{ display: 'grid', gridTemplateColumns: 'repeat(3, 1fr)', gridGap: '10px' }}>
        
      {books.map((book) => (
          <BookCard
          key={book.id}
          bookName={book.bookName}
          price={book.price}
          description={book.description}
          category={book.category}
          />
          ))}
          </div>
    </div>
  );
}

export default Home;
