<?php

namespace Database\Seeders;

use App\Models\Interest;
use Illuminate\Database\Seeder;

class UserInterestSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        $interests = [
            ['interest' => 'Reading'],
            ['interest' => 'Hiking'],
            ['interest' => 'Cooking'],
            ['interest' => 'Traveling'],
            ['interest' => 'Photography'],
            ['interest' => 'Painting'],
            ['interest' => 'Swimming'],
            ['interest' => 'Coding'],
            ['interest' => 'Gardening'],
            ['interest' => 'Yoga'],
            ['interest' => 'Singing'],
            ['interest' => 'Dancing'],
            ['interest' => 'Meditation'],
            ['interest' => 'Gaming'],
            ['interest' => 'Running'],
            ['interest' => 'Cycling'],
            ['interest' => 'Fishing'],
            ['interest' => 'Movies'],
            ['interest' => 'Music'],
            ['interest' => 'Art'],
            ['interest' => 'Fashion'],
            ['interest' => 'Sports'],
            ['interest' => 'Crafts'],
            ['interest' => 'Animals'],
            ['interest' => 'Fitness'],
        ];

        Interest::insert($interests);
    }
}
