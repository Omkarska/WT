import React, { useState } from 'react';
import './App.css';
import InputField from './InputField';
import BillBreakdown from './BillBreakdown';

function App() {
  const [units, setUnits] = useState(0); // Define units state
  const [totalPayable, setTotalPayable] = useState(0);

  const calculateBill = (inputUnits) => {
    // Perform the bill calculation here based on the inputUnits
    // Replace this with your actual calculation
    const first50UnitsCost = 50 * 3.5;
    const next100UnitsCost = 100 * 4.0;
    const remainingUnits = inputUnits - 50 - 100;
    const remainingUnitsCost = remainingUnits * 5.2;
    const total = first50UnitsCost + next100UnitsCost + remainingUnitsCost;

    setUnits(inputUnits); // Update units state
    setTotalPayable(total);
  };

  return (
    <div className="App">
      <InputField onCalculate={calculateBill} />
      {totalPayable > 0 && (
        <BillBreakdown units={units} totalPayable={totalPayable} />
      )}
    </div>
  );
}

export default App;
