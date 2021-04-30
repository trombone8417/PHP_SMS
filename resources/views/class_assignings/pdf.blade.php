<table class="table" id="classAssignings-table">
    <thead>
        <tr>
            <th>Teacher</th>
            <th>Semester</th>
            <th>Course</th>
            <th>Details</th>
        </tr>
    </thead>
    <tbody>
        @foreach($classAssignings as $classAssigning)
        <tr>
            <td>{{ $classAssigning->first_name }} {{ $classAssigning->last_name }}</td>
            <td>{{ $classAssigning->semester_name }}</td>
            <td>{{ $classAssigning->course_name }}</td>
            <td>
                {{ $classAssigning->level }} | {{ $classAssigning->time }} |
                {{ $classAssigning->name }} | {{ $classAssigning->class_name }} |
                {{ $classAssigning->shift }} | {{ $classAssigning->year }} |
                {{ $classAssigning->classroom_name }}
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
