<?php

use Illuminate\Database\Seeder;
use App\Position;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listPosition = [
            ['desc' => 'Goalkeeper'],
            ['desc' => 'Full-backs (left-back or right back)'],
            ['desc' => 'Centre-Backs (Central Defender)'],
            ['desc' => 'Sweeper'],
            ['desc' => 'Central Midfield'],
            ['desc' => 'Wide Midfield (Left Midfield and Right Midfield)'],
            ['desc' => 'Striker (Centre Forward)'],
            ['desc' => 'Behind the Striker'],
        ];

        foreach ($listPosition as $post) {
            $position = new Position();
            $position->desc = $post['desc'];
            $position->save();
        }
    }
}
