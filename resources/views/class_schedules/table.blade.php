<div class="table-responsive">
    <table class="table" id="classSchedules-table">
        <thead>
            <tr>
                <th>Course Id</th>
        <th>Class Id</th>
        <th>Level Id</th>
        <th>Shift Id</th>
        <th>Classroom Id</th>
        <th>Batch Id</th>
        <th>Day Id</th>
        <th>Time Id</th>
        <th>Semester Id</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($classSchedules as $classSchedule)
            <tr>
                <td>{{ $classSchedule->course_id }}</td>
            <td>{{ $classSchedule->class_id }}</td>
            <td>{{ $classSchedule->level_id }}</td>
            <td>{{ $classSchedule->shift_id }}</td>
            <td>{{ $classSchedule->classroom_id }}</td>
            <td>{{ $classSchedule->batch_id }}</td>
            <td>{{ $classSchedule->day_id }}</td>
            <td>{{ $classSchedule->time_id }}</td>
            <td>{{ $classSchedule->semester_id }}</td>
            <td>{{ $classSchedule->start_date }}</td>
            <td>{{ $classSchedule->end_date }}</td>
            <td>{{ $classSchedule->status }}</td>
                <td>
                    {!! Form::open(['route' => ['classSchedules.destroy', $classSchedule->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('classSchedules.show', [$classSchedule->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('classSchedules.edit', [$classSchedule->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
