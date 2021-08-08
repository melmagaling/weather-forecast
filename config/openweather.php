<?php

return [
  'api_url' => env('OPENWEATHER_API_URL', 'NOAPIURL'),
  'api_key' => env('OPENWEATHER_API_KEY', 'NOAPIKEY'),
  'api_lang' => env('OPENWEATHER_API_LANG', 'NOAPILANG'),
  'api_date_format' => env('OPENWEATHER_API_DATE_FORMAT', 'm/d/Y'),
  'api_time_format' => env('OPENWEATHER_API_TIME_FORMAT', 'h:i A'),
  'api_day_format' => env('OPENWEATHER_API_DAY_FOPMAT', 'l')
];
