<?php

use App\Event;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'title' => 'Groundhog Day',
            'start_date' => Carbon::parse('February 2, 2019'),
            'description' => 'Will spring come?',
        ]);

        Event::create([
            'title' => 'My birthday',
            'start_date' => Carbon::parse('June 2, 2019'),
            'description' => 'Big party at Jonathan\'s place!',
        ]);

        Event::create([
            'title' => 'Laracon US',
            'start_date' => Carbon::parse('July 24, 2019'),
            'description' => 'Laracon VII is coming and tickets are first come, first serve. Sign up to get notified when tickets are available!',
        ]);
    }
}
