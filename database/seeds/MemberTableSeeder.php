<?php

use Illuminate\Database\Seeder;
use App\Congregation;
use App\Member;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $congregation1 = Congregation::where('name', 'Congregação 1 da Igreja 1')->first();
        $congregation2 = Congregation::where('name', 'Congregação 2 da Igreja 1')->first();

        Member::create([
            'name' => 'Membro 1',
            'gender' => '0',
            'birth' => '2000-01-01',
            'email' => 'email@email.com',
            'phone' => '1234-5678',
            'address' => 'Endereço',
            'status' => '0',
            'admission' => '2',
            'admission_date' => '2015-01-01',
            'congregation_id' => $congregation1->id,
            'church_id' => $congregation1->church_id
        ]);

        Member::create([
            'name' => 'Membro 2',
            'gender' => '1',
            'birth' => '2000-01-01',
            'email' => 'email@email.com',
            'phone' => '1234-5678',
            'address' => 'Endereço',
            'status' => '0',
            'admission' => '2',
            'admission_date' => '2015-01-01',
            'congregation_id' => $congregation1->id,
            'church_id' => $congregation1->church_id
        ]);

        Member::create([
            'name' => 'Membro 3',
            'gender' => '0',
            'birth' => '2000-01-01',
            'email' => 'email@email.com',
            'phone' => '1234-5678',
            'address' => 'Endereço',
            'status' => '0',
            'admission' => '2',
            'admission_date' => '2015-01-01',
            'congregation_id' => $congregation2->id,
            'church_id' => $congregation2->church_id
        ]);

        Member::create([
            'name' => 'Membro 4',
            'gender' => '1',
            'birth' => '2000-01-01',
            'email' => 'email@email.com',
            'phone' => '1234-5678',
            'address' => 'Endereço',
            'status' => '0',
            'admission' => '2',
            'admission_date' => '2015-01-01',
            'congregation_id' => $congregation2->id,
            'church_id' => $congregation2->church_id
        ]);
    }
}
