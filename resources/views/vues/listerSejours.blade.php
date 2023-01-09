@extends('layouts/master')
@section('content')
<h1>Liste Séjours</h1>
<div class="well">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Login</th>
                <th>Mdp</th>
            </tr>
        </thead>
        @foreach($mesSejours as $unSejour)
        <tr>
            <td>{{$unSejour->NomPersonne}}</td>
            <td><b>{{$unSejour->PrenomPersonne}}</b></td>
            <td>{{$unSejour->Login}}</td>
            <td>{{$unSejour->Pwd}}</td>
        </tr>
        @endforeach
    </table>
    <div class="espace">
        <div class="col-md-12"></div>
    </div>
    <div class="form-group">
        <div class="col-md-12 col-md-offset-11">
            <a class="btn btn-default btn-primary"   href="{{ url('/') }}">
                <span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
        </div>
    </div>
</div>


@stop
