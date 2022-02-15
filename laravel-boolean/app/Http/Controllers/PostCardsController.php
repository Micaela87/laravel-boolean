<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Postcard;

class PostCardsController extends Controller
{
    public function getAllPostCards() {
        $allPostcards = Postcard::all();

        return response()->json(['data' => $allPostcards]);
    }
}
