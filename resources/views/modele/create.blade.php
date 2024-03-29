<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ajouter Modele</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
@extends('layout.app')
@section('content')
<div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add Modele</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('modele.index') }}">Back</a>
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
        <form action="{{route('modele.store')}}" method="POST" enctype="multipart/form-data" style="font-size:20px;color:black"  align="center">
            @csrf
                <div class="col-xs-12 col-sm-12 col-md-12" align="center">
                    <div class="form-group col-md-8">
                        <strong>Libelle:</strong>
                        <input type="text" name="libelle"  class="form-control" placeholder="Modele" style="background-color:black;color:white;font-size:20px">
                        @error('modele')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-8 ">
                        <strong>MH:</strong>
                        <input type="number" name="mh"  class="form-control" placeholder="MH" style="background-color:black;color:white;font-size:20px">
                        @error('mh')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
@endsection
</body>

</html>
