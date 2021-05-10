<?php

namespace App\Repositories;

use App\Models\Facts as Model;
//use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class FactsRepository.
 */
class FactsRepository extends CoreRepository
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
 * Возвращает столбик slug еще не просмотреных фактов
 */
    public function getAllFacts()
    {
        return Model::where('demonstrated',false)->pluck('slug');
    }
/*
 * Из всех непросмотренных фактов выбирает случайный
 */
    public function randomFactShow($allFacts)
    {
        $randomSlug = $allFacts->random();
        $randomFact = Model::where('slug',$randomSlug)->first();
        $randomFact->demonstrated = true;
        $randomFact->save();
        return $randomFact;
    }
}
