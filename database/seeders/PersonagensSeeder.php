<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Personagem;
use Illuminate\Support\Str;


class PersonagensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Nomes dos personagens na ordem especificada
        $nomesPersonagens = [
            'Simon Muran',
            'Teana',
            'Villager 1',
            'Villager 2',
            'Villager 3',
            'Jono',
            'Seto',
            'Heishin',
            'Rex Raptor',
            'Weevil Underwood',
            'Mai Valentine',
            'Bandit Keith',
            'Shadi',
            'Yami Bakura',
            'Pegasus',
            'Isis',
            'Kaiba',
            'Mage Soldier',
            'Teana 2nd',
            'Jono 2nd',
            'Ocean Mage',
            'High Mage Secmeton',
            'Forest Mage',
            'High Mage Anubisius',
            'Mountain Mage',
            'High Mage Atenza',
            'Desert Mage',
            'High Mage Martins',
            'Meadow Mage',
            'High Mage Kepura',
            'Labyrinth Mage',
            'Seto 2nd',
            'Guardian Sebek',
            'Guardian Neku',
            'Heishin 2nd',
            'Seto 3rd',
            'Darknite',
            'Nitemare',
            'Duel Master K',
        ];

        // Criação dos personagens no banco de dados
        foreach ($nomesPersonagens as $nomePersonagem) {
            $imagemPersonagem = 'personagens/' . $nomePersonagem . '.png';

            // Remova a parte "storage/app/public/" do caminho
            $imagemPersonagem = str_replace('storage/app/public/', '', $imagemPersonagem);

            Personagem::create([
                'nome' => $nomePersonagem,
                'imagem' => $imagemPersonagem,
            ]);
        }
    }
}
