<h1>Shopping liste</h1>

<ul>
@foreach($articles as $article)
    <li>{{ $article->nom }}</li>
@endforeach
</ul>
<form action="{{ route('shopping.add') }}" method="post">
    @csrf
    <input type="text" name="article" />
    <button type="submit">Ajouter article</button>
</form>