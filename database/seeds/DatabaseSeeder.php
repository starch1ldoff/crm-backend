<?php

use App\Services\Admin\database\seeds\AdminUserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminUserSeeder::class);
        $this->call(\App\Services\Admin\database\seeds\CompanySeeder::class);
        $this->call(\App\Services\Admin\database\seeds\EmployeeSeeder::class);
    }
}
