<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['name' => 'create_page'],  //1
            ['name' => 'edit_page'],    //2
            ['name' => 'delete_page'],  //3

            ['name' => 'create_post'],  //4
            ['name' => 'edit_post'],    //5
            ['name' => 'delete_post'],  //6

            ['name' => 'create_category'],  //7
            ['name' => 'edit_category'],    //8
            ['name' => 'delete_category'],  //9

            ['name' => 'create_user'],  //10
            ['name' => 'edit_user'],    //11
            ['name' => 'delete_user'],  //12

            ['name' => 'edit_comment']
        ]);

        //admin permissions
        $admin = Role::create([
            'name'  => 'admin',
            'level' => 1
        ]);
        $admin->permissions()->sync([1,2,3,4,5,6,7,8,9,10,11,12,13]);


        //editor permissions
        $editor = Role::create([
            'name'  => 'editor',
            'level' => 2
        ]);
        $editor->permissions()->sync([1,2,4,5]);


        //member permissions
        $member = Role::create([
            'name'  => 'member',
            'level' => 3
        ]);



    }
}
