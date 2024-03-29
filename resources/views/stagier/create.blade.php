<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ajouter Stagier</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<?php
use App\Models\Groupe;

$groupes = Groupe::all();
?>
<body>
@extends('layout.app')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add Stagier</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('stagier.index') }}">Back</a>
                </div>
            </div>
        </div>
        @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong>There Were some probleme with your input.</br></br>
        <ul>
            @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
        @endif
        <form action="{{route('stagier.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>photo:</strong>
                        <input type="file" name="photo"  class="form-control" placeholder="Photo">
                        @error('photo')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <strong for="exampleFormControlInput1">Nom:</strong>
                        <input type="text" class="form-control" id="nom" placeholder="Nom" name="nom">
                        @error('nom')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <strong for="exampleFormControlInput1">Prenom:</strong>
                        <input type="text" class="form-control" id="prenom" placeholder="Prenom" name="prenom">
                        @error('prenom')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <strong for="exampleFormControlInput1">Adresse:</strong>
                        <input type="text" class="form-control" id="adresse" placeholder="Adresse" name="adresse">
                        @error('adresse')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <strong for="exampleFormControlInput1">Ville:</strong>
                        <input type="text" class="form-control" id="ville" placeholder="Ville" name="ville">
                        @error('ville')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <strong for="exampleFormControlInput1">Email:</strong>
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <strong for="exampleFormControlSelect1">select Une Groupe</strong>
                            <select class="form-control" name="groupe_id">
                            <option value="selected">Open this select Stagier</option>
                            @foreach ($groupes as $groupe)
                            <option value="{{$groupe->id}}">{{$groupe->groupe}}</option>
                            @endforeach
                            </select>
                            @error('gourpe')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3" style="text-align: center;display:flex;margin:auto">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

