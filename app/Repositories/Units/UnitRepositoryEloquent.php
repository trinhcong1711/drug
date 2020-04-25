<?php

namespace App\Repositories\Units;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Units\UnitRepository;
use App\Models\Unit;
use Prettus\Repository\Events\RepositoryEntityCreated;
use Prettus\Validator\Contracts\ValidatorInterface;

/**
 * Class UnitRepositoryEloquent.
 *
 * @package namespace App\Repositories\Units;
 */
class UnitRepositoryEloquent extends BaseRepository implements UnitRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Unit::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
