<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $states = ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'];

        $motivation = [
            'Em busca de novos desafios.',
            'Focado em alcançar metas pessoais e profissionais.',
            'Determinado a superar obstáculos.',
            'Procurando por oportunidades de crescimento.',
            'Com vontade de fazer a diferença no mundo.',
            'Buscando um propósito maior na vida.',
            'Inspirado em criar impacto positivo na sociedade.',
            'Pronto para enfrentar qualquer desafio que surgir.',
            'Acreditando que cada dia é uma nova oportunidade.',
            'Com dedicação e persistência, alcançarei meus objetivos.',
            'Motivado a aprender e evoluir continuamente.',
            'Sonhando grande e trabalhando duro para realizar.',
            'Apaixonado por transformar sonhos em realidade.',
            'Enfrentando os medos e seguindo em frente com coragem.',
            'Acreditando no poder da determinação e da disciplina.',
            'Com esperança e otimismo, conquistarei o que desejo.',
            'Inspiração vem da busca constante pelo crescimento.',
            'Cada desafio é uma oportunidade para aprender e crescer.',
            'Firme na busca pela excelência em tudo que faço.',
            'Motivado pela vontade de fazer a diferença no meu caminho.',
        ];

        for ($i = 1; $i <= 2000; $i++) {
            DB::table('users')->insert([
                'name' => 'Pessoa' . $i,
                'state' => $states[array_rand($states)],
                'age' => rand(20, 69),
                'motivation' => $motivation[array_rand($motivation)],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
