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
        // $this->call(UsersTableSeeder::class);
        \DB::table('things')->insert([
            'thing' => 'Sonos:Play1',
            'thingType' => 'Speaker',
            'binding' => 'Sonos',
            'password' => '',
            'default_on' => 'PLAY',
            'default_off' => 'STOP',
            'protocol' => 'upnp',
            'ip' => '10.10.3.1'
        ]);

        \DB::table('things')->insert([
            'thing' => 'Outlet:A',
            'thingType' => 'Switcher',
            'binding' => 'RFOutlet',
            'password' => '',
            'default_on' => '5506385',
            'default_off' => '5506388',
            'protocol' => 'rf',
            'ip' => ''
        ]);

        \DB::table('things')->insert([
            'thing' => 'Outlet:B',
            'thingType' => 'Switcher',
            'binding' => 'RFOutlet',
            'password' => '',
            'default_on' => '5509457',
            'default_off' => '5509460',
            'protocol' => 'rf',
            'ip' => ''
        ]);

        \DB::table('things')->insert([
            'thing' => 'Outlet:C',
            'thingType' => 'Switcher',
            'binding' => 'RFOutlet',
            'password' => '',
            'default_on' => '5510225',
            'default_off' => '5510228',
            'protocol' => 'rf',
            'ip' => ''
        ]);
    }
}
