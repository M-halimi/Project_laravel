<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
@extends('layout.app')
@section('content')
<div class="containerr mt-2 ">
        <div class="row">
            <div class="col-md-5 margin-tb">
                <div class="pull-left">
                    <h2>Edit Produits</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('stagier.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{route('stagier.update', $stagier->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Photo:</strong>
                        <input type="file" name="photo" class="form-control" placeholder="Photo" id="photo">
                        <img src="/image/{{$stagier->photo}}" alt="photo.png" width="90px" height="90px">
                        @error('photo')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <strong>Nom:</strong>
                        <input type="text" name="nom" value="{{ $stagier->nom }}" class="form-control"
                            placeholder="Nom">
                        @error('nom')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <strong>Prenom:</strong>
                        <input type="text" name="prenom" value="{{ $stagier->prenom }}" class="form-control"
                            placeholder="prenom">
                        @error('prenom')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <strong>Adresse:</strong>
                        <input type="text" name="adresse" value="{{ $stagier->adresse }}" class="form-control"
                            placeholder="Adresse">
                        @error('adresse')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <strong>Ville:</strong>
                        <input type="text" name="ville" value="{{ $stagier->ville }}" class="form-control"
                            placeholder="Ville">
                        @error('ville')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="text" name="email" value="{{ $stagier->email }}" class="form-control"
                            placeholder="Email">
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3" style="width: 120px;display: block; margin: auto;">Enregister</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @endsection
</body>
</html>
