<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ajouter Notes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<?php


use App\Models\Stagier;
use App\Models\Modele;
$modele = Modele::all();
$stagiers = Stagier::all();
?>
<body>
@extends('layout.app')
@section('content')
<div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add Notes</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('notes.index') }}">Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
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
        <form action="{{route('notes.store')}}" method="POST" enctype="multipart/form-data" class="col-md-8" align="center">
            @csrf
                <div class="row justify-content-center">
                    <div class="container col-md-8">
                        <strong for="exampleFormControlSelect1">select Une Stagier</strong>
                        <select class="form-control" name="stagiers_id">
                        <option value="selected">Open this select Stagier</option>
                        @foreach ($stagiers as $stagier)
                        <option value="{{$stagier->id}}">{{$stagier->nom." ".$stagier->prenom}}</option>
                        @endforeach
                        </select>
                        @error('stagier')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="container col-md-8">
                        <strong for="exampleFormControlSelect1">select Une Model</strong>
                        <select class="form-control" name="modeles_id">
                            <option value="selected">Open this select Modele</option>
                        @foreach ($modele as $model)

                        <option value="{{$model->id}}">{{$model->libelle}}</option>
                        @endforeach
                        </select>
                        @error('stagier')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="container col-md-8">
                        <strong>Note:</strong>
                        <input type="number" name="note"  class="form-control" placeholder="Note">
                        @error('note')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3 col-md-4">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
@endsection
</body>

</html>
