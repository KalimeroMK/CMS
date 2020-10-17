<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ad\Store;
use App\Http\Requests\Ad\Update;
use App\Models\Ad;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Session;

class AdController extends Controller
{

    /**
     * AdController constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:ad-list');
        $this->middleware('permission:ad-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:ad-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:ad-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $ad = Ad::all();
        return view('admin.ads.index', compact('ad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Store $request
     * @return RedirectResponse
     */
    public function store(Store $request)
    : RedirectResponse {
        $ad = Ad::create($request->all());
        Session::flash('success_msg', trans('messages.ads_created_success'));
        return redirect()->route('ads.edit', $ad);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Ad $ad
     * @return Factory|View
     */
    public function edit(Ad $ad)
    {
        return view('admin.ads.edit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Update $request
     * @param Ad $ad
     * @return Factory|View
     */
    public function update(Update $request, Ad $ad)
    {
        $ad->fill($request->all())->save();
        return view('admin.ads.edit', $ad);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Ad $ad
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Ad $ad)
    : RedirectResponse {
        $ad->delete();
        Session::flash('flash_message', 'Ad successfully deleted!');
        return redirect()->back();
    }
}
