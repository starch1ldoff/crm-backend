<?php

namespace App\Domains\User\Jobs;

use App\Data\Models\User;
use Lucid\Foundation\Job;

class GetFirstUserJob extends Job
{
    /**
     * Execute the job.
     *
     * @return User
     */
    public function handle(): User
    {
        return User::first();
    }
}
