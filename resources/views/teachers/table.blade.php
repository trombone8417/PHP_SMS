<div class="table-responsive">
    <table class="table" id="teachers-table">
        <thead>
            <tr>
                <th>Full Name</th>
        <th>Gender</th>
        <th>Email</th>
        {{-- <th>Dob</th> --}}
        <th>Phone</th>
        {{-- <th>Address</th>
        <th>Nationality</th>
        <th>Passport</th> --}}
        <th>Status</th>
        {{-- <th>Dateregistered</th>
        <th>User Id</th> --}}
        <th>Image</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($teachers as $teacher)
            <tr>
                <td>{{ $teacher->first_name }} {{ $teacher->last_name }}</td>
            <td>
                @if($teacher->gender == 0)
                Male
                @else
                Female
                @endif
            </td>
            <td>{{ $teacher->email }}</td>
            {{-- <td>{{ $teacher->dob }}</td> --}}
            <td>{{ $teacher->phone }}</td>
            {{-- <td>{{ $teacher->address }}</td>
            <td>{{ $teacher->nationality }}</td>
            <td>{{ $teacher->passport }}</td> --}}
            <td class="col-md-1">
                <input type="checkbox" class="js-switch" data-id="{{$teacher->teacher_id}}" name="status" class="js-switch"  {{$teacher->status == 1 ? 'checked' : ''}}>
            </td>
            {{-- <td>{{ $teacher->dateregistered }}</td>
            <td>{{ $teacher->user_id }}</td> --}}
            <td><img src="{{asset('teacher_images/'.$teacher->image)}}" width="50" height="50" style="border-radius:50%"></td>
                <td>
                    {!! Form::open(['route' => ['teachers.destroy', $teacher->teacher_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('teachers.show', [$teacher->teacher_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('teachers.edit', [$teacher->teacher_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('.js-switch').change(function(){
            let status = $(this).prop('checked') == true?1:0;
            let teacherId = $(this).data('id');

            $.ajax({
                type:"GET",
                dataType:"json",
                url:"{{url('teacher-status-update')}}",
                data:{'status':status, 'teacher_id':teacherId},
                success:function(data){
                    console.log(data.message);
                }
            });
        });
    });
</script>
@endpush
