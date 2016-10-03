<?php

use Illuminate\Database\Seeder;
use App\Models\Partner;

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
        Partner::create([
			'partner' => 'Strathcom'
		]);

		Partner::create([
			'partner' => 'Boost'
		]);

		Partner::create([
			'partner' => 'C-Demo'
		]);

		\DB::table('drive_types')->delete();
		\DB::table('drive_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'drive_type' => 'Front Wheel Drive',
            ),
            array (
                'id' => 2,
                'drive_type' => 'Rear Wheel Drive',
            ),
            array (
                'id' => 3,
                'drive_type' => 'All Wheel Drive',
            ),
            array (
                'id' => 4,
                'drive_type' => 'Four Wheel Drive',
            ),
        ));

        $this->call(BodyStyleGroupsTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(MakesTableSeeder::class);
        $this->call(ModelsTableSeeder::class);
        $this->call(PostalCodesTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(VehiclesTableSeeder::class);
    }
}
