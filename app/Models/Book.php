<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     schema="Book",
 *     required={"title", "author"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="title", type="string", example="Laravel for Beginners"),
 *     @OA\Property(property="author", type="string", example="John Doe"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */
class Book extends Model
{
    protected $fillable = [ 
        'title',
        'author'
    ];
}
