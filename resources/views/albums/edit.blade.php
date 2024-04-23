@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Album</h2>
        <form action="{{ route('albums.update', $album->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_album">Nama Album</label>
                <input type="text" class="form-control" id="nama_album" name="nama_album" value="{{ $album->nama_album }}" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required>{{ $album->deskripsi }}</textarea>
            </div>
            <div class="form-group">
                <label for="tanggal_dibuat">Tanggal Dibuat</label>
                <input type="date" class="form-control" id="tanggal_dibuat" name="tanggal_dibuat" value="{{ $album->tanggal_dibuat }}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
