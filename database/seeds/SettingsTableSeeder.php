<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (is_null(Setting::first())) {
            $page = new Setting();
            $page->site_name = "Our News Portal";
            $page->is_featured_image_enable = true;
            $page->default_featured_image = "public/assets/images/defaults/default-post.png";
            $page->save();
        }
    }
}
