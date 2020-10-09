<?php

namespace App\Services\Admin\database\seeds;

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Data\Models\Company::class, 10000)->create();
    }
}
