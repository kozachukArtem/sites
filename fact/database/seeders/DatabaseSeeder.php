<?php

namespace Database\Seeders;

use App\Models\DayFact;
//use App\Models\Facts;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DayFact::create(
            [
                'title'=> 'This Is My Fact',
                'slug' => 'day-fact',
                'date' => '2000-01-01'
            ]
        );
        DayFact::create(
            [
                'title'=> 'Oops!!!',
                'slug' => 'facts-are-over',
                'fact' => 'Sorry, we are looking for new interesting facts. Try checking tomorrow'
            ]
        );

        // \App\Models\User::factory(10)->create();
        //\DB::table('day_facts')->insert([
        $j = file_get_contents('public/json/facts.json');
        $data = json_decode($j);
        if( $j != false && !is_null($data)){
            foreach($data as $k => $e){
                \DB::table('facts')->insert([
                    [
                        'slug' => Str::slug($e->fact),
                        'fact' => $e->fact
                    ],
                ]);
            }
        }
   }
}
