<?php

namespace App\Actions\Events;

use App\Models\EventRegistration;
use App\Repositories\Contracts\EventRegistrationRepositoryInterface;

class ConfirmRegistration
{
    public function __construct(private readonly EventRegistrationRepositoryInterface $repository) {}

    public function handle(EventRegistration $registration): EventRegistration
    {
        return $this->repository->confirm($registration);
    }
}
