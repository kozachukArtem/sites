<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent;
//use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class BlogCategoryRepository.
 * @package App\Repositories
 */
class BlogCategoryRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }
    /**
     * @return string
     *  Return the model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getForComboBox()
    {
        //return $this->startConditions()->all();

        $columns = implode(',', [
            'id',
            'CONCAT (id, ". ", title) AS id_title'
        ]);

        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();
            //dd($result);
        return $result;

    }
    /**
     * Получить категории для вывода пагинатором.
     * @param int\null $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPaginate($perPage = null)
    {
        $columns = ['id', 'title', 'parent_id'];

        $result = $this
            ->startConditions()
            ->select($columns)
            /*
             *
             */
            ->paginate($perPage);

        return $result;
    }
}

/*$result[] = $this->startConditions()->all();
$result[] = $this
    ->startConditions()
    ->select('blog_categories.*',
    \DB::raw('CONCAT (id, ". ", title) AS id_title'))
    ->toBase()
    ->get();*/
