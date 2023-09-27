<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;

/**
 * Class UserRepository
 * @package App\Repositories\Eloquent
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function userListwithoutAdmin($columns, $with, $email): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->model
            ->with($with)
            ->whereNotIn('email', $email)
            ->get($columns);
    }
}
