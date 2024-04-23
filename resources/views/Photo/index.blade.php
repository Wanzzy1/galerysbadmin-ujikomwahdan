{{-- @dd($Photo->albumPhotos) --}}
{{-- @dd($Photo) --}}
@extends('layouts/app')
@section('content')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Photo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>


.detailBox {
    width:100%;
    border:1px solid #bbb;
}
.titleBox {
    background-color:#fdfdfd;
    padding:10px;
}
.titleBox label{
  color:#444;
  margin:0;
  display:inline-block;
}

.commentBox {
    padding:10px;
    border-top:1px dotted #bbb;
}
.commentBox .form-group:first-child, .actionBox .form-group:first-child {
    width:80%;
}
.commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
    width:18%;
}
.actionBox .form-group * {
    width:100%;
}
.taskDescription {
    margin-top:10px 0;
}
.commentList {
    padding:0;
    list-style:none;
    max-height:200px;
    overflow:auto;
}
.commentList li {
    margin:0;
    margin-top:10px;
}
.commentList li > div {
    display:table-cell;
}

.commenterImage img {
    width:100%;
    border-radius:50%;
}
.commentText p {
    margin:0;
}
.sub-text {
    color:#aaa;
    font-family:verdana;
    font-size:11px;
}
.actionBox {
    border-top:1px dotted #bbb;
    padding:10px;
}
    </style>
  </head>

  <body class="bg-light">

    <div>
    </div>
    <div class="container ">
      <div class="align-items-center justify-content-between mb-5">
        <h1 align="center">Photo</h1>
        <hr>
        <button  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addItem">
          Tambah
        </button>
      </div>

      <div class="row">
        @foreach ($Photo->albumPhotos as $item)
        <div class="col-md-4">
            <div class="card border-0 md-3">
                <img src="{{asset('storage/' . $item->judul_foto) }}" alt="" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->tanggal_upload }}</h5>
                    <p class="mb-8 text-secondary">{{ $item->deskripsi_foto }}</p>
                </div>
<div class="container">
    {{--  --}}
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              Comment Box
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <div class="detailBox">
                    <div class="titleBox">
                      <label>Comments</label>

                    </div>

                    <div class="actionBox">
                        <ul class="commentList">
                            @foreach ($item->photoComments as $c )
                            <li>
                                <div class="commentText">
                                    <span class="date sub-text">  {{ auth()->User()->name}}</span>  <p class=""> {{$c->content}}.</p>

                                </div>
                            </li>

                        @endforeach

                        </ul>
                        <form method="POST" action="{{ route('komentar.store', ['photo' => $item->id]) }}" class="form-inline" role="form">

                            <div class="form-group">
                                @csrf
                                <input class="form-control" name="content" type="text" placeholder="Your comments" />
                            </div>

                            <div class="form-group">
                                <button class="btn btn-sm btn-default">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>
        </div>

      </div>
    {{--  --}}

    <br>
                <form action="{{ route('delete_photo', ['id' => $item->id]) }}" method="POST" style="display: inline-block">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Ingin Menghapus Photo ?')">Delete</button>
                </form>
<br>

            </div>
            </div>
        </div>
        @endforeach
      </div>
    </div>

    <div class="modal" id="addItem" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Photo</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('Photo.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
            @method('POST')
            <input type="hidden" name="tanggal_upload" value="{{now()}}">
            <input type="hidden" name="user_id" value="{{Auth()->user()->id}}">

            <input type="hidden" name="album_id" value="{{$Photo->id}}">
                    <div class="mb-3">
                      <label for="title">Judul Photo  </label>
                      <input type="text" name="title" id="title" class="form-control">
                    </div>

                    <div class="mb-3">
                      <label for="image">Gambar</label>
                      <input type="file" accept="image/*" name="judul_foto" id="image" class="form-control">
                    </div>
                    <div class="mb-3">
                      <label for="description">Deskripsi</label>
                      <textarea name="deskripsi_foto" id="description" cols="30" rows="5" class="form-control"></textarea>
                    </div>

                    <button class="btn btn-primary" type="submit">Simpan</button>

                </form>
            </div>
          </div>
        </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

@endsection
