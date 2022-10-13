<?php

namespace Database\Seeders;

use App\Models\Record;
use Database\Factories\RecordFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Record::factory(mt_rand(10,50))->create();
    }
}
