<?php

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('provinces')->delete();
        
        \DB::table('provinces')->insert(array (
            0 => 
            array (
                'id' => 1,
                'province_name' => 'Newfoundland',
                'province_code' => 'NL',
            ),
            1 => 
            array (
                'id' => 2,
                'province_name' => 'Nova Scotia',
                'province_code' => 'NS',
            ),
            2 => 
            array (
                'id' => 3,
                'province_name' => 'Prince Edward Island',
                'province_code' => 'PE',
            ),
            3 => 
            array (
                'id' => 4,
                'province_name' => 'New Brunswick',
                'province_code' => 'NB',
            ),
            4 => 
            array (
                'id' => 5,
                'province_name' => 'Quebec',
                'province_code' => 'QC',
            ),
            5 => 
            array (
                'id' => 6,
                'province_name' => 'Ontario',
                'province_code' => 'ON',
            ),
            6 => 
            array (
                'id' => 7,
                'province_name' => 'Manitoba',
                'province_code' => 'MB',
            ),
            7 => 
            array (
                'id' => 8,
                'province_name' => 'Saskatchewan',
                'province_code' => 'SK',
            ),
            8 => 
            array (
                'id' => 9,
                'province_name' => 'Alberta',
                'province_code' => 'AB',
            ),
            9 => 
            array (
                'id' => 10,
                'province_name' => 'British Columbia',
                'province_code' => 'BC',
            ),
            10 => 
            array (
                'id' => 11,
                'province_name' => 'Nunavut',
                'province_code' => 'NU',
            ),
            11 => 
            array (
                'id' => 12,
                'province_name' => 'Northwest Territories',
                'province_code' => 'NT',
            ),
            12 => 
            array (
                'id' => 13,
                'province_name' => 'Yukon Territory',
                'province_code' => 'YT',
            ),
        ));
        
        
    }
}
