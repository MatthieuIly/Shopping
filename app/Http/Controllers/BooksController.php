<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function store()
    {
        $book = Book::create($this->validateRequest());

        return redirect($book->path());
    }

    public function update(Book $book)
    {
       $book->update($this->validateRequest());

       return redirect($book->path());
    }

    public function delete(Book $book)
    {
       $book->delete($this->validateRequest());

       return redirect('/books');
    }

    /**
     * Return mixed
     */
    public function validateRequest()
    {
        return request()->validate([
            'title' => 'required',
            'author' => 'required',
        ]);
    }
}
