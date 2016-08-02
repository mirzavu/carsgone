<?php

use Illuminate\Database\Seeder;

class BodyStyleGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('body_style_groups')->insert([[
            'body_style_group_name' => 'Sedan'],[
            'body_style_group_name' => 'Convertible'],[
            'body_style_group_name' => 'Hatchback'],[
            'body_style_group_name' => 'Van'],[
            'body_style_group_name' => 'SUV'],[
            'body_style_group_name' => 'Truck'],[
            'body_style_group_name' => 'Wagon'],[
            'body_style_group_name' => 'Coupe']
        ]);
    }
}
