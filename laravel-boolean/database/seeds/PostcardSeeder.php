<?php

use Illuminate\Database\Seeder;

use App\Models\Postcard;

class PostcardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Postcard::class, 10) -> create();
    }
}
