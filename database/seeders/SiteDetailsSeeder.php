<?php

namespace Database\Seeders;

use App\Models\SiteDetails;
use Illuminate\Database\Seeder;

class SiteDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteDetails::insert([
            'phone_1'=>'0892738178',
            'phone_2'=>'9496959162',
            'email_1'=>'kmsujilkumar@gmail.com',
            'email_2'=>'d00242726@student.dkit.ie',
            'address'=>'Dundalk Institute of Technology',
            'whatsapp'=>'0892738178',
            'facebook'=>'https://www.facebook.com/kmsujil',
            'twitter'=>'',
            'linkedin'=>'https://www.linkedin.com/in/sujil/',
            'instagram'=>'https://www.instagram.com/sujilkumarkm/',
            'youtube'=>'',
        ]);
    }
}
