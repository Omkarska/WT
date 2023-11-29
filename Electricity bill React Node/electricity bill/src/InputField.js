import React, { useState } from 'react';

function InputField({ onCalculate }) {
  const [units, setUnits] = useState(0);

  const handleCalculate = () => {
    onCalculate(units);
  };

  return (
    <div>
      <label>Electricity Bill Units: </label>
      <input
        type="number"
        value={units}
        onChange={(e) => setUnits(e.target.value)}
      />
      <button onClick={handleCalculate}>Calculate</button>
    </div>
  );
}

export default InputField;
