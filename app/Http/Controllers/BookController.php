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
     * Display the specified resource.
     */
    public function show(book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(book $book)
    {
        //
    }
}