{{-- modal 彈出視窗 header(前) --}}
{!! Form::open(array('route' => 'insert', 'id'=>'mult','method'=>'post')) !!}
<div class="modal fade" id="classschedule-show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- modal 彈出視窗 header(尾) --}}
                @csrf
                @include('class_assignings.fields')
                <div class="table-responsive">
                    <table class="table" id="classAssignings-table">
                        <thead>

                        </thead>
                        @foreach ($classSchedules as $classSchedule)
                        <tr>
                            <td><input type="checkbox" name="multiclass[]" value="{{$classSchedule->schedule_id}}"></td>
                            <td>{{$classSchedule->course_name}}</td>
                            <td>{{$classSchedule->class_name}}</td>
                            <td>{{$classSchedule->level}}</td>
                            <td>{{$classSchedule->shift}}</td>
                            <td>{{$classSchedule->classroom_name}}</td>
                            <td>{{$classSchedule->batch}}</td>
                            <td>{{$classSchedule->name}}</td>
                            <td>{{$classSchedule->time}}</td>
                            <td>{{$classSchedule->semester_name}}</td>
                            <td>{{ date('d-m-Y',strtotime($classSchedule->start_date))}}</td>
                            <td>{{ date('d-m-Y',strtotime($classSchedule->end_date))}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>


                {{-- modal 彈出視窗 footer(前) --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                {!! Form::submit('Generate Class Assign', array('class' => 'btn btn-success')) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
{{-- modal 彈出視窗 footer(尾) --}}

<div class="table-responsive">
    <table class="table" id="classAssignings-table">
        <thead>
            <tr>
                <th>Teacher</th>
                <th>Semester</th>
                <th>Course</th>
                <th>Details</th>
                <th colspan="3">Action</th>
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
                <td>
                    {!! Form::open(['route' => ['classAssignings.destroy', $classAssigning->class_assign_id], 'method'
                    => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="#"
                            class='show-modal btn btn-default btn-xs'
                            data-id="{{$classAssigning->class_assign_id}}"
                            data-name="{{$classAssigning->name}}"
                            data-fname="{{$classAssigning->first_name}}"
                            data-lname="{{$classAssigning->last_name}}"
                            data-shift="{{ $classAssigning->shift}}"
                            data-level="{{$classAssigning->level}}"
                            data-time="{{$classAssigning->time}}"
                            data-classroom_name="{{$classAssigning->classroom_name}}"
                            data-class_name="{{$classAssigning->class_name}}"
                            data-batch="{{$classAssigning->year}}"
                            data-course_name="{{$classAssigning->course_name}}"
                            data-semester_name="{{ $classAssigning->semester_name}}"
                            data-created_at="{{$classAssigning->created_at}}">
                            <i class="glyphicon glyphicon-eye-open"></i></a>
                            {{-- Edit --}}
                        <a href="{{ route('classAssignings.edit', [$classAssigning->class_assign_id]) }}"
                            class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                            {{-- Delete --}}
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' =>
                        'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$classAssignings->links()}}
</div>
