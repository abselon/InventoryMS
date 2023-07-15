<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class manufactureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('manufacture')->insert([
            'name'=>'Hitachi',
            'description'=>'tech company',
            'address'=>'street 1',
            'phone'=>'03003856471',
        ]);

        DB::table('manufacture')->insert([
            'name'=>'Panadol',
            'description'=>'paracetamol producer',
            'address'=>'street 2',
            'phone'=>'03003856472',
        ]);

        DB::table('manufacture')->insert([
            'name'=>'Young',
            'description'=>'bakery and foodstuff',
            'address'=>'street 3',
            'phone'=>'03003856473',
        ]);
    }
}
