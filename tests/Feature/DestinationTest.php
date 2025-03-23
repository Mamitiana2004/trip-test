<?php

namespace Tests\Feature;

use App\Models\Destination;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DestinationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function canCreate()
    {
        $destination = Destination::create([
            'name' => 'Paris',
            'description' => '3 nuits dans un hôtel',
            'price' => 100,
            'duration' => 7,
            'image' => 'paris.jpg',
        ]);

        $this->assertDatabaseHas('destinations', [
            'name' => 'Paris',
            'price' => 100,
        ]);
    }

}
