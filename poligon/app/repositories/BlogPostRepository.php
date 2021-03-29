<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class BlogPostRepository.
 *
 * @package App\Repositories
 */
class BlogPostRepository extends CoreRepository
{

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получить список статей для вывода в списке
     * (Админка)
     *
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate()
    {
        $columns = [
            'id',
            'title',
            'slug',
            'is_published',
            'published_at',
            'user_id',
            'category_id'
        ];

        $result = $this->startConditions()
                       ->select($columns)
                        ->orderBy('id', 'DESC')
//                      ->with(['category','user'])
//                        ->with(['user:id,name'])
                        ->with([
                             'category' => function ($query) {
                                $query->select(['id', 'title']);
                            }
//
                        ])
                        ->paginate(25);
//                        ->get();

//                        dd($result->first());

        return $result;
    }
}