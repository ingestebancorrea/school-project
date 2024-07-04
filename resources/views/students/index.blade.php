@extends('template')

@section('contenido')
<div class="container">

    <h1>ESTUDIANTES</h1>

    <br>
    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <th scope="row">{{$student->id}}</th>
                <td>{{$student->name}}</td>
                <td>{{$student->lastname}}</td>
                <td>{{$student->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection