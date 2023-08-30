@extends('layouts.app')

@section('content')
    @if ($news->isNotEmpty())
        @foreach($news as $headline)
            <div class="card mx-auto my-5 w-50">
                <div class="card-body">
                    <h5 class="card-title">{{ $headline->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $headline->category->name }}</h6>
                    <p class="card-text">{{ str($headline->text)->wordWrap() }}</p>
                    <a href="#" class="card-link">Прочитать</a>
                </div>
            </div>
        @endforeach
    @else
        <p>Новостей нет</p>
    @endif
@endsection
