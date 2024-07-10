const fetch = require('node-fetch');
const mysql = require('mysql');

// Configuración de la conexión a la base de datos
const dbConfig = {
  host: 'https://auth-db1005.hstgr.io/index.php?db=u786856865_senavocado',
  user: 'u786856865_ingluisnavas',
  password: 'N@vas1067.*+',
  database: 'u786856865_senavocado',
};

const connection = mysql.createConnection(dbConfig);

// Función para obtener datos de la API y guardarlos en la base de datos
async function fetchDataAndSave() {
  try {
    // URL de la API de OpenWeatherMap con las coordenadas de ejemplo
    const apiUrl = 'https://api.openweathermap.org/data/2.5/weather?lat=44.34&lon=10.99&appid=37fea198fdf3c40e6aeaa1f7b792a7c6';

    // Realizar solicitud a la API de OpenWeatherMap
    const response = await fetch(apiUrl);
    const data = await response.json();

    // Insertar datos en la base de datos
    const sql = 'INSERT INTO weather_data (lon, lat, weather_id, weather_main, weather_description, weather_icon, base, temp, feels_like, temp_min, temp_max, pressure, humidity, visibility, wind_speed, wind_deg, clouds_all, dt, sys_type, sys_id, sys_country, sys_sunrise, sys_sunset, timezone, city_id, city_name, cod) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
    const values = [
      data.coord.lon,
      data.coord.lat,
      data.weather[0].id,
      data.weather[0].main,
      data.weather[0].description,
      data.weather[0].icon,
      data.base,
      data.main.temp,
      data.main.feels_like,
      data.main.temp_min,
      data.main.temp_max,
      data.main.pressure,
      data.main.humidity,
      data.visibility,
      data.wind.speed,
      data.wind.deg,
      data.clouds.all,
      data.dt,
      data.sys.type,
      data.sys.id,
      data.sys.country,
      data.sys.sunrise,
      data.sys.sunset,
      data.timezone,
      data.id,
      data.name,
      data.cod,
    ];

    connection.query(sql, values, (err, results) => {
      if (err) throw err;
      console.log('Datos insertados correctamente:', results);
    });
  } catch (error) {
    console.error('Error al obtener o insertar datos:', error.message);
  }
}

// Ejecutar la función cada 10 minutos
setInterval(fetchDataAndSave, 600000); // 10 minutos en milisegundos

// También puedes ejecutar la función inmediatamente al iniciar la aplicación
fetchDataAndSave();