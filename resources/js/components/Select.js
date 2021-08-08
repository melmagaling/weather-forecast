

import React from 'react';

const Select = ({ name, label, options, ...rest }) => {
  return (  
    <>
      <select  
        name={name}
        id={name}
        {...rest}
        className="mb-3 text-center m-auto text-2xl font-bold rounded border-2 border-blue-700 text-gray-600 h-14 w-60"
      >
        <option value="">- Select a {label}</option>
        {options.map(option => (
          <option key={option._id} value={option._id}>
            {option.name}
          </option>
        )
        )}
      </select>
    </>
  );
}
 
export default Select;