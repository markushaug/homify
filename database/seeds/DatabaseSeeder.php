<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default Room
        DB::table('rooms')->insert([
            'room' => 'Default Room',
            'roomName' => 'default_room',
            'description' => 'Homify`s default room',
        ]);  
    }
}
