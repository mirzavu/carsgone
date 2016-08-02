<?php
#use Faker/Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\Vehicle;
class VehiclesTableSeeder extends Seeder{

	public function run(){
		$faker = Faker\Factory::create();
		foreach(range(1,1000) as $index)
		{
			Vehicle::create([
				'status_id' => 1
				]);
		}
	}
}

?>