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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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