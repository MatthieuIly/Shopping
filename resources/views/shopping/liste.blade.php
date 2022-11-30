@extends('layouts.app')

@section('content')
<h1>Shopping liste</h1>

<div class="bg-gray-200 shadow-lg max-w-lg flex flex-col">
    <div class="card h-16 bg-gray-50 border border-gray mb-4 flex items-center">
        <form action="{{ route('shopping.add') }}" method="post" 
            class="grid grid-form-article">
            @csrf
            <input type="text" name="article" class="input"/>
            <button type="submit" 
                class="text-green-600 bg-green-100 px-2 mx-2 rounded-full border border-green-600">
                Ajouter article
            </button>
        </form>
    </div>
    
    @foreach($articles as $article)
    <div class="card h-16 bg-gray-50 border border-gray flex flex-row">
        <div class="card-text ml-4 mt-2">
            <h1 class="text-2xl {{ $article->is_panier ? 'line-through' : '' }}">
                {{ $article->nom }}
            </h1>
            <p></p>
        </div>
        <div class="card-button flex items-center justify-end pr-2">
            <form action="{{ route('shopping.update', $article) }}" method="post">
                @csrf
                <!-- <input type="hidden" name="_method" value="PUT"> -->
                @method('PUT')
                <button type="submit" 
                    class="text-green-600 bg-green-100 px-2 rounded-full border border-green-600">
                    Complete
                </button>
            </form>
            <form action="{{ route('shopping.delete', $article) }}" method="post">
                <!-- CSRF token -->
                @csrf
                <!-- <input type="hidden" name="_method" value="DELETE"> -->
                @method("DELETE")
                <button type="submit" 
                    class="ml-2 text-red-600 bg-red-100 px-2 rounded-full border border-red-600">
                    Delete
                </button>
            </form>
        </div>
    </div>
    @endforeach

</div>
@endsection