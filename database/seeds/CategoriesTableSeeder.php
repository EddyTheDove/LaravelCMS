<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
            'name'     => 'Uncategorized',
            'slug'      => 'uncategorized'
        ]);
    }
}
