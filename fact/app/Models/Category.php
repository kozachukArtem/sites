<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    /*
     * Получить факты по теме
     */
    public function facts()
    {
        return $this->hasMany(Facts::class);
    }
}
