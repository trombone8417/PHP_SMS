<div class="table-responsive">
    <table class="table" id="classSchedules-table">
        <thead>
            <tr>
                <th>Course</th>
                <th>Class</th>
                <th>Level</th>
                <th>Shift</th>
                <th>Classroom</th>
                <th>Batch</th>
                <th>Day</th>
                <th>Time</th>
                <th>Semester</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classSchedules as $classSchedule)
            <tr>
                <td>{{ $classSchedule->course_name }}</td>
                <td>{{ $classSchedule->class_name }}</td>
                <td>{{ $classSchedule->level }}</td>
                <td>{{ $classSchedule->shift }}</td>
                <td>{{ $classSchedule->classroom_name }}</td>
                <td>{{ $classSchedule->year }}</td>
                <td>{{ $classSchedule->name }}</td>
                <td>{{ $classSchedule->time }}</td>
                <td>{{ $classSchedule->semester_name }}</td>
                <td>{{ $classSchedule->start_date }}</td>
                <td>{{ $classSchedule->end_date }}</td>
                <td>
                    @if ($classSchedule->status == 1)
                    <i style="color: green" class="fa fa-check-square-o"></i>
                    @else
                    <i style="color: red" class="fa fa-square-o"></i>
                    @endif
                </td>
                <td>
                    {!! Form::open(['route' => ['classSchedules.destroy', $classSchedule->schedule_id], 'method' =>
                    'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('classSchedules.show', [$classSchedule->schedule_id]) }}"
                            class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a data-toggle="modal" data-target="#class_schedules-edit-modal" id="Edit" data-id="{{ $classSchedule->schedule_id }}"
                            class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' =>
                        'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
