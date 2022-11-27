@extends('layouts.app')

@section('content')
<h1>Shopping liste</h1>

<ul class="list-group">
@foreach($articles as $article)
    <li>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="article{{ $article->id }}">
            <label class="form-check-label" for="article{{ $article->id }}">
                {{ $article->nom }}
            </label>
        </div>
    </li>
@endforeach
</ul>
<form action="{{ route('shopping.add') }}" method="post">
    @csrf
    <input type="text" name="article" />
    <button type="submit">Ajouter article</button>
</form>
@endsection