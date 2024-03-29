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
                    <h2>Edit Groupe</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('modele.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{route('modele.update', $modele->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row justify-content-center">
                    <div class="container col-md-4">
                        <div class="form-group text-center col-md-16">
                            <strong>Libelle:</strong>
                            <input type="text" name="libelle" value="{{$modele->libelle}}" class="form-control" placeholder="Text" id="text" style="color:black;background-color:#0892d0 ; font-size:larger ; font-family:Arial, Helvetica, sans-serif">
                            @error('groupe')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="container col-md-4">
                        <div class="form-group text-center col-md-16">
                            <strong>MH:</strong>
                            <input type="text" name="mh" value="{{$modele->mh}}" class="form-control" placeholder="MH" id="mh" style="color:black;background-color:#0892d0 ; font-size:larger ; font-family:Arial, Helvetica, sans-serif">
                            @error('MH')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            <button type="submit" class="btn btn-primary ml-3" style="width: 120px;display: block; margin: auto;">Enregister</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @endsection
</body>
</html>
