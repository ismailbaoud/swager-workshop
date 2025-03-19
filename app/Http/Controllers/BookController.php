<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;
/**
 * @OA\Info(
 *      title="book API",
 *      version="1.0.0",
 *      description="API documentation for managing books in the library"
 * )
 * 
 * @OA\Tag(
 *     name="Books",
 *     description="API Endpoints for managing books"
 * )
 */
class BookController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/books",
     *      tags={"Books"},
     *      summary="Get list of books",
     *      description="Returns a list of all books",
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Book"))
     *      )
     * )
     */
    public function index()
    {
        return response()->json(Book::all(), 200);
    }


    /**
     * @OA\Post(
     *      path="/api/books",
     *      tags={"Books"},
     *      summary="Create a new book",
     *      description="Adds a new book to the library",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              required={"title","author"},
     *              @OA\Property(property="title", type="string", example="Laravel for Beginners"),
     *              @OA\Property(property="author", type="string", example="John Doe")
     *          )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Created"
     *      )
     * )
     */
    public function store(Request $request)
    {
        $book = Book::create($request->all());
        return response()->json($book, 201);
    }

 /**
     * @OA\Get(
     *      path="/api/books/{id}",
     *      tags={"Books"},
     *      summary="Get a specific book",
     *      description="Retrieve details of a book by ID",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="ID of the book",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(ref="#/components/schemas/Book")
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Book not found"
     *      )
     * )
     */
    public function show($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        return response()->json($book, 200);
    }


    /**
     * @OA\Put(
     *      path="/api/books/{id}",
     *      tags={"Books"},
     *      summary="Update an existing book",
     *      description="Updates details of a book",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="ID of the book to update",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(property="title", type="string", example="Updated Book Title"),
     *              @OA\Property(property="author", type="string", example="Updated Author Name")
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Book updated successfully"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Book not found"
     *      )
     * )
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $request->validate([
            'title' => 'sometimes|string|max:255',
            'author' => 'sometimes|string|max:255',
        ]);

        $book->update($request->all());
        return response()->json($book, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(book $book)
    {
        //
    }
}