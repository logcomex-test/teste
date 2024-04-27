<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as FakerFactory;
use Faker\Generator as FakerGenerator;
use Faker\Provider\pt_BR\Person;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = FakerFactory::create('pt_BR');
        $states = ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'];

        for ($i = 1; $i <= 2000; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name(),
                'state' => $states[array_rand($states)],
                'age' => rand(20, 69),
                'address' => $faker->address,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
