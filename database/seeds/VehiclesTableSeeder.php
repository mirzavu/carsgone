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
				'name' => str_random(10),
				'email' => str_random(9).'@gmail.com',
				'province_id' => rand(1,13),
				'city_id' => rand(0,60),
				'latitude' => rand(9*1000,11*1000)/1000,
				'latitude' => rand(75.7*1000,77*1000)/1000,
				'featured' => rand(0,1)
				]);			
		}
		foreach(range(1,25000) as $index)
		{

			Vehicle::create([
				'status_id' => rand(0,1),
				'dealer_id' => rand(1,25),
				'text' => str_random(40),
				'make_id' => rand(1,50),
				'model_id' => rand(1,100),
				'body_style_group_id' => rand(1,8),
				'price' => rand(1,60000),
				'year' => rand(2000,2016),
				'odometer' => rand(1,60000),
				'condition_id' => rand(0,1)
				]);
		}
	}
}

?>