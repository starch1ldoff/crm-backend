<?php

namespace App\Domains\Company\Jobs;

use App\Data\Models\Company;
use App\Data\Models\User;
use App\Data\Notifications\Admin\Company\CompanyCreatedNotification;
use Lucid\Foundation\Job;

class SendCompanyCreatedNotificationJob extends Job
{
    /**
     * @var User
     */
    private User $user;

    /**
     * @var Company
     */
    private Company $company;

    /**
     * Create a new job instance.
     *
     * @param User $user
     * @param Company $company
     */
    public function __construct(User $user, Company $company)
    {
        $this->user = $user;
        $this->company = $company;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->user->notify(new CompanyCreatedNotification($this->company));
    }
}
