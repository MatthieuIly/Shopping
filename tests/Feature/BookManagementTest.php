<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_book_can_be_added_to_the_library()
    {
        $this->withoutExceptionHandling(); // reals errors

        $response = $this->post('/books', $this->data());

        $book = Book::first();

        // $response->assertOk();
        $this->assertCount(1, Book::all());
        $response->assertRedirect($book->path());
    }

    /** @test */
    public function a_title_is_required()
    {
        // $this->withoutExceptionHandling(); // reals errors

        $response = $this->post('/books', array_merge($this->data(), ['title' => '']));

        $response->assertSessionHasErrors('title');

    }

    /** @test */
    public function a_author_is_required()
    {
        // $this->withoutExceptionHandling(); // reals errors

        $response = $this->post('/books', array_merge($this->data(), ['author_id' => ''] ));

        $response->assertSessionHasErrors('author_id');
    }

    /** @test */
    public function a_book_can_be_updated() {
        $this->withoutExceptionHandling(); // reals errors

        $this->post('/books', $this->data());

        $book = Book::first();

        $reponse = $this->patch($book->path(), [
            'title' => 'New title',
            'author_id' => 'New author',
        ]);

        $this->assertEquals('New title', Book::first()->title);
        $this->assertEquals(2, Book::first()->author_id);

        $reponse->assertRedirect($book->fresh()->path());
    }

    /** @test */
    public function a_book_can_be_deleted()
    {
        // $this->withoutExceptionHandling(); // reals errors

        $this->post('/books', $this->data());

        $book = Book::first();
        $this->assertCount(1, Book::all());

        $reponse = $this->delete($book->path(), $this->data());

        $this->assertCount(0, Book::all());
        $reponse->assertRedirect('/books');
    }

    /** @test */
    public function a_new_author_is_automatically_added()
    {
        $this->withoutExceptionHandling();

        $this->post('/books', [
            'title' => 'Cool title',
            'author_id' => 'Victor',
        ]);

        $book = Book::first();
        $author = Author::first();

        // dd($book->author_id);

        $this->assertEquals($author->id, $book->author_id);
        $this->assertCount(1, Author::all());

    }

    /**
     *
     * @return string[]
     */
    private function data()
    {
        return  [
            'title' => 'Cool book title',
            'author_id' => 'Victor',
        ];
    }
}
