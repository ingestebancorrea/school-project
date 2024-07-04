@extends('template')

@section('contenido')
<div class="container">

    <h1>CURSOS</h1>

    <br>
    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                <th scope="row">{{$course->id}}</th>
                <td>{{$course->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection