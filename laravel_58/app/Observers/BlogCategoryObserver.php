<?php

namespace App\Observers;

use App\Models\BlogCategory;

class BlogCategoryObserver
{
    /**
     * Handle the models blog category "created" event.
     *
     * @param  \App\BlogCategory  $blogCategory
     * @return void
     */
    public function created(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Handle the models blog category "updated" event.
     *
     * @param  \App\blogCategory  $blogCategory
     * @return void
     */
    public function updated(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Handle the models blog category "deleted" event.
     *
     * @param  \App\ModelsBlogCategory  $modelsBlogCategory
     * @return void
     */
    public function deleted(ModelsBlogCategory $modelsBlogCategory)
    {
        //
    }

    /**
     * Handle the models blog category "restored" event.
     *
     * @param  \App\ModelsBlogCategory  $modelsBlogCategory
     * @return void
     */
    public function restored(ModelsBlogCategory $modelsBlogCategory)
    {
        //
    }

    /**
     * Handle the models blog category "force deleted" event.
     *
     * @param  \App\ModelsBlogCategory  $modelsBlogCategory
     * @return void
     */
    public function forceDeleted(ModelsBlogCategory $modelsBlogCategory)
    {
        //
    }
}
