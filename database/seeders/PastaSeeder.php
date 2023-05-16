<?php

namespace Database\Seeders;

use App\Models\Pasta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PastaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayPasta = config('pasta');

        foreach($arrayPasta as $singlePasta) {
            $newPasta = new Pasta();

            $newPasta->title = $singlePasta['titolo'];
            $newPasta->description = $singlePasta['descrizione'];
            $newPasta->type = $singlePasta['tipo'];
            $newPasta->src = $singlePasta['src'];
            $newPasta->cooking_time = $singlePasta['cottura'];
            $newPasta->weight = $singlePasta['peso'];


            $newPasta->save();
        }
    }
}
