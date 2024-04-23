<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function store(Request $request, $photoId)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $komentar = new Komentar();
        $komentar->foto_id = $photoId;
        $komentar->user_id = auth()->user()->id;
        $komentar->content = $request->input('content');
        $komentar->save();

        return back();
    }
}
