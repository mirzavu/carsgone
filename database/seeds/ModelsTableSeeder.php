<?php

use Illuminate\Database\Seeder;

class ModelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('models')->delete();
        
        \DB::table('models')->insert(array (
            0 => 
            array (
                'id' => 1,
                'model_name' => 'CL',
                'make_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'model_name' => 'CSX',
                'make_id' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'model_name' => 'EL',
                'make_id' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'model_name' => 'Integra',
                'make_id' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'model_name' => 'MDX',
                'make_id' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'model_name' => 'RDX',
                'make_id' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'model_name' => 'RL',
                'make_id' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'model_name' => 'RSX',
                'make_id' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'model_name' => 'SLX',
                'make_id' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'model_name' => 'TL',
                'make_id' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'model_name' => 'TSX',
                'make_id' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'model_name' => 'ZDX',
                'make_id' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'model_name' => 'Spider',
                'make_id' => 2,
            ),
            13 => 
            array (
                'id' => 14,
                'model_name' => 'DB9',
                'make_id' => 3,
            ),
            14 => 
            array (
                'id' => 15,
                'model_name' => 'DBS',
                'make_id' => 3,
            ),
            15 => 
            array (
                'id' => 16,
                'model_name' => 'RAPIDE',
                'make_id' => 3,
            ),
            16 => 
            array (
                'id' => 17,
                'model_name' => 'V8 Vantage',
                'make_id' => 3,
            ),
            17 => 
            array (
                'id' => 18,
                'model_name' => 'Virage',
                'make_id' => 3,
            ),
            18 => 
            array (
                'id' => 19,
                'model_name' => '100',
                'make_id' => 4,
            ),
            19 => 
            array (
                'id' => 20,
                'model_name' => 'A3',
                'make_id' => 4,
            ),
            20 => 
            array (
                'id' => 21,
                'model_name' => 'A4',
                'make_id' => 4,
            ),
            21 => 
            array (
                'id' => 22,
                'model_name' => 'A5',
                'make_id' => 4,
            ),
            22 => 
            array (
                'id' => 23,
                'model_name' => 'A6',
                'make_id' => 4,
            ),
            23 => 
            array (
                'id' => 24,
                'model_name' => 'A8',
                'make_id' => 4,
            ),
            24 => 
            array (
                'id' => 25,
                'model_name' => 'Allroad',
                'make_id' => 4,
            ),
            25 => 
            array (
                'id' => 26,
                'model_name' => 'Allroad quattro',
                'make_id' => 4,
            ),
            26 => 
            array (
                'id' => 27,
                'model_name' => 'Q5',
                'make_id' => 4,
            ),
            27 => 
            array (
                'id' => 28,
                'model_name' => 'Q7',
                'make_id' => 4,
            ),
            28 => 
            array (
                'id' => 29,
                'model_name' => 'R8',
                'make_id' => 4,
            ),
            29 => 
            array (
                'id' => 30,
                'model_name' => 'RS4',
                'make_id' => 4,
            ),
            30 => 
            array (
                'id' => 31,
                'model_name' => 'S4',
                'make_id' => 4,
            ),
            31 => 
            array (
                'id' => 32,
                'model_name' => 'S5',
                'make_id' => 4,
            ),
            32 => 
            array (
                'id' => 33,
                'model_name' => 'S6',
                'make_id' => 4,
            ),
            33 => 
            array (
                'id' => 34,
                'model_name' => 'S8',
                'make_id' => 4,
            ),
            34 => 
            array (
                'id' => 35,
                'model_name' => 'TT',
                'make_id' => 4,
            ),
            35 => 
            array (
                'id' => 36,
                'model_name' => 'TT RS',
                'make_id' => 4,
            ),
            36 => 
            array (
                'id' => 37,
                'model_name' => 'TTS',
                'make_id' => 4,
            ),
            37 => 
            array (
                'id' => 38,
                'model_name' => 'A',
                'make_id' => 5,
            ),
            38 => 
            array (
                'id' => 39,
                'model_name' => 'Arnage',
                'make_id' => 6,
            ),
            39 => 
            array (
                'id' => 40,
                'model_name' => 'Continental',
                'make_id' => 6,
            ),
            40 => 
            array (
                'id' => 41,
                'model_name' => 'Continental GT',
                'make_id' => 6,
            ),
            41 => 
            array (
                'id' => 42,
                'model_name' => '1 Series',
                'make_id' => 7,
            ),
            42 => 
            array (
                'id' => 43,
                'model_name' => '3 Series',
                'make_id' => 7,
            ),
            43 => 
            array (
                'id' => 44,
                'model_name' => '318TI',
                'make_id' => 7,
            ),
            44 => 
            array (
                'id' => 45,
                'model_name' => '320i',
                'make_id' => 7,
            ),
            45 => 
            array (
                'id' => 46,
                'model_name' => '323I',
                'make_id' => 7,
            ),
            46 => 
            array (
                'id' => 47,
                'model_name' => '325Ci',
                'make_id' => 7,
            ),
            47 => 
            array (
                'id' => 48,
                'model_name' => '325i',
                'make_id' => 7,
            ),
            48 => 
            array (
                'id' => 49,
                'model_name' => '325xi',
                'make_id' => 7,
            ),
            49 => 
            array (
                'id' => 50,
                'model_name' => '328Ci',
                'make_id' => 7,
            ),
            50 => 
            array (
                'id' => 51,
                'model_name' => '328I',
                'make_id' => 7,
            ),
            51 => 
            array (
                'id' => 52,
                'model_name' => '330Ci',
                'make_id' => 7,
            ),
            52 => 
            array (
                'id' => 53,
                'model_name' => '330i',
                'make_id' => 7,
            ),
            53 => 
            array (
                'id' => 54,
                'model_name' => '330xi',
                'make_id' => 7,
            ),
            54 => 
            array (
                'id' => 55,
                'model_name' => '5 Series',
                'make_id' => 7,
            ),
            55 => 
            array (
                'id' => 56,
                'model_name' => '525i',
                'make_id' => 7,
            ),
            56 => 
            array (
                'id' => 57,
                'model_name' => '525xi',
                'make_id' => 7,
            ),
            57 => 
            array (
                'id' => 58,
                'model_name' => '528I',
                'make_id' => 7,
            ),
            58 => 
            array (
                'id' => 59,
                'model_name' => '530i',
                'make_id' => 7,
            ),
            59 => 
            array (
                'id' => 60,
                'model_name' => '530xi',
                'make_id' => 7,
            ),
            60 => 
            array (
                'id' => 61,
                'model_name' => '535I',
                'make_id' => 7,
            ),
            61 => 
            array (
                'id' => 62,
                'model_name' => '540I',
                'make_id' => 7,
            ),
            62 => 
            array (
                'id' => 63,
                'model_name' => '545i',
                'make_id' => 7,
            ),
            63 => 
            array (
                'id' => 64,
                'model_name' => '6 Series',
                'make_id' => 7,
            ),
            64 => 
            array (
                'id' => 65,
                'model_name' => '645Ci',
                'make_id' => 7,
            ),
            65 => 
            array (
                'id' => 66,
                'model_name' => '7 Series',
                'make_id' => 7,
            ),
            66 => 
            array (
                'id' => 67,
                'model_name' => '745Li',
                'make_id' => 7,
            ),
            67 => 
            array (
                'id' => 68,
                'model_name' => '750iL',
                'make_id' => 7,
            ),
            68 => 
            array (
                'id' => 69,
                'model_name' => '850I',
                'make_id' => 7,
            ),
            69 => 
            array (
                'id' => 70,
                'model_name' => 'M',
                'make_id' => 7,
            ),
            70 => 
            array (
                'id' => 71,
                'model_name' => 'M Series',
                'make_id' => 7,
            ),
            71 => 
            array (
                'id' => 72,
                'model_name' => 'M3',
                'make_id' => 7,
            ),
            72 => 
            array (
                'id' => 73,
                'model_name' => 'M5',
                'make_id' => 7,
            ),
            73 => 
            array (
                'id' => 74,
                'model_name' => 'M6',
                'make_id' => 7,
            ),
            74 => 
            array (
                'id' => 75,
                'model_name' => 'Series 3',
                'make_id' => 7,
            ),
            75 => 
            array (
                'id' => 76,
                'model_name' => 'Series 5',
                'make_id' => 7,
            ),
            76 => 
            array (
                'id' => 77,
                'model_name' => 'Series 6',
                'make_id' => 7,
            ),
            77 => 
            array (
                'id' => 78,
                'model_name' => 'Series 7',
                'make_id' => 7,
            ),
            78 => 
            array (
                'id' => 79,
                'model_name' => 'X1',
                'make_id' => 7,
            ),
            79 => 
            array (
                'id' => 80,
                'model_name' => 'X3',
                'make_id' => 7,
            ),
            80 => 
            array (
                'id' => 81,
                'model_name' => 'X5',
                'make_id' => 7,
            ),
            81 => 
            array (
                'id' => 82,
                'model_name' => 'X6',
                'make_id' => 7,
            ),
            82 => 
            array (
                'id' => 83,
                'model_name' => 'Z3',
                'make_id' => 7,
            ),
            83 => 
            array (
                'id' => 84,
                'model_name' => 'Z4',
                'make_id' => 7,
            ),
            84 => 
            array (
                'id' => 85,
                'model_name' => 'Z8',
                'make_id' => 7,
            ),
            85 => 
            array (
                'id' => 86,
                'model_name' => 'Allure',
                'make_id' => 8,
            ),
            86 => 
            array (
                'id' => 87,
                'model_name' => 'Century',
                'make_id' => 8,
            ),
            87 => 
            array (
                'id' => 88,
                'model_name' => 'Electra',
                'make_id' => 8,
            ),
            88 => 
            array (
                'id' => 89,
                'model_name' => 'Enclave',
                'make_id' => 8,
            ),
            89 => 
            array (
                'id' => 90,
                'model_name' => 'LaCrosse',
                'make_id' => 8,
            ),
            90 => 
            array (
                'id' => 91,
                'model_name' => 'LeSabre',
                'make_id' => 8,
            ),
            91 => 
            array (
                'id' => 92,
                'model_name' => 'Lucerne',
                'make_id' => 8,
            ),
            92 => 
            array (
                'id' => 93,
                'model_name' => 'Park Avenue',
                'make_id' => 8,
            ),
            93 => 
            array (
                'id' => 94,
                'model_name' => 'Rainier',
                'make_id' => 8,
            ),
            94 => 
            array (
                'id' => 95,
                'model_name' => 'Reatta',
                'make_id' => 8,
            ),
            95 => 
            array (
                'id' => 96,
                'model_name' => 'Regal',
                'make_id' => 8,
            ),
            96 => 
            array (
                'id' => 97,
                'model_name' => 'Rendezvous',
                'make_id' => 8,
            ),
            97 => 
            array (
                'id' => 98,
                'model_name' => 'Riviera',
                'make_id' => 8,
            ),
            98 => 
            array (
                'id' => 99,
                'model_name' => 'Skylark',
                'make_id' => 8,
            ),
            99 => 
            array (
                'id' => 100,
                'model_name' => 'Terraza',
                'make_id' => 8,
            ),
            100 => 
            array (
                'id' => 101,
                'model_name' => 'Allante',
                'make_id' => 9,
            ),
            101 => 
            array (
                'id' => 102,
                'model_name' => 'Brougham',
                'make_id' => 9,
            ),
            102 => 
            array (
                'id' => 103,
                'model_name' => 'Catera',
                'make_id' => 9,
            ),
            103 => 
            array (
                'id' => 104,
                'model_name' => 'CTS',
                'make_id' => 9,
            ),
            104 => 
            array (
                'id' => 105,
                'model_name' => 'CTS Coupe',
                'make_id' => 9,
            ),
            105 => 
            array (
                'id' => 106,
                'model_name' => 'CTS Sport Wagon',
                'make_id' => 9,
            ),
            106 => 
            array (
                'id' => 107,
                'model_name' => 'De Ville',
                'make_id' => 9,
            ),
            107 => 
            array (
                'id' => 108,
                'model_name' => 'DeVille',
                'make_id' => 9,
            ),
            108 => 
            array (
                'id' => 109,
                'model_name' => 'DTS',
                'make_id' => 9,
            ),
            109 => 
            array (
                'id' => 110,
                'model_name' => 'Eldorado',
                'make_id' => 9,
            ),
            110 => 
            array (
                'id' => 111,
                'model_name' => 'Escalade',
                'make_id' => 9,
            ),
            111 => 
            array (
                'id' => 112,
                'model_name' => 'Escalade ESV',
                'make_id' => 9,
            ),
            112 => 
            array (
                'id' => 113,
                'model_name' => 'Escalade EXT',
                'make_id' => 9,
            ),
            113 => 
            array (
                'id' => 114,
                'model_name' => 'Fleetwood',
                'make_id' => 9,
            ),
            114 => 
            array (
                'id' => 115,
                'model_name' => 'Seville',
                'make_id' => 9,
            ),
            115 => 
            array (
                'id' => 116,
                'model_name' => 'SRX',
                'make_id' => 9,
            ),
            116 => 
            array (
                'id' => 117,
                'model_name' => 'STS',
                'make_id' => 9,
            ),
            117 => 
            array (
                'id' => 118,
                'model_name' => 'XLR',
                'make_id' => 9,
            ),
            118 => 
            array (
                'id' => 119,
                'model_name' => '150',
                'make_id' => 10,
            ),
            119 => 
            array (
                'id' => 120,
                'model_name' => '1500',
                'make_id' => 10,
            ),
            120 => 
            array (
                'id' => 121,
                'model_name' => '2500',
                'make_id' => 10,
            ),
            121 => 
            array (
                'id' => 122,
                'model_name' => '3500',
                'make_id' => 10,
            ),
            122 => 
            array (
                'id' => 123,
                'model_name' => 'Astro',
                'make_id' => 10,
            ),
            123 => 
            array (
                'id' => 124,
                'model_name' => 'Astro Cargo',
                'make_id' => 10,
            ),
            124 => 
            array (
                'id' => 125,
                'model_name' => 'Avalanche',
                'make_id' => 10,
            ),
            125 => 
            array (
                'id' => 126,
                'model_name' => 'Aveo',
                'make_id' => 10,
            ),
            126 => 
            array (
                'id' => 127,
                'model_name' => 'Aveo 5',
                'make_id' => 10,
            ),
            127 => 
            array (
                'id' => 128,
                'model_name' => 'Aveo5',
                'make_id' => 10,
            ),
            128 => 
            array (
                'id' => 129,
                'model_name' => 'Belair',
                'make_id' => 10,
            ),
            129 => 
            array (
                'id' => 130,
                'model_name' => 'Beretta',
                'make_id' => 10,
            ),
            130 => 
            array (
                'id' => 131,
                'model_name' => 'Blazer',
                'make_id' => 10,
            ),
            131 => 
            array (
                'id' => 132,
                'model_name' => 'C10',
                'make_id' => 10,
            ),
            132 => 
            array (
                'id' => 133,
                'model_name' => 'C1500',
                'make_id' => 10,
            ),
            133 => 
            array (
                'id' => 134,
                'model_name' => 'C2500',
                'make_id' => 10,
            ),
            134 => 
            array (
                'id' => 135,
                'model_name' => 'C3500',
                'make_id' => 10,
            ),
            135 => 
            array (
                'id' => 136,
                'model_name' => 'Camaro',
                'make_id' => 10,
            ),
            136 => 
            array (
                'id' => 137,
                'model_name' => 'Caprice',
                'make_id' => 10,
            ),
            137 => 
            array (
                'id' => 138,
                'model_name' => 'Cavalier',
                'make_id' => 10,
            ),
            138 => 
            array (
                'id' => 139,
                'model_name' => 'Chevelle',
                'make_id' => 10,
            ),
            139 => 
            array (
                'id' => 140,
                'model_name' => 'Chevy Van',
                'make_id' => 10,
            ),
            140 => 
            array (
                'id' => 141,
                'model_name' => 'Classic',
                'make_id' => 10,
            ),
            141 => 
            array (
                'id' => 142,
                'model_name' => 'Classic Silverado',
                'make_id' => 10,
            ),
            142 => 
            array (
                'id' => 143,
                'model_name' => 'Cobalt',
                'make_id' => 10,
            ),
            143 => 
            array (
                'id' => 144,
                'model_name' => 'Colorado',
                'make_id' => 10,
            ),
            144 => 
            array (
                'id' => 145,
                'model_name' => 'Corvette',
                'make_id' => 10,
            ),
            145 => 
            array (
                'id' => 146,
                'model_name' => 'Cruze',
                'make_id' => 10,
            ),
            146 => 
            array (
                'id' => 147,
                'model_name' => 'El Camino',
                'make_id' => 10,
            ),
            147 => 
            array (
                'id' => 148,
                'model_name' => 'Epica',
                'make_id' => 10,
            ),
            148 => 
            array (
                'id' => 149,
                'model_name' => 'Equinox',
                'make_id' => 10,
            ),
            149 => 
            array (
                'id' => 150,
                'model_name' => 'Express',
                'make_id' => 10,
            ),
            150 => 
            array (
                'id' => 151,
                'model_name' => 'Express Cargo',
                'make_id' => 10,
            ),
            151 => 
            array (
                'id' => 152,
                'model_name' => 'HHR',
                'make_id' => 10,
            ),
            152 => 
            array (
                'id' => 153,
                'model_name' => 'Impala',
                'make_id' => 10,
            ),
            153 => 
            array (
                'id' => 154,
                'model_name' => 'K1500',
                'make_id' => 10,
            ),
            154 => 
            array (
                'id' => 155,
                'model_name' => 'K2500',
                'make_id' => 10,
            ),
            155 => 
            array (
                'id' => 156,
                'model_name' => 'Lumina',
                'make_id' => 10,
            ),
            156 => 
            array (
                'id' => 157,
                'model_name' => 'Malibu',
                'make_id' => 10,
            ),
            157 => 
            array (
                'id' => 158,
                'model_name' => 'Malibu Maxx',
                'make_id' => 10,
            ),
            158 => 
            array (
                'id' => 159,
                'model_name' => 'Metro',
                'make_id' => 10,
            ),
            159 => 
            array (
                'id' => 160,
                'model_name' => 'Monte Carlo',
                'make_id' => 10,
            ),
            160 => 
            array (
                'id' => 161,
                'model_name' => 'Optra',
                'make_id' => 10,
            ),
            161 => 
            array (
                'id' => 162,
                'model_name' => 'Optra Wagon',
                'make_id' => 10,
            ),
            162 => 
            array (
                'id' => 163,
                'model_name' => 'Optra5',
                'make_id' => 10,
            ),
            163 => 
            array (
                'id' => 164,
                'model_name' => 'Orlando',
                'make_id' => 10,
            ),
            164 => 
            array (
                'id' => 165,
                'model_name' => 'Prizm',
                'make_id' => 10,
            ),
            165 => 
            array (
                'id' => 166,
                'model_name' => 'S-10',
                'make_id' => 10,
            ),
            166 => 
            array (
                'id' => 167,
                'model_name' => 'Silverado',
                'make_id' => 10,
            ),
            167 => 
            array (
                'id' => 168,
                'model_name' => 'Silverado 1500',
                'make_id' => 10,
            ),
            168 => 
            array (
                'id' => 169,
                'model_name' => 'Silverado 2500HD',
                'make_id' => 10,
            ),
            169 => 
            array (
                'id' => 170,
                'model_name' => 'Silverado 3500',
                'make_id' => 10,
            ),
            170 => 
            array (
                'id' => 171,
                'model_name' => 'Silverado 3500HD',
                'make_id' => 10,
            ),
            171 => 
            array (
                'id' => 172,
                'model_name' => 'Sonic',
                'make_id' => 10,
            ),
            172 => 
            array (
                'id' => 173,
                'model_name' => 'SSR',
                'make_id' => 10,
            ),
            173 => 
            array (
                'id' => 174,
                'model_name' => 'Suburban',
                'make_id' => 10,
            ),
            174 => 
            array (
                'id' => 175,
                'model_name' => 'Tahoe',
                'make_id' => 10,
            ),
            175 => 
            array (
                'id' => 176,
                'model_name' => 'Tracker',
                'make_id' => 10,
            ),
            176 => 
            array (
                'id' => 177,
                'model_name' => 'TrailBlazer',
                'make_id' => 10,
            ),
            177 => 
            array (
                'id' => 178,
                'model_name' => 'Traverse',
                'make_id' => 10,
            ),
            178 => 
            array (
                'id' => 179,
                'model_name' => 'Uplander',
                'make_id' => 10,
            ),
            179 => 
            array (
                'id' => 180,
                'model_name' => 'Venture',
                'make_id' => 10,
            ),
            180 => 
            array (
                'id' => 181,
                'model_name' => 'Volt',
                'make_id' => 10,
            ),
            181 => 
            array (
                'id' => 182,
                'model_name' => '200',
                'make_id' => 11,
            ),
            182 => 
            array (
                'id' => 183,
                'model_name' => '300',
                'make_id' => 11,
            ),
            183 => 
            array (
                'id' => 184,
                'model_name' => '300C',
                'make_id' => 11,
            ),
            184 => 
            array (
                'id' => 185,
                'model_name' => '300M',
                'make_id' => 11,
            ),
            185 => 
            array (
                'id' => 186,
                'model_name' => 'Aspen',
                'make_id' => 11,
            ),
            186 => 
            array (
                'id' => 187,
                'model_name' => 'Cirrus',
                'make_id' => 11,
            ),
            187 => 
            array (
                'id' => 188,
                'model_name' => 'Concorde',
                'make_id' => 11,
            ),
            188 => 
            array (
                'id' => 189,
                'model_name' => 'Crossfire',
                'make_id' => 11,
            ),
            189 => 
            array (
                'id' => 190,
                'model_name' => 'Dynasty',
                'make_id' => 11,
            ),
            190 => 
            array (
                'id' => 191,
                'model_name' => 'Intrepid',
                'make_id' => 11,
            ),
            191 => 
            array (
                'id' => 192,
                'model_name' => 'LeBaron',
                'make_id' => 11,
            ),
            192 => 
            array (
                'id' => 193,
                'model_name' => 'LHS',
                'make_id' => 11,
            ),
            193 => 
            array (
                'id' => 194,
                'model_name' => 'Neon',
                'make_id' => 11,
            ),
            194 => 
            array (
                'id' => 195,
                'model_name' => 'New Yorker',
                'make_id' => 11,
            ),
            195 => 
            array (
                'id' => 196,
                'model_name' => 'Pacifica',
                'make_id' => 11,
            ),
            196 => 
            array (
                'id' => 197,
                'model_name' => 'Prowler',
                'make_id' => 11,
            ),
            197 => 
            array (
                'id' => 198,
                'model_name' => 'PT Cruiser',
                'make_id' => 11,
            ),
            198 => 
            array (
                'id' => 199,
                'model_name' => 'Sebring',
                'make_id' => 11,
            ),
            199 => 
            array (
                'id' => 200,
                'model_name' => 'Sebring Convertible',
                'make_id' => 11,
            ),
            200 => 
            array (
                'id' => 201,
                'model_name' => 'Town & Country',
                'make_id' => 11,
            ),
            201 => 
            array (
                'id' => 202,
                'model_name' => 'Lanos',
                'make_id' => 12,
            ),
            202 => 
            array (
                'id' => 203,
                'model_name' => 'Nubira',
                'make_id' => 12,
            ),
            203 => 
            array (
                'id' => 204,
                'model_name' => '100',
                'make_id' => 13,
            ),
            204 => 
            array (
                'id' => 205,
                'model_name' => '1500',
                'make_id' => 13,
            ),
            205 => 
            array (
                'id' => 206,
                'model_name' => '350',
                'make_id' => 13,
            ),
            206 => 
            array (
                'id' => 207,
                'model_name' => 'Avenger',
                'make_id' => 13,
            ),
            207 => 
            array (
                'id' => 208,
                'model_name' => 'B250',
                'make_id' => 13,
            ),
            208 => 
            array (
                'id' => 209,
                'model_name' => 'Caliber',
                'make_id' => 13,
            ),
            209 => 
            array (
                'id' => 210,
                'model_name' => 'Caravan',
                'make_id' => 13,
            ),
            210 => 
            array (
                'id' => 211,
                'model_name' => 'Caravan Cargo',
                'make_id' => 13,
            ),
            211 => 
            array (
                'id' => 212,
                'model_name' => 'Challenger',
                'make_id' => 13,
            ),
            212 => 
            array (
                'id' => 213,
                'model_name' => 'Charger',
                'make_id' => 13,
            ),
            213 => 
            array (
                'id' => 214,
                'model_name' => 'Colt',
                'make_id' => 13,
            ),
            214 => 
            array (
                'id' => 215,
                'model_name' => 'Dakota',
                'make_id' => 13,
            ),
            215 => 
            array (
                'id' => 216,
                'model_name' => 'Dart',
                'make_id' => 13,
            ),
            216 => 
            array (
                'id' => 217,
                'model_name' => 'Diplomat',
                'make_id' => 13,
            ),
            217 => 
            array (
                'id' => 218,
                'model_name' => 'Durango',
                'make_id' => 13,
            ),
            218 => 
            array (
                'id' => 219,
                'model_name' => 'Dynasty',
                'make_id' => 13,
            ),
            219 => 
            array (
                'id' => 220,
                'model_name' => 'Grand Caravan',
                'make_id' => 13,
            ),
            220 => 
            array (
                'id' => 221,
                'model_name' => 'Grand Caravan Cargo',
                'make_id' => 13,
            ),
            221 => 
            array (
                'id' => 222,
                'model_name' => 'Intrepid',
                'make_id' => 13,
            ),
            222 => 
            array (
                'id' => 223,
                'model_name' => 'Journey',
                'make_id' => 13,
            ),
            223 => 
            array (
                'id' => 224,
                'model_name' => 'Magnum',
                'make_id' => 13,
            ),
            224 => 
            array (
                'id' => 225,
                'model_name' => 'Neon',
                'make_id' => 13,
            ),
            225 => 
            array (
                'id' => 226,
                'model_name' => 'Nitro',
                'make_id' => 13,
            ),
            226 => 
            array (
                'id' => 227,
                'model_name' => 'Power Ram',
                'make_id' => 13,
            ),
            227 => 
            array (
                'id' => 228,
                'model_name' => 'Ram',
                'make_id' => 13,
            ),
            228 => 
            array (
                'id' => 229,
                'model_name' => 'Ram 1500',
                'make_id' => 13,
            ),
            229 => 
            array (
                'id' => 230,
                'model_name' => 'Ram 2500',
                'make_id' => 13,
            ),
            230 => 
            array (
                'id' => 231,
                'model_name' => 'Ram 3500',
                'make_id' => 13,
            ),
            231 => 
            array (
                'id' => 232,
                'model_name' => 'Ram Pickup',
                'make_id' => 13,
            ),
            232 => 
            array (
                'id' => 233,
                'model_name' => 'Ram Van',
                'make_id' => 13,
            ),
            233 => 
            array (
                'id' => 234,
                'model_name' => 'Ramcharger',
                'make_id' => 13,
            ),
            234 => 
            array (
                'id' => 235,
                'model_name' => 'Spirit',
                'make_id' => 13,
            ),
            235 => 
            array (
                'id' => 236,
                'model_name' => 'Sprinter',
                'make_id' => 13,
            ),
            236 => 
            array (
                'id' => 237,
                'model_name' => 'Sprinter Van',
                'make_id' => 13,
            ),
            237 => 
            array (
                'id' => 238,
                'model_name' => 'Stealth',
                'make_id' => 13,
            ),
            238 => 
            array (
                'id' => 239,
                'model_name' => 'Stratus',
                'make_id' => 13,
            ),
            239 => 
            array (
                'id' => 240,
                'model_name' => 'Super Bee',
                'make_id' => 13,
            ),
            240 => 
            array (
                'id' => 241,
                'model_name' => 'SX',
                'make_id' => 13,
            ),
            241 => 
            array (
                'id' => 242,
                'model_name' => 'SX 2.0',
                'make_id' => 13,
            ),
            242 => 
            array (
                'id' => 243,
                'model_name' => 'Viper',
                'make_id' => 13,
            ),
            243 => 
            array (
                'id' => 244,
                'model_name' => 'Premier',
                'make_id' => 14,
            ),
            244 => 
            array (
                'id' => 245,
                'model_name' => 'Summit',
                'make_id' => 14,
            ),
            245 => 
            array (
                'id' => 246,
                'model_name' => '348',
                'make_id' => 15,
            ),
            246 => 
            array (
                'id' => 247,
                'model_name' => '355',
                'make_id' => 15,
            ),
            247 => 
            array (
                'id' => 248,
                'model_name' => '360',
                'make_id' => 15,
            ),
            248 => 
            array (
                'id' => 249,
                'model_name' => 'F430',
                'make_id' => 15,
            ),
            249 => 
            array (
                'id' => 250,
                'model_name' => '500',
                'make_id' => 16,
            ),
            250 => 
            array (
                'id' => 251,
                'model_name' => '500C',
                'make_id' => 16,
            ),
            251 => 
            array (
                'id' => 252,
                'model_name' => '300',
                'make_id' => 17,
            ),
            252 => 
            array (
                'id' => 253,
                'model_name' => 'Bronco',
                'make_id' => 17,
            ),
            253 => 
            array (
                'id' => 254,
                'model_name' => 'Cab & Chassis',
                'make_id' => 17,
            ),
            254 => 
            array (
                'id' => 255,
                'model_name' => 'Contour',
                'make_id' => 17,
            ),
            255 => 
            array (
                'id' => 256,
                'model_name' => 'Crown Victoria',
                'make_id' => 17,
            ),
            256 => 
            array (
                'id' => 257,
                'model_name' => 'Custom',
                'make_id' => 17,
            ),
            257 => 
            array (
                'id' => 258,
                'model_name' => 'E-150',
                'make_id' => 17,
            ),
            258 => 
            array (
                'id' => 259,
                'model_name' => 'E-250',
                'make_id' => 17,
            ),
            259 => 
            array (
                'id' => 260,
                'model_name' => 'E-250 Heavy Duty',
                'make_id' => 17,
            ),
            260 => 
            array (
                'id' => 261,
                'model_name' => 'E-350',
                'make_id' => 17,
            ),
            261 => 
            array (
                'id' => 262,
                'model_name' => 'E-Series Van',
                'make_id' => 17,
            ),
            262 => 
            array (
                'id' => 263,
                'model_name' => 'E-Series Wagon',
                'make_id' => 17,
            ),
            263 => 
            array (
                'id' => 264,
                'model_name' => 'Econoline Van',
                'make_id' => 17,
            ),
            264 => 
            array (
                'id' => 265,
                'model_name' => 'Econoline Wagon',
                'make_id' => 17,
            ),
            265 => 
            array (
                'id' => 266,
                'model_name' => 'Edge',
                'make_id' => 17,
            ),
            266 => 
            array (
                'id' => 267,
                'model_name' => 'Escape',
                'make_id' => 17,
            ),
            267 => 
            array (
                'id' => 268,
                'model_name' => 'Escape Hybrid',
                'make_id' => 17,
            ),
            268 => 
            array (
                'id' => 269,
                'model_name' => 'Escort',
                'make_id' => 17,
            ),
            269 => 
            array (
                'id' => 270,
                'model_name' => 'Excursion',
                'make_id' => 17,
            ),
            270 => 
            array (
                'id' => 271,
                'model_name' => 'Expedition',
                'make_id' => 17,
            ),
            271 => 
            array (
                'id' => 272,
                'model_name' => 'Expedition MAX',
                'make_id' => 17,
            ),
            272 => 
            array (
                'id' => 273,
                'model_name' => 'Explorer',
                'make_id' => 17,
            ),
            273 => 
            array (
                'id' => 274,
                'model_name' => 'Explorer Sport',
                'make_id' => 17,
            ),
            274 => 
            array (
                'id' => 275,
                'model_name' => 'Explorer Sport Trac',
                'make_id' => 17,
            ),
            275 => 
            array (
                'id' => 276,
                'model_name' => 'F-100',
                'make_id' => 17,
            ),
            276 => 
            array (
                'id' => 277,
                'model_name' => 'F-150',
                'make_id' => 17,
            ),
            277 => 
            array (
                'id' => 278,
                'model_name' => 'F-150 Heritage',
                'make_id' => 17,
            ),
            278 => 
            array (
                'id' => 279,
                'model_name' => 'F-150 SVT Raptor',
                'make_id' => 17,
            ),
            279 => 
            array (
                'id' => 280,
                'model_name' => 'F-250',
                'make_id' => 17,
            ),
            280 => 
            array (
                'id' => 281,
                'model_name' => 'F-250 Heavy Duty',
                'make_id' => 17,
            ),
            281 => 
            array (
                'id' => 282,
                'model_name' => 'F-250 Super Duty',
                'make_id' => 17,
            ),
            282 => 
            array (
                'id' => 283,
                'model_name' => 'F-350',
                'make_id' => 17,
            ),
            283 => 
            array (
                'id' => 284,
                'model_name' => 'F-350 Super Duty',
                'make_id' => 17,
            ),
            284 => 
            array (
                'id' => 285,
                'model_name' => 'F-450',
                'make_id' => 17,
            ),
            285 => 
            array (
                'id' => 286,
                'model_name' => 'F-450 Super Duty',
                'make_id' => 17,
            ),
            286 => 
            array (
                'id' => 287,
                'model_name' => 'F-550',
                'make_id' => 17,
            ),
            287 => 
            array (
                'id' => 288,
                'model_name' => 'Fiesta',
                'make_id' => 17,
            ),
            288 => 
            array (
                'id' => 289,
                'model_name' => 'Five Hundred',
                'make_id' => 17,
            ),
            289 => 
            array (
                'id' => 290,
                'model_name' => 'Flex',
                'make_id' => 17,
            ),
            290 => 
            array (
                'id' => 291,
                'model_name' => 'Focus',
                'make_id' => 17,
            ),
            291 => 
            array (
                'id' => 292,
                'model_name' => 'Freestar',
                'make_id' => 17,
            ),
            292 => 
            array (
                'id' => 293,
                'model_name' => 'Freestyle',
                'make_id' => 17,
            ),
            293 => 
            array (
                'id' => 294,
                'model_name' => 'Fusion',
                'make_id' => 17,
            ),
            294 => 
            array (
                'id' => 295,
                'model_name' => 'Galaxie',
                'make_id' => 17,
            ),
            295 => 
            array (
                'id' => 296,
                'model_name' => 'Galaxie 500',
                'make_id' => 17,
            ),
            296 => 
            array (
                'id' => 297,
                'model_name' => 'Grand Marquis',
                'make_id' => 17,
            ),
            297 => 
            array (
                'id' => 298,
                'model_name' => 'GT',
                'make_id' => 17,
            ),
            298 => 
            array (
                'id' => 299,
                'model_name' => 'Mustang',
                'make_id' => 17,
            ),
            299 => 
            array (
                'id' => 300,
                'model_name' => 'Probe',
                'make_id' => 17,
            ),
            300 => 
            array (
                'id' => 301,
                'model_name' => 'Ranger',
                'make_id' => 17,
            ),
            301 => 
            array (
                'id' => 302,
                'model_name' => 'Shelby GT500',
                'make_id' => 17,
            ),
            302 => 
            array (
                'id' => 303,
                'model_name' => 'Taurus',
                'make_id' => 17,
            ),
            303 => 
            array (
                'id' => 304,
                'model_name' => 'TAURUS X',
                'make_id' => 17,
            ),
            304 => 
            array (
                'id' => 305,
                'model_name' => 'Tempo',
                'make_id' => 17,
            ),
            305 => 
            array (
                'id' => 306,
                'model_name' => 'Thunderbird',
                'make_id' => 17,
            ),
            306 => 
            array (
                'id' => 307,
                'model_name' => 'TRANSIT CONNECT',
                'make_id' => 17,
            ),
            307 => 
            array (
                'id' => 308,
                'model_name' => 'Windstar',
                'make_id' => 17,
            ),
            308 => 
            array (
                'id' => 309,
                'model_name' => 'ZX2',
                'make_id' => 17,
            ),
            309 => 
            array (
                'id' => 310,
                'model_name' => 'Metro',
                'make_id' => 18,
            ),
            310 => 
            array (
                'id' => 311,
                'model_name' => 'Acadia',
                'make_id' => 19,
            ),
            311 => 
            array (
                'id' => 312,
                'model_name' => 'C1500',
                'make_id' => 19,
            ),
            312 => 
            array (
                'id' => 313,
                'model_name' => 'C2500',
                'make_id' => 19,
            ),
            313 => 
            array (
                'id' => 314,
                'model_name' => 'C3500 Heavy Duty',
                'make_id' => 19,
            ),
            314 => 
            array (
                'id' => 315,
                'model_name' => 'C4500',
                'make_id' => 19,
            ),
            315 => 
            array (
                'id' => 316,
                'model_name' => 'C5500',
                'make_id' => 19,
            ),
            316 => 
            array (
                'id' => 317,
                'model_name' => 'C6500',
                'make_id' => 19,
            ),
            317 => 
            array (
                'id' => 318,
                'model_name' => 'C7500',
                'make_id' => 19,
            ),
            318 => 
            array (
                'id' => 319,
                'model_name' => 'C8500',
                'make_id' => 19,
            ),
            319 => 
            array (
                'id' => 320,
                'model_name' => 'Canyon',
                'make_id' => 19,
            ),
            320 => 
            array (
                'id' => 321,
                'model_name' => 'Classic Sierra',
                'make_id' => 19,
            ),
            321 => 
            array (
                'id' => 322,
                'model_name' => 'Envoy',
                'make_id' => 19,
            ),
            322 => 
            array (
                'id' => 323,
                'model_name' => 'Envoy XL',
                'make_id' => 19,
            ),
            323 => 
            array (
                'id' => 324,
                'model_name' => 'Jimmy',
                'make_id' => 19,
            ),
            324 => 
            array (
                'id' => 325,
                'model_name' => 'K1500',
                'make_id' => 19,
            ),
            325 => 
            array (
                'id' => 326,
                'model_name' => 'K2500',
                'make_id' => 19,
            ),
            326 => 
            array (
                'id' => 327,
                'model_name' => 'K3500',
                'make_id' => 19,
            ),
            327 => 
            array (
                'id' => 328,
                'model_name' => 'Pickup',
                'make_id' => 19,
            ),
            328 => 
            array (
                'id' => 329,
                'model_name' => 'S15',
                'make_id' => 19,
            ),
            329 => 
            array (
                'id' => 330,
                'model_name' => 'S15 Jimmy',
                'make_id' => 19,
            ),
            330 => 
            array (
                'id' => 331,
                'model_name' => 'Safari',
                'make_id' => 19,
            ),
            331 => 
            array (
                'id' => 332,
                'model_name' => 'Safari Cargo',
                'make_id' => 19,
            ),
            332 => 
            array (
                'id' => 333,
                'model_name' => 'Savana',
                'make_id' => 19,
            ),
            333 => 
            array (
                'id' => 334,
                'model_name' => 'Savana Cargo',
                'make_id' => 19,
            ),
            334 => 
            array (
                'id' => 335,
                'model_name' => 'Sierra',
                'make_id' => 19,
            ),
            335 => 
            array (
                'id' => 336,
                'model_name' => 'Sierra 1500',
                'make_id' => 19,
            ),
            336 => 
            array (
                'id' => 337,
                'model_name' => 'Sierra 2500HD',
                'make_id' => 19,
            ),
            337 => 
            array (
                'id' => 338,
                'model_name' => 'Sierra 3500',
                'make_id' => 19,
            ),
            338 => 
            array (
                'id' => 339,
                'model_name' => 'Sierra 3500HD',
                'make_id' => 19,
            ),
            339 => 
            array (
                'id' => 340,
                'model_name' => 'Sonoma',
                'make_id' => 19,
            ),
            340 => 
            array (
                'id' => 341,
                'model_name' => 'Suburban',
                'make_id' => 19,
            ),
            341 => 
            array (
                'id' => 342,
                'model_name' => 'Terrain',
                'make_id' => 19,
            ),
            342 => 
            array (
                'id' => 343,
                'model_name' => 'Vandura',
                'make_id' => 19,
            ),
            343 => 
            array (
                'id' => 344,
                'model_name' => 'W4500',
                'make_id' => 19,
            ),
            344 => 
            array (
                'id' => 345,
                'model_name' => 'W5500',
                'make_id' => 19,
            ),
            345 => 
            array (
                'id' => 346,
                'model_name' => 'Yukon',
                'make_id' => 19,
            ),
            346 => 
            array (
                'id' => 347,
                'model_name' => 'Yukon XL',
                'make_id' => 19,
            ),
            347 => 
            array (
                'id' => 348,
                'model_name' => '600',
                'make_id' => 20,
            ),
            348 => 
            array (
                'id' => 349,
                'model_name' => 'Accord',
                'make_id' => 20,
            ),
            349 => 
            array (
                'id' => 350,
                'model_name' => 'Accord Coupe',
                'make_id' => 20,
            ),
            350 => 
            array (
                'id' => 351,
                'model_name' => 'Accord Crosstour',
                'make_id' => 20,
            ),
            351 => 
            array (
                'id' => 352,
                'model_name' => 'Accord Sedan',
                'make_id' => 20,
            ),
            352 => 
            array (
                'id' => 353,
                'model_name' => 'Civic',
                'make_id' => 20,
            ),
            353 => 
            array (
                'id' => 354,
                'model_name' => 'Civic Coupe',
                'make_id' => 20,
            ),
            354 => 
            array (
                'id' => 355,
                'model_name' => 'Civic Hybrid',
                'make_id' => 20,
            ),
            355 => 
            array (
                'id' => 356,
                'model_name' => 'Civic Sedan',
                'make_id' => 20,
            ),
            356 => 
            array (
                'id' => 357,
                'model_name' => 'CR-V',
                'make_id' => 20,
            ),
            357 => 
            array (
                'id' => 358,
                'model_name' => 'CR-Z',
                'make_id' => 20,
            ),
            358 => 
            array (
                'id' => 359,
                'model_name' => 'Del Sol',
                'make_id' => 20,
            ),
            359 => 
            array (
                'id' => 360,
                'model_name' => 'Element',
                'make_id' => 20,
            ),
            360 => 
            array (
                'id' => 361,
                'model_name' => 'Fit',
                'make_id' => 20,
            ),
            361 => 
            array (
                'id' => 362,
                'model_name' => 'Insight',
                'make_id' => 20,
            ),
            362 => 
            array (
                'id' => 363,
                'model_name' => 'Odyssey',
                'make_id' => 20,
            ),
            363 => 
            array (
                'id' => 364,
                'model_name' => 'Pilot',
                'make_id' => 20,
            ),
            364 => 
            array (
                'id' => 365,
                'model_name' => 'Prelude',
                'make_id' => 20,
            ),
            365 => 
            array (
                'id' => 366,
                'model_name' => 'Ridgeline',
                'make_id' => 20,
            ),
            366 => 
            array (
                'id' => 367,
                'model_name' => 'S2000',
                'make_id' => 20,
            ),
            367 => 
            array (
                'id' => 368,
                'model_name' => 'H1',
                'make_id' => 21,
            ),
            368 => 
            array (
                'id' => 369,
                'model_name' => 'H2',
                'make_id' => 21,
            ),
            369 => 
            array (
                'id' => 370,
                'model_name' => 'H3',
                'make_id' => 21,
            ),
            370 => 
            array (
                'id' => 371,
                'model_name' => 'H3T',
                'make_id' => 21,
            ),
            371 => 
            array (
                'id' => 372,
                'model_name' => 'Accent',
                'make_id' => 22,
            ),
            372 => 
            array (
                'id' => 373,
                'model_name' => 'Accent 5',
                'make_id' => 22,
            ),
            373 => 
            array (
                'id' => 374,
                'model_name' => 'Azera',
                'make_id' => 22,
            ),
            374 => 
            array (
                'id' => 375,
                'model_name' => 'Elantra',
                'make_id' => 22,
            ),
            375 => 
            array (
                'id' => 376,
                'model_name' => 'Elantra Touring',
                'make_id' => 22,
            ),
            376 => 
            array (
                'id' => 377,
                'model_name' => 'Entourage',
                'make_id' => 22,
            ),
            377 => 
            array (
                'id' => 378,
                'model_name' => 'Genesis',
                'make_id' => 22,
            ),
            378 => 
            array (
                'id' => 379,
                'model_name' => 'Genesis Coupe',
                'make_id' => 22,
            ),
            379 => 
            array (
                'id' => 380,
                'model_name' => 'Santa Fe',
                'make_id' => 22,
            ),
            380 => 
            array (
                'id' => 381,
                'model_name' => 'Santa Fe  FWD',
                'make_id' => 22,
            ),
            381 => 
            array (
                'id' => 382,
                'model_name' => 'Sonata',
                'make_id' => 22,
            ),
            382 => 
            array (
                'id' => 383,
                'model_name' => 'Sonata GL',
                'make_id' => 22,
            ),
            383 => 
            array (
                'id' => 384,
                'model_name' => 'Sonata Hybrid',
                'make_id' => 22,
            ),
            384 => 
            array (
                'id' => 385,
                'model_name' => 'Tiburon',
                'make_id' => 22,
            ),
            385 => 
            array (
                'id' => 386,
                'model_name' => 'Tucson',
                'make_id' => 22,
            ),
            386 => 
            array (
                'id' => 387,
                'model_name' => 'VELOSTER',
                'make_id' => 22,
            ),
            387 => 
            array (
                'id' => 388,
                'model_name' => 'Veracruz',
                'make_id' => 22,
            ),
            388 => 
            array (
                'id' => 389,
                'model_name' => 'XG350',
                'make_id' => 22,
            ),
            389 => 
            array (
                'id' => 390,
                'model_name' => 'EX',
                'make_id' => 23,
            ),
            390 => 
            array (
                'id' => 391,
                'model_name' => 'EX35',
                'make_id' => 23,
            ),
            391 => 
            array (
                'id' => 392,
                'model_name' => 'FX',
                'make_id' => 23,
            ),
            392 => 
            array (
                'id' => 393,
                'model_name' => 'FX35',
                'make_id' => 23,
            ),
            393 => 
            array (
                'id' => 394,
                'model_name' => 'FX45',
                'make_id' => 23,
            ),
            394 => 
            array (
                'id' => 395,
                'model_name' => 'FX50',
                'make_id' => 23,
            ),
            395 => 
            array (
                'id' => 396,
                'model_name' => 'G',
                'make_id' => 23,
            ),
            396 => 
            array (
                'id' => 397,
                'model_name' => 'G25 Sedan',
                'make_id' => 23,
            ),
            397 => 
            array (
                'id' => 398,
                'model_name' => 'G35',
                'make_id' => 23,
            ),
            398 => 
            array (
                'id' => 399,
                'model_name' => 'G35 Coupe',
                'make_id' => 23,
            ),
            399 => 
            array (
                'id' => 400,
                'model_name' => 'G35 Sedan',
                'make_id' => 23,
            ),
            400 => 
            array (
                'id' => 401,
                'model_name' => 'G35x',
                'make_id' => 23,
            ),
            401 => 
            array (
                'id' => 402,
                'model_name' => 'G37',
                'make_id' => 23,
            ),
            402 => 
            array (
                'id' => 403,
                'model_name' => 'G37 Convertible',
                'make_id' => 23,
            ),
            403 => 
            array (
                'id' => 404,
                'model_name' => 'G37 Coupe',
                'make_id' => 23,
            ),
            404 => 
            array (
                'id' => 405,
                'model_name' => 'G37 Sedan',
                'make_id' => 23,
            ),
            405 => 
            array (
                'id' => 406,
                'model_name' => 'G37x',
                'make_id' => 23,
            ),
            406 => 
            array (
                'id' => 407,
                'model_name' => 'I35',
                'make_id' => 23,
            ),
            407 => 
            array (
                'id' => 408,
                'model_name' => 'M',
                'make_id' => 23,
            ),
            408 => 
            array (
                'id' => 409,
                'model_name' => 'M35',
                'make_id' => 23,
            ),
            409 => 
            array (
                'id' => 410,
                'model_name' => 'M35x',
                'make_id' => 23,
            ),
            410 => 
            array (
                'id' => 411,
                'model_name' => 'M37',
                'make_id' => 23,
            ),
            411 => 
            array (
                'id' => 412,
                'model_name' => 'M37x',
                'make_id' => 23,
            ),
            412 => 
            array (
                'id' => 413,
                'model_name' => 'M45',
                'make_id' => 23,
            ),
            413 => 
            array (
                'id' => 414,
                'model_name' => 'M45x',
                'make_id' => 23,
            ),
            414 => 
            array (
                'id' => 415,
                'model_name' => 'M56x',
                'make_id' => 23,
            ),
            415 => 
            array (
                'id' => 416,
                'model_name' => 'Q45',
                'make_id' => 23,
            ),
            416 => 
            array (
                'id' => 417,
                'model_name' => 'QX',
                'make_id' => 23,
            ),
            417 => 
            array (
                'id' => 418,
                'model_name' => 'QX4',
                'make_id' => 23,
            ),
            418 => 
            array (
                'id' => 419,
                'model_name' => 'QX56',
                'make_id' => 23,
            ),
            419 => 
            array (
                'id' => 420,
                'model_name' => '100',
                'make_id' => 24,
            ),
            420 => 
            array (
                'id' => 421,
                'model_name' => '1110',
                'make_id' => 24,
            ),
            421 => 
            array (
                'id' => 422,
                'model_name' => '1210',
                'make_id' => 24,
            ),
            422 => 
            array (
                'id' => 423,
                'model_name' => '1310',
                'make_id' => 24,
            ),
            423 => 
            array (
                'id' => 424,
                'model_name' => 'Pickup',
                'make_id' => 24,
            ),
            424 => 
            array (
                'id' => 425,
                'model_name' => 'I-Series',
                'make_id' => 25,
            ),
            425 => 
            array (
                'id' => 426,
                'model_name' => 'Rodeo',
                'make_id' => 25,
            ),
            426 => 
            array (
                'id' => 427,
                'model_name' => 'Trooper',
                'make_id' => 25,
            ),
            427 => 
            array (
                'id' => 428,
                'model_name' => 'S-Type',
                'make_id' => 26,
            ),
            428 => 
            array (
                'id' => 429,
                'model_name' => 'Super V8',
                'make_id' => 26,
            ),
            429 => 
            array (
                'id' => 430,
                'model_name' => 'X-Type',
                'make_id' => 26,
            ),
            430 => 
            array (
                'id' => 431,
                'model_name' => 'XF',
                'make_id' => 26,
            ),
            431 => 
            array (
                'id' => 432,
                'model_name' => 'XJ',
                'make_id' => 26,
            ),
            432 => 
            array (
                'id' => 433,
                'model_name' => 'XJ Series',
                'make_id' => 26,
            ),
            433 => 
            array (
                'id' => 434,
                'model_name' => 'XJ6',
                'make_id' => 26,
            ),
            434 => 
            array (
                'id' => 435,
                'model_name' => 'XJS',
                'make_id' => 26,
            ),
            435 => 
            array (
                'id' => 436,
                'model_name' => 'XK',
                'make_id' => 26,
            ),
            436 => 
            array (
                'id' => 437,
                'model_name' => 'XK Series',
                'make_id' => 26,
            ),
            437 => 
            array (
                'id' => 438,
                'model_name' => 'Cherokee',
                'make_id' => 27,
            ),
            438 => 
            array (
                'id' => 439,
                'model_name' => 'Commander',
                'make_id' => 27,
            ),
            439 => 
            array (
                'id' => 440,
                'model_name' => 'Compass',
                'make_id' => 27,
            ),
            440 => 
            array (
                'id' => 441,
                'model_name' => 'Grand Cherokee',
                'make_id' => 27,
            ),
            441 => 
            array (
                'id' => 442,
                'model_name' => 'Liberty',
                'make_id' => 27,
            ),
            442 => 
            array (
                'id' => 443,
                'model_name' => 'Patriot',
                'make_id' => 27,
            ),
            443 => 
            array (
                'id' => 444,
                'model_name' => 'TJ',
                'make_id' => 27,
            ),
            444 => 
            array (
                'id' => 445,
                'model_name' => 'Wrangler',
                'make_id' => 27,
            ),
            445 => 
            array (
                'id' => 446,
                'model_name' => 'Wrangler Unlimited',
                'make_id' => 27,
            ),
            446 => 
            array (
                'id' => 447,
                'model_name' => 'YJ',
                'make_id' => 27,
            ),
            447 => 
            array (
                'id' => 448,
                'model_name' => 'Ninja',
                'make_id' => 28,
            ),
            448 => 
            array (
                'id' => 449,
                'model_name' => 'T170',
                'make_id' => 29,
            ),
            449 => 
            array (
                'id' => 450,
                'model_name' => 'T800',
                'make_id' => 29,
            ),
            450 => 
            array (
                'id' => 451,
                'model_name' => 'Amanti',
                'make_id' => 30,
            ),
            451 => 
            array (
                'id' => 452,
                'model_name' => 'Borrego',
                'make_id' => 30,
            ),
            452 => 
            array (
                'id' => 453,
                'model_name' => 'Forte',
                'make_id' => 30,
            ),
            453 => 
            array (
                'id' => 454,
                'model_name' => 'Forte 5-Door',
                'make_id' => 30,
            ),
            454 => 
            array (
                'id' => 455,
                'model_name' => 'Forte Koup',
                'make_id' => 30,
            ),
            455 => 
            array (
                'id' => 456,
                'model_name' => 'Magentis',
                'make_id' => 30,
            ),
            456 => 
            array (
                'id' => 457,
                'model_name' => 'Optima',
                'make_id' => 30,
            ),
            457 => 
            array (
                'id' => 458,
                'model_name' => 'Rio',
                'make_id' => 30,
            ),
            458 => 
            array (
                'id' => 459,
                'model_name' => 'Rio5',
                'make_id' => 30,
            ),
            459 => 
            array (
                'id' => 460,
                'model_name' => 'Rondo',
                'make_id' => 30,
            ),
            460 => 
            array (
                'id' => 461,
                'model_name' => 'Sedona',
                'make_id' => 30,
            ),
            461 => 
            array (
                'id' => 462,
                'model_name' => 'Sorento',
                'make_id' => 30,
            ),
            462 => 
            array (
                'id' => 463,
                'model_name' => 'Soul',
                'make_id' => 30,
            ),
            463 => 
            array (
                'id' => 464,
                'model_name' => 'Spectra',
                'make_id' => 30,
            ),
            464 => 
            array (
                'id' => 465,
                'model_name' => 'Spectra5',
                'make_id' => 30,
            ),
            465 => 
            array (
                'id' => 466,
                'model_name' => 'Sportage',
                'make_id' => 30,
            ),
            466 => 
            array (
                'id' => 467,
                'model_name' => 'Gallardo',
                'make_id' => 31,
            ),
            467 => 
            array (
                'id' => 468,
                'model_name' => 'Discovery',
                'make_id' => 32,
            ),
            468 => 
            array (
                'id' => 469,
                'model_name' => 'Freelander',
                'make_id' => 32,
            ),
            469 => 
            array (
                'id' => 470,
                'model_name' => 'LR2',
                'make_id' => 32,
            ),
            470 => 
            array (
                'id' => 471,
                'model_name' => 'LR3',
                'make_id' => 32,
            ),
            471 => 
            array (
                'id' => 472,
                'model_name' => 'LR4',
                'make_id' => 32,
            ),
            472 => 
            array (
                'id' => 473,
                'model_name' => 'Range Rover',
                'make_id' => 32,
            ),
            473 => 
            array (
                'id' => 474,
                'model_name' => 'RANGE ROVER EVOQUE',
                'make_id' => 32,
            ),
            474 => 
            array (
                'id' => 475,
                'model_name' => 'Range Rover Sport',
                'make_id' => 32,
            ),
            475 => 
            array (
                'id' => 476,
                'model_name' => 'ES',
                'make_id' => 33,
            ),
            476 => 
            array (
                'id' => 477,
                'model_name' => 'ES 300',
                'make_id' => 33,
            ),
            477 => 
            array (
                'id' => 478,
                'model_name' => 'ES 330',
                'make_id' => 33,
            ),
            478 => 
            array (
                'id' => 479,
                'model_name' => 'ES 350',
                'make_id' => 33,
            ),
            479 => 
            array (
                'id' => 480,
                'model_name' => 'ES300',
                'make_id' => 33,
            ),
            480 => 
            array (
                'id' => 481,
                'model_name' => 'GS',
                'make_id' => 33,
            ),
            481 => 
            array (
                'id' => 482,
                'model_name' => 'GS 300',
                'make_id' => 33,
            ),
            482 => 
            array (
                'id' => 483,
                'model_name' => 'GS 350',
                'make_id' => 33,
            ),
            483 => 
            array (
                'id' => 484,
                'model_name' => 'GS 430',
                'make_id' => 33,
            ),
            484 => 
            array (
                'id' => 485,
                'model_name' => 'GS 450h',
                'make_id' => 33,
            ),
            485 => 
            array (
                'id' => 486,
                'model_name' => 'GS 460',
                'make_id' => 33,
            ),
            486 => 
            array (
                'id' => 487,
                'model_name' => 'GX',
                'make_id' => 33,
            ),
            487 => 
            array (
                'id' => 488,
                'model_name' => 'GX 460',
                'make_id' => 33,
            ),
            488 => 
            array (
                'id' => 489,
                'model_name' => 'GX 470',
                'make_id' => 33,
            ),
            489 => 
            array (
                'id' => 490,
                'model_name' => 'GX470',
                'make_id' => 33,
            ),
            490 => 
            array (
                'id' => 491,
                'model_name' => 'HS',
                'make_id' => 33,
            ),
            491 => 
            array (
                'id' => 492,
                'model_name' => 'HS 250h',
                'make_id' => 33,
            ),
            492 => 
            array (
                'id' => 493,
                'model_name' => 'IS',
                'make_id' => 33,
            ),
            493 => 
            array (
                'id' => 494,
                'model_name' => 'IS 250',
                'make_id' => 33,
            ),
            494 => 
            array (
                'id' => 495,
                'model_name' => 'IS 300',
                'make_id' => 33,
            ),
            495 => 
            array (
                'id' => 496,
                'model_name' => 'IS 350',
                'make_id' => 33,
            ),
            496 => 
            array (
                'id' => 497,
                'model_name' => 'IS F',
                'make_id' => 33,
            ),
            497 => 
            array (
                'id' => 498,
                'model_name' => 'IS300',
                'make_id' => 33,
            ),
            498 => 
            array (
                'id' => 499,
                'model_name' => 'LS',
                'make_id' => 33,
            ),
            499 => 
            array (
                'id' => 500,
                'model_name' => 'LS 460',
                'make_id' => 33,
            ),
        ));
        \DB::table('models')->insert(array (
            0 => 
            array (
                'id' => 501,
                'model_name' => 'LS430',
                'make_id' => 33,
            ),
            1 => 
            array (
                'id' => 502,
                'model_name' => 'LX 470',
                'make_id' => 33,
            ),
            2 => 
            array (
                'id' => 503,
                'model_name' => 'LX 570',
                'make_id' => 33,
            ),
            3 => 
            array (
                'id' => 504,
                'model_name' => 'LX470',
                'make_id' => 33,
            ),
            4 => 
            array (
                'id' => 505,
                'model_name' => 'RX',
                'make_id' => 33,
            ),
            5 => 
            array (
                'id' => 506,
                'model_name' => 'RX 300',
                'make_id' => 33,
            ),
            6 => 
            array (
                'id' => 507,
                'model_name' => 'RX 350',
                'make_id' => 33,
            ),
            7 => 
            array (
                'id' => 508,
                'model_name' => 'RX 400h',
                'make_id' => 33,
            ),
            8 => 
            array (
                'id' => 509,
                'model_name' => 'RX 450h',
                'make_id' => 33,
            ),
            9 => 
            array (
                'id' => 510,
                'model_name' => 'RX300',
                'make_id' => 33,
            ),
            10 => 
            array (
                'id' => 511,
                'model_name' => 'RX330',
                'make_id' => 33,
            ),
            11 => 
            array (
                'id' => 512,
                'model_name' => 'RX350',
                'make_id' => 33,
            ),
            12 => 
            array (
                'id' => 513,
                'model_name' => 'RX400H',
                'make_id' => 33,
            ),
            13 => 
            array (
                'id' => 514,
                'model_name' => 'SC 430',
                'make_id' => 33,
            ),
            14 => 
            array (
                'id' => 515,
                'model_name' => 'SC430',
                'make_id' => 33,
            ),
            15 => 
            array (
                'id' => 516,
                'model_name' => 'Aviator',
                'make_id' => 34,
            ),
            16 => 
            array (
                'id' => 517,
                'model_name' => 'Continental',
                'make_id' => 34,
            ),
            17 => 
            array (
                'id' => 518,
                'model_name' => 'LS',
                'make_id' => 34,
            ),
            18 => 
            array (
                'id' => 519,
                'model_name' => 'Mark',
                'make_id' => 34,
            ),
            19 => 
            array (
                'id' => 520,
                'model_name' => 'Mark LT',
                'make_id' => 34,
            ),
            20 => 
            array (
                'id' => 521,
                'model_name' => 'Mark V',
                'make_id' => 34,
            ),
            21 => 
            array (
                'id' => 522,
                'model_name' => 'MKS',
                'make_id' => 34,
            ),
            22 => 
            array (
                'id' => 523,
                'model_name' => 'MKT',
                'make_id' => 34,
            ),
            23 => 
            array (
                'id' => 524,
                'model_name' => 'MKX',
                'make_id' => 34,
            ),
            24 => 
            array (
                'id' => 525,
                'model_name' => 'MKZ',
                'make_id' => 34,
            ),
            25 => 
            array (
                'id' => 526,
                'model_name' => 'Navigator',
                'make_id' => 34,
            ),
            26 => 
            array (
                'id' => 527,
                'model_name' => 'Town Car',
                'make_id' => 34,
            ),
            27 => 
            array (
                'id' => 528,
                'model_name' => 'Zephyr',
                'make_id' => 34,
            ),
            28 => 
            array (
                'id' => 529,
                'model_name' => 'Elise',
                'make_id' => 35,
            ),
            29 => 
            array (
                'id' => 530,
                'model_name' => 'Exige',
                'make_id' => 35,
            ),
            30 => 
            array (
                'id' => 531,
                'model_name' => 'GRANTURISMO',
                'make_id' => 36,
            ),
            31 => 
            array (
                'id' => 532,
                'model_name' => 'Quattroporte',
                'make_id' => 36,
            ),
            32 => 
            array (
                'id' => 533,
                'model_name' => 'Spyder',
                'make_id' => 36,
            ),
            33 => 
            array (
                'id' => 534,
                'model_name' => '323',
                'make_id' => 37,
            ),
            34 => 
            array (
                'id' => 535,
                'model_name' => '626',
                'make_id' => 37,
            ),
            35 => 
            array (
                'id' => 536,
                'model_name' => 'B-Series',
                'make_id' => 37,
            ),
            36 => 
            array (
                'id' => 537,
                'model_name' => 'B2200',
                'make_id' => 37,
            ),
            37 => 
            array (
                'id' => 538,
                'model_name' => 'B2300',
                'make_id' => 37,
            ),
            38 => 
            array (
                'id' => 539,
                'model_name' => 'B2500',
                'make_id' => 37,
            ),
            39 => 
            array (
                'id' => 540,
                'model_name' => 'B3000',
                'make_id' => 37,
            ),
            40 => 
            array (
                'id' => 541,
                'model_name' => 'B4000',
                'make_id' => 37,
            ),
            41 => 
            array (
                'id' => 542,
                'model_name' => 'CX-7',
                'make_id' => 37,
            ),
            42 => 
            array (
                'id' => 543,
                'model_name' => 'CX-9',
                'make_id' => 37,
            ),
            43 => 
            array (
                'id' => 544,
                'model_name' => 'Mazda2',
                'make_id' => 37,
            ),
            44 => 
            array (
                'id' => 545,
                'model_name' => 'Mazda3',
                'make_id' => 37,
            ),
            45 => 
            array (
                'id' => 546,
                'model_name' => 'Mazda3 Sport',
                'make_id' => 37,
            ),
            46 => 
            array (
                'id' => 547,
                'model_name' => 'Mazda5',
                'make_id' => 37,
            ),
            47 => 
            array (
                'id' => 548,
                'model_name' => 'Mazda6',
                'make_id' => 37,
            ),
            48 => 
            array (
                'id' => 549,
                'model_name' => 'MazdaSpeed3',
                'make_id' => 37,
            ),
            49 => 
            array (
                'id' => 550,
                'model_name' => 'Millenia',
                'make_id' => 37,
            ),
            50 => 
            array (
                'id' => 551,
                'model_name' => 'MPV',
                'make_id' => 37,
            ),
            51 => 
            array (
                'id' => 552,
                'model_name' => 'MX-3',
                'make_id' => 37,
            ),
            52 => 
            array (
                'id' => 553,
                'model_name' => 'MX-5',
                'make_id' => 37,
            ),
            53 => 
            array (
                'id' => 554,
                'model_name' => 'MX-5 Miata',
                'make_id' => 37,
            ),
            54 => 
            array (
                'id' => 555,
                'model_name' => 'MX-6',
                'make_id' => 37,
            ),
            55 => 
            array (
                'id' => 556,
                'model_name' => 'Protege',
                'make_id' => 37,
            ),
            56 => 
            array (
                'id' => 557,
                'model_name' => 'Protege5',
                'make_id' => 37,
            ),
            57 => 
            array (
                'id' => 558,
                'model_name' => 'RX-7',
                'make_id' => 37,
            ),
            58 => 
            array (
                'id' => 559,
                'model_name' => 'RX-8',
                'make_id' => 37,
            ),
            59 => 
            array (
                'id' => 560,
                'model_name' => 'Tribute',
                'make_id' => 37,
            ),
            60 => 
            array (
                'id' => 561,
                'model_name' => '190',
                'make_id' => 38,
            ),
            61 => 
            array (
                'id' => 562,
                'model_name' => '190E',
                'make_id' => 38,
            ),
            62 => 
            array (
                'id' => 563,
                'model_name' => '200',
                'make_id' => 38,
            ),
            63 => 
            array (
                'id' => 564,
                'model_name' => '280CE',
                'make_id' => 38,
            ),
            64 => 
            array (
                'id' => 565,
                'model_name' => '300E',
                'make_id' => 38,
            ),
            65 => 
            array (
                'id' => 566,
                'model_name' => '300SE',
                'make_id' => 38,
            ),
            66 => 
            array (
                'id' => 567,
                'model_name' => '300TE',
                'make_id' => 38,
            ),
            67 => 
            array (
                'id' => 568,
                'model_name' => '380SL',
                'make_id' => 38,
            ),
            68 => 
            array (
                'id' => 569,
                'model_name' => '450SL',
                'make_id' => 38,
            ),
            69 => 
            array (
                'id' => 570,
                'model_name' => '500E',
                'make_id' => 38,
            ),
            70 => 
            array (
                'id' => 571,
                'model_name' => '500SEL',
                'make_id' => 38,
            ),
            71 => 
            array (
                'id' => 572,
                'model_name' => '500SL',
                'make_id' => 38,
            ),
            72 => 
            array (
                'id' => 573,
                'model_name' => '560SEL',
                'make_id' => 38,
            ),
            73 => 
            array (
                'id' => 574,
                'model_name' => 'B-Class',
                'make_id' => 38,
            ),
            74 => 
            array (
                'id' => 575,
                'model_name' => 'C-Class',
                'make_id' => 38,
            ),
            75 => 
            array (
                'id' => 576,
                'model_name' => 'C230',
                'make_id' => 38,
            ),
            76 => 
            array (
                'id' => 577,
                'model_name' => 'C240',
                'make_id' => 38,
            ),
            77 => 
            array (
                'id' => 578,
                'model_name' => 'C280',
                'make_id' => 38,
            ),
            78 => 
            array (
                'id' => 579,
                'model_name' => 'C43',
                'make_id' => 38,
            ),
            79 => 
            array (
                'id' => 580,
                'model_name' => 'CL-Class',
                'make_id' => 38,
            ),
            80 => 
            array (
                'id' => 581,
                'model_name' => 'CL600',
                'make_id' => 38,
            ),
            81 => 
            array (
                'id' => 582,
                'model_name' => 'CLK',
                'make_id' => 38,
            ),
            82 => 
            array (
                'id' => 583,
                'model_name' => 'CLK-Class',
                'make_id' => 38,
            ),
            83 => 
            array (
                'id' => 584,
                'model_name' => 'CLK320',
                'make_id' => 38,
            ),
            84 => 
            array (
                'id' => 585,
                'model_name' => 'CLS-Class',
                'make_id' => 38,
            ),
            85 => 
            array (
                'id' => 586,
                'model_name' => 'CLS500',
                'make_id' => 38,
            ),
            86 => 
            array (
                'id' => 587,
                'model_name' => 'CLS55 AMG',
                'make_id' => 38,
            ),
            87 => 
            array (
                'id' => 588,
                'model_name' => 'E-Class',
                'make_id' => 38,
            ),
            88 => 
            array (
                'id' => 589,
                'model_name' => 'E320',
                'make_id' => 38,
            ),
            89 => 
            array (
                'id' => 590,
                'model_name' => 'E430',
                'make_id' => 38,
            ),
            90 => 
            array (
                'id' => 591,
                'model_name' => 'E500',
                'make_id' => 38,
            ),
            91 => 
            array (
                'id' => 592,
                'model_name' => 'G-Class',
                'make_id' => 38,
            ),
            92 => 
            array (
                'id' => 593,
                'model_name' => 'G500',
                'make_id' => 38,
            ),
            93 => 
            array (
                'id' => 594,
                'model_name' => 'GL-Class',
                'make_id' => 38,
            ),
            94 => 
            array (
                'id' => 595,
                'model_name' => 'GLK-CLASS',
                'make_id' => 38,
            ),
            95 => 
            array (
                'id' => 596,
                'model_name' => 'M-Class',
                'make_id' => 38,
            ),
            96 => 
            array (
                'id' => 597,
                'model_name' => 'ML320',
                'make_id' => 38,
            ),
            97 => 
            array (
                'id' => 598,
                'model_name' => 'ML350',
                'make_id' => 38,
            ),
            98 => 
            array (
                'id' => 599,
                'model_name' => 'ML430',
                'make_id' => 38,
            ),
            99 => 
            array (
                'id' => 600,
                'model_name' => 'ML500',
                'make_id' => 38,
            ),
            100 => 
            array (
                'id' => 601,
                'model_name' => 'ML55',
                'make_id' => 38,
            ),
            101 => 
            array (
                'id' => 602,
                'model_name' => 'R-Class',
                'make_id' => 38,
            ),
            102 => 
            array (
                'id' => 603,
                'model_name' => 'S-Class',
                'make_id' => 38,
            ),
            103 => 
            array (
                'id' => 604,
                'model_name' => 'S430',
                'make_id' => 38,
            ),
            104 => 
            array (
                'id' => 605,
                'model_name' => 'S500',
                'make_id' => 38,
            ),
            105 => 
            array (
                'id' => 606,
                'model_name' => 'SL-Class',
                'make_id' => 38,
            ),
            106 => 
            array (
                'id' => 607,
                'model_name' => 'SL500',
                'make_id' => 38,
            ),
            107 => 
            array (
                'id' => 608,
                'model_name' => 'SL55 AMG',
                'make_id' => 38,
            ),
            108 => 
            array (
                'id' => 609,
                'model_name' => 'SLK-Class',
                'make_id' => 38,
            ),
            109 => 
            array (
                'id' => 610,
                'model_name' => 'SLK230',
                'make_id' => 38,
            ),
            110 => 
            array (
                'id' => 611,
                'model_name' => 'SLR MCLAREN',
                'make_id' => 38,
            ),
            111 => 
            array (
                'id' => 612,
                'model_name' => 'SLS AMG',
                'make_id' => 38,
            ),
            112 => 
            array (
                'id' => 613,
                'model_name' => 'Sprinter',
                'make_id' => 38,
            ),
            113 => 
            array (
                'id' => 614,
                'model_name' => 'Sprinter Van',
                'make_id' => 38,
            ),
            114 => 
            array (
                'id' => 615,
                'model_name' => 'Sprinter Wagon',
                'make_id' => 38,
            ),
            115 => 
            array (
                'id' => 616,
                'model_name' => 'Capri',
                'make_id' => 39,
            ),
            116 => 
            array (
                'id' => 617,
                'model_name' => 'Cougar',
                'make_id' => 39,
            ),
            117 => 
            array (
                'id' => 618,
                'model_name' => 'Cyclone',
                'make_id' => 39,
            ),
            118 => 
            array (
                'id' => 619,
                'model_name' => 'Grand Marquis',
                'make_id' => 39,
            ),
            119 => 
            array (
                'id' => 620,
                'model_name' => 'Mystique',
                'make_id' => 39,
            ),
            120 => 
            array (
                'id' => 621,
                'model_name' => 'Sable',
                'make_id' => 39,
            ),
            121 => 
            array (
                'id' => 622,
                'model_name' => 'Tracer',
                'make_id' => 39,
            ),
            122 => 
            array (
                'id' => 623,
                'model_name' => 'Villager',
                'make_id' => 39,
            ),
            123 => 
            array (
                'id' => 624,
                'model_name' => 'Zephyr',
                'make_id' => 39,
            ),
            124 => 
            array (
                'id' => 625,
                'model_name' => 'Midget',
                'make_id' => 40,
            ),
            125 => 
            array (
                'id' => 626,
                'model_name' => 'Cooper',
                'make_id' => 41,
            ),
            126 => 
            array (
                'id' => 627,
                'model_name' => 'MINI',
                'make_id' => 41,
            ),
            127 => 
            array (
                'id' => 628,
                'model_name' => 'Eclipse',
                'make_id' => 42,
            ),
            128 => 
            array (
                'id' => 629,
                'model_name' => 'Eclipse Spyder',
                'make_id' => 42,
            ),
            129 => 
            array (
                'id' => 630,
                'model_name' => 'Endeavor',
                'make_id' => 42,
            ),
            130 => 
            array (
                'id' => 631,
                'model_name' => 'Galant',
                'make_id' => 42,
            ),
            131 => 
            array (
                'id' => 632,
                'model_name' => 'Lancer',
                'make_id' => 42,
            ),
            132 => 
            array (
                'id' => 633,
                'model_name' => 'Lancer Evolution',
                'make_id' => 42,
            ),
            133 => 
            array (
                'id' => 634,
                'model_name' => 'Lancer Ralliart',
                'make_id' => 42,
            ),
            134 => 
            array (
                'id' => 635,
                'model_name' => 'Mini Cab',
                'make_id' => 42,
            ),
            135 => 
            array (
                'id' => 636,
                'model_name' => 'Montero',
                'make_id' => 42,
            ),
            136 => 
            array (
                'id' => 637,
                'model_name' => 'Montero Sport',
                'make_id' => 42,
            ),
            137 => 
            array (
                'id' => 638,
                'model_name' => 'Outlander',
                'make_id' => 42,
            ),
            138 => 
            array (
                'id' => 639,
                'model_name' => 'RVR',
                'make_id' => 42,
            ),
            139 => 
            array (
                'id' => 640,
                'model_name' => '300 ZX',
                'make_id' => 43,
            ),
            140 => 
            array (
                'id' => 641,
                'model_name' => '350Z',
                'make_id' => 43,
            ),
            141 => 
            array (
                'id' => 642,
                'model_name' => '370Z',
                'make_id' => 43,
            ),
            142 => 
            array (
                'id' => 643,
                'model_name' => 'Altima',
                'make_id' => 43,
            ),
            143 => 
            array (
                'id' => 644,
                'model_name' => 'Altima Coupe',
                'make_id' => 43,
            ),
            144 => 
            array (
                'id' => 645,
                'model_name' => 'Altima Hybrid',
                'make_id' => 43,
            ),
            145 => 
            array (
                'id' => 646,
                'model_name' => 'Armada',
                'make_id' => 43,
            ),
            146 => 
            array (
                'id' => 647,
                'model_name' => 'Cube',
                'make_id' => 43,
            ),
            147 => 
            array (
                'id' => 648,
                'model_name' => 'Frontier',
                'make_id' => 43,
            ),
            148 => 
            array (
                'id' => 649,
                'model_name' => 'GT-R',
                'make_id' => 43,
            ),
            149 => 
            array (
                'id' => 650,
                'model_name' => 'Juke',
                'make_id' => 43,
            ),
            150 => 
            array (
                'id' => 651,
                'model_name' => 'King Cab',
                'make_id' => 43,
            ),
            151 => 
            array (
                'id' => 652,
                'model_name' => 'Maxima',
                'make_id' => 43,
            ),
            152 => 
            array (
                'id' => 653,
                'model_name' => 'Murano',
                'make_id' => 43,
            ),
            153 => 
            array (
                'id' => 654,
                'model_name' => 'NV',
                'make_id' => 43,
            ),
            154 => 
            array (
                'id' => 655,
                'model_name' => 'Pathfinder',
                'make_id' => 43,
            ),
            155 => 
            array (
                'id' => 656,
                'model_name' => 'Pathfinder Armada',
                'make_id' => 43,
            ),
            156 => 
            array (
                'id' => 657,
                'model_name' => 'Quest',
                'make_id' => 43,
            ),
            157 => 
            array (
                'id' => 658,
                'model_name' => 'Rogue',
                'make_id' => 43,
            ),
            158 => 
            array (
                'id' => 659,
                'model_name' => 'SE-R',
                'make_id' => 43,
            ),
            159 => 
            array (
                'id' => 660,
                'model_name' => 'Sentra',
                'make_id' => 43,
            ),
            160 => 
            array (
                'id' => 661,
                'model_name' => 'Titan',
                'make_id' => 43,
            ),
            161 => 
            array (
                'id' => 662,
                'model_name' => 'Versa',
                'make_id' => 43,
            ),
            162 => 
            array (
                'id' => 663,
                'model_name' => 'Versa Hatchback',
                'make_id' => 43,
            ),
            163 => 
            array (
                'id' => 664,
                'model_name' => 'Versa Sedan',
                'make_id' => 43,
            ),
            164 => 
            array (
                'id' => 665,
                'model_name' => 'X-Trail',
                'make_id' => 43,
            ),
            165 => 
            array (
                'id' => 666,
                'model_name' => 'Xterra',
                'make_id' => 43,
            ),
            166 => 
            array (
                'id' => 667,
                'model_name' => '88',
                'make_id' => 44,
            ),
            167 => 
            array (
                'id' => 668,
                'model_name' => 'Achieva',
                'make_id' => 44,
            ),
            168 => 
            array (
                'id' => 669,
                'model_name' => 'Alero',
                'make_id' => 44,
            ),
            169 => 
            array (
                'id' => 670,
                'model_name' => 'Aurora',
                'make_id' => 44,
            ),
            170 => 
            array (
                'id' => 671,
                'model_name' => 'Bravada',
                'make_id' => 44,
            ),
            171 => 
            array (
                'id' => 672,
                'model_name' => 'Cutlass',
                'make_id' => 44,
            ),
            172 => 
            array (
                'id' => 673,
                'model_name' => 'Cutlass Ciera',
                'make_id' => 44,
            ),
            173 => 
            array (
                'id' => 674,
                'model_name' => 'Delta 88',
                'make_id' => 44,
            ),
            174 => 
            array (
                'id' => 675,
                'model_name' => 'Intrigue',
                'make_id' => 44,
            ),
            175 => 
            array (
                'id' => 676,
                'model_name' => 'Intrique',
                'make_id' => 44,
            ),
            176 => 
            array (
                'id' => 677,
                'model_name' => 'LSS',
                'make_id' => 44,
            ),
            177 => 
            array (
                'id' => 678,
                'model_name' => 'Silhouette',
                'make_id' => 44,
            ),
            178 => 
            array (
                'id' => 679,
                'model_name' => 'Supreme',
                'make_id' => 44,
            ),
            179 => 
            array (
                'id' => 680,
                'model_name' => 'Acclaim',
                'make_id' => 45,
            ),
            180 => 
            array (
                'id' => 681,
                'model_name' => 'Breeze',
                'make_id' => 45,
            ),
            181 => 
            array (
                'id' => 682,
                'model_name' => 'Grand Voyager',
                'make_id' => 45,
            ),
            182 => 
            array (
                'id' => 683,
                'model_name' => 'Neon',
                'make_id' => 45,
            ),
            183 => 
            array (
                'id' => 684,
                'model_name' => 'Prowler',
                'make_id' => 45,
            ),
            184 => 
            array (
                'id' => 685,
                'model_name' => 'Voyager',
                'make_id' => 45,
            ),
            185 => 
            array (
                'id' => 686,
                'model_name' => '6000',
                'make_id' => 46,
            ),
            186 => 
            array (
                'id' => 687,
                'model_name' => 'Aztek',
                'make_id' => 46,
            ),
            187 => 
            array (
                'id' => 688,
                'model_name' => 'Bonneville',
                'make_id' => 46,
            ),
            188 => 
            array (
                'id' => 689,
                'model_name' => 'Firebird',
                'make_id' => 46,
            ),
            189 => 
            array (
                'id' => 690,
                'model_name' => 'Firefly',
                'make_id' => 46,
            ),
            190 => 
            array (
                'id' => 691,
                'model_name' => 'G3',
                'make_id' => 46,
            ),
            191 => 
            array (
                'id' => 692,
                'model_name' => 'G3 Wave',
                'make_id' => 46,
            ),
            192 => 
            array (
                'id' => 693,
                'model_name' => 'G5',
                'make_id' => 46,
            ),
            193 => 
            array (
                'id' => 694,
                'model_name' => 'G5 Pursuit',
                'make_id' => 46,
            ),
            194 => 
            array (
                'id' => 695,
                'model_name' => 'G6',
                'make_id' => 46,
            ),
            195 => 
            array (
                'id' => 696,
                'model_name' => 'G8',
                'make_id' => 46,
            ),
            196 => 
            array (
                'id' => 697,
                'model_name' => 'Grand Am',
                'make_id' => 46,
            ),
            197 => 
            array (
                'id' => 698,
                'model_name' => 'Grand Prix',
                'make_id' => 46,
            ),
            198 => 
            array (
                'id' => 699,
                'model_name' => 'Montana',
                'make_id' => 46,
            ),
            199 => 
            array (
                'id' => 700,
                'model_name' => 'Montana SV6',
                'make_id' => 46,
            ),
            200 => 
            array (
                'id' => 701,
                'model_name' => 'Parisienne',
                'make_id' => 46,
            ),
            201 => 
            array (
                'id' => 702,
                'model_name' => 'Pursuit',
                'make_id' => 46,
            ),
            202 => 
            array (
                'id' => 703,
                'model_name' => 'Solstice',
                'make_id' => 46,
            ),
            203 => 
            array (
                'id' => 704,
                'model_name' => 'Sunbird',
                'make_id' => 46,
            ),
            204 => 
            array (
                'id' => 705,
                'model_name' => 'Sunfire',
                'make_id' => 46,
            ),
            205 => 
            array (
                'id' => 706,
                'model_name' => 'Tempest',
                'make_id' => 46,
            ),
            206 => 
            array (
                'id' => 707,
                'model_name' => 'Torrent',
                'make_id' => 46,
            ),
            207 => 
            array (
                'id' => 708,
                'model_name' => 'Trans Am',
                'make_id' => 46,
            ),
            208 => 
            array (
                'id' => 709,
                'model_name' => 'Trans Sport',
                'make_id' => 46,
            ),
            209 => 
            array (
                'id' => 710,
                'model_name' => 'Vibe',
                'make_id' => 46,
            ),
            210 => 
            array (
                'id' => 711,
                'model_name' => 'Wave',
                'make_id' => 46,
            ),
            211 => 
            array (
                'id' => 712,
                'model_name' => 'Wave5',
                'make_id' => 46,
            ),
            212 => 
            array (
                'id' => 713,
                'model_name' => '356',
                'make_id' => 47,
            ),
            213 => 
            array (
                'id' => 714,
                'model_name' => '911',
                'make_id' => 47,
            ),
            214 => 
            array (
                'id' => 715,
                'model_name' => '911 Carrera 4',
                'make_id' => 47,
            ),
            215 => 
            array (
                'id' => 716,
                'model_name' => '911 Turbo',
                'make_id' => 47,
            ),
            216 => 
            array (
                'id' => 717,
                'model_name' => '928',
                'make_id' => 47,
            ),
            217 => 
            array (
                'id' => 718,
                'model_name' => '944',
                'make_id' => 47,
            ),
            218 => 
            array (
                'id' => 719,
                'model_name' => 'Boxster',
                'make_id' => 47,
            ),
            219 => 
            array (
                'id' => 720,
                'model_name' => 'Carrera GT',
                'make_id' => 47,
            ),
            220 => 
            array (
                'id' => 721,
                'model_name' => 'Cayenne',
                'make_id' => 47,
            ),
            221 => 
            array (
                'id' => 722,
                'model_name' => 'Cayman',
                'make_id' => 47,
            ),
            222 => 
            array (
                'id' => 723,
                'model_name' => 'PANAMERA',
                'make_id' => 47,
            ),
            223 => 
            array (
                'id' => 724,
                'model_name' => 'Dakota',
                'make_id' => 48,
            ),
            224 => 
            array (
                'id' => 725,
                'model_name' => 'Ram 1500',
                'make_id' => 48,
            ),
            225 => 
            array (
                'id' => 726,
                'model_name' => 'Ram 2500',
                'make_id' => 48,
            ),
            226 => 
            array (
                'id' => 727,
                'model_name' => 'Ram 3500',
                'make_id' => 48,
            ),
            227 => 
            array (
                'id' => 728,
                'model_name' => 'Ram Pickup',
                'make_id' => 48,
            ),
            228 => 
            array (
                'id' => 729,
                'model_name' => 'GHOST',
                'make_id' => 49,
            ),
            229 => 
            array (
                'id' => 730,
                'model_name' => 'Phantom',
                'make_id' => 49,
            ),
            230 => 
            array (
                'id' => 731,
                'model_name' => '9-2X',
                'make_id' => 50,
            ),
            231 => 
            array (
                'id' => 732,
                'model_name' => '9-3',
                'make_id' => 50,
            ),
            232 => 
            array (
                'id' => 733,
                'model_name' => '9-3 Sport Sedan',
                'make_id' => 50,
            ),
            233 => 
            array (
                'id' => 734,
                'model_name' => '9-5',
                'make_id' => 50,
            ),
            234 => 
            array (
                'id' => 735,
                'model_name' => '9-7X',
                'make_id' => 50,
            ),
            235 => 
            array (
                'id' => 736,
                'model_name' => '900S',
                'make_id' => 50,
            ),
            236 => 
            array (
                'id' => 737,
                'model_name' => 'Astra',
                'make_id' => 51,
            ),
            237 => 
            array (
                'id' => 738,
                'model_name' => 'Aura',
                'make_id' => 51,
            ),
            238 => 
            array (
                'id' => 739,
                'model_name' => 'Ion',
                'make_id' => 51,
            ),
            239 => 
            array (
                'id' => 740,
                'model_name' => 'ION Quad Coupe',
                'make_id' => 51,
            ),
            240 => 
            array (
                'id' => 741,
                'model_name' => 'ION Sedan',
                'make_id' => 51,
            ),
            241 => 
            array (
                'id' => 742,
                'model_name' => 'L-Series',
                'make_id' => 51,
            ),
            242 => 
            array (
                'id' => 743,
                'model_name' => 'L300',
                'make_id' => 51,
            ),
            243 => 
            array (
                'id' => 744,
                'model_name' => 'LS',
                'make_id' => 51,
            ),
            244 => 
            array (
                'id' => 745,
                'model_name' => 'Outlook',
                'make_id' => 51,
            ),
            245 => 
            array (
                'id' => 746,
                'model_name' => 'Relay',
                'make_id' => 51,
            ),
            246 => 
            array (
                'id' => 747,
                'model_name' => 'S-Series',
                'make_id' => 51,
            ),
            247 => 
            array (
                'id' => 748,
                'model_name' => 'SC2',
                'make_id' => 51,
            ),
            248 => 
            array (
                'id' => 749,
                'model_name' => 'Sky',
                'make_id' => 51,
            ),
            249 => 
            array (
                'id' => 750,
                'model_name' => 'SL',
                'make_id' => 51,
            ),
            250 => 
            array (
                'id' => 751,
                'model_name' => 'SL1',
                'make_id' => 51,
            ),
            251 => 
            array (
                'id' => 752,
                'model_name' => 'SW1',
                'make_id' => 51,
            ),
            252 => 
            array (
                'id' => 753,
                'model_name' => 'SW2',
                'make_id' => 51,
            ),
            253 => 
            array (
                'id' => 754,
                'model_name' => 'VUE',
                'make_id' => 51,
            ),
            254 => 
            array (
                'id' => 755,
                'model_name' => 'VUE Hybrid',
                'make_id' => 51,
            ),
            255 => 
            array (
                'id' => 756,
                'model_name' => 'tC',
                'make_id' => 52,
            ),
            256 => 
            array (
                'id' => 757,
                'model_name' => 'xA',
                'make_id' => 52,
            ),
            257 => 
            array (
                'id' => 758,
                'model_name' => 'xB',
                'make_id' => 52,
            ),
            258 => 
            array (
                'id' => 759,
                'model_name' => 'XD',
                'make_id' => 52,
            ),
            259 => 
            array (
                'id' => 760,
                'model_name' => 'fortwo',
                'make_id' => 53,
            ),
            260 => 
            array (
                'id' => 761,
                'model_name' => 'B9 Tribeca',
                'make_id' => 54,
            ),
            261 => 
            array (
                'id' => 762,
                'model_name' => 'Baja',
                'make_id' => 54,
            ),
            262 => 
            array (
                'id' => 763,
                'model_name' => 'Forester',
                'make_id' => 54,
            ),
            263 => 
            array (
                'id' => 764,
                'model_name' => 'Impreza',
                'make_id' => 54,
            ),
            264 => 
            array (
                'id' => 765,
                'model_name' => 'Legacy',
                'make_id' => 54,
            ),
            265 => 
            array (
                'id' => 766,
                'model_name' => 'Outback',
                'make_id' => 54,
            ),
            266 => 
            array (
                'id' => 767,
                'model_name' => 'SVX',
                'make_id' => 54,
            ),
            267 => 
            array (
                'id' => 768,
                'model_name' => 'Tribeca',
                'make_id' => 54,
            ),
            268 => 
            array (
                'id' => 769,
                'model_name' => 'WRX',
                'make_id' => 54,
            ),
            269 => 
            array (
                'id' => 770,
                'model_name' => 'Aerio',
                'make_id' => 55,
            ),
            270 => 
            array (
                'id' => 771,
                'model_name' => 'Carry',
                'make_id' => 55,
            ),
            271 => 
            array (
                'id' => 772,
                'model_name' => 'Equator',
                'make_id' => 55,
            ),
            272 => 
            array (
                'id' => 773,
                'model_name' => 'Esteem',
                'make_id' => 55,
            ),
            273 => 
            array (
                'id' => 774,
                'model_name' => 'Grand Vitara',
                'make_id' => 55,
            ),
            274 => 
            array (
                'id' => 775,
                'model_name' => 'Grand Vitara XL-7',
                'make_id' => 55,
            ),
            275 => 
            array (
                'id' => 776,
                'model_name' => 'Kizashi',
                'make_id' => 55,
            ),
            276 => 
            array (
                'id' => 777,
                'model_name' => 'Swift',
                'make_id' => 55,
            ),
            277 => 
            array (
                'id' => 778,
                'model_name' => 'Swift+',
                'make_id' => 55,
            ),
            278 => 
            array (
                'id' => 779,
                'model_name' => 'SX4',
                'make_id' => 55,
            ),
            279 => 
            array (
                'id' => 780,
                'model_name' => 'SX4 Fastback',
                'make_id' => 55,
            ),
            280 => 
            array (
                'id' => 781,
                'model_name' => 'SX4 Hatchback',
                'make_id' => 55,
            ),
            281 => 
            array (
                'id' => 782,
                'model_name' => 'SX4 Sedan',
                'make_id' => 55,
            ),
            282 => 
            array (
                'id' => 783,
                'model_name' => 'Verona',
                'make_id' => 55,
            ),
            283 => 
            array (
                'id' => 784,
                'model_name' => 'XL-7',
                'make_id' => 55,
            ),
            284 => 
            array (
                'id' => 785,
                'model_name' => 'XL7',
                'make_id' => 55,
            ),
            285 => 
            array (
                'id' => 786,
                'model_name' => '4Runner',
                'make_id' => 56,
            ),
            286 => 
            array (
                'id' => 787,
                'model_name' => 'Avalon',
                'make_id' => 56,
            ),
            287 => 
            array (
                'id' => 788,
                'model_name' => 'Cab & Chassis',
                'make_id' => 56,
            ),
            288 => 
            array (
                'id' => 789,
                'model_name' => 'Camry',
                'make_id' => 56,
            ),
            289 => 
            array (
                'id' => 790,
                'model_name' => 'Camry Hybrid',
                'make_id' => 56,
            ),
            290 => 
            array (
                'id' => 791,
                'model_name' => 'Celica',
                'make_id' => 56,
            ),
            291 => 
            array (
                'id' => 792,
                'model_name' => 'Corolla',
                'make_id' => 56,
            ),
            292 => 
            array (
                'id' => 793,
                'model_name' => 'Echo',
                'make_id' => 56,
            ),
            293 => 
            array (
                'id' => 794,
                'model_name' => 'FJ Cruiser',
                'make_id' => 56,
            ),
            294 => 
            array (
                'id' => 795,
                'model_name' => 'Heavy Duty',
                'make_id' => 56,
            ),
            295 => 
            array (
                'id' => 796,
                'model_name' => 'Highlander',
                'make_id' => 56,
            ),
            296 => 
            array (
                'id' => 797,
                'model_name' => 'Land Cruiser',
                'make_id' => 56,
            ),
            297 => 
            array (
                'id' => 798,
                'model_name' => 'Matrix',
                'make_id' => 56,
            ),
            298 => 
            array (
                'id' => 799,
                'model_name' => 'MR2',
                'make_id' => 56,
            ),
            299 => 
            array (
                'id' => 800,
                'model_name' => 'Prius',
                'make_id' => 56,
            ),
            300 => 
            array (
                'id' => 801,
                'model_name' => 'PRIUS V',
                'make_id' => 56,
            ),
            301 => 
            array (
                'id' => 802,
                'model_name' => 'Rav4',
                'make_id' => 56,
            ),
            302 => 
            array (
                'id' => 803,
                'model_name' => 'Sequoia',
                'make_id' => 56,
            ),
            303 => 
            array (
                'id' => 804,
                'model_name' => 'Sienna',
                'make_id' => 56,
            ),
            304 => 
            array (
                'id' => 805,
                'model_name' => 'Solara',
                'make_id' => 56,
            ),
            305 => 
            array (
                'id' => 806,
                'model_name' => 'Supra',
                'make_id' => 56,
            ),
            306 => 
            array (
                'id' => 807,
                'model_name' => 'T100',
                'make_id' => 56,
            ),
            307 => 
            array (
                'id' => 808,
                'model_name' => 'Tacoma',
                'make_id' => 56,
            ),
            308 => 
            array (
                'id' => 809,
                'model_name' => 'Tercel',
                'make_id' => 56,
            ),
            309 => 
            array (
                'id' => 810,
                'model_name' => 'Trucks',
                'make_id' => 56,
            ),
            310 => 
            array (
                'id' => 811,
                'model_name' => 'Tundra',
                'make_id' => 56,
            ),
            311 => 
            array (
                'id' => 812,
                'model_name' => 'Venza',
                'make_id' => 56,
            ),
            312 => 
            array (
                'id' => 813,
                'model_name' => 'Yaris',
                'make_id' => 56,
            ),
            313 => 
            array (
                'id' => 814,
                'model_name' => 'Yaris Hatchback',
                'make_id' => 56,
            ),
            314 => 
            array (
                'id' => 815,
                'model_name' => 'Yaris Sedan',
                'make_id' => 56,
            ),
            315 => 
            array (
                'id' => 816,
                'model_name' => 'Beetle',
                'make_id' => 57,
            ),
            316 => 
            array (
                'id' => 817,
                'model_name' => 'Cabrio',
                'make_id' => 57,
            ),
            317 => 
            array (
                'id' => 818,
                'model_name' => 'Cabriolet',
                'make_id' => 57,
            ),
            318 => 
            array (
                'id' => 819,
                'model_name' => 'City Golf',
                'make_id' => 57,
            ),
            319 => 
            array (
                'id' => 820,
                'model_name' => 'City Jetta',
                'make_id' => 57,
            ),
            320 => 
            array (
                'id' => 821,
                'model_name' => 'Corrado',
                'make_id' => 57,
            ),
            321 => 
            array (
                'id' => 822,
                'model_name' => 'Eos',
                'make_id' => 57,
            ),
            322 => 
            array (
                'id' => 823,
                'model_name' => 'Eurovan',
                'make_id' => 57,
            ),
            323 => 
            array (
                'id' => 824,
                'model_name' => 'GLI',
                'make_id' => 57,
            ),
            324 => 
            array (
                'id' => 825,
                'model_name' => 'Golf',
                'make_id' => 57,
            ),
            325 => 
            array (
                'id' => 826,
                'model_name' => 'Golf City',
                'make_id' => 57,
            ),
            326 => 
            array (
                'id' => 827,
                'model_name' => 'Golf Wagon',
                'make_id' => 57,
            ),
            327 => 
            array (
                'id' => 828,
                'model_name' => 'GTI',
                'make_id' => 57,
            ),
            328 => 
            array (
                'id' => 829,
                'model_name' => 'Jetta',
                'make_id' => 57,
            ),
            329 => 
            array (
                'id' => 830,
                'model_name' => 'Jetta Sedan',
                'make_id' => 57,
            ),
            330 => 
            array (
                'id' => 831,
                'model_name' => 'Jetta Wagon',
                'make_id' => 57,
            ),
            331 => 
            array (
                'id' => 832,
                'model_name' => 'New Beetle',
                'make_id' => 57,
            ),
            332 => 
            array (
                'id' => 833,
                'model_name' => 'Passat',
                'make_id' => 57,
            ),
            333 => 
            array (
                'id' => 834,
                'model_name' => 'Passat CC',
                'make_id' => 57,
            ),
            334 => 
            array (
                'id' => 835,
                'model_name' => 'Passat Sedan',
                'make_id' => 57,
            ),
            335 => 
            array (
                'id' => 836,
                'model_name' => 'R32',
                'make_id' => 57,
            ),
            336 => 
            array (
                'id' => 837,
                'model_name' => 'Rabbit',
                'make_id' => 57,
            ),
            337 => 
            array (
                'id' => 838,
                'model_name' => 'Routan',
                'make_id' => 57,
            ),
            338 => 
            array (
                'id' => 839,
                'model_name' => 'Tiguan',
                'make_id' => 57,
            ),
            339 => 
            array (
                'id' => 840,
                'model_name' => 'Touareg',
                'make_id' => 57,
            ),
            340 => 
            array (
                'id' => 841,
                'model_name' => 'Touareg 2',
                'make_id' => 57,
            ),
            341 => 
            array (
                'id' => 842,
                'model_name' => '240',
                'make_id' => 58,
            ),
            342 => 
            array (
                'id' => 843,
                'model_name' => '850',
                'make_id' => 58,
            ),
            343 => 
            array (
                'id' => 844,
                'model_name' => 'C30',
                'make_id' => 58,
            ),
            344 => 
            array (
                'id' => 845,
                'model_name' => 'C70',
                'make_id' => 58,
            ),
            345 => 
            array (
                'id' => 846,
                'model_name' => 'S40',
                'make_id' => 58,
            ),
            346 => 
            array (
                'id' => 847,
                'model_name' => 'S60',
                'make_id' => 58,
            ),
            347 => 
            array (
                'id' => 848,
                'model_name' => 'S80',
                'make_id' => 58,
            ),
            348 => 
            array (
                'id' => 849,
                'model_name' => 'V40',
                'make_id' => 58,
            ),
            349 => 
            array (
                'id' => 850,
                'model_name' => 'V50',
                'make_id' => 58,
            ),
            350 => 
            array (
                'id' => 851,
                'model_name' => 'V70',
                'make_id' => 58,
            ),
            351 => 
            array (
                'id' => 852,
                'model_name' => 'V70 XC',
                'make_id' => 58,
            ),
            352 => 
            array (
                'id' => 853,
                'model_name' => 'XC60',
                'make_id' => 58,
            ),
            353 => 
            array (
                'id' => 854,
                'model_name' => 'XC70',
                'make_id' => 58,
            ),
            354 => 
            array (
                'id' => 855,
                'model_name' => 'XC90',
                'make_id' => 58,
            ),
            355 => 
            array (
                'id' => 856,
                'model_name' => 'GV',
                'make_id' => 59,
            ),
        ));
        
        
    }
}
