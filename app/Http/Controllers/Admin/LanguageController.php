<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Language\Store;
use App\Http\Requests\Language\Update;
use App\Models\Language;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * @return Language[]|Application|Factory|View|Collection
     */
    public function index()
    {
        $language = language::all();
        return view('admin.language.index', ['language' => language::all()]);
    }

    /**
     * Show the partials for creating a new resource.
     *
     * @return Language|Application|Factory|View
     */
    public function create()
    {
        return view('admin.language.create', ['language' => new language()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     *
     * @return Language|Model|RedirectResponse
     */
    public function store(Store $request)
    {
        $language = Language::create($request->all());
        Session::flash('success_msg', trans('messages.ads_created_success'));
        return redirect()->route('languages.edit', $language);
    }

    /**
     * Show the partials for editing the specified resource.
     *
     * @param  language  $language
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit(language $language)
    {
        return view('admin.language.edit', compact('language'));
    }

    /**
     * @param  Update  $request
     * @param  Language  $language
     * @return mixed
     */
    public function update(Update $request, language $language)
    {
        $language->update($request->all());
        return redirect()->route('languages.edit', $language);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  language  $language
     *
     * @return RedirectResponse
     * @throws /Exception
     */
    public function destroy(language $language): RedirectResponse
    {
        $language->delete();
        return redirect()->back();
    }
}
