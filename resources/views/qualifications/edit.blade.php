<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

@extends('template')

@section('contenido')
<div class="container">
    <h1>Actualizar nota</h1>
    <hr>
    <form action="{{ route('update') }}" method="POST">
        @csrf
        <div class="well">
            <div>
                <div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="form-group">
                        <label for="id">
                            Id:
                            @if($errors->first('id'))
                            <p class="text-danger">{{$errors->first('ide')}}
                            @endif
                        </label>
                        <input type="text" name="id" id="id" value="{{$qualification->id}}" readonly='readonly' class="form-control" placeholder="Clave empleado" tabindex="5">
                    </div>
                </div>
                
                <div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="form-group">
                        <label for="subject_id">Materia:</label>
                        <select name="subject_id" id="subject_id" class="form-select">
                            <option selected disabled>Selecciona...</option>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}" @if($qualification->subject_id == $subject->id) selected @endif>{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="form-group">
                        <label for="course_id">Curso:</label>
                        <select name="course_id" id="course_id" class="form-select">
                            <option selected disabled>Selecciona...</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id  }}" @if($qualification->course_id == $course->id) selected @endif>{{ $course->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="form-group">
                        <label for="student_id">Estudiante:</label>
                        <select name="student_id" id="student_id" class="form-select">
                            <option value="{{ $qualification->student_id }}">{{ $qualification->student_name }} {{ $qualification->student_lastname }}</option>
                        </select>
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="form-group">
                        <label for="score">Puntaje:</label>
                        @if($errors->has('score'))
                            <p class="text-danger">{{ $errors->first('score') }}</p>
                        @endif
                        <input type="text" name="score" id="score" value="{{ $qualification->score }}" class="form-control" placeholder="Puntaje" tabindex="1">
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-xs-6 col-md-6">
                    <input
                        type="submit"
                        value="Guardar"
                        class="btn btn-danger btn-block btn-lg"
                        tabindex="7"
                        title="Guardar datos ingresados"
                    >
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    // JavaScript for making an AJAX request to fetch students based on selected course
    document.addEventListener('DOMContentLoaded', function() {
      var courseSelect = document.getElementById('course_id');
      var studentSelect = document.getElementById('student_id');

      courseSelect.addEventListener('change', function() {
          var courseId = this.value; // Get the selected course ID
          var url = "{{ route('students-by-course', ':courseId') }}";
          url = url.replace(':courseId', courseId);

          // Make AJAX request to fetch students based on selected course
          axios.get(url)
            .then(function(response) {
              var options = '<option selected disabled>Selecciona...</option>';
              response.data.forEach(function(student) {
                options += '<option value="' + student.id + '">' + student.name + ' ' + student.lastname + '</option>';
              });
              studentSelect.innerHTML = options; // Populate students dropdown
            })
            .catch(function(error) {
              console.error('Error fetching students:', error);
            });
        });
    });
</script>
@endsection
