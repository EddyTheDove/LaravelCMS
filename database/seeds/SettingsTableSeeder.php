<?php

use Illuminate\Database\Seeder;
use App\Models\Settings;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::create([
            'app_name'      => 'My Awesome Blog',
            'app_motto'     => 'The best blog ever',
            'admin_email'   => 'admin@email.com'
        ]);
    }
}
