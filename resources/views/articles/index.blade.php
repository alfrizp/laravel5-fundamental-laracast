@extends('app')

@section('content')
  <h1>Articles</h1>
  <hr>

  @foreach ($articles as $article)
    <article class="">
      <h2>
        <a href="{{ route('articles.show', $article->id ) }}">{{ $article->title }}</a>
      </h2>

      <div class="body">
        {{ $article->body }}
      </div>

    </article>
  @endforeach
@endsection
