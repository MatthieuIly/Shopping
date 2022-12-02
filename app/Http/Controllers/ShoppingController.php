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

    public function update(Article $article)
    {
        // dd($article);
        if ($article->is_panier == false) {
            $article->is_panier = true;
        } else {
            $article->is_panier = false;
        }
        $article->update();
        return redirect('/');
    }

    public function delete(Article $article)
    {
        // dd($article);
        // $article = Article::find($id);
        $article->delete(); // Easy right?
 
        return redirect('/')->with('success', 'Article supprimé.');
    }

}
