<?php

namespace App\Console\Commands;

use App\Models\Destination;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ExportDestinations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:destinations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $destinations = Destination::all();
        $csvHeader = ['name', 'description', 'price', 'duration'];
        $csvData = $destinations->map(function ($destination) {
            return [
                $destination->name,
                $destination->description,
                $destination->price,
                $destination->duration_trip,
            ];
        });

        $csvContent = implode(",", $csvHeader) . "\n";
        foreach ($csvData as $row) {
            $csvContent .= implode(",", $row) . "\n";
        }

        Storage::put('destinations.csv', $csvContent);
        $this->info('Destinations exported to CSV successfully!');
    }
}
