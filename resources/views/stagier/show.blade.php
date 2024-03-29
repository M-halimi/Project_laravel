<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Detail Stagier</title>
</head>
<body>
@extends('layout.app')
@section('content')
    <div cclass="countiner col-md-16" align="center">
        <div>
            <h1>Show Stagier</h1>
            <a class="btn btn-primary" href="{{ route('stagier.index') }}" enctype="multipart/form-data">Back</a>
        </div>
                <div class="countiner col-md-4 alert alert-info" >
                        <div class="form-group">
                                    <strong>Photo:</strong>
                                    <img src="/image/{{$stagier->photo}}" width="250px">
                        </div>
                        <div class="form-group">
                                    <strong>Prenom:</strong>
                                    <li>{{$stagier->prenom}}</li>
                        </div>
                        <div class="form-group">
                                    <strong>Adresse:</strong>
                                    <li>{{$stagier->adresse}}</li>
                        </div>
                        <div class="form-group">
                                    <strong>Ville:</strong>
                                    <li>{{$stagier->ville}}</li>
                        </div>
                        <div class="form-group">
                                    <strong>Email:</strong>
                                    <li>{{$stagier->email}}</li>
                    </div>
                    <div class="form-group">
                        @foreach ($notes as $note)
                                    <strong>Note Stagier:</strong>
                                    <li>{{$note->note}}</li>
                        @endforeach
                    </div>
                    <div class="form-group">
                        @foreach ($notes as $note)
                                    <strong>Libelle de stagier:</strong>
                                    <li>{{$note->modele->libelle}}</li>
                        @endforeach
                    </div>
                </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection
</body>
</html>
