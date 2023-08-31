@extends('layouts.app')

@section('content')
    @if ($news->isNotEmpty())
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
               data-bs-toggle="dropdown" aria-expanded="false">
                Список категорий
            </a>

            @if ($categories->isNotEmpty())
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="{{ route('news.index') }}">Без фильтра</a></li>
                    @foreach($categories as $category)
                        <li><a class="dropdown-item"
                               href="{{ route('news.filter', $category->id) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            @endif
        </div>

        @foreach($news as $headline)
            <div class="card mx-auto my-3 w-50">
                <div class="card-body">
                    <h5 class="card-title">{{ $headline->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $headline->category->name }}</h6>
                    <p class="card-text">{{ str($headline->text)->wordWrap() }}</p>
                    <a href="{{ route('news.show', $headline->id) }}" class="card-link">Прочитать</a>
                </div>
            </div>
        @endforeach

        {{ $news->links() }}
    @else
        <p>Новостей нет</p>
    @endif
@endsection
