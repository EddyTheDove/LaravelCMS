<?php

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sendgrid = Service::create(['name' => 'Sendgrid']);
        $sendgrid->fields()->create(['name' => 'driver', 'value' => 'smtp']);
        $sendgrid->fields()->create(['name' => 'host', 'value' => 'smtp.sendgrid.net']);
        $sendgrid->fields()->create(['name' => 'port', 'value' => '465']);
        $sendgrid->fields()->create(['name' => 'username', 'value' => 'username']);
        $sendgrid->fields()->create(['name' => 'password', 'value' => 'password']);


        $fb = Service::create(['name' => 'Facebook Login']);
        $fb->fields()->create(['name' => 'client_id', 'value' => 'xxxxxxxxxxxxxxxxxx']);
        $fb->fields()->create(['name' => 'client_secret', 'value' => 'xxxxxxxxxxxxxxxxxx']);
        $fb->fields()->create(['name' => 'redirect', 'value' => url('social/facebook')]);


        $google = Service::create(['name' => 'Google Login']);
        $google->fields()->create(['name' => 'client_id', 'value' => 'xxxxxxxxxxxxxxxxxx']);
        $google->fields()->create(['name' => 'client_secret', 'value' => 'xxxxxxxxxxxxxxxxxx']);
        $google->fields()->create(['name' => 'redirect', 'value' => url('social/google')]);
    }
}
