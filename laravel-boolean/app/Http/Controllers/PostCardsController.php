<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

use App\Models\Postcard;

class PostCardsController extends Controller
{
    public function getAllPostCards() {
        $allPostcards = Postcard::all();

        return response()->json(['data' => $allPostcards]);
    }

    public function storePostCard(Request $request) {

        $data = $request -> validate([
            'sender' => 'required|string',
            'address' => 'required|string',
            'text' => 'required|string',
            'image' => 'required'
        ]);

        $imageFile = $data['image'];

        $fileName = rand(100000, 999999) . '_' . time().'.'.$request->image->extension();

        $imageFile -> storeAs('img', $fileName, 'public');

        $data['image'] = $fileName;

        $newPostCard = Postcard::create($data);

        return response()->json(['data' => $newPostCard]);
    }
}
