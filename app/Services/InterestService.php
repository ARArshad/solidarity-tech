<?php

namespace App\Services;

use App\Repositories\InterestRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class InterestService
 * @package App\Services
 */
class InterestService
{
    /**
     * @var InterestRepositoryInterface
     */
    private $interestRepository;

    /**
     * @param InterestRepositoryInterface $interestRepository
     */
    public function __construct(InterestRepositoryInterface $interestRepository)
    {
        $this->interestRepository = $interestRepository;
    }

    /**
     * @return Builder[]|Collection|mixed
     */
    public function allInterests()
    {
        return $this->interestRepository->all();
    }
}
