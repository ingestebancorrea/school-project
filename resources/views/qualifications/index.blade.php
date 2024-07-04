@extends('template')

@section('contenido')
<div class="container">
    <h1>REPORTE DE NOTAS</h1>
    <br>
    <a href="{{route('qualificationsregister')}}">
        <button type="buton" class="btn btn-success">Registar nota</button>
    </a>
    <br>
    @if(Session::has('mensaje'))
        <br>
        <div class="alert-success">
            {{Session::get('mensaje')}}
        </div>
    @endif
    <br>
    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Puntaje</th>
                <th scope="col">Fecha</th>
                <th scope="col">Estudiante</th>
                <th scope="col">Materia</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($qualifications as $q)
            <tr>
                <th scope="row">{{$q->id}}</th>
                <td>{{$q->score}}</td>
                <td>{{$q->date}}</td>
                <td>{{$q->student_name}} {{$q->student_lastname}}</td>
                <td>{{$q->subject_name}}</td>
                <td>
                    <a href="{{route('qualificationupdate',['id'=>$q->id])}}">
                        <button type="button" class="btn btn-info">Modificar</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection