<div class="table-responsive">
    <table class="table" id="admissions-table">
        <thead>
            <tr>
                {{-- <th>Roll No</th> --}}
                <th>Image</th>
                <th>Full Name</th>
                <th>Department</th>
                <th>Batch</th>
                <th>Faculty</th>
                {{-- <th>Father Name</th>
        <th>Father Phone</th>
        <th>Mother Name</th> --}}
                <th>Gender</th>
                {{-- <th>Email</th>
        <th>Dob</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Current Address</th>
        <th>Nationality</th>
        <th>Passport</th> --}}
                <th>Status</th>
                {{-- <th>Dateregistered</th>
        <th>User Id</th>
        <th>Class Id</th> --}}

                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($admissions as $admission)
            <tr>
                <td><img src="{{asset('student_images/'.$admission->image)}}" alt="" width="50" height="50"></td>
                {{-- <td>{{ $admission->roll_no }}</td> --}}
                <td>{{ $admission->first_name }} {{ $admission->last_name }}</td>
                <td>{{$admission->department_name}}</td>
                <td>{{$admission->year}}</td>
                <td>{{$admission->faculty_name}}</td>
                {{-- <td>{{ $admission->father_name }}</td>
                <td>{{ $admission->father_phone }}</td>
                <td>{{ $admission->mother_name }}</td> --}}
                <td>
                    @if ($admission->gender==0)
                    Male
                    @else
                    Female
                    @endif

                </td>
                {{-- <td>{{ $admission->email }}</td>
                <td>{{ $admission->dob }}</td>
                <td>{{ $admission->phone }}</td>
                <td>{{ $admission->address }}</td>
                <td>{{ $admission->current_address }}</td>
                <td>{{ $admission->nationality }}</td>
                <td>{{ $admission->passport }}</td> --}}
                <td>
                    @if ($admission->status)
                    Single
                    @else
                    Married
                    @endif
                </td>
                {{-- <td>{{ $admission->dateregistered }}</td>
                <td>{{ $admission->user_id }}</td>
                <td>{{ $admission->class_id }}</td> --}}
                <td>
                    {!! Form::open(['route' => ['admissions.destroy', $admission->student_id], 'method' => 'delete'])
                    !!}
                    <div class='btn-group'>
                        <a href="{{ route('admissions.show', [$admission->student_id]) }}"
                            class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('admissions.edit', [$admission->student_id]) }}"
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
