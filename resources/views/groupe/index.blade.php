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
<div style="display: flex;
   justify-content: center;
    align-items: center;
    flex-direction: column;">
      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          <div class="input-group input-group-outline">
          <form action="{{route('groupe.searche')}}" method="get">
          <input type="search" placeholder="search" name="search" class="form-control"><br>
                <button type="submit" class="btn btn-primary" style="display:grid">search</button>
    </form>
          </div>
      </div>
            <div class="col-md-10">
            <a href="{{route('groupe.create')}}" class="btn btn-primary">Add New Groupe</a>
                <div class="alert alert-info">
                    <strong style="color:bisque ; font-size:35px">List de Groupe</strong>
                </div>
            <table class="table table-dark table-bisque-columns col-md-12">
                <thead align="center">
                    <tr>
                        <th style="background-color:black; color:white">ID</th>
                        <th style="background-color:black; color:white">Groupe</th>
                        <th style="background-color:black; color:white">Ation</th>
                    </tr>
                </thead>
                <tbody align="center">
                    @foreach ($groupes as $groupe)
                    <tr style="font-size:large ; font-family:Arial Black ;" >
                        <td style="background-color:#343a40; color:primary">{{$groupe->id}}</td>
                        <td style="background-color:#343a40; color:primary">{{$groupe->groupe}}</td>
                        <td style="background-color:#343a40; color:primary">
                            <form action="{{route('groupe.destroy',$groupe->id)}}" method="post">
                            <a href="{{route('groupe.edit',$groupe->id)}}" class="btn btn-danger">Edit</a>
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-danger">delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$groupes->links()}}
        </div>
        </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection
</body>
</html>
