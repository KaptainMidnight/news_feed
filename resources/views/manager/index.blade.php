@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-4">
                            <h2 class="text-center">Список новостей</h2>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Заголовок</th>
                        <th>Текст статьи</th>
                        <th>Категория</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($news->isNotEmpty())
                        @foreach($news as $headline)
                            <tr>
                                <td>{{ $headline->id }}</td>
                                <td>{{ $headline->title }}</td>
                                <td>{{str($headline->text)->limit(40) }}</td>
                                <td>{{ $headline->category->name }}</td>
                                <td>
                                    <a href="{{ route('news.show', $headline->id) }}" class="view" title="" data-toggle="tooltip"
                                       data-original-title="View"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('manager.edit', ['news' => $headline->id]) }}" class="edit" title="" data-toggle="tooltip"
                                       data-original-title="Edit"><i class="bi bi-pencil"></i></a>
                                    <a href="{{ route('manager.destroy', $headline->id) }}" class="delete" title="" data-toggle="tooltip"
                                       data-original-title="Delete"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                {{ $news->links() }}
            </div>
        </div>
    </div>
@endsection
