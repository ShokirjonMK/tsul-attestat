<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class QuestionallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {

        DB::table('questionall')->insert([
            'question' => "Question " .  1,
            'name' => Str::random(15),
            'department_id' => rand(1, 5),
        ]);
    }
}
