<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('manager.index', [
            'news' => News::query()->paginate(),
        ]);
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('manager.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(StoreNewsRequest $request): RedirectResponse
    {
        News::query()->create($request->validated());

        return redirect(route('manager.index'));
    }

    public function edit(News $news): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('manager.edit', [
            'news' => $news,
            'categories' => Category::all(),
        ]);
    }

    public function update(Request $request, News $news): RedirectResponse
    {
        $news->update($request->all());

        return to_route('manager.index');
    }

    public function destroy(News $news): RedirectResponse
    {
        $news->delete();

        return back();
    }
}
