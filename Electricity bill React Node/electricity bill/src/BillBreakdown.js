import React from 'react';

function BillBreakdown({ units, totalPayable }) {
  return (
    <div>
      <h2>Bill Breakdown for {units} units:</h2>
      <p>First 50 units x Rs. 3.50 = Rs. 175.00</p>
      <p>Next 100 units x Rs. 4.00 = Rs. 400.00</p>
      <p>Next 90 units x Rs. 5.20 = Rs. 468.00</p>
      <p>Total Payable: Rs. {totalPayable.toFixed(2)}</p>
    </div>
  );
}

export default BillBreakdown;
