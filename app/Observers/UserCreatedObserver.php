<?php

namespace App\Observers;
use App\Jobs\SendWelcomeEmail;
use App\Models\User;


class UserCreatedObserver
{
    /**
     * @param User $user
     * @return void
     */
    public function created(User $user): void
    {
        dispatch(new SendWelcomeEmail($user));
    }
}
