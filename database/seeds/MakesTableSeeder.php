<?php

use Illuminate\Database\Seeder;

class MakesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('makes')->delete();
        
        \DB::table('makes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'make_name' => 'Acura',
            ),
            1 => 
            array (
                'id' => 2,
                'make_name' => 'Alfa Romeo',
            ),
            2 => 
            array (
                'id' => 3,
                'make_name' => 'Aston Martin',
            ),
            3 => 
            array (
                'id' => 4,
                'make_name' => 'Audi',
            ),
            4 => 
            array (
                'id' => 5,
                'make_name' => 'Austin',
            ),
            5 => 
            array (
                'id' => 6,
                'make_name' => 'Bentley',
            ),
            6 => 
            array (
                'id' => 7,
                'make_name' => 'BMW',
            ),
            7 => 
            array (
                'id' => 8,
                'make_name' => 'Buick',
            ),
            8 => 
            array (
                'id' => 9,
                'make_name' => 'Cadillac',
            ),
            9 => 
            array (
                'id' => 10,
                'make_name' => 'Chevrolet',
            ),
            10 => 
            array (
                'id' => 11,
                'make_name' => 'Chrysler',
            ),
            11 => 
            array (
                'id' => 12,
                'make_name' => 'Daewoo',
            ),
            12 => 
            array (
                'id' => 13,
                'make_name' => 'Dodge',
            ),
            13 => 
            array (
                'id' => 14,
                'make_name' => 'Eagle',
            ),
            14 => 
            array (
                'id' => 15,
                'make_name' => 'Ferrari',
            ),
            15 => 
            array (
                'id' => 16,
                'make_name' => 'Fiat',
            ),
            16 => 
            array (
                'id' => 17,
                'make_name' => 'Ford',
            ),
            17 => 
            array (
                'id' => 18,
                'make_name' => 'Geo',
            ),
            18 => 
            array (
                'id' => 19,
                'make_name' => 'GMC',
            ),
            19 => 
            array (
                'id' => 20,
                'make_name' => 'Honda',
            ),
            20 => 
            array (
                'id' => 21,
                'make_name' => 'Hummer',
            ),
            21 => 
            array (
                'id' => 22,
                'make_name' => 'Hyundai',
            ),
            22 => 
            array (
                'id' => 23,
                'make_name' => 'Infiniti',
            ),
            23 => 
            array (
                'id' => 24,
                'make_name' => 'International',
            ),
            24 => 
            array (
                'id' => 25,
                'make_name' => 'Isuzu',
            ),
            25 => 
            array (
                'id' => 26,
                'make_name' => 'Jaguar',
            ),
            26 => 
            array (
                'id' => 27,
                'make_name' => 'Jeep',
            ),
            27 => 
            array (
                'id' => 28,
                'make_name' => 'Kawasaki',
            ),
            28 => 
            array (
                'id' => 29,
                'make_name' => 'Kenworth',
            ),
            29 => 
            array (
                'id' => 30,
                'make_name' => 'Kia',
            ),
            30 => 
            array (
                'id' => 31,
                'make_name' => 'Lamborghini',
            ),
            31 => 
            array (
                'id' => 32,
                'make_name' => 'Land Rover',
            ),
            32 => 
            array (
                'id' => 33,
                'make_name' => 'Lexus',
            ),
            33 => 
            array (
                'id' => 34,
                'make_name' => 'Lincoln',
            ),
            34 => 
            array (
                'id' => 35,
                'make_name' => 'Lotus',
            ),
            35 => 
            array (
                'id' => 36,
                'make_name' => 'Maserati',
            ),
            36 => 
            array (
                'id' => 37,
                'make_name' => 'Mazda',
            ),
            37 => 
            array (
                'id' => 38,
                'make_name' => 'Mercedes-Benz',
            ),
            38 => 
            array (
                'id' => 39,
                'make_name' => 'Mercury',
            ),
            39 => 
            array (
                'id' => 40,
                'make_name' => 'MG',
            ),
            40 => 
            array (
                'id' => 41,
                'make_name' => 'Mini',
            ),
            41 => 
            array (
                'id' => 42,
                'make_name' => 'Mitsubishi',
            ),
            42 => 
            array (
                'id' => 43,
                'make_name' => 'Nissan',
            ),
            43 => 
            array (
                'id' => 44,
                'make_name' => 'Oldsmobile',
            ),
            44 => 
            array (
                'id' => 45,
                'make_name' => 'Plymouth',
            ),
            45 => 
            array (
                'id' => 46,
                'make_name' => 'Pontiac',
            ),
            46 => 
            array (
                'id' => 47,
                'make_name' => 'Porsche',
            ),
            47 => 
            array (
                'id' => 48,
                'make_name' => 'Ram',
            ),
            48 => 
            array (
                'id' => 49,
                'make_name' => 'Rolls-Royce',
            ),
            49 => 
            array (
                'id' => 50,
                'make_name' => 'Saab',
            ),
            50 => 
            array (
                'id' => 51,
                'make_name' => 'Saturn',
            ),
            51 => 
            array (
                'id' => 52,
                'make_name' => 'Scion',
            ),
            52 => 
            array (
                'id' => 53,
                'make_name' => 'smart',
            ),
            53 => 
            array (
                'id' => 54,
                'make_name' => 'Subaru',
            ),
            54 => 
            array (
                'id' => 55,
                'make_name' => 'Suzuki',
            ),
            55 => 
            array (
                'id' => 56,
                'make_name' => 'Toyota',
            ),
            56 => 
            array (
                'id' => 57,
                'make_name' => 'Volkswagen',
            ),
            57 => 
            array (
                'id' => 58,
                'make_name' => 'Volvo',
            ),
            58 => 
            array (
                'id' => 59,
                'make_name' => 'Yugo',
            ),
        ));
        
        
    }
}
