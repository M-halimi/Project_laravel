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
          <form action="{{route('notes.serchea')}}" method="get">
          <input type="search" placeholder="search" name="search" class="form-control"><br>
                <button type="submit" class="btn btn-primary" style="display:grid">search</button>
    </form>
          </div>
      </div>
        <div class="col-md-10">
                <a href="{{route('notes.create')}}" class="btn btn-primary">Add New Notes</a>
                <div class="alert alert-info" >
                    <strong style="font-size:35px">List de Notes</strong>
                </div>
            <table class="table table-white table-striped-columns col-md-12" style="text-align: center; display:flex-box">
                <thead align="center">
                    <tr>
                        <th style="background-color:black; color:#CEE6F2">ID</th>
                        <th style="background-color:black; color:#CEE6F2">STAGIER</th>
                        <th style="background-color:black; color:#CEE6F2">MODELE</th>
                        <th style="background-color:black; color:#CEE6F2">NOTE</th>
                        <th style="background-color:black; color:#CEE6F2">ACTION</th>
                    </tr>
                </thead>
                <tbody align="center" >
                    @foreach ($notes as $note)
                    <tr>
                        <td style="background-color:#A1D6E2 ; color:white; font-family:Arial, Helvetica, sans-serif ; font-size:x-large">{{$note->id}}</td>
                        <td style="background-color:#A1D6E2 ; color:white; font-family:Arial, Helvetica, sans-serif ; font-size:x-large">{{$note->stagier->nom."  ".$note->stagier->prenom}}</td>
                        <td style="background-color:#A1D6E2 ; color:white; font-family:Arial, Helvetica, sans-serif ; font-size:x-large">{{$note->modele->libelle}}</td>
                        <td style="background-color:#A1D6E2 ; color:white; font-family:Arial, Helvetica, sans-serif ; font-size:x-large">{{$note->note}}</td>
                        <td>
                        <form action="{{route('notes.destroy',$note->id)}}" method="post">
                            <a href="{{route('notes.edit',$note->id)}}" class="btn btn-danger">Edit</a>
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-danger">delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $notes->links() }}
        </div>
    </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection
</body>
</html>
