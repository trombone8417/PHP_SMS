<div class="table-responsive">
    <table class="table" id="teachers-table">
        <thead>
            <tr>
                <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Dob</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Nationality</th>
        <th>Passport</th>
        <th>Status</th>
        <th>Dateregistered</th>
        <th>User Id</th>
        <th>Image</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($teachers as $teacher)
            <tr>
                <td>{{ $teacher->first_name }}</td>
            <td>{{ $teacher->last_name }}</td>
            <td>{{ $teacher->gender }}</td>
            <td>{{ $teacher->email }}</td>
            <td>{{ $teacher->dob }}</td>
            <td>{{ $teacher->phone }}</td>
            <td>{{ $teacher->address }}</td>
            <td>{{ $teacher->nationality }}</td>
            <td>{{ $teacher->passport }}</td>
            <td>{{ $teacher->status }}</td>
            <td>{{ $teacher->dateregistered }}</td>
            <td>{{ $teacher->user_id }}</td>
            <td>{{ $teacher->image }}</td>
                <td>
                    {!! Form::open(['route' => ['teachers.destroy', $teacher->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('teachers.show', [$teacher->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('teachers.edit', [$teacher->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
