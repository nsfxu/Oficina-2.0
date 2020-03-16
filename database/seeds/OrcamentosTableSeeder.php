<?php

use Illuminate\Database\Seeder;
use App\Orcamento;
class OrcamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('pt_BR');

        for ($i=0; $i < 15; $i++) {   
        
            Orcamento::create([
                'Cliente' => $faker->name,
                'Vendedor' => $faker->name,
                'DataOrcamento' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = null),
                'Descricao' => $faker->text,
                'Valor' => $faker->numberBetween($min = 40, $max = 9000),
            ]);

        }
    }
}
