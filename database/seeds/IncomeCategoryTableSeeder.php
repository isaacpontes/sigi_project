<?php

use Illuminate\Database\Seeder;
use App\Church;
use App\IncomeCategory;

class IncomeCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $church1 = Church::where('name', 'Igreja 1')->first();

        IncomeCategory::create([
            'name' => 'Dízimos',
            'add_info' => 'Dízimos dos membros.',
            'church_id' => $church1->id
        ]);

        IncomeCategory::create([
            'name' => 'Ofertas',
            'add_info' => 'Ofertas de membros e visitantes.',
            'church_id' => $church1->id
        ]);

        IncomeCategory::create([
            'name' => 'Ofertas Missionárias',
            'add_info' => 'Ofertas de voltadas para ajudar o trabalho missionário.',
            'church_id' => $church1->id
        ]);
    }
}
