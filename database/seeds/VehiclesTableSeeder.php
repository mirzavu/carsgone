<?php
#use Faker/Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\Vehicle;
use App\Models\Dealer;
class VehiclesTableSeeder extends Seeder{

	public function run(){
		$faker = Faker\Factory::create();
		foreach(range(1,25) as $index)
		{		
			Dealer::create([
				'province_id' => rand(1,13),
				]);			
		}
		foreach(range(1,100000) as $index)
		{

			Vehicle::create([
				'status_id' => rand(0,1),
				'dealer_id' => rand(1,25),
				]);
		}
	}
}

?>