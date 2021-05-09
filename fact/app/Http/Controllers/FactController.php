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
        $dayFact = DayFact::where('slug', '=','day-fact')->first(); // \DB::table('day_facts')->
        $timeChangeFact = $this->changeFact($dayFact);
        if ( $timeChangeFact)
        {
            $allFacts = $this->getAllFacts();
            if ($allFacts->isEmpty())
            {
                $factsOver = $this->allFactsAreShown();
                $df = $factsOver->fact;
                $dt = $factsOver->title;
            }
            else
            {
                $randomFact = $this->randomFactShow($allFacts);
                $df = $randomFact->fact;
                $dt = $randomFact->category->title;
            }
            $dayFact = $this->newDayFact($dayFact, $df, $dt);
        }
        return $dayFact;
    }
    public function changeFact( $dayFact)
    {
        return $dayFact->date!=date('Y-m-d');
    }
    public function getAllFacts()
    {
        //$allFacts = Facts::where('demonstrated','=' ,false)->pluck('slug');
        return Facts::where('demonstrated','=' ,false)->pluck('slug');
    }
    public function randomFactShow($allFacts)
    {
        $randomSlug = $allFacts->random();
        $randomFact = Facts::where('slug',$randomSlug)->first();
        $randomFact->demonstrated = true;
        $randomFact->save();
        return $randomFact;
    }
    public function allFactsAreShown()
    {
        //$factsOver = DayFact::where('slug', '=','facts-over')->first();
        return DayFact::where('slug', '=','facts-over')->first();
    }
    public function newDayFact($dayFact, $df, $dt)
    {
        $dayFact->fact = $df;
        $dayFact->title = $dt;
        $dayFact->date = date('Y.m.d');
        $dayFact->save();
        return $dayFact;
    }
}
/*
                //$dayFact->fact = $factsOver->fact;
                //$dayFact->title = $factsOver->title;
                 //$dayFact->fact = $randomFact->fact;
                //$dayFact->title = $randomFact->category->title;
       //$dayFact = DayFact::where('slug', '=','day-fact')->first(); // \DB::table('day_facts')->
        //$dt =  ($dayFact->date=date('Y-m-d'));
        //$dateInTable = $dayFact->date;

                //$items = $items->random();   //last();
//        $items = Facts::all();
//                return view('index', compact('dayFact'));
        else
        {
 //           dd($dayFact->date, date('Y-m-d'));
            $er = 'Oshibka!';
//            return view('error', compact('er'));
        }
*/
