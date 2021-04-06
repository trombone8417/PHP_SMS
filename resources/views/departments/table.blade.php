<div class="table-responsive">
    <table class="table" id="departments-table">
        <thead>
            <tr>
                <th>Faculty Id</th>
                <th>Department Name</th>
                <th>Department Code</th>
                <th>Department Description</th>
                <th>Department Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departments as $department)
            <tr>
                <td>{{ $department->faculty_name }}</td>
                <td>{{ $department->department_name }}</td>
                <td>{{ $department->department_code }}</td>
                <td>{{ $department->department_description }}</td>
                <td>{{ $department->department_status }}</td>
                <td>
                    {!! Form::open(['route' => ['departments.destroy', $department->department_id], 'method' =>
                    'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('departments.show', [$department->department_id]) }}"
                            class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('departments.edit', [$department->department_id]) }}"
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
