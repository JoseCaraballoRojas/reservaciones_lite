<?php

namespace Vanguard\Http\Controllers;

use Vanguard\Events\Settings\Updated as SettingsUpdated;
use Illuminate\Http\Request;
use Settings;
use DateTimeZone;
use DateTime;
/**
 * Class SettingsController
 * @package Vanguard\Http\Controllers
 */
class SettingsController extends Controller
{
    /**
     * Display general settings page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function general()
    {
        return view('settings.general');
    }


    /**
     * Display Authentication & Registration settings page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function auth()
    {
        return view('settings.auth');
    }

    /**
     * Handle application settings update.
     *
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request)
    {
        $this->updateSettings($request->except("_token"));

        return back()->withSuccess(trans('app.settings_updated'));
    }

    /**
     * Update settings and fire appropriate event.
     *
     * @param $input
     */
    private function updateSettings($input)
    {
        foreach($input as $key => $value) {
            Settings::set($key, $value);
        }

        Settings::save();

        event(new SettingsUpdated);
    }

    /**
     * Enable system 2FA.
     *
     * @return mixed
     */
    public function enableTwoFactor()
    {
        $this->updateSettings(['2fa.enabled' => true]);

        return back()->withSuccess(trans('app.2fa_enabled'));
    }

    /**
     * Disable system 2FA.
     *
     * @return mixed
     */
    public function disableTwoFactor()
    {
        $this->updateSettings(['2fa.enabled' => false]);

        return back()->withSuccess(trans('app.2fa_disabled'));
    }

    /**
     * Enable registration captcha.
     *
     * @return mixed
     */
    public function enableCaptcha()
    {
        $this->updateSettings(['registration.captcha.enabled' => true]);

        return back()->withSuccess(trans('app.recaptcha_enabled'));
    }

    /**
     * Disable registration captcha.
     *
     * @return mixed
     */
    public function disableCaptcha()
    {
        $this->updateSettings(['registration.captcha.enabled' => false]);

        return back()->withSuccess(trans('app.recaptcha_disabled'));
    }

    /**
     * Display notification settings page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function notifications()
    {
        return view('settings.notifications');
    }
    

    /**
     * Display general reservaciones settings page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function generalRerservaciones()
    {
        //function by time zone list 
    
    /////////// INIT  FUNCTION //////////////////////
    function timezone_list() {
        static $timezones = null;

        if ($timezones === null) {
            $timezones = [];
            $offsets = [];
            $now = new DateTime('now', new DateTimeZone('UTC'));

            foreach (DateTimeZone::listIdentifiers() as $timezone) {
                $now->setTimezone(new DateTimeZone($timezone));
                $offsets[] = $offset = $now->getOffset();
                $timezones[$timezone] = '(' . format_GMT_offset($offset) . ') ' . format_timezone_name($timezone);
            }

        array_multisort($offsets, $timezones);
        }

        return $timezones;
    }

    function format_GMT_offset($offset) {

        $hours = intval($offset / 3600);
        $minutes = abs(intval($offset % 3600 / 60));
        return 'GMT' . ($offset ? sprintf('%+03d:%02d', $hours, $minutes) : '');

    }

    function format_timezone_name($name) {

        $name = str_replace('/', ', ', $name);
        $name = str_replace('_', ' ', $name);
        $name = str_replace('St ', 'St. ', $name);
    return $name;

    }

    ////////////////// END FUNCTION ///////////////////////
        //$tzlist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
        //dd($tzlist);
        $timezones = timezone_list();
        //dd($timezones);
        return view('settings.generalRerservaciones', compact('timezones'));
    }

    /**
     * Display general reservaciones settings page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function rerservacionesUpdate(Request $request)
    {

        $this->updateSettings($request->except("_token"));
        return back()->withSuccess(trans('app.settings_updated'));
        //dd($request->all());
    }

}