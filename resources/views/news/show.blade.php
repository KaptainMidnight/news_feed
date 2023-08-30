@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <div class="jumbotron">
            <h1>{{ $news->title }}</h1>
            <p class="lead">{{ $news->text }}</p>
            <a class="btn btn-lg btn-primary" href="{{ back()->getTargetUrl() }}" role="button">К списку статей</a>
        </div>
    </main>
@endsection
