import logo from './logo.svg';
import './App.css';
import { BrowserRouter, Route, Routes } from 'react-router-dom';
import StudentForm from './components/StudentForm';
import Home from './components/Home';
import ResultForm from './components/ResultForm';
import Navbar from './Layout/Navbar';
import ResultDisplay from './components/ResultDisplay';

function App() {
  return (

    <>
    <BrowserRouter>
    <Navbar/>
    <Routes>
         <Route path="/" element={<></>}></Route>
         <Route path="/home" element={<Home/>}></Route>
         <Route path="/enter-marks" element={<StudentForm/>}></Route>
         <Route path="/view-marks" element={<ResultForm/>}></Route>
         <Route path="/get-result" element={<ResultDisplay/>}></Route>
    </Routes>
    </BrowserRouter>
    </>
   
  );
}

export default App;
