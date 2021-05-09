<?php

namespace App\Http\Controllers;

use App\Models\Facts;
use App\Models\DayFact;

/*
 * Обрабатывает факт в сутки
 */
class FactController extends Controller
{
    public function index()
    {
        $dayFact = $this->selectFact();
        return view('index', compact('dayFact'));
    }

    public function selectFact()
    {
        $dayFact = DayFact::where('slug', '=','day-fact')->first();
        $timeChangeFact = $this->changeFact($dayFact);
        if ( $timeChangeFact)
        {
            $allFacts = $this->getAllFacts();
            if ($allFacts->isEmpty())
            {
//                $factsOver = $this->allFactsAreShown();
                $dt = 'Oops!!!';
                $df = 'Sorry, we are looking for new interesting facts. Try checking tomorrow';
            }
            else
            {
                $randomFact = $this->randomFactShow($allFacts);
                $dt = 'This Is My Fact';
                $df = $randomFact->fact;
            }
            $dayFact = $this->newDayFact($dayFact, $df, $dt);
        }
        return $dayFact;
    }
    public function changeFact( $dayFact): bool
    {
        return $dayFact->date!=date('Y-m-d');
    }
    public function getAllFacts()
    {
        return Facts::where('demonstrated',false)->pluck('slug');
    }
    public function randomFactShow($allFacts)
    {
        $randomSlug = $allFacts->random();
        $randomFact = Facts::where('slug',$randomSlug)->first();
        $randomFact->demonstrated = true;
        $randomFact->save();
        return $randomFact;
    }
    public function newDayFact($dayFact, $df, $dt)
    {
        $dayFact->title = $dt;
        $dayFact->fact = $df;
        $dayFact->date = date('Y.m.d');
        $dayFact->save();
        return $dayFact;
    }
}
