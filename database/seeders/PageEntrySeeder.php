<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        Page::create([
            'id' => 1000,
            'pagename' => 'temp',
            'categoryCode' => 0,
            'title' => 'temp',
            'taxonomycode' => 1,
            'status'    => 'Y'
        ]);
       
    }
}
