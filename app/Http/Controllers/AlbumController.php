<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class AlbumController extends Controller
{
    /**
     * Menampilkan daftar album.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::all();
        return view('albums.index', compact('albums'));
    }

    /**
     * Menampilkan form untuk membuat album baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create');
    }

    /**
     * Menyimpan album yang baru dibuat.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $v = $r->validate([
            "nama_album" => 'required',
            "deskripsi" => 'required',
            "user_id" => 'required',
            ]);
            $v['tanggal_dibuat'] = now();
            Album::create($v);
            return redirect('/albums');
    }

    /**
     * Menampilkan form untuk mengedit album.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        return view('albums.edit', compact('album'));
    }

    /**
     * Mengupdate album yang sudah ada.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $request->validate([
            'nama_album' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal_dibuat' => 'nullable|date',
        ]);

        $album->update([
            'nama_album' => $request->nama_album,
            'deskripsi' => $request->deskripsi,
            'tanggal_dibuat' => $request->tanggal_dibuat,
        ]);

        return redirect()->route('albums.index')
                         ->with('success','Album berhasil diperbarui.');
    }

    /**
     * Menghapus album.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $id)
    {
// @dd($id);
$id->delete();
return redirect()->back();
    }
}
