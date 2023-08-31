<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('news.index', [
            'news' => News::query()->paginate(),
            'categories' => Category::all(),
        ]);
    }

    public function show(News $news): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('news.show', [
            'news' => $news,
        ]);
    }

    public function filter(Category $category): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('news.index', [
            'news' => $category->news()->paginate(),
            'categories' => Category::all(),
        ]);
    }
}
