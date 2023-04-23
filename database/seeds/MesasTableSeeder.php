<?php

use Illuminate\Database\Seeder;
use App\Mesa;

class MesasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        for ($i = 1; $i <= 20; $i++)
        {
            Mesa::create([
                'name' => $i,
                'status' => 'Inactive'

            ]);
        }
    }
}
