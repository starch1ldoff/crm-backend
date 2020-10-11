<?php

namespace App\Services\Admin\database\seeds;

use App\Data\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() == 0) {
            factory(User::class, 1)->create();
        }
    }
}
