import logo from './logo.svg';
import './App.css';
import { BrowserRouter, Route, Routes } from 'react-router-dom';
import Navbar from './Layout/Navbar';
import Home from './Pages/Home';
import Bill from './Pages/Bill';

function App() {
  return (
   <>
   <BrowserRouter>
   <Navbar/>
   <Routes>
        <Route path="/" element={<></>}></Route>
        <Route path="/home" element={<Home />}></Route>
        <Route path="/bill" element={<Bill />}></Route>
   </Routes>
   </BrowserRouter>
   </>
  );
}

export default App;
