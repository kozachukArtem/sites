<?php

namespace App\Repositories;

//use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class CoreRepository.
 */
abstract class CoreRepository
//class CoreRepository extends BaseRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }
    abstract protected function getModelClass();
    /**
     * @return string
     *  Return the model
     */
    protected function startConditions()
    {
        return clone $this->model;
    }
}
