<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserService
 * @package App\Services
 */
class UserService
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param array $columns
     * @param array $with
     * @return Builder[]|Collection|mixed
     */
    public function userList(array $columns = ['*'], array $with = []): mixed
    {
        return $this->userRepository->all($columns, $with);
    }

    /**
     * @param $data
     * @return Builder|Model|mixed
     */
    public function create($data)
    {
        return $this->userRepository->create($data);
    }

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($data, $id)
    {
       return $this->userRepository->update($data, $id);
    }

    /**
     * @param $id
     * @param array $with
     * @return Builder|Builder[]|Collection|Model|mixed|null
     */
    public function find($id, array $with)
    {
       return $this->userRepository->find($id, $with);
    }

    /**
     * @param $id
     * @return Builder|Builder[]|Collection|Model|mixed|null
     */
    public function findOneOrFail($id)
    {
        return $this->userRepository->findOneOrFail($id);
    }

    /**
     * @param $date
     * @return false|string
     */
    public function dateFormat($date)
    {
        return date('Y-m-d H:i:s',strtotime($date));
    }
}
