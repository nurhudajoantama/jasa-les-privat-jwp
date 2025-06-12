<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create default application settings
        Setting::create([
            'site_name'        => 'PrivatOnline',
            'site_description' => 'Platform pemesanan les privat online dengan pengajar profesional.',
            'contact_email'    => 'info@privatonline.com',
            'contact_phone'    => '+62 812 3456 7890',
            'address'          => 'Jl. Contoh No.1, Jakarta, Indonesia',
        ]);
    }
}
