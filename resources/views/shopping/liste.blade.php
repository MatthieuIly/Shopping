@extends('layouts.app')

@section('content')
<h1>Shopping liste</h1>

<div class="bg-white shadow-lg max-w-lg flex flex-col">
    <ul class="list-none flex-1">
    @foreach($articles as $article)
        <li class="my-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="article{{ $article->id }}">
                <label class="form-check-label" for="article{{ $article->id }}">
                    {{ $article->nom }}
                </label>
            </div>
        </li>
    @endforeach
    </ul>
    <form action="{{ route('shopping.add') }}" method="post" class="flex-1">
        @csrf
        <input type="text" name="article" class="input"/>
        <button type="submit" class="btn">Ajouter article</button>
    </form>
</div>
@endsection