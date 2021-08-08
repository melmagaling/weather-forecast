<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use Symfony\Component\Console\Helper\Table;

class WeatherForecast extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:forecast {location=""}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'weather:forecast {location: the name of location, seperated comma for multiple location';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $locationName = $this->argument('location');
        $locationArray = explode(',', $locationName);
        $responses = collect([]);
        $apiUrl = config('app.url');
        foreach($locationArray as $location){
            $response = Http::get("{$apiUrl}/api/forecast/{$location}");

            if ($response->successful()) {
                $responses->put($location, $response->json());
            } else {
                if ($response->clientError()) {
                    $this->error("Error performing request: " . $response->getStatusCode());
                } elseif ($response->serverError()) {
                    $this->error("Error from Server: " . $response->getStatusCode());
                } else {
                    $this->error("Error! " . $response->getStatusCode());
                }
            }
        }

        if ($responses->count() === 0) {
            $this->line('Check your city if correct. Please try again!');
            return 0;
        }


        $this->line('Weather Forecaset');
        foreach($responses->all()  as $key => $weather) {
            $this->line('City: ' . $key);
            $table = new Table($this->output);

            // Set the table headers.
            $table->setHeaders([
                'Date', 'Weather Description', 'Temp Min °C', 'Temp Max °C'
            ]);

            $lists = [];
            foreach($weather['list'] as $list){
                $day = Carbon::parse($list['dt'])->format('D, M d, Y H:i:s');
                $lists[] = [$day, $list['weather'][0]['description'], $list['main']['temp_min']. '°C', $list['main']['temp_max'].'°C'];
            }

            // Set the contents of the table.
            $table->setRows($lists);
            // Render the table to the output.
            $table->render();
        }
    }
}
