<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
@extends('layout.app')
@section('content')
     
<div style="  display: flex;
   justify-content: center;
    align-items: center;
    flex-direction: column;">
    <div class="col-md-10">
    <a href="{{route('stagier.create')}}" class="btn btn-info">Add New Stagier</a>
    <div class="alert alert-dark">
        <strong style="color:bisque ; font-size:35px" >List de Stagier</strong>
    </div>
    <table class="table table-dark table-striped" >
                <thead class="table-dark" style="text-align: center; display:flex-box">
                    <tr>
                        <th style="background-color:black; color:aqua">ID</th>
                        <th  style="background-color:black; color:aqua ;">Photo</th>
                        <th  style="background-color:black; color:aqua">Nom</th>
                        <th  style="background-color:black; color:aqua">Prenom</th>
                        <th  style="background-color:black; color:aqua">Adresse</th>
                        <th  style="background-color:black; color:aqua">Ville</th>
                        <th  style="background-color:black; color:aqua">Email</th>
                        <th  style="background-color:black; color:aqua">Groube</th>
                        <th  style="background-color:black; color:aqua">Action</th>
                    </tr>
                </thead>
                <tbody class="table-white">
                    @foreach ($stagiers as $stagier)
                    <tr style="font-size:large ; font-family:Arial Black ; text-align:center">
                        <td>{{$stagier->id}}</td>
                        <td><img src="/image/{{$stagier->photo}}" alt="photo.png" width="90px" height="90px"></td>
                        <td>{{$stagier->nom}}</td>
                        <td>{{$stagier->prenom}}</td>
                        <td>{{$stagier->adresse}}</td>
                        <td>{{$stagier->ville}}</td>
                        <td>{{$stagier->email}}</td>
                        <td>{{$stagier->groupe->groupe}}</td>
                        <td>
                            <form action="{{route('stagier.destroy',$stagier->id)}}" method="post">
                            <a href="{{route('stagier.edit',$stagier->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{route('stagier.show',$stagier->id)}}" class="btn btn-primary">Show</a>
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $stagiers->links() }}
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection
</body>
</html>
