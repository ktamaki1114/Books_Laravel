<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class FakerBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Run bookfactory for making sample data
     *
     * @return void
     */
    public function run()
    {
        Book::factory()->count(10)->create();
    }
}
