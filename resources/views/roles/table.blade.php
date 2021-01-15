<div class="table-responsive">
    <table class="table" id="roles-table">
        <thead>
            <tr>
                <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>
                <td>
                    {!! Form::open(['route' => ['roles.destroy', $role->role_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('roles.show', [$role->role_id]) }}" class='btn btn-warning btn-xs'><i class="glyphicon glyphicon-eye-open"></i>&nbsp;檢視</a>
                        <a href="{{ route('roles.edit', [$role->role_id]) }}" class='btn btn-info btn-xs'><i class="glyphicon glyphicon-edit"></i>&nbsp;編輯</a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
