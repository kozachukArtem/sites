<?php

namespace App\Http\Controllers;

use App\Repositories\DayFactRepository;
use App\Repositories\FactsRepository;

/*
 * Обрабатывает факт в сутки
 */
class FactController extends Controller
{
/*
 * FactController конструктор
 */
    public function __construct()
    {
        $this->DayFactRepository = app(DayFactRepository::class);
        $this->FactsRepository = app(FactsRepository::class);
    }
/*
 * Отображает по факту в сутки или сообщение об отсутствии свежих фактов
 */
    public function index()
    {
        $dayFact = $this->selectFact();
        return view('index', compact('dayFact'));
    }
/*
 * Выбирает случайный факт или сообщение об отсутствии свежих фактов
 */
    public function selectFact()
    {
        $dayFact = $this->DayFactRepository->getDayFact();
        $timeChangeFact = $this->changeFact($dayFact);
        if ( $timeChangeFact)
        {
            $allFacts = $this->FactsRepository->getAllFacts();
            if ($allFacts->isEmpty())
            {
//                $factsOver = $this->allFactsAreShown();
                $dt = 'Oops!!!';
                $df = 'Sorry, we are looking for new interesting facts. Try checking tomorrow';
            }
            else
            {
                $randomFact = $this->FactsRepository->randomFactShow($allFacts);
                $dt = 'This Is My Fact';
                $df = $randomFact->fact;
            }
            $dayFact = $this->DayFactRepository->newDayFact($dayFact, $df, $dt);
        }
        return $dayFact;
    }
/*
 * Поменять на свежий факт (true)
 */
    public function changeFact( $dayFact): bool
    {
        return $dayFact->date!=date('Y-m-d');
    }

}
