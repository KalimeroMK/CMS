<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\Store;
use App\Http\Requests\Setting\Update;
use App\Models\Setting;
use App\Traits\ImageUpload;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Session;

class SettingController extends Controller
{
    use ImageUpload;

    /**
     * SettingController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:settings-list');
        $this->middleware('permission:settings-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:settings-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:settings-delete', ['only' => ['destroy']]);
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        $setting = new Setting();
        return view('admin.settings.create', compact('setting'));
    }

    /**
     * @param Store $request
     * @return string
     */
    public function store(Store $request): string
    {
        $setting = Setting::create(
            $request->except('image') + [
                'featured_image' => $this->verifyAndStoreImage($request)
            ]
        );
        Session::flash('success_msg', trans('messages.settings_updated_success'));
        return route('settings.index', $setting);
    }

    /**
     * @param Setting $setting
     * @return string
     */
    public function edit(Setting $setting): string
    {
        return route('settings.index', $setting);
    }

    /**
     * @param Update $request
     * @param Setting $setting
     * @return JsonResponse
     */
    public function update(Update $request, Setting $setting): JsonResponse
    {
        $setting->update(
            $request->except('image') + [
                'featured_image' => $this->verifyAndStoreImage($request)
            ]
        );
        Session::flash('success_msg', trans('messages.settings_updated_success'));
        return response()->json($setting);
    }
}
