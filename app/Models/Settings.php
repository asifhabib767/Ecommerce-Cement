<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    public $fillable = [
        'site_name',
        'site_logo',
        'site_favicon',
        'site_description',
        'site_copyright_text',
        'site_meta_description',
        'site_meta_keywords',
        'site_meta_author',
        'site_contact_no',
        'site_phone',
        'site_email',
        'site_address',
        'site_working_day_hours',
        'site_facebook_link',
        'site_youtube_link',
        'site_twitter_link',
        'site_linkedin_link',
        'slider_height',
        'site_custom_date1',
        'site_custom_date2',
        'site_custom_date3',
        'site_custom_date4'
    ];
}
