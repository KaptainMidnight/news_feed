@extends('layouts.app')

@section('content')
    <form action="{{ route('manager.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="text">Текст статьи</label>
            <textarea class="form-control" id="text" name="text"></textarea>
        </div>
        <div class="form-group">
            <label for="category_id">Выбор категории</label>
            @if($categories->isNotEmpty())
                <select class="form-control" id="category_id" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            @else
                <select class="form-control" id="category_id">
                    <option>Нет категорий для выбора</option>
                </select>
            @endif
        </div>

        <button type="submit">Сохранить</button>
    </form>
@endsection
