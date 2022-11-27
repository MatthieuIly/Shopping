<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function liste()
    {
        
        $articles = Article::all();

        return view('shopping.liste', compact('articles'));
    }

    public function add(Request $request)
    {
        $article = new Article();
        $article->nom = $request->input('article');
        $article->save();
        
        return redirect()->route('shopping');
    }
}
