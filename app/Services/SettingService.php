<?php


namespace App\Services;


use App\Models\Setting;
use App\Models\User;
use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SettingService
{
    use ImageUpload;

    /**
     * @return array
     */
    public function index()
    {
        $settings = Setting::first();
        $users = User::all();
        if (empty($settings)) {
            return compact('users', 'settings');
        } else {
            $settings = Setting::first()->get();
            return compact('users', 'settings');
        }
    }

    /**
     * @param Request $request
     *
     * @return Setting|Model
     */
    public function store(Request $request)
    {
        $input['image'] = $this->verifyAndStoreImage($request);
        return Setting::create($request->all());

    }

    /**
     * @param Setting $setting
     * @return array
     */
    public function edit(Setting $setting)
    {
        $users = User::all();
        return compact('setting', 'users');
    }

    /**
     * @param Request $request
     *
     * @param Setting $setting
     * @return Setting
     */
    public function update(Request $request, Setting $setting)
    {
        $input = $request->all();
        $input['image'] = $this->verifyAndStoreImage($request);
        $setting->fill($input)->save();
        return $setting;

    }
}
