<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Blog\BaseController as GuestBaseController;

/**
 * Базовый контроллер для всехконтроллеров управления
 * блогом в панели администрирования.
 *
 * Должен быть родителем всех контроллеров управления блогом
 * Class BaseController
 * @package App\Http\Controllers\Blog\Admin
 */
class BaseController extends GuestBaseController
{
    /*
     * BaseController constructor
     */
    public function __construct()
    {
        // Инициализация общих моментов для админки.
    }

}
