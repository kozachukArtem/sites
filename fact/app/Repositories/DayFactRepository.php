<?php

namespace App\Repositories;

//use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model
use App\Models\DayFact as Model;

/**
 * Class DayFactRepository.
 */
class DayFactRepository extends CoreRepository
{
    /**
     * @return string
     *  Return the model
     */
    protected function getModelClass()
    {
        return Model::class;
    }
/*
 * Возвращает текущий факт
 */
    public function getDayFact()
    {
        return Model::where('slug', '=','day-fact')->first();
    }
/*
 * Записывает в таблицу БД свежий факт вместо текущего
 */
    public function newDayFact($dayFact, $df, $dt)
    {
        $dayFact->title = $dt;
        $dayFact->fact = $df;
        $dayFact->date = date('Y.m.d');
        $dayFact->save();
        return $dayFact;
    }
}
