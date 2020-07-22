<?php

use Illuminate\Database\Seeder;
use App\Church;
use App\Classroom;

class ClassroomTableSeeder extends Seeder
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

        Classroom::create([
            'name' => 'Classe dos Homens',
            'add_info' => 'Classe da EBD dos homens entre 30 e 59 anos.',
            'church_id' => $church1->id
        ]);

        Classroom::create([
            'name' => 'Classe das Mulheres',
            'add_info' => 'Classe da EBD das mulheres entre 30 e 59 anos.',
            'church_id' => $church1->id
        ]);

        Classroom::create([
            'name' => 'Classe dos Adolescentes',
            'add_info' => 'Classe da EBD dos adolescentes entre 12 e 17 anos.',
            'church_id' => $church1->id
        ]);
    }
}
