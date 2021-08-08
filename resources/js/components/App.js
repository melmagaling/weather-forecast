import React, {useEffect, useState} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import ForecastList from './ForecastList';
import Select from './Select';

function App() {
    const [forecast, setForecast] = useState([]);
    const [selectedCity, setSelectedCity] = useState();
    const cities = [
        { name: 'Manila', _id:'manila' },
        { name: 'Baguio', _id:'baguio' },
        { name: 'Cebu', _id:'cebu' },
        { name: 'Davao', _id:'davao' },
        { name: 'Vigan', _id:'vigan' },
    ]

    const handleChange = (e) => {
        setSelectedCity(e.target.value);
    }

    useEffect(() => {
        async function fetchData() {
            let response = await axios.get(`/api/forecast/${selectedCity}`);
            setForecast(response.data.list);
        }
        if (selectedCity !== undefined)
            fetchData();
    }, [selectedCity]);

    return (
        <div className="mt-8">
            <div className="w-128 mx-auto bg-gray-900 text-white text-sm rounded-lg overflow-hidden">
                <div className="dropdown bg-white text-black-100 p-2">
                    <h2 className="text-black text-3xl mb-3"> Daily Forecast</h2>
                    <Select 
                        name='city'
                        label='City'
                        options={cities} 
                        onChange={handleChange} 
                    />
                </div>
                { forecast.length > 0 ? (
                    <ForecastList forecast={forecast} />
                ) : (
                    <p className="p-4"> Please select city to see the weather forecast. </p>
                )}
            </div>
        </div>
    );
} 

export default App;

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}
