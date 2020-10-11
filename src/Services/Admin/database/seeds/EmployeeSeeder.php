<?php

namespace App\Services\Admin\database\seeds;

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Data\Models\Employee::class, 10000)->create();
    }
}
