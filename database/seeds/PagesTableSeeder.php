<?php

use Illuminate\Database\Seeder;
use App\Models\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
            'title'     => 'Sample Page',
            'slug'      => 'sample-page',
            'tags'      => 'sample, page',
            'content'   => 'Sample page content',
            'last_updated_by' => 1
        ]);
    }
}
