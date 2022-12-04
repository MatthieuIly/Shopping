<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookReservationTest extends TestCase
{
    use RefreshDatabase;
        
    /** @test */
    public function a_book_can_be_added_to_the_library()
    {
        $this->withoutExceptionHandling(); // reals errors

        $response = $this->post('/books', [
            'title' => 'Cool book title',
            'author' => 'Victor',
        ]);

        $response->assertOk();
        $this->assertCount(1, Book::all());
    }

    /** @test */
    public function a_title_is_required()
    {
        // $this->withoutExceptionHandling(); // reals errors

        $response = $this->post('/books', [
            'title' => '',
            'author' => 'Victor',
        ]);

        $response->assertSessionHasErrors('title');

    }

    /** @test */
    public function a_author_is_required()
    {
        // $this->withoutExceptionHandling(); // reals errors

        $response = $this->post('/books', [
            'title' => 'Cool title',
            'author' => '',
        ]);

        $response->assertSessionHasErrors('author');
    }

    /** @test */
    public function a_book_can_be_updated() {
        $this->withoutExceptionHandling(); // reals errors

        $this->post('/books', [
            'title' => 'Cool title',
            'author' => 'Victor',
        ]);

        $book = Book::first();

        $reponse = $this->patch('/books/' . $book->id, [
            'title' => 'New title',
            'author' => 'New author',
        ]);

        $this->assertEquals('New title', Book::first()->title);
        $this->assertEquals('New author', Book::first()->author);

        $reponse->assertRedirect('/books/' . $book->id);
    }

    /** @test */
    public function a_book_can_be_deleted()
    {
        $this->withoutExceptionHandling(); // reals errors

        $this->post('/books', [
            'title' => 'Cool title',
            'author' => 'Victor',
        ]);

        $book = Book::first();
        $this->assertCount(1, Book::all());

        $reponse = $this->delete('/books/' . $book->id, [
            'title' => 'New title',
            'author' => 'New author',
        ]);

        $this->assertCount(0, Book::all());
        $reponse->assertRedirect('/books');
    }
}
