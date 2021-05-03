<?php

namespace App\Http\Controllers;

use App\Models\Facts;
use App\Models\DayFact;
use Illuminate\Http\Request;

class FactController extends Controller
{
    public function index()
    {
        $dayFact = DayFact::where('slug', '=','index')->first(); // \DB::table('day_facts')->
        return view('index', compact('dayFact'));
    }

    /*
     * Обрабатывает факт в сутки
     */
    public function show()
    {
        $dayFact = DayFact::where('slug', '=','day-fact')->first(); // \DB::table('day_facts')->
        if ($dayFact->date!=date('Y-m-d'))
        {
            $randomSlug = \DB::table('facts')->where('demonstrated','=' ,false)->pluck('slug');
            if ($randomSlug->isEmpty())
            {
                $factsOver = DayFact::where('slug', '=','facts-over')->first();
                $dayFact->fact = $factsOver->fact;
                $dayFact->title = $factsOver->title;
            }
            else
            {
                $randomSlug = $randomSlug->random();
                $randomFact = Facts::where('slug',$randomSlug)->first();
                $randomFact->demonstrated = true;
                $randomFact->save();
                $dayFact->fact = $randomFact->fact;
                $dayFact->title = $randomFact->category->title;
            }
            $dayFact->date = date('Y.m.d');
            $dayFact->save();
        }
        return view('index', compact('dayFact'));
    }
}
/*
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
