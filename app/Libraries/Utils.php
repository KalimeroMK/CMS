<?php

namespace App\Libraries;

use App\Models\Setting;
use Crypt;
use DB;
use File;
use Log;
use StdClass;
use URL;

class Utils
{
    /**
     * @param $category
     * @param $key
     * @param $type
     * @return mixed|string
     */
    public static function getSettingsValue($category, $key, $type)
    {
        $setting = Setting::where('category', $category)->where('column_key', $key)->first();

        if (!empty($setting)) {
            if ($type == config('constants.TYPE_STRING')) {
                return $setting->value_string;
            }

            if ($type == config('constants.TYPE_TEXT')) {
                return $setting->value_txt;
            }

            if ($type == config('constants.TYPE_CHECK')) {
                return $setting->value_check;
            }
        }

        return "http://localhost";
    }


    /**
     * @param $val
     * @param string $f
     * @return float
     */
    public static function doubleTruncate($val, $f = "0")
    {
        if (($p = strpos($val, '.')) !== false) {
            $val = floatval(substr($val, 0, $p + 1 + $f));
        }
        return $val;
    }

    /**
     * @return string
     */
    public static function generateResetCode()
    {
        $code = Crypt::encrypt(str_random(12));

        if (DB::table('users')->where("reset_password_code", $code)->count() > 0) {
            self::generateResetCode();
        }

        return $code;
    }

    /**
     * @param $file
     * @param null $folder
     * @return bool|string
     */
    public static function imageUpload($file, $folder = null)
    {
        $timestamp = uniqid();
        $ext = $file->guessClientExtension();
        $name = $timestamp . "_file." . $ext;

        if (is_null($folder)) {

            // move uploaded file from temp to uploads directory
            if ($file->move(public_path() . '/uploads/', $name)) {
                return URL::to('/uploads/' . $name);
            }
        } else {
            if (!File::exists(public_path() . '/uploads/' . $folder)) {
                File::makeDirectory(public_path() . '/uploads/' . $folder);
            }

            // move uploaded file from temp to uploads directory
            if ($file->move(public_path() . '/uploads/' . $folder . '/', $name)) {
                return URL::to('/uploads/' . $folder . '/' . $name);
            }
        }

        return false;
    }

    /**
     * @param $category
     * @param $key
     * @param $value
     * @param $type
     */
    public static function setOrCreateSettings($category, $key, $value, $type)
    {
        if (sizeof(Setting::where('category', $category)->where('column_key', $key)->get()) > 0) {
            $setting = Setting::where('category', $category)->where('column_key', $key)->first();

            if ($type == config('constants.TYPE_TEXT')) {
                $setting->value_txt = $value;
            }

            if ($type == config('constants.TYPE_STRING')) {
                $setting->value_string = $value;
            }

            if ($type == config('constants.TYPE_CHECK')) {
                $setting->value_check = $value;
            }

            $setting->save();
        } else {
            $settings = new Setting();
            $settings->category = $category;
            $settings->column_key = $key;

            if ($type == config('constants.TYPE_TEXT')) {
                $settings->value_txt = $value;
            }

            if ($type == config('constants.TYPE_STRING')) {
                $settings->value_string = $value;
            }

            if ($type == config('constants.TYPE_CHECK')) {
                $settings->value_check = $value;
            }

            $settings->save();
        }
    }

    /**
     * @param $key
     * @return array|StdClass
     */
    public static function getSettings($key)
    {
        if ($key == config('constants.CATEGORY_CUSTOM_CSS')) {
            //Custom CSS Tab
            $settings_custom_css = new StdClass();
            $settings_custom_css->custom_css = self::findOrTxt(config('constants.CATEGORY_CUSTOM_CSS'), config('constants.CATEGORY_CUSTOM_CSS'));
            return $settings_custom_css;
        }

        if ($key == config('constants.CATEGORY_CUSTOM_JS')) {
            //Custom JS Tab
            $settings_custom_js = new StdClass();
            $settings_custom_js->custom_js = self::findOrTxt(config('constants.CATEGORY_CUSTOM_JS'), config('constants.CATEGORY_CUSTOM_JS'));
            return $settings_custom_js;
        }

        if ($key == config('constants.CATEGORY_SOCIAL')) {
            //Social Tab
            $settings_social = new StdClass();
            $settings_social->fb_page_url = self::findOrString(config('constants.CATEGORY_SOCIAL'), 'fb_page_url');
            $settings_social->twitter_handle = self::findOrString(config('constants.CATEGORY_SOCIAL'), 'twitter_handle');
            $settings_social->twitter_url = self::findOrString(config('constants.CATEGORY_SOCIAL'), 'twitter_url');
            $settings_social->google_plus_page_url = self::findOrString(config('constants.CATEGORY_SOCIAL'), 'google_plus_page_url');
            $settings_social->skype_username = self::findOrString(config('constants.CATEGORY_SOCIAL'), 'skype_username');
            $settings_social->youtube_channel_url = self::findOrString(config('constants.CATEGORY_SOCIAL'), 'youtube_channel_url');
            $settings_social->vimeo_channel_url = self::findOrString(config('constants.CATEGORY_SOCIAL'), 'vimeo_channel_url');
            $settings_social->addthis_js = self::findOrTxt(config('constants.CATEGORY_SOCIAL'), 'addthis_js');
            $settings_social->sharethis_js = self::findOrTxt(config('constants.CATEGORY_SOCIAL'), 'sharethis_js');
            $settings_social->sharethis_span_tags = self::findOrTxt(config('constants.CATEGORY_SOCIAL'), 'sharethis_span_tags');
            $settings_social->facebook_box_js = self::findOrTxt(config('constants.CATEGORY_SOCIAL'), 'facebook_box_js');
            $settings_social->twitter_box_js = self::findOrTxt(config('constants.CATEGORY_SOCIAL'), 'twitter_box_js');
            $settings_social->show_sharing = self::findOrCheck(config('constants.CATEGORY_SOCIAL'), 'show_sharing');
            $settings_social->show_big_sharing = self::findOrCheck(config('constants.CATEGORY_SOCIAL'), 'show_big_sharing');
            return $settings_social;
        }

        if ($key == config('constants.CATEGORY_COMMENTS')) {
            //Comments Tab
            $settings_comments = new StdClass();
            $settings_comments->comment_system = self::findOrString(config('constants.CATEGORY_COMMENTS'), 'comment_system');
            $settings_comments->fb_js = self::findOrTxt(config('constants.CATEGORY_COMMENTS'), 'fb_js');
            $settings_comments->fb_num_posts = self::findOrString(config('constants.CATEGORY_COMMENTS'), 'fb_num_posts');
            $settings_comments->fb_comment_count = self::findOrCheck(config('constants.CATEGORY_COMMENTS'), 'fb_comment_count');
            $settings_comments->disqus_js = self::findOrTxt(config('constants.CATEGORY_COMMENTS'), 'disqus_js');
            $settings_comments->disqus_comment_count = self::findOrCheck(config('constants.CATEGORY_COMMENTS'), 'disqus_comment_count');
            $settings_comments->show_comment_box = self::findOrCheck(config('constants.CATEGORY_COMMENTS'), 'show_comment_box');

            return $settings_comments;
        }

        if ($key == config('constants.CATEGORY_SEO')) {
            //SEO Tab
            $settings_seo = new StdClass();
            $settings_seo->seo_keywords = self::findOrTxt(config('constants.CATEGORY_SEO'), 'seo_keywords');
            $settings_seo->seo_description = self::findOrTxt(config('constants.CATEGORY_SEO'), 'seo_description');
            $settings_seo->google_verify = self::findOrString(config('constants.CATEGORY_SEO'), 'google_verify');
            $settings_seo->bing_verify = self::findOrString(config('constants.CATEGORY_SEO'), 'bing_verify');

            return $settings_seo;
        }

        if ($key == config('constants.CATEGORY_OLD_NEWS')) {
            //Old News Tab
            $settings_old_news = new StdClass();
            $settings_old_news->days = self::findOrString(config('constants.CATEGORY_OLD_NEWS'), 'days');
            $settings_old_news->auto_update = self::findOrCheck(config('constants.CATEGORY_OLD_NEWS'), 'auto_delete_old_news');

            return $settings_old_news;
        }

        if ($key == config('constants.CATEGORY_GENERAL')) {
            //General Tab
            $settings_general = new StdClass();
            $settings_general->site_url = self::findOrString(config('constants.CATEGORY_GENERAL'), 'site_url');
            $settings_general->site_title = self::findOrString(config('constants.CATEGORY_GENERAL'), 'site_title');
            $settings_general->analytics_code = self::findOrTxt(config('constants.CATEGORY_GENERAL'), 'analytics_code');
            $settings_general->mailchimp_form = self::findOrTxt(config('constants.CATEGORY_GENERAL'), 'mailchimp_form');
            $settings_general->logo_76 = self::findOrString(config('constants.CATEGORY_GENERAL'), 'logo_76');
            $settings_general->logo_120 = self::findOrString(config('constants.CATEGORY_GENERAL'), 'logo_120');
            $settings_general->logo_152 = self::findOrString(config('constants.CATEGORY_GENERAL'), 'logo_152');
            $settings_general->favicon = self::findOrString(config('constants.CATEGORY_GENERAL'), 'favicon');
            $settings_general->site_post_as_titles = self::findOrCheck(config('constants.CATEGORY_GENERAL'), 'site_post_as_titles');
            $settings_general->generate_sitemap = self::findOrCheck(config('constants.CATEGORY_GENERAL'), 'generate_sitemap');
            $settings_general->generate_rss_feeds = self::findOrCheck(config('constants.CATEGORY_GENERAL'), 'generate_rss_feeds');
            $settings_general->include_sources = self::findOrCheck(config('constants.CATEGORY_GENERAL'), 'include_sources');

            $locale = self::findOrString(config('constants.CATEGORY_GENERAL'), 'locale');
            $timezone = self::findOrString(config('constants.CATEGORY_GENERAL'), 'timezone');

            $settings_general->locale = strlen($locale) <= 0 ? 'en' : $locale;
            $settings_general->timezone = strlen($timezone) <= 0 ? 'America/New_York' : $timezone;

            return $settings_general;
        }

        return [];
    }

    /**
     * @param $cat
     * @param $col_key
     * @return mixed|string
     */
    public static function findOrTxt($cat, $col_key)
    {
        return DB::table('settings')->where('category', $cat)->where('column_key', $col_key)->count() > 0 ? Setting::where('category', $cat)->where('column_key', $col_key)->first()->value_txt : '';
    }

    /**
     * @param $cat
     * @param $col_key
     * @return mixed|string
     */
    public static function findOrString($cat, $col_key)
    {
        return DB::table('settings')->where('category', $cat)->where('column_key', $col_key)->count() > 0 ? Setting::where('category', $cat)->where('column_key', $col_key)->first()->value_string : '';
    }

    /**
     * @param $cat
     * @param $col_key
     * @return int|mixed
     */
    public static function findOrCheck($cat, $col_key)
    {
        return DB::table('settings')->where('category', $cat)->where('column_key', $col_key)->count() > 0 ? Setting::where('category', $cat)->where('column_key', $col_key)->first()->value_check : 0;
    }

    /**
     * @param $str
     * @param $arg
     * @param string $lvl
     */
    public static function logs($str, $arg, $lvl = 'info')
    {
        Log::$lvl($str . ' :: ' . print_r($arg, true));
    }

    /**
     * @param $arg
     * @param string $lvl
     */
    public static function log($arg, $lvl = 'info')
    {
        Log::$lvl(print_r($arg, true));
    }

    /**
     * @param $date
     * @param bool $time
     * @return false|string
     */

    public static function prettyDate($date, $time = true)
    {
        $format = $time ? "F jS, Y" : "F jS, Y";
        return date($format, strtotime($date));
    }

    /**
     * @param int $length
     * @param int $strength
     * @return string
     */
    public static function generateRandom($length = 9, $strength = 4)
    {
        $vowels = 'aeiouy';
        $consonants = 'bcdfghjklmnpqrstvwxz';
        if ($strength & 1) {
            $consonants .= 'BCDFGHJKLMNPQRSTVWXZ';
        }
        if ($strength & 2) {
            $vowels .= "AEIOUY";
        }
        if ($strength & 4) {
            $consonants .= '23456789';
        }
        if ($strength & 8) {
            $consonants .= '@#$%';
        }

        $password = '';
        $alt = time() % 2;
        for ($i = 0; $i < $length; $i++) {
            if ($alt == 1) {
                $password .= $consonants[(rand() % strlen($consonants))];
                $alt = 0;
            } else {
                $password .= $vowels[(rand() % strlen($vowels))];
                $alt = 1;
            }
        }
        return $password;
    }

    /**
     * @param $v
     * @return string
     */
    public static function messages($v)
    {
        return implode('', $v->messages()->all('<li style="margin-left:10px;">:message</li>'));
    }
}
