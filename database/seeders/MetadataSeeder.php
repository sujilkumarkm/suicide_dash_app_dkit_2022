<?php

namespace Database\Seeders;

use App\Models\MetaData;
use Illuminate\Database\Seeder;

class MetadataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MetaData::insert([
            'page_name'=>'About Us',
            'url'=>'https://dkit.ie.narayam.net/about-us',
            'title'=>'About Us',
            'keyword'=>'',
            'description'=>'',
        ]);
        MetaData::insert([
            'page_name'=>'Contact Us',
            'url'=>'https://dkit.ie.narayam.net/contact-us',
            'title'=>'Contact Us',
            'keyword'=>'',
            'description'=>'',
        ]);
        MetaData::insert([
            'page_name'=>'Home',
            'url'=>'https://dkit.ie.narayam.net/home',
            'title'=>'Home',
            'keyword'=>'',
            'description'=>'',
        ]);
    }
}
