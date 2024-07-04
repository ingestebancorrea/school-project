// resources/js/qualifications.js

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