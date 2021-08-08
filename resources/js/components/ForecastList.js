import moment from 'moment';

const ForecastList = (props) => {
  return (  
    <ul className="forecast bg-gray-700 px-4 py-4 space-y-8">
        { props.forecast.map((item, index) => (
            <li key={index} className="grid grid-cols-weather">
                <div className="text-gray-400 flex items-center">{ moment.unix(item.dt).format("YYYY-MM-DD HH:mm:ss") }</div>
                <div className="flex items-center">
                    <div><img src={`http://openweathermap.org/img/wn/${item.weather[0].icon}@2x.png`} /></div>
                    <div>{item.weather[0].description}</div>
                </div>
                <div className="text-right text-xs flex items-center">
                    <div>{item.main.temp_min}&#176;C</div>
                    <div>{item.main.temp_max}&#176;C</div>
                </div>
            </li>
        )
        )}
    </ul>
  );
}
 
export default ForecastList;