<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        return view('manager.index', [
            'news' => News::query()->paginate(),
        ]);
    }
}
