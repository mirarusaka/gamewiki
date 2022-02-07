<?php

use Illuminate\Database\Seeder;

class WikiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factor(Model::class,10)->create();
    }
}
